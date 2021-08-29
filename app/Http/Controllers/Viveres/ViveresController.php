<?php

namespace App\Http\Controllers\Viveres;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\{Viver, Proveedor};
use Illuminate\Http\Request;
use PDF;
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
class ViveresController extends Controller
{
public function index(Request $request)
    {
       
        $keyword = $request->get('search');
       
        if (!empty($keyword)) {
           $viveres = Viver::where('nombre', 'LIKE', "$keyword%")
                ->orWhere('cantidad', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->orWhere('importe', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->orWhereHas('proveedor', function ( $query ) use ( $keyword ) {
                                    $query->where('nombre', 'LIKE', "%$keyword%");
                                })
                                ->has('proveedor')
                                ->with(['proveedor'])
                                ->paginate(10);
        } else {
            $viveres = Viver::with(['proveedor'])
                                ->paginate(10);
        }

        $data = $this->parse_id($viveres);

        
        return view('viveres.viveres.index', compact('viveres','data'));
        //Ordenamiento por id
        $viveres = Viver::orderBy('id', 'ASC')
        ->paginate(25);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('viveres.viveres.create');
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
        
        Vivere::create($requestData);

        return redirect('viveres/viveres')->with('flash_message', 'Vivere added!');
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
        $vivere = Vivere::findOrFail($id);

        return view('viveres.viveres.show', compact('vivere'));
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
        $vivere = Vivere::findOrFail($id);

        return view('viveres.viveres.edit', compact('vivere'));
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
        
        $vivere = Vivere::findOrFail($id);
        $vivere->update($requestData);

        return redirect('viveres/viveres')->with('flash_message', 'Vivere updated!');
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
        Vivere::destroy($id);

        return redirect('viveres/viveres')->with('flash_message', 'Vivere deleted!');
    }

    public function exportpdf($data)
    {
        $buscar = json_decode($data);
        $viveres = Viver::whereIn('id',$buscar)->get();
        $pdf = PDF::loadView('viveresPDF',['buscar' => $viveres])->setPaper('a3', 'landscape');
        return $pdf->download('Viver.pdf');
    }

    protected function parse_id($data)
    {
        $array_id = [];

        foreach ($data as $viveres) {
            array_push($array_id,$viveres->id);
        }
        return json_encode($array_id); //"[0=>9,1=>6,2=>3,3=>10]" Array de id de personal
    }
}
