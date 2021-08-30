<!--tickets -->



    

  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: -8px 50px;  /* Aqui se mide la distancia del inicio del tiquet*/
    }
    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
    
  </style>

    <!DOCTYPE html>
<html>
 

 
<body>
  <div class="ticket">
    <!-- <img src="{{ url('./img/IMG-20190228-WA0001.jpg')}}" alt="Logotipo"> -->
    <br>
    <br>
    
    <p class="centrado">FACTURA<br>Calkiní, Campeche<br>
    <?php
 
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
echo " ".date('d')." de ".$meses[date('n')-1]. " ".date('Y') ;
//Salida: Miercoles 05 de Septiembre del 2016
 
?></p>

    
 
    <table>
      
      
      
        @foreach($proveedor as $item)
        <tbody>
        <tr>
          <td># Proveedor:</td>
          
             <td>{{ $item->id }}</td>
          
          
          <td></td>
          <td></td>
          
          
        </tr> 
      </tbody>
      <tbody>
        <tr>
          <td>Nombre:</td>
          
             <td>{{ $item->nombre }}</td>
          
          
          <td></td>
          <td></td>
          
          
        </tr> 
      </tbody>
      <tbody>
        <tr>
          <td>Embarcación:</td>
          
             <td>{{ $item->embarcacion }}</td>
          
          
          <td></td>
          <td></td>
          <td></td>
          
          
        </tr> 
      </tbody>
      <tbody>
        <tr>
        <td>Anticipo:</td>
         
          <td>${{ $item->credito }}</td>
          
           
                       
       </tr>
      <tbody>
        <tr>
        
          <td>Saldo restante:</td>
       
          <td>${{ $item->saldo }}</td>
          <td></td>
          <td></td>
       </tr>
        
        <tr>
          
          
                                 
          
                        
        

          <td></td>
          <td></td>
        </tr>
        
        
      </tbody>
      @endforeach
    </table>
    <p class="centrado">RESTAURANTE<br>¡LA PERLA!
                      </p>
                  
@php
  $Object = new DateTime();  
  $Object->setTimezone(new DateTimeZone('America/Mexico_City'));
  $DateAndTime = $Object->format(" h:i:s a");  
@endphp
    <p class="centrado">{{$DateAndTime}}</p>
  </div>
</body>
 
</html>
<style type="text/css">
* {
  font-size: 12px;
  font-family: 'Times New Roman';
}
 
td,
th,
tr,
table {
  border-top: 1px solid black;
  border-collapse: collapse;
}
 
td.producto,
th.producto {
  width: 75px;
  max-width: 75px;
}
 
td.cantidad,
th.cantidad {
  width: 40px;
  max-width: 40px;
  word-break: break-all;
}
 
td.precio,
th.precio {
  width: 40px;
  max-width: 40px;
  word-break: break-all;
}
 
.centrado {
  text-align: center;
  margin-right: 20px;
}
 
.ticket {
  width: 155px;
  max-width: 155px;
}
 
img {
  max-width: inherit;
  width: inherit;
}
</style>

