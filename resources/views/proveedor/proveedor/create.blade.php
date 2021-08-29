@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-success">
                    <div class="panel panel-heading"><center><h4> NUEVO PROVEEDOR </h4></center></div>
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

                        <form method="POST" action="{{ url('/proveedor/proveedor') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('proveedor.proveedor.form', ['formMode' => 'create'])

                        </form>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style type="text/css">
    .table1{
       background: radial-gradient(#f69d3c, #3f87a6);
    }
 input{
    width:180px;
    padding:8px 10px;
    border:1px solid #f6f6f6;
    border-radius:3px;
    background-color:#f6f6f6;
    margin:8px 0;
    display:inline-block;
}
</style>
