<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <table>
    <thead>
       <tr>  
         <th style="background-color: #A5A2A2">#</th>

         <th style="background-color: #A5A2A2">Fecha</th>
         <th style="background-color: #A5A2A2">Proveedor</th>
         <th style="background-color: #A5A2A2">Producto</th>
         <th style="background-color: #A5A2A2">Cantidad</th>
         <th style="background-color: #A5A2A2">Precio</th>
         <th style="background-color: #A5A2A2">Importe</th>
         <th style="background-color: #A5A2A2">Status</th>
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
          <td>{{ $historial->precio }}</td>
          <td>{{ $historial->importe }}</td>
         @php($status = App\Models\Status::findOrNew($historial->status_id)->status)
<td>{{ $status }}</td>
          
        </tr>
      @endforeach
    </tbody>
    
  </table>
</body>
</html>

