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
         <th style="background-color: #A5A2A2">Cantidad</th>
         <th style="background-color: #A5A2A2">Precio / u</th>
         <th style="background-color: #A5A2A2">Importe</th>
       </tr>
    </thead>
    <tbody>
      @foreach ($viveres as $viver)
         <tr>
          <td>{{ $viver->id}}</td>
          <td>{{ $viver->fecha }}</td>
          @php($proveedor = App\Models\Proveedor::findOrNew($viver->proveedor_id)->nombre)
          <td>{{ $proveedor }}</td>
          <td>{{ $viver->cantidad }}</td>
          <td>{{ $viver->precio }}</td>
          <td>{{ $viver->importe }}</td>
          
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>

