@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
      <div class="col-md-10 col-md-offset-1" >
      <div class="box" style="background: radial-gradient(circle at -20.44% 43.84%, #ffffe2 0, #ffffdd 5.56%, #ffffd8 11.11%, #ffffd2 16.67%, #ffffcc 22.22%, #fdffc7 27.78%, #eefec1 33.33%, #ddfbbc 38.89%, #caf7b8 44.44%, #b5f2b5 50%, #9eedb4 55.56%, #85e8b5 61.11%, #6ae4b9 66.67%, #49e0bf 72.22%, #03ddc7 77.78%, #00d9d0 83.33%, #00d6da 88.89%, #00d3e4 94.44%, #00d1ee 100%);">
<div class="box-header with-border">
<center>  <h1 class="box-title">Soporte o sugerencias de cambio </h1> </center>
  
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body" style="height: 320px;" id="formularioregistros">

<div class="col-md-6">
          <div class="box box-info box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Soporte</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              Para soportes en caso de que haya algun error en el funcionamiento del sistema
              escribanos:
            </div>
            <ul>
              <li><i class="fa fa-envelope"></i> Correo: irving_cob@hotmail.com</li>
              <li><i class="fa fa-whatsapp"></i> WhatsApp: +52 996 108 97 79</li>
            </ul>
            <div class="box-body" style="">
            Todo correo de este deberá ser con el asunto "Detalles en el sistema"
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

<div class="col-md-6">
          <div class="box box-info box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Sugerencias de cambio</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              Para sugerencia de cambios en el sistema o implementación de nuevos módulos
              escribanos:
              </div>
              <ul>
                <li><i class="fa fa-envelope"></i> Correo: irving_cob@hotmail.com</li>
              <li><i class="fa fa-whatsapp"></i> WhatsApp: +52 996 108 97 79</li>
              </ul>
              <div class="box-body" style="">
              Todo correo de este deberá ser con el asunto "Sugerencia en el sistema"
              </div>
          

      <!-- /.box -->
        
    </section>
    <!-- /.content -->

@endsection