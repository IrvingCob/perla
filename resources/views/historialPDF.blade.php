<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <center><title>Listado De Direcciones</title></center>
    <link rel="stylesheet" type="text/css" href="css/AdminLTE.css">
  <style>
     h1{ border-top: 1px solid #5D6975;
    border-bottom: 1px solid #5D6975;
    color: #5D6975;
    font-size: 2.4em;
    line-height: 1.4em;
    font-weight: normal;
    text-align: center;
    margin: 0 0 20px 0;
    background: url();}
  
  table {
    width: 80%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
}

header{ position: relative;
      
      height: 30px;
      background-color: #ddd;
      text-align: left;
    }
 footer{
  position: relative;
  height: 30px;
  background-color: #ddd;
  margin-top: 200px;
 }
  
  table th {
    padding: 5px 20px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap;
    font-weight: normal;}

    tr{
    
    vertical-align: inherit;
    border-color: inherit;
}

    td{
    text-align: center;}

  img{
    width: 160px;
    height: 107px;
  }
  footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  background-color: #ddd;
  font-size: 30px;
}
  </style>
</head>
<body>
<header>
  <div><img class="img-responsive" src="{{ public_path('img/personal.jpg') }}" alt=""></div>
</header>
<div class="container">
<h1>Listado del historial</h1>
<table style="margin: 0 auto;">
  
  <thead>
        <tr>  
           <th>#</th>
          <th>Fecha</th>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Importe</th>
          <th>Proveedor</th>
          <th>Status</th>
        </tr>
  </thead>
  <tbody>
    @foreach ($buscar as $personal)
 <tr>
<td>{{ $loop->iteration}}</td>
<td>{{ $personal->fecha }}</td>
@php($producto = App\Models\Producto::findOrNew($personal->producto_id)->nombre)
<td>{{ $producto }}</td>
<td>{{ $personal->cantidad }}</td>
<td>$ {{ $personal->precio }}</td>
<td>$ {{ $personal->importe }}</td>
@php($proveedor = App\Models\Proveedor::findOrNew($personal->proveedor_id)->nombre)
<td>{{ $proveedor }}</td>

@php($status = App\Models\Status::findOrNew($personal->status_id)->status)
<td>{{ $status }}</td>

@endforeach
  
  </tbody>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>

          <td> <b>Total:  <span class="text">${{ $suma }} </span></b></td>
                       
</table>

<footer>La perla &copy; <?php
 
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S??bado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
//Salida: Miercoles 05 de Septiembre del 2016
 
?>
</footer>



</html>