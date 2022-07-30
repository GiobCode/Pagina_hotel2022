<?php 
   include("conexion_bs.php");
   include('barra.php');
   include("eliminar_reservacion.php");
   include("actualizar_reservas.php");
   
   $miConsulta = $miPDO->prepare("SELECT * FROM reservas where id_reserva = '$idr' or nombre_cliente = '$idr' or tipo_habitacion ='$idr';");
   $miConsulta->execute();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones Hotel Samaros</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <style>

    body
    {
    background:#E3DAC9;
    color:black;
    }

    tr:hover
    {
        background-color:white;
        color:black;
    }
    a:hover
    {
      background:black;
    }
    </style>
    </head>

<body>


<br>
<hr>
<section style = "padding: 10px; background:white;">

 <div class="form-group" style ="padding:10px;">
  <form action ="recibe_r.php" method="GET">
  <input type="text" name="busca_r" placeholder="Buscar" style ="width: 30%;">
  <button type ="submit">Buscar</button>
  </form>
 </div>

 <div class="form-group" style ="padding:10px;">
  <a href ="formulario_reservaciones.php">Nueva reserva</a>
 </div>

 <div class="table-responsive">
  <table class="table table-bordered" style="background:black; color:white;  border-color:white; border-radius: 30px;">
    <thead style ="background:#000000; color:white;">
      <th scope ="col" style ="color:green;">ID</th>
      <th scope ="col" style ="color:blue;">Nombre cliente</th>
      <th scope ="col" style ="color:blue;">tipo habitacion</th>
      <th scope ="col" style ="color:blue;">fecha entrada</th>
      <th scope ="col" style ="color:blue;">fecha salida</th>
      <th scope ="col" style ="color:blue;">Cantidad personas</th>
      <th scope ="col" style ="color:blue;">ID habitacion</th>
      <th scope ="col" style ="color:blue;">Num habitacion</th>
      <th scope ="col" style ="color:blue;">Correo</th>
      <th scope ="col" style ="color:blue;">Precio por reservacion</th>
      <th scope ="col" style ="color:blue;"></th>
      <th scope ="col" style ="color:blue;"></th>

    </thead>

    <tbody>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
    <tr>
       <th scope ="row" style ="color:#11B2E6;"><?= $valor['id_reserva']; ?></th>
       <td><?= $valor['nombre_cliente']; ?></td>
       <td><?= $valor['tipo_habitacion']; ?></td>
       <td><?= $valor['fecha_entrada']; ?></td>
       <td><?= $valor['fecha_salida']; ?></td>
       <td><?= $valor['cantidad_total']; ?></td>
       <td><?= $valor['id_habitacion']; ?></td>
       <td style ="color:green;"><?= $valor['num_habitacion']; ?></td>
       <td><?= $valor['correo']; ?></td>
       <td> $ <?= $valor['cant_pagar']; ?></td>
       <td> 
       <?php  
       $a = $valor['id_reserva']; 
       echo "<a href='?search=$a' class=btn btn-default style = background:red;color:white; >Eliminar</a>";
       ?>
       </td> 
       <td>
       <?php
        echo"<a href='?search=$a' class=btn btn-default style=  background:green;color:white;>Modificar</a>";
       ?>
      </td>
      <td>
       <?php
        echo"<a href='?search=$a' class=btn btn-default style=background:#8BC34A; color:white;>PDF</a>";
       ?>
      </td>
       </td>

    </tr>
    <?php endforeach; ?> 
    </tbody> 

 </table>

</div>
</section>

</body>

</html>