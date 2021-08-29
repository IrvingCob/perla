<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ url('/profile.png') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="{{ url('proveedor/proveedor') }}"><i class='fa fa-id-card-o'></i> <span>{{ trans('Proveedores') }}</span></a></li>
            <li><a href="{{ url('status/status') }}"><i class='fa fa-toggle-on'></i> <span>{{ trans('Status') }}</span></a></li>
            <li><a href="{{ url('producto/producto') }}"><i class='fa fa-archive'></i> <span>{{ trans('Productos') }}</span></a></li>
           
            <li class="treeview">
                <a href="#"><i class='fa fa-search'></i> <span>{{ trans('Filtros') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('bitacoras/bitacoras') }}"><i class='fa fa-window-restore'></i>{{ trans('Bitacoras') }}</a></li>
                    <li><a href="{{ url('historiales/historiales') }}"><i class='fa fa-window-restore'></i>{{ trans('Historiales') }}</a></li>
                    <li><a href="{{ url('viveres/viveres') }}"><i class='fa fa-window-restore'></i>{{ trans('Viveres') }}</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/ayuda') }}"><i class="fa fa-commenting-o"></i> <span>Soporte</span><small class="label pull-right bg-yellow">?</small></a></li>

        

        <li><a href="#"><i class="fa  fa-exclamation-circle"></i> <span>Version</span><small class="label pull-right bg-green"> Premium</small></a></li>
            <div style="color: white; position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;"><center>  
            <?php
 
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
//Salida: Miercoles 05 de Septiembre del 2016
 
?></center> </div>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
