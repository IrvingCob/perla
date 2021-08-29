
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="col-md-4 control-label">{{ 'Fecha' }}</label>
    <div class="col-md-4">
    <input  class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($bitacora->fecha) ? $bitacora->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div>







                


<center>
<div class="col-md-7 control-label">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Guardar' : 'Crear' }}">
</div>
</center>
