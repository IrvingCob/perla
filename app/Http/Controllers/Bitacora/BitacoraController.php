<?php

namespace App\Http\Controllers\Bitacora;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\{Bitacora,Proveedor};
use Illuminate\Http\Request;
use DB;
use Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BitacoraExport;


class BitacoraController extends Controller
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
        $perPage = 10;

        if (!empty($keyword)) {
            $bitacora = Bitacora::where('fecha', 'LIKE', "%$keyword%")
                ->orWhere('proveedor_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $bitacora = Bitacora::latest()->paginate($perPage);
        }

        //Ordenamiento por id
        $bitacora = Bitacora::orderBy('id', 'ASC')
        ->paginate(25);
        //

        return view('bitacora.bitacora.index', compact('bitacora'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($vendor_id)
    {
        $data_vendor = Proveedor::where('id',$vendor_id)->first();
        $nombre = $data_vendor->nombre;
        // dd($data_vendor->id);
        return view('bitacora.bitacora.create',compact('data_vendor','nombre'));
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
        // dd($request->vendor_id);
        $bitacora = Bitacora::create([
            'fecha' => $request->fecha,
            'proveedor_id' => $request->vendor_id,
        ]);
        // dd($bitacora);
        // http://127.0.0.1:8001/bitacora/bitacora/1/verBitacora
        alert()->success('correctamente!', 'Creado');
        return redirect("bitacora/bitacora/$request->vendor_id/verBitacora");

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
        $data_vendor = Proveedor::whereId($bitacora->proveedor_id)->first();
        $nombre = $data_vendor->nombre;


        return view('bitacora.bitacora.edit', compact('bitacora','nombre'));
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
        $data_vendor = Proveedor::whereId($bitacora->proveedor_id)->first();
       
        $nombre = $data_vendor->nombre;

        return view('bitacora.bitacora.edit', compact('bitacora','data_vendor','nombre'));
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
        $bitacora->fresh();
        alert()->success('correctamente!', 'Guardado');
        return redirect("bitacora/bitacora/$bitacora->proveedor_id/verBitacora");



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
        $bitacora = Bitacora::findOrFail($id);
        $vendor_id = $bitacora->proveedor_id;
        $bitacora->delete();
        alert()->success('correctamente!', 'Eliminado');
        return redirect("bitacora/bitacora/$vendor_id/verBitacora")->with('flash_message', 'Historla deleted!');

    }
    

    
    // Desarrollo Ing Irving Cob

    public function verBitacora($id)
    {
        $bitacora = bitacora::where('proveedor_id',$id)->paginate(10);
        $vendor_id = $id;

        return view('bitacora.bitacora.index', compact('bitacora','vendor_id'));
    }

    public function bitacoras(Request $request){

         $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $bitacora = Bitacora::where('fecha', 'LIKE', "%$keyword%")
                ->orWhere('proveedor_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $bitacora = Bitacora::latest()->paginate($perPage);
        }

        
         return view('bitacora.bitacora.bitacoras', compact('bitacora'));

    } 

    public function exportxls($data)
    {
        $buscar = json_decode($data);
        return Excel::download(new BitacoraExport($buscar), 'bitacoras ('.now()->format('d-m-Y').').xls');
    }

}
