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
                        <center> <h2> V I V E R E S</h2> </center>
                        <a href="javascript: history.go(-1)"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/viver/viver/'.$vendor_id.'/create') }}" class="btn btn-success btn-sm" title="Nuevo Proveedor">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                        </a> 

                        

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="TFtable">
                                <thead>
                                    <tr id="columna1">
                                        <th>#</th>
                                        <th>Proveedor</th> 
                                        <th>Viveres</th>
                                        <th>Cantidad</th>
                                        <th>Precio / u</th>
                                        <th>Importe</th>
                                        <th>Fecha</th>                                      
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($viver as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @php($proveedor=App\Models\Proveedor::findOrNew($item->proveedor_id)->nombre)
                                        <td id="td">{{ $proveedor }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td>${{ $item->precio }}</td>
                                        <td>${{ $item->importe }}</td>
                                        <td>{{ $item->fecha }}</td>
                                        
                                        <td>
                                            
                                            <a href="{{ url('/viver/viver/' . $item->id . '/edit') }}" title="Modificar Viver"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                                            <form method="POST" action="{{ url('/viver/viver' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Viver" onclick="return confirm(&quot;¿Esta seguro que desea eliminar este registro?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $viver->appends(['search' => Request::get('search')])->render() !!} </div>
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
        
  position: relative;
  margin: auto;
  width:100%;
        

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

</style>
