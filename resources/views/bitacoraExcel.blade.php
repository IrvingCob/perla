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
         <th style="background-color: #A5A2A2">Credito</th>
       </tr>
    </thead>
    <tbody>
      @foreach ($bitacoras as $bitacora)
         <tr>
          <td>{{ $bitacora->id}}</td>
          <td>{{ $bitacora->fecha }}</td>
          @php($proveedor = App\Models\Proveedor::findOrNew($bitacora->proveedor_id)->nombre)
          <td>{{ $proveedor }}</td>
          @php($proveedor = App\Models\Proveedor::findOrNew($bitacora->proveedor_id)->credito)
          <td>{{ $proveedor }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>

