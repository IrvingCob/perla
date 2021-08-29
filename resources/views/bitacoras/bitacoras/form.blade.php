<div class="form-group {{ $errors->has('anticipoEntrada') ? 'has-error' : ''}}">
    <label for="anticipoEntrada" class="control-label">{{ 'Anticipoentrada' }}</label>
    <input class="form-control" name="anticipoEntrada" type="text" id="anticipoEntrada" value="{{ isset($bitacora->anticipoEntrada) ? $bitacora->anticipoEntrada : ''}}" >
    {!! $errors->first('anticipoEntrada', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
    <input class="form-control" name="fecha" type="text" id="fecha" value="{{ isset($bitacora->fecha) ? $bitacora->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('proveedor_id') ? 'has-error' : ''}}">
    <label for="proveedor_id" class="control-label">{{ 'Proveedor Id' }}</label>
    <input class="form-control" name="proveedor_id" type="text" id="proveedor_id" value="{{ isset($bitacora->proveedor_id) ? $bitacora->proveedor_id : ''}}" >
    {!! $errors->first('proveedor_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
