@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Bitacora {{ $bitacora->id }}</div>
                    <div class="card-body">

                        <a href="javascript: history.go(-1)"><button class="btn btn-primary btn-sm">Volver atrás</button></a>
                        <a href="{{ url('/bitacora/bitacora/' . $bitacora->id . '/edit') }}" title="Edit Bitacora"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('bitacora/bitacora' . '/' . $bitacora->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Bitacora" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $bitacora->id }}</td>
                                    </tr>
                                    <tr><th> AnticipoEntrada </th><td> {{ $bitacora->anticipoEntrada }} </td></tr><tr><th> Fecha </th><td> {{ $bitacora->fecha }} </td></tr><tr><th> Proveedor Id </th><td> {{ $bitacora->proveedor_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
