<?php

namespace App\Http\Controllers\Historiales;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\{Historial, Proveedor};
use Illuminate\Http\Request;
use PDF;
use DB;
use Excel;
class HistorialesController extends Controller
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
           $historiales = Historial::where('fecha', 'LIKE', "$keyword%")
                                ->orWhere('cantidad', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->orWhere('importe', 'LIKE', "%$keyword%")
                                ->orWhereHas('proveedor', function ( $query ) use ( $keyword ) {
                                    $query->where('nombre', 'LIKE', "%$keyword%");
                                })
                                ->orWhereHas('producto', function ( $query ) use ( $keyword ) {
                                    $query->where('nombre', 'LIKE', "%$keyword%");
                                })
                                ->orWhereHas('status', function ( $query ) use ( $keyword ) {
                                    $query->where('status', 'LIKE', "%$keyword%");
                                })
                                ->has('proveedor')
                                ->has('producto')
                                ->has('status')
                                ->with(['proveedor', 'producto', 'status'])
                                ->paginate(10);
        } else {
            $historiales = Historial::with(['proveedor', 'producto', 'status'])
                                ->paginate(10);
        }

        $data = $this->parse_id($historiales);

        
        return view('historiales.historiales.index', compact('historiales','data'));

        //Ordenamiento por id
        $historiales = Historial::orderBy('id', 'ASC')
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
        return view('historiales.historiales.create');
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
        
        Historiales::create($requestData);

        return redirect('historiales/historiales')->with('flash_message', 'Historiale added!');
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
        $historiales = Historiales::findOrFail($id);

        return view('historiales.historiales.show', compact('historiales'));
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
        $historiales = Historiales::findOrFail($id);

        return view('historiales.historiales.edit', compact('historiales'));
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
        
        $historiales = Historiales::findOrFail($id);
        $historiales->update($requestData);

        return redirect('historiales/historiales')->with('flash_message', 'Historiale updated!');
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
        Historiales::destroy($id);

        return redirect('historiales/historiales')->with('flash_message', 'Historiale deleted!');
    }

    public function exportpdf($data)
    {
        $buscar = json_decode($data);
        $historiales = Historial::whereIn('id',$buscar)->get();

        //Suma y resultados Inyectamos suma y lo pasamos como parametro en la vista para traer el resultado del total de la suma

        $suma = $historiales->sum('precio');

        //

        $pdf = PDF::loadView('historialPDF',['buscar' => $historiales, 'suma' => $suma])->setPaper('a3', 'landscape');
        return $pdf->download('Historial.pdf');
    }

     protected function parse_id($data)
    {
        $array_id = [];

        foreach ($data as $historiales) {
            array_push($array_id,$historiales->id);
        }
        return json_encode($array_id); //"[0=>9,1=>6,2=>3,3=>10]" Array de id de personal
    }

     
}
