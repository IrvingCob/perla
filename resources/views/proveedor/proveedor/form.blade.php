<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-4">
        <input required class="form-control" name="nombre" type="text" id="nombre" value="{{ $proveedor->nombre or ''}}" >
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('credito') ? 'has-error' : ''}}">
    <label for="credito" class="col-md-4 control-label">{{ 'Credito' }}</label>
    <div class="col-md-4">
        <input required class="form-control" name="credito" type="number"  min="1" pattern="^[0-9]+" id="credito" value="{{ $proveedor->credito or ''}}" >
        {!! $errors->first('credito', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('saldo') ? 'has-error' : ''}}">
    <label for="saldo" class="col-md-4 control-label">{{ 'saldo' }}</label>
    <div class="col-md-4">
        <input required class="form-control" name="saldo" type="number"  min="1" pattern="^[0-9]+" id="saldo" value="{{ $proveedor->saldo or ''}}" >
        {!! $errors->first('saldo', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="col-md-4 control-label">{{ 'Teléfono' }}</label>
    <div class="col-md-4">
        <input required class="form-control" name="telefono" type="text" id="telefono" value="{{ isset($proveedor->telefono) ? $proveedor->telefono : ''}}" >
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('embarcacion') ? 'has-error' : ''}}">
    <label for="embarcacion" class="col-md-4 control-label">{{ 'Embarcación' }}</label>
    <div class="col-md-4">
    <input required class="form-control" name="embarcacion" type="text" id="embarcacion" value="{{ isset($proveedor->embarcacion) ? $proveedor->embarcacion : ''}}" >
    {!! $errors->first('embarcacion', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('referencia') ? 'has-error' : ''}}">
    <label for="referencia" class="col-md-4 control-label">{{ 'Referencia' }}</label>
    <div class="col-md-4">
    <input required class="form-control" name="referencia" type="text" id="referencia" value="{{ isset($proveedor->referencia) ? $proveedor->referencia : ''}}" >
    {!! $errors->first('referencia', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<center>
<div class="col-md-7 control-label">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Crear' }}">
</div>
</center>
