@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="container">
        <div class="row">
       <!--     @include('admin.sidebar') --> 

            <div class="col-md-11">
                <div class="crud-panel">
                    <div class="panel-body">
                        <center> <h2> P R O V E E D O R E S</h2> </center>
                        <a href="javascript: history.go(-1)"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/proveedor/proveedor/create') }}" class="btn btn-success btn-sm" title="Nuevo Proveedor">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Proveedor
                        </a>
                       

                        <form method="GET" action="{{ url('/proveedor/proveedor') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                           
                        </form>

                        <br/>

                        <br/>
                        <!-- Button trigger modal -->


                        
                        <div class="table-responsive">
                            <table  class="TFtable">
                                <thead>
                                    <tr id="columna1">
                                        <th><center>#</center></th>
                                        <th><center>Nombre</center></th>
                                        <th><center>Credito</center></th>
                                        <th><center>Telefono</center></th>
                                        <th><center>Embarcacion</center></th>
                                        <th><center>Referencia</center></th>
                                        <th><center>Acciones</center></th>
                                        <th><center>Seguimiento</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($proveedor as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>${{ $item->credito }}</td>
                                        <td>{{ $item->telefono }}</td>
                                        <td>{{ $item->embarcacion }}</td>
                                        <td>{{ $item->referencia }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/proveedor/proveedor/' . $item->id . '/edit') }}" title="Modifica"><button class="buttonActions"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/proveedor/proveedor' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="buttonActions2" title="Eliminar" onclick="return confirm(&quot;¿Seguro que quiere eliminar este registro?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                            <td><a href="{{ url('/bitacora/bitacora/' . $item->id.'/verBitacora') }}" class="button" title="Ver Bitacora"> <span> Bitacora   </span></a>
                                               

                                                <a href="{{ url('/historial/historial/' . $item->id.'/verHistorial') }}" class="button2" title="Ver Historial"><span> Historial   </span></a>

                                             <a href="{{ url('/viver/viver/' . $item->id.'/verViveres') }}" class="button3" title="Ver viveres"><span> Viveres   </span></a>


                                             <a href="#" class="button4" title="Ver viveres" data-toggle="modal" id data-target="#exampleModalCenter{{ $item->id }}"><span> Saldo   </span></a>

                                             
                                        
                                        
                                    </tr>

                                    <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div style=" background: radial-gradient(circle at -20.44% 43.84%, #ffffe2 0, #ffffdd 5.56%, #ffffd8 11.11%, #ffffd2 16.67%, #ffffcc 22.22%, #fdffc7 27.78%, #eefec1 33.33%, #ddfbbc 38.89%, #caf7b8 44.44%, #b5f2b5 50%, #9eedb4 55.56%, #85e8b5 61.11%, #6ae4b9 66.67%, #49e0bf 72.22%, #03ddc7 77.78%, #00d9d0 83.33%, #00d6da 88.89%, #00d3e4 94.44%, #00d1ee 100%);" class="modal-content">
                              <div style="margin-top: 2px;" class="modal-header">
                                <a target="_blank" href="{{ url('/ticket/'. $item->id ) }}" style="font-size:  20px;" title="Imprimir"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</a>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h5  class="modal-title" id="exampleModalCenterTitle"><center><h2><b>{{ $item->nombre }}</b></h2></center></h5></br>
                               <center><h4 style="margin-top: -15px;"><b> Credito Inicial : ${{ $item->credito }}</h4></b></center> 
                                <center><h4 ><b>Saldo restante : ${{ $item->saldo }}</h4></b></center>
                                
                                             
                              </div>
                              <div class="modal-footer">
                                
                                <center><a href="{{ url('/historial/historial/' . $item->id.'/verHistorial') }}" class="button2" title="Ver Historial"><span> Historial   </span></a>
                                <a href="{{ url('/viver/viver/' . $item->id.'/verViveres') }}" class="button3" title="Ver viveres"><span> Viveres   </span></a></center>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- / Modal -->
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $proveedor->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
@endsection


<style type="text/css">
    .crud-panel{
         background: radial-gradient(circle at -20.44% 43.84%, #ffffe2 0, #ffffdd 5.56%, #ffffd8 11.11%, #ffffd2 16.67%, #ffffcc 22.22%, #fdffc7 27.78%, #eefec1 33.33%, #ddfbbc 38.89%, #caf7b8 44.44%, #b5f2b5 50%, #9eedb4 55.56%, #85e8b5 61.11%, #6ae4b9 66.67%, #49e0bf 72.22%, #03ddc7 77.78%, #00d9d0 83.33%, #00d6da 88.89%, #00d3e4 94.44%, #00d1ee 100%);


    }
    #columna1{
        background-color: black;
    }
    td{
        text-align: center;
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
  background-color: #FB577B;
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
.button3 {
  display: inline-block;
  border-radius: 4px;
  background-color: #931F38;
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
.button4 {
  display: inline-block;
  border-radius: 4px;
  background-color: #0E4671;
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





.button2 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button2 span:after {
  content: '     🢂';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -10px;
  transition: 0.5s;
}

.button2:hover span {
  padding-right: 20px;
}

.button2:hover span:after {
  opacity: 1;
  right: 0;
}


.button3 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button3 span:after {
  content: '     🢂';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -10px;
  transition: 0.5s;
}

.button3:hover span {
  padding-right: 20px;
}

.button3:hover span:after {
  opacity: 1;
  right: 0;
}


.button4 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button4 span:after {
  content: '     🢂';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -10px;
  transition: 0.5s;
}

.button4:hover span {
  padding-right: 20px;
}

.button4:hover span:after {
  opacity: 1;
  right: 0;
}

.buttonActions {
  display: inline-block;
  border-radius: 4px;
  background-color: #31B1C0;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 8px;
  width: 50px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.buttonActions2 {
  display: inline-block;
  border-radius: 4px;
  background-color: #FD4043;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 8px;
  width: 50px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.buttonActions3 {
  display: inline-block;
  border-radius: 4px;
  background-color: #0BB32A;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 8px;
  width: 50px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.buttonActions4 {
  display: inline-block;
  border-radius: 4px;
  background-color: #4E8CBB;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 8px;
  width: 50px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
</style>


