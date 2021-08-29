<?php

namespace App\Http\Controllers\Proveedor;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Proveedor;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class ProveedorController extends Controller
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
            $proveedor = Proveedor::where('nombre', 'LIKE', "%$keyword%")
                                  ->orWhere('telefono', 'LIKE', "%$keyword%")
                                  ->orWhere('embarcacion', 'LIKE', "%$keyword%")
                                  ->orWhere('referencia', 'LIKE', "%$keyword%")
                                  ->orderBy('id', 'ASC')
                                  ->paginate(25);
        } else {
            $proveedor = Proveedor::orderBy('id', 'ASC')//Ordenamiento por id
                                  ->paginate(25);
        }
        return view('proveedor.proveedor.index', compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('proveedor.proveedor.create');
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
        $request['saldo'] = $request->credito;//Initial balance
        Proveedor::create($request->all());

        alert()->success('correctamente!', 'Creado');
        return redirect('proveedor/proveedor')->with('flash_message', 'Proveedor added!');
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
        $proveedor = Proveedor::findOrFail($id);

        return view('proveedor.proveedor.show', compact('proveedor'));
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
        $proveedor = Proveedor::findOrFail($id);

        return view('proveedor.proveedor.edit', compact('proveedor'));
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
        
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($requestData);
        alert()->success('correctamente!', 'Guardado');
        return redirect('proveedor/proveedor')->with('flash_message', 'Proveedor updated!');
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
        Proveedor::destroy($id);
        alert()->success('correctamente!', 'Eliminado');
        return redirect('proveedor/proveedor')->with('flash_message', 'Proveedor deleted!');
    }

    public function ayuda(){

        return view('proveedor.proveedor.ayuda');
    }
}
