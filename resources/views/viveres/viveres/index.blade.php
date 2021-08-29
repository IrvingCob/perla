@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container">
        <div class="row">

            <div class="col-md-11">
                <div class="crud-panel">
                    <div class="panel-body">
                        <center> <h2> V I V E R E S</h2> </center>
                        <a href="javascript: history.go(-1)"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        

                       {{--<form action="{{ route('exportpdf') }}" method="post">
                            @csrf
                            @foreach($viveres as $buscar)
                                <input type="hidden" name="persona" value="{{ $dato }}">
                             @endforeach 
                            <button class="btn btn-info" type="submit">Export as PDF</button>
                        </form>--}}

                        <a href="{{ route('viveres.exportpdf',$data) }}" title="View Personal"><button class="btn btn-primary mb1 bg-red btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exportar busqueda</button></a>

                        <a href="{{ route('viveres.exportxls',$data) }}" class="btn btn-success">Export to .xls</a>


                        <form method="GET" action="{{ route('viveres.index') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            
                            
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            
                        </form>
                        


                        
                        
                        <form method="GET" action="{{ url('/viveres/viveres') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            
                                
                                <input type="date" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
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
                                        <th>Proveedor</th> 
                                        <th>Viveres</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Importe</th>
                                        <th>Fecha</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($viveres as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @php($proveedor=App\Models\Proveedor::findOrNew($item->proveedor_id)->nombre)
                                        <td id="td">{{ $proveedor }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td>{{ $item->precio }}</td>
                                        <td>{{ $item->importe }}</td>
                                        <td>{{ $item->fecha }}</td>
                                        
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $viveres->appends(['search' => Request::get('search')])->render() !!} </div>
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