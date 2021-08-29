<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($vivere->nombre) ? $vivere->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
    <label for="cantidad" class="control-label">{{ 'Cantidad' }}</label>
    <input class="form-control" name="cantidad" type="text" id="cantidad" value="{{ isset($vivere->cantidad) ? $vivere->cantidad : ''}}" >
    {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('anticipo') ? 'has-error' : ''}}">
    <label for="anticipo" class="control-label">{{ 'Anticipo' }}</label>
    <input class="form-control" name="anticipo" type="text" id="anticipo" value="{{ isset($vivere->anticipo) ? $vivere->anticipo : ''}}" >
    {!! $errors->first('anticipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
    <input class="form-control" name="fecha" type="text" id="fecha" value="{{ isset($vivere->fecha) ? $vivere->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('provedor_id') ? 'has-error' : ''}}">
    <label for="provedor_id" class="control-label">{{ 'Provedor Id' }}</label>
    <input class="form-control" name="provedor_id" type="text" id="provedor_id" value="{{ isset($vivere->provedor_id) ? $vivere->provedor_id : ''}}" >
    {!! $errors->first('provedor_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bitacora_id') ? 'has-error' : ''}}">
    <label for="bitacora_id" class="control-label">{{ 'Bitacora Id' }}</label>
    <input class="form-control" name="bitacora_id" type="text" id="bitacora_id" value="{{ isset($vivere->bitacora_id) ? $vivere->bitacora_id : ''}}" >
    {!! $errors->first('bitacora_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
