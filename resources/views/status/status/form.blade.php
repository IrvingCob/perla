<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-4">
    <input required class="form-control" name="status" type="text" id="status" value="{{ isset($status->status) ? $status->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
</div>

<center>
<div class="col-md-6 control-label">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Guardar' : 'Crear' }}">
</div>
</center>