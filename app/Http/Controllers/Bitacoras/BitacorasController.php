<?php

namespace App\Http\Controllers\Bitacoras;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use PDF;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BitacoraExport;


class BitacorasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
       

        if (!empty($keyword)) {
           $bitacoras = Bitacora::where('fecha', 'LIKE', "$keyword%")
                                ->orWhereHas('proveedor', function ( $query ) use ( $keyword ) {
                                    $query->where('nombre', 'LIKE', "%$keyword%");
                                })
                                ->has('proveedor')
                                ->with(['proveedor'])
                                ->paginate(10);
        } else {
            $bitacoras = Bitacora::with(['proveedor'])
                                ->paginate(10);
        }

        $data = $this->parse_id($bitacoras);

        
        return view('bitacoras.bitacoras.index', compact('bitacoras','data'));
        //Ordenamiento por id
        $bitacoras = Bitacora::orderBy('id', 'ASC')
        ->paginate(25);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Bitacora::create($requestData);

        return redirect('bitacoras/bitacoras')->with('flash_message', 'Bitacora added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $bitacora = Bitacora::findOrFail($id);

        return view('bitacoras.bitacoras.show', compact('bitacora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $bitacora = Bitacora::findOrFail($id);

        return view('bitacoras.bitacoras.edit', compact('bitacora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $bitacora = Bitacora::findOrFail($id);
        $bitacora->update($requestData);

        return redirect('bitacoras/bitacoras')->with('flash_message', 'Bitacora updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Bitacora::destroy($id);

        return redirect('bitacoras/bitacoras')->with('flash_message', 'Bitacora deleted!');
    }

    public function exportpdf($data)
    {
        $buscar = json_decode($data);
        $bitacoras = Bitacora::whereIn('id',$buscar)->get();
        $pdf = PDF::loadView('bitacoraPDF',['buscar' => $bitacoras])->setPaper('a3', 'landscape');
        return $pdf->download('Bitacoras ('.now()->format('d-m-Y').').pdf');

        
    }



    protected function parse_id($data)
    {
        $array_id = [];

        foreach ($data as $bitacoras) {
            array_push($array_id,$bitacoras->id);
        }
        return json_encode($array_id); //"[0=>9,1=>6,2=>3,3=>10]" Array de id de personal
    }
    public function export()
    {
       
       
        return Excel::download(new BitacoraExport, 'bitacoras.xls');
    }
        
}
