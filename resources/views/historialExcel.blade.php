<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <table>
    <thead>
       <tr>  
         <th style="background-color: #A5A2A2"><b>#</b></th>

         <th style="background-color: #A5A2A2"><b>Fecha</b></th>
         <th style="background-color: #A5A2A2"><b>Proveedor</b></th>
         <th style="background-color: #A5A2A2"><b>Producto</b></th>
         <th style="background-color: #A5A2A2"><b>Cantidad</b></th>
         <th style="background-color: #A5A2A2"><b>Precio</b></th>
         <th style="background-color: #A5A2A2"><b>Importe</b></th>
         <th style="background-color: #A5A2A2"><b>Status</b></th>
       </tr>
    </thead>
    <tbody>
      @foreach ($historiales as $historial)
         <tr>
          <td>{{ $historial->id }}</td>
          <td>{{ $historial->fecha }}</td>
          @php($proveedor = App\Models\Proveedor::findOrNew($historial->proveedor_id)->nombre)
<td>{{ $proveedor }}</td>
@php($producto = App\Models\Producto::findOrNew($historial->producto_id)->nombre)
<td>{{ $producto }}</td>
          
          <td>{{ $historial->cantidad }}</td>
          <td>${{ $historial->precio }}</td>
          <td>${{ $historial->importe }}</td>
         @php($status = App\Models\Status::findOrNew($historial->status_id)->status)
<td>{{ $status }}</td>
          
        </tr>
      @endforeach

    </tbody>
    
    
  </table>
  <td></td><td></td><td></td><td></td><td></td><td></td><h5>Total:  <span class="text">${{ $suma }} </span></h5>
</body>
</html>

