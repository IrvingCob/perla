@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="container">
        <div class="row">

            <div class="col-md-10">
                <div class="crud-panel">
                    
                    <div class="panel-body">
                        <center> <h2> P R O D U C T O S</h2> </center>
                        <a href="javascript: history.go(-1)"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/producto/producto/create') }}" class="btn btn-success btn-sm" title="Add New Viver">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                        </a>
                        


                        
                        
                        

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="TFtable">
                                <thead>
                                    <tr id="columna1">
                                        <th>#</th><th>Producto</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($producto as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/producto/producto/' . $item->id . '/edit') }}" title="Modificar"><button class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                           

                                            <form method="POST" action="{{ url('/producto/producto' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm(&quot;Seguro que desea eliminar este registro?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $producto->appends(['search' => Request::get('search')])->render() !!} </div>
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