<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="col-md-4 control-label">{{ 'Fecha' }}</label>
    <div class="col-md-4">
        <input required class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($historial->fecha) ? $historial->fecha : ''}}" >
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
    <label for="cantidad" class="col-md-4 control-label">{{ 'Cantidad' }}</label>
    <div class="col-md-4">
        <input oninput="calculate()" required class="form-control" name="cantidad" type="text" id="cantidad" value="{{ isset($historial->cantidad) ? $historial->cantidad : ''}}" >
        {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
    <label for="precio" class="col-md-4 control-label">{{ 'Precio' }}</label>
    <div class="col-md-4">
        <input oninput="calculate()" required class="form-control" name="precio" type="text" id="precio" value="{{ isset($historial->precio) ? $historial->precio : ''}}" >
        {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('importe') ? 'has-error' : ''}}">
    <label for="importe" class="col-md-4 control-label">{{ 'Importe' }}</label>
    <div class="col-md-4">
        <input required class="form-control" name="importe" type="text" id="importe" value="{{ isset($historial->importe) ? $historial->importe : ''}}" >
        {!! $errors->first('importe', '<p class="help-block">:message</p>') !!}
</div>
</div>
{{-- <div class="form-group {{ $errors->has('producto_id') ? 'has-error' : ''}}">
                @php($producto=App\Models\Producto::pluck('nombre', 'id'))
    <label for="producto_id" class="col-md-4 control-label">{{ 'Producto' }}</label>
   <div class="col-md-4">
        {!! Form::SELECT('producto_id',$producto ,null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('producto_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group {{ $errors->has('producto_id') ? 'has-error' : ''}}">
    <label for="producto_id" class="col-md-4 control-label">{{ 'Producto' }}</label>
    <div class="col-md-4">
        @php($producto=App\Models\Producto::get(['nombre', 'id']))
        <select class="form-control" required name="producto_id" id="order">
            <option selected disabled id="order">Seleccione el producto</option>
            @foreach ($producto as $element)
                <option value="{{$element->id}}">{{$element->nombre }}</option>
            @endforeach
            {!! $errors->first('producto_id', '<p class="help-block">:message</p>') !!}
        </select>
    </div>
</div>
{{-- 
<div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
                @php($status=App\Models\status::pluck('status', 'id'))
    <label for="status_id" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-4">
        {!! Form::SELECT('status_id',$status ,null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
                {{-- @php($status=App\Models\status::pluck('status', 'id')) --}}
    <label for="status_id" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-4">
        {{-- {!! Form::SELECT('status_id',$status ,null, ['class' => 'form-control', 'required' => 'required']) !!} --}}
        @php($status=App\Models\status::get(['status', 'id']))
        <select class="form-control" required name="status_id" id="order">
            <option selected disabled id="order">Seleccione el status</option>
            @foreach ($status as $element)
                <option value="{{$element->id}}">{{$element->status }}</option>
            @endforeach
            {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
        </select>
    </div>
</div>


<center>
<div class="col-md-6 control-label">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Crear' }}">
</div>
</center>
