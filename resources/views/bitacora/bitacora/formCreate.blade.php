
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="col-md-4 control-label">{{ 'Fecha' }}</label>
    <div class="col-md-4">
    <input required class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($bitacora->fecha) ? $bitacora->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
</div>

<center>
<div class="col-md-6 control-label">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Crear' }}">
</div>
</center>
