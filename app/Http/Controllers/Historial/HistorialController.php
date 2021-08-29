<?php

namespace App\Http\Controllers\Historial;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\{
    Historial,
    Proveedor,
    Producto,
    Status
};
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HistorialExport;

class HistorialController extends Controller
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
        $perPage = 25;

        if (!empty($keyword)) {
            $historial = Historial::where('fecha', 'LIKE', "%$keyword%")
                ->orWhere('cantidad', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->orWhere('importe', 'LIKE', "%$keyword%")
                ->orWhere('viver_id', 'LIKE', "%$keyword%")
                ->orWhere('proveedor_id', 'LIKE', "%$keyword%")
                ->orWhere('status_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $historial = Historial::latest()->paginate($perPage);
        }

        //Ordenamiento por id
        $historial = Historial::orderBy('id', 'ASC')
        ->paginate(25);
        //

        return view('historial.historial.index', compact('historial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($vendor_id)
    {
        // dd($vendor_id);
        // dd($data_vendor->id);
        $data_vendor = Proveedor::where('id',$vendor_id)->first();
        $nombre = $data_vendor->nombre;
        return view('historial.historial.create',compact('data_vendor','nombre'));
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
        $historial = Historial::create([
            'fecha' => $request->fecha,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'importe' => $request->importe,
            'status_id' => $request->status_id,
            'producto_id' => $request->producto_id,
            'proveedor_id' => $request->vendor_id,
        ]);

        $vendor = Proveedor::whereId($historial->proveedor_id)->first();
        $balance_end = $vendor->saldo - $historial->importe;
        $vendor->update(['saldo' => $balance_end]);
        $vendor->fresh();

        alert()->success('correctamente!', 'Creado');
        return redirect("historial/historial/$request->vendor_id/verHistorial")->with('flash_message', 'Historial added!');
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
        $historla = Historial::findOrFail($id);

        return view('historial.historial.show', compact('historial'));
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
        $historial = Historial::findOrFail($id);
        $data_vendor = Proveedor::whereId($historial->proveedor_id)->first();
        $nombre = $data_vendor->nombre;
        $producto = Producto::all();
        $status = Status::all();

        return view('historial.historial.edit', compact('historial','nombre','producto','status'));
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
        $historial = Historial::findOrFail($id);

        $import_current = $historial->importe;
        $import_update = $request->importe;

        $vendor = Proveedor::whereId($historial->proveedor_id)->first();


        if($import_update != $import_current)
        {    //act => 500     ant => 1600
            if($import_update > $import_current)  
            {
                // dd('Mayor');
                $balance_end = $vendor->saldo - ($import_update - $import_current);
            }
            else{//Reparar 
                // dd('Menor'); act => 500     // ant => 1600       sal => 1500 
                $balance_end = $vendor->saldo + ($import_current + $import_update);
            }

            $vendor->update(['saldo' => $balance_end]);
            $vendor->fresh();
        }

        $historial->update($request->all());
        $historial->fresh();

        alert()->success('correctamente!', 'Guardado');
        return redirect("historial/historial/$historial->proveedor_id/verHistorial")->with('flash_message', 'Historla updated!');
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
        $historial = Historial::findOrFail($id);
        $vendor_id = $historial->proveedor_id;
        $historial->delete();
        alert()->success('correctamente!', 'Eliminado');
        return redirect("historial/historial/$vendor_id/verHistorial")->with('flash_message', 'Historla deleted!');
    }

    // Desarrollo Ing Irving Cob

    public function verHistorial($id)
    {
        $historial = historial::where('proveedor_id',$id)->paginate(16);
        $vendor_id = $id;
        return view('historial.historial.index', compact('historial','vendor_id'));
    }

    public function export($data)
    {
        $buscar = json_decode($data);
        return Excel::download(new HistorialExport($buscar), 'historiales ('.now()->format('d-m-Y').').xls');
    }

    

}
