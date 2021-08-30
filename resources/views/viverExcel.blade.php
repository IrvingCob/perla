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
         <th style="background-color: #A5A2A2"><b>Cantidad</b></th>
         <th style="background-color: #A5A2A2"><b>Precio / u</b></th>
         <th style="background-color: #A5A2A2"><b>Importe</b></th>
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
          <td>${{ $viver->precio }}</td>
          <td>${{ $viver->importe }}</td>
          
        </tr>
      @endforeach
    </tbody>
  </table>
  <td></td><td></td><td></td><td></td><td></td><h5>Total:  <span class="text">${{ $suma }} </span></h5>
</body>
</html>

