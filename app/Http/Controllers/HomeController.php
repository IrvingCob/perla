<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\{Proveedor, Historial, Viver};
use DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
    $proveedor = DB::table("proveedor") // Para declarar esta variable en la vista hay que inyectarlo en el compac
    ->select(DB::raw('count(id) AS proveedor'))
    ->get();

    $historial = DB::table("historial") // Para declarar esta variable en la vista hay que inyectarlo en el compac
    ->select(DB::raw('count(id) AS historial'))
    ->get();

    $viver = DB::table("viver") // Para declarar esta variable en la vista hay que inyectarlo en el compac
    ->select(DB::raw('count(id) AS viver'))
    ->get();

    $bitacora = DB::table("bitacora") // Para declarar esta variable en la vista hay que inyectarlo en el compac
    ->select(DB::raw('count(id) AS bitacora'))
    ->get();

     $bita = DB::table("bitacora") // Para declarar esta variable (sum) hay que inyectarlo abajo
    ->select(DB::raw('count(id) AS bita'))
    ->get();

    $hist = DB::table("historial") // Para declarar esta variable (sum) hay que inyectarlo abajo
    ->select(DB::raw('count(id) AS hist'))
    ->get();
        
    $viv = DB::table("viver") // Para declarar esta variable (sum) hay que inyectarlo abajo
    ->select(DB::raw('count(id) AS viv'))
    ->get();

    $prov = DB::table("proveedor") // Para declarar esta variable (sum) hay que inyectarlo abajo
    ->select(DB::raw('count(id) AS prov'))
    ->get();
        
    $prod = DB::table("producto") // Para declarar esta variable (sum) hay que inyectarlo abajo
    ->select(DB::raw('count(id) AS prod'))
    ->get();

    

        
      //  $bita = array_column($bita,'bita');
        


        return view('adminlte::home', compact('proveedor','historial', 'viver', 'bitacora', 'bita', 'hist', 'viv', 'prov', 'prod'));
    }


  





    

}
