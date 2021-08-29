<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-4">
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($viver->nombre) ? $viver->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
    <label for="cantidad" class="col-md-4 control-label">{{ 'Cantidad' }}</label>
    <div class="col-md-4">
    <input required class="form-control" name="cantidad" type="number" id="cantidad"  oninput="calculate()"  value="{{ isset($viver->cantidad) ? $viver->cantidad : ''}}" >
    {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
    <label for="precio" class="col-md-4 control-label">{{ 'Precio' }}</label>
    <div class="col-md-4">
    <input required class="form-control" name="precio" oninput="calculate()" type="number" id="precio" value="{{ isset($viver->precio) ? $viver->precio : ''}}" >
    {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group {{ $errors->has('importe') ? 'has-error' : ''}}">
    <label for="importe" class="col-md-4 control-label">{{ 'Importe' }}</label>
    <div class="col-md-4">
    <input required class="form-control"  name="importe" type="number" id="importe" >
    {!! $errors->first('importe', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="col-md-4 control-label">{{ 'Fecha' }}</label>
    <div class="col-md-4">
    <input class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($viver->fecha) ? $viver->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
</div>

<center>
<div class="col-md-7 control-label">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Guardar' : 'Crear' }}">
</div>
</center>
