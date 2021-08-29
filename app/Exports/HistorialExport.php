<?php

namespace App\Exports;

use App\Models\Historial;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class HistorialExport implements FromView
{
    

    /**
    * Property $data_search
    */
   
    public $data_id;

    /**
    * __construct(int):array
    */
    public function __construct($data_search)
    {
        $this->data_id = $data_search;
    }

    public function view() : View
    {
        $historiales = DB::table('historial')
        ->whereIn('historial.id',$this->data_id)
                       ->get();

        return view('historialExcel', [
            'historiales' => $historiales,
        ]);
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return DB::table('bitacora')
    //              ->whereIn('bitacora.id',$this->data_id)
    //              ->join('proveedor', 'bitacora.proveedor_id', "=", 'proveedor.id')
    //              ->select('bitacora.id','fecha','anticipoEntrada','proveedor.nombre')
    //              ->get();
    // }

    // public function headings() : array{
    //     return [
    //         'Id',
    //         'Fecha',
    //         'Anticipo Entrada',
    //         'Nombre del proveeedor',
    //     ];
    // }

    // otra fincion usando joins


   // public function view() : View
   // {
     //   $historiales = DB::table('historial')
       //                ->whereIn('historial.id',$this->data_id)
         //              ->join('proveedor', 'historial.proveedor_id', "=", 'proveedor.id')
           //            ->join('status', 'historial.status_id', "=", 'status.id')
             //          ->select('historial.id','fecha','cantidad','precio','importe','proveedor.nombre','status.status')
               //        ->get();

     
     //   return view('historialExcel', [
       //     'historiales' => $historiales,
        //  ]);
  //  }
}

