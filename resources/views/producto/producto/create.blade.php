@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div id="mario" class="panel panel-success">
                    <div class="panel panel-heading"><center><h4> NUEVO PRODUCTO </h4></center></div>
                    <div class="panel-body">
                        <div class="card-body">
                        <a href="javascript: history.go(-1)"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/producto/producto') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('producto.producto.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style type="text/css">
   #mario {background: radial-gradient(circle at -20.44% 43.84%, #ffffe2 0, #ffffdd 5.56%, #ffffd8 11.11%, #ffffd2 16.67%, #ffffcc 22.22%, #fdffc7 27.78%, #eefec1 33.33%, #ddfbbc 38.89%, #caf7b8 44.44%, #b5f2b5 50%, #9eedb4 55.56%, #85e8b5 61.11%, #6ae4b9 66.67%, #49e0bf 72.22%, #03ddc7 77.78%, #00d9d0 83.33%, #00d6da 88.89%, #00d3e4 94.44%, #00d1ee 100%);}
</style>