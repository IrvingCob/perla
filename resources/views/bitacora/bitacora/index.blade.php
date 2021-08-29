@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
    <div class="container">
        <div class="row">

            <div class="col-md-11">
                <div class="crud-panel">
                    <div class="panel-body">
                        <center> <h2> B I T A C O R A</h2> </center>
                        <a href="javascript: history.go(-1)"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/bitacora/bitacora/'.$vendor_id.'/create') }}" class="btn btn-success btn-sm" title="Nuevo Proveedor">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                        </a>  
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="TFtable">
                                <thead>
                                    <tr id="columna1">
                                        <th>#</th><th>Credito</th><th>Fecha</th><th>Proveedor</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($bitacora as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @php($proveedor=App\Models\Proveedor::findOrNew($item->proveedor_id)->credito)
                                        <td id="td">${{ $proveedor }}</td>
                                        <td>{{ $item->fecha }}</td>
                                        @php($proveedor=App\Models\Proveedor::findOrNew($item->proveedor_id)->nombre)
                                        <td id="td">{{ $proveedor }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/bitacora/bitacora/' . $item->id . '/edit') }}" title="Modificar bitacora"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                           

                                            <form method="POST" action="{{ url('/bitacora/bitacora' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Bitacora" onclick="return confirm(&quot;¿Seguro que desea eliminar este registro?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $bitacora->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style type="text/css">
    .crud-panel{
         background-color: rgb(227, 255, 224);

    }
    #columna1{
        background-color: black;
    }
    th{
        color: white;
    }
     .TFtable{
        width:100%; 
        border-collapse:collapse; 
    }
    .TFtable td{ 
        padding:7px; border:#4e95f4;
    }
    /* provide some minimal visual accomodation for IE8 and below */
    .TFtable tr{
        background: #b8d1f3;
    }
    /*  Define the background color for all the ODD background rows  */
    .TFtable tr:nth-child(odd){ 
        background: #b8d1f3;
    }
    /*  Define the background color for all the EVEN background rows  */
    .TFtable tr:nth-child(even){
        background: #dae5f4;
    }
     .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #963436;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 8px;
  width: 90px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.button2 {
  display: inline-block;
  border-radius: 4px;
  background-color: #EFC012;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 8px;
  width: 90px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '     🢂';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -10px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 20px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>