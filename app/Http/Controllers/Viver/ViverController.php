<?php

namespace App\Http\Controllers\Viver;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\{Viver, Proveedor};
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ViverExport;

class ViverController extends Controller
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
            $viver = Viver::where('nombre', 'LIKE', "%$keyword%")
                          ->orWhere('cantidad', 'LIKE', "%$keyword%")
                          ->orWhere('precio', 'LIKE', "%$keyword%")
                          ->orWhere('importe', 'LIKE', "%$keyword%")
                          ->orWhere('fecha', 'LIKE', "%$keyword%")
                          ->orWhere('provedor_id', 'LIKE', "%$keyword%")
                          ->orderBy('id', 'ASC')
                          ->paginate(25);
        } else {
            $viver = Viver::orderBy('id', 'ASC')//Ordenamiento por id
                          ->paginate(25);
        }
        return view('viver.viver.index', compact('viver'));
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
        return view('viver.viver.create',compact('data_vendor','nombre'));
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
        // dd($request->all());
        $viver = Viver::create([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'importe' => $request->importe,
            'proveedor_id' => $request->vendor_id,
        ]);

        $vendor = Proveedor::whereId($viver->proveedor_id)->first();
        $balance_end = ($vendor->saldo + $viver->importe);
        $vendor->update(['saldo' => $balance_end]);
        $vendor->fresh();

        alert()->success('correctamente!', 'Creado');
        return redirect("viver/viver/$request->vendor_id/verViveres");

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
        $viver = Viver::findOrFail($id);
        $data_vendor = Proveedor::whereId($viver->proveedor_id)->first();
        $nombre = $data_vendor->nombre;


        return view('viver.viver.edit', compact('viver','nombre'));
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
        $viver = Viver::findOrFail($id);
        $data_vendor = Proveedor::first();
        $nombre = $data_vendor->nombre;

        return view('viver.viver.edit', compact('viver','data_vendor','nombre'));
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
        $viver = Viver::findOrFail($id);

        $import_current = $viver->importe;
        $import_update = $request->importe;

        $vendor = Proveedor::whereId($viver->proveedor_id)->first();

        if($import_update != $import_current)
        {
            if($import_update > $import_current)
            {
                // dd('Mayor');
                $balance_end = $vendor->saldo + ($import_update - $import_current);
            }
            else{
                // dd('Menor');
                $balance_end = ($vendor->saldo - $import_update);
            }

            $vendor->update(['saldo' => $balance_end]);
            $vendor->fresh();
        }

        $viver->update($request->all());

        alert()->success('correctamente!', 'Guardado');
        return redirect("viver/viver/$viver->proveedor_id/verViveres");
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
        $viver = Viver::findOrFail($id);
        $vendor_id = $viver->proveedor_id;
        $viver->delete();
        alert()->success('correctamente!', 'Eliminado');
        return redirect("viver/viver/$vendor_id/verViveres")->with('flash_message', 'Historla deleted!');

    }

    // Desarrollo Ing Irving Cob

    public function verViveres($id)
    {
        $viver = viver::where('proveedor_id',$id)->paginate(16);
        $vendor_id = $id;
        return view('viver.viver.index', compact('viver','vendor_id'));
    }

    public function exportxls($data)
    {
        $buscar = json_decode($data);
        return Excel::download(new ViverExport($buscar), 'viveres ('.now()->format('d-m-Y').').xls');
    }
}
