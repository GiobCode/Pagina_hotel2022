<?php
    
    include("conexion_bs.php");
    $fila = $miPDO->prepare("SELECT * FROM habitaciones where id_habitacion = '$idh' or tipo = '$idh';");
    $fila->execute();
    include("barra.php");
?>

 <head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Registro de habitaciones Hotel samaros</title>
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
    #boton1{background-image: url("https://www.flaticon.es/svg/vstatic/svg/3917/3917034.svg?token=exp=1656644382~hmac=882913a546a3350cb5f55605ccefc207");
    }
    a:hover{
      background:black;
    }
 </style>
 </head>

<br>

<section>
<div style ="height: 70px;">
</div>

<div class="form-group" style ="padding:10px;">
<form action ="recibe_h.php" method="GET">
<input type="text" name="busca_h" placeholder="Buscar" style ="width: 30%;">
<button type ="submit">Buscar</button>
</form>
</div>

<div class="table-responsive">
  <table class="table table-bordered" style="background:black; color:white;  border-color:white; border-radius: 30px;">
    <thead style ="background:#000000; color:white;">
      <th scope ="col" style ="color:green;">ID</th>
      <th scope ="col" style ="color:blue;">Tipo</th>
      <th scope ="col" style ="color:blue;">Descripcion</th>
      <th scope ="col" style ="color:blue;">Precio</th>
      <th scope ="col" style ="color:blue;">Disponibles</th>
      <th scope ="col" style ="color:blue;">Servicios</th>
      <th scope ="col" style ="color:blue;"></th>
      <th scope ="col"></th>
      <th scope ="col"></th>
    </thead>

    <tbody>
    <?php foreach ($fila as $clave => $valor): ?> 
    <tr>
       <th scope ="row" style ="color:#11B2E6;"><?= $valor['id_habitacion']; ?></th>
       <td><?= $valor['tipo']; ?></td>
       <td><?= $valor['descripcion']; ?></td>
       <td>$<?= $valor['precio']; ?></td>
       <td><?= $valor['cantidad']; ?></td>

       <td> <?php
             $id = $valor['id_habitacion'];
             $servicios = $miPDO->prepare("SELECT *FROM servicios where id_habitacion = '$id';");
             $servicios ->execute();
             ?>
             <?php foreach ($servicios as $clave => $valor1): ?>
                <li><?=$valor1['nombre']?></li>
             <?php endforeach; ?>
      </td>

      <td> 
       <?php  
          $a = $valor['id_habitacion']; 
          echo "<a href='eliminar_habitacion.php?search=$a' class=btn btn-default style =
          background:red;color:white;>Eliminar</a>";
       ?>
     </td>
      <td>
      <?php
          echo"<a href='modificar_habitacion'.php?search=$a' class=btn btn-default style=  background:Blue;color:white;>Reservar</a>";
       ?>
      </td>
      <td>
      <?php
          echo"<a href='modificar_habitacion'.php?search=$a' class=btn btn-default style=  background:Green;color:white;>Modificar</a>";
      ?>
      </td>
      <td>
      <?php
          echo"<a href='modificar_habitacion'.php?search=$a' class=btn btn-default style=  background:#64B5F6;color:white;>Galeria</a>";
      ?>
      </td>

    </tr>
    <?php endforeach; ?>
    </tbody> 

 </table>
</div>
</section>