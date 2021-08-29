@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panerl panel-default">
                    <div class="panerl-heading">Proveedor {{ $proveedor->id }}</div>
                    <div class="panerl-body">

                        <a href="{{ url('/proveedor/proveedor') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/proveedor/proveedor/' . $proveedor->id . '/edit') }}" title="Edit Proveedor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('proveedor/proveedor' . '/' . $proveedor->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Proveedor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $proveedor->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $proveedor->nombre }} </td></tr><tr><th> Telefono </th><td> {{ $proveedor->telefono }} </td></tr><tr><th> Embarcacion </th><td> {{ $proveedor->embarcacion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
