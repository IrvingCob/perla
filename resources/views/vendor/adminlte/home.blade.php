

@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

<!-- Gráficas -->
<input type="hidden" id="dato1" name="" value="{{ $bita  }} ">
<input type="hidden" id="dato2" name="" value="{{ $hist  }} ">
<input type="hidden" id="dato3" name="" value="{{ $viv  }} ">
<input type="hidden" id="dato4" name="" value="{{ $prov  }} ">
<input type="hidden" id="dato5" name="" value="{{ $prod  }} ">




  

        

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1" >

				<!-- Default box -->
				<div class="box" style="background: radial-gradient(circle at -20.44% 43.84%, #ffffe2 0, #ffffdd 5.56%, #ffffd8 11.11%, #ffffd2 16.67%, #ffffcc 22.22%, #fdffc7 27.78%, #eefec1 33.33%, #ddfbbc 38.89%, #caf7b8 44.44%, #b5f2b5 50%, #9eedb4 55.56%, #85e8b5 61.11%, #6ae4b9 66.67%, #49e0bf 72.22%, #03ddc7 77.78%, #00d9d0 83.33%, #00d6da 88.89%, #00d3e4 94.44%, #00d1ee 100%);">
					<div class="box-header with-border" >
						<center><h3 class="box-title">ADMINISTRACION DE PROVEEDORES </h3></center>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						

						<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                @foreach($proveedor as $count)
                <h3>{{ $count->proveedor }}</h3>
                @endforeach
                <p>Proveedores</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="{{ url('/proveedor/proveedor') }}" class="small-box-footer">Ver información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                @foreach($historial as $count)
                <h3>{{ $count->historial }}<sup style="font-size: 20px"></sup></h3>
                @endforeach
                <p>Historiales</p>
              </div>
              <div class="icon">
                <i class="fa fa-list"></i>
              </div>
              <a href="{{ url('/historiales/historiales') }}" class="small-box-footer">Ver información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                @foreach($viver as $count)
                <h3>{{ $count->viver }}</h3>
                @endforeach
                <p>Viveres</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('/viveres/viveres') }}" class="small-box-footer">Ver información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
              <div class="inner">
                
                <h3>3</h3>
                
                <p>Filtros</p>
              </div>
              <div class="icon">
                <i class="fa fa-search"></i>
              </div>
              <a href="#" class="small-box-footer">Ver información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
           
         

          </div>
        </div>

					</div>


					<!-- /.box-body -->
				</div>

				<!-- /.box -->
        
        

			</div>
		</div>

	</div>



<div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-10 col-md-offset-1" >

        <!-- Default box -->
        <div class="box" style="background: radial-gradient(circle at -20.44% 43.84%, #ffffe2 0, #ffffdd 5.56%, #ffffd8 11.11%, #ffffd2 16.67%, #ffffcc 22.22%, #fdffc7 27.78%, #eefec1 33.33%, #ddfbbc 38.89%, #caf7b8 44.44%, #b5f2b5 50%, #9eedb4 55.56%, #85e8b5 61.11%, #6ae4b9 66.67%, #49e0bf 72.22%, #03ddc7 77.78%, #00d9d0 83.33%, #00d6da 88.89%, #00d3e4 94.44%, #00d1ee 100%);">
          <div class="box-header with-border" >
            <center><h3 class="box-title">GRÁFICOS </h3></center>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            


            
          <!-- ./col -->

          <div class="col-lg-6 col-12">
           

          <canvas id="myChart" width="400" height="400"></canvas>
      


          </div>
          <div class="col-lg-6 col-12">
           

          <canvas id="myChart2" width="400" height="400"></canvas>
        </div>



          <!-- /.box-body -->
        </div>

        <!-- /.box -->
        
        

      </div>

    </div>

  </div>


@endsection







