<?php

namespace App\Exports;

use App\Models\Bitacora;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class BitacoraExport implements FromView
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
        $bitacoras = DB::table('bitacora')
        ->whereIn('bitacora.id',$this->data_id)
                       ->get();

        return view('bitacoraExcel', [
            'bitacoras' => $bitacoras,
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
}

