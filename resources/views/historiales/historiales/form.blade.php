<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
    <input class="form-control" name="fecha" type="text" id="fecha" value="{{ isset($historiale->fecha) ? $historiale->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
    <label for="cantidad" class="control-label">{{ 'Cantidad' }}</label>
    <input class="form-control" name="cantidad" type="text" id="cantidad" value="{{ isset($historiale->cantidad) ? $historiale->cantidad : ''}}" >
    {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
    <label for="precio" class="control-label">{{ 'Precio' }}</label>
    <input class="form-control" name="precio" type="text" id="precio" value="{{ isset($historiale->precio) ? $historiale->precio : ''}}" >
    {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('importe') ? 'has-error' : ''}}">
    <label for="importe" class="control-label">{{ 'Importe' }}</label>
    <input class="form-control" name="importe" type="text" id="importe" value="{{ isset($historiale->importe) ? $historiale->importe : ''}}" >
    {!! $errors->first('importe', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('viver_id') ? 'has-error' : ''}}">
    <label for="viver_id" class="control-label">{{ 'Viver Id' }}</label>
    <input class="form-control" name="viver_id" type="text" id="viver_id" value="{{ isset($historiale->viver_id) ? $historiale->viver_id : ''}}" >
    {!! $errors->first('viver_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('proveedor_id') ? 'has-error' : ''}}">
    <label for="proveedor_id" class="control-label">{{ 'Proveedor Id' }}</label>
    <input class="form-control" name="proveedor_id" type="text" id="proveedor_id" value="{{ isset($historiale->proveedor_id) ? $historiale->proveedor_id : ''}}" >
    {!! $errors->first('proveedor_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
    <label for="status_id" class="control-label">{{ 'Status Id' }}</label>
    <input class="form-control" name="status_id" type="text" id="status_id" value="{{ isset($historiale->status_id) ? $historiale->status_id : ''}}" >
    {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
