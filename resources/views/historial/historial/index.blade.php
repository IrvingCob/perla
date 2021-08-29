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
                        <center> <h2> H I S T O R I A L</h2> </center>
                        <a href="javascript: history.go(-1)"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/historial/historial/'.$vendor_id.'/create') }}" class="btn btn-success btn-sm" title="Nuevo Historial">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                        </a> 

                        <form method="GET" action="{{ url('/historial/historial') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="TFtable">
                                <thead>
                                    <tr id="columna1">
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Importe</th>
                                        <th>Proveedor</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($historial as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->fecha }}</td>
                                        @php($producto=App\Models\Producto::findOrNew($item->producto_id)->nombre)
                                        <td id="td">{{ $producto }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td>$ {{ $item->precio }}</td>
                                        <td>$ {{ $item->importe }}</td>
                                        @php($proveedor=App\Models\Proveedor::findOrNew($item->proveedor_id)->nombre)
                                        <td id="td">{{ $proveedor }}</td>
                                        @php($status=App\Models\Status::findOrNew($item->status_id)->status)
                                        <td id="td">{{ $status }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/historial/historial/' . $item->id . '/edit') }}" title="Modificar Historial"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                                            <form method="POST" action="{{ url('/historial/historial' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Historial" onclick="return confirm(&quot;¿Esta seguro de eliminar este registro?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $historial->appends(['search' => Request::get('search')])->render() !!} </div>
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
</style>