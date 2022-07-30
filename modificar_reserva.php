<?php 
    include("barra.php");
    include("conexion_bs.php");

    $idr =  $_GET['search'];
    
    $conreserva = $miPDO->prepare("SELECT * FROM reservas where id_reserva = '$idr';");
    $conreserva->execute();

    $datos = $conreserva->fetch(PDO::FETCH_ASSOC);

    $id_reserva = $datos['id_reserva'];
    $id_habitacion = $datos['id_habitacion'];
    $nombre = $datos['nombre_cliente'];
    $cant_p = $datos['cantidad_total'];
    $tipo_h = $datos['tipo_habitacion'];
    $fech_a = $datos['fecha_entrada'];
    $fech_b = $datos['fecha_salida'];
    $correo = $datos['correo'];

?>

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Registro de habitaciones Hotel samaros</title>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

 <style>
    body{background:#E3DAC9;color:black;}
 </style>
 </head>

 <form  
  style =
  "
  width: 60%;
  padding: 30px;
  margin: auto;
  margin-top: 100px;
  border-radius: 4px;
  font-family: 'calibri';
  color: black;
  background:white;
  box-shadow: 7px 13px 37px #000;
  "
  method="POST" action="reservaciones_nv.php" >

   <div class="form-group" style = "font-size:40px;">  
       <img src="icon.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top"><h2 style ="text-align: center;">Modificacion reservacion</h2>
  </div>

  <div class="form-group">
     <input type="text" name="mr"  class="form-control" style ="display: none;" value ="1"><br>
    <input type="text" name="id_r"  class="form-control" style = "width: 30%; display: none;" placeholder="id reserva" value ="<?=$id_reserva?>"><br>
    <input type="text" name="id_h" class="form-control" style = "width: 30%;" placeholder="id habitacion" value ="<?=$id_habitacion?>"><br>
  </div>

  <div class="form-group">
    <input type="text" class="form-control" name="nombre" placeholder="nombre" value ="<?=$nombre?>"><br>
    <input type="email" class="form-control" name="correo" placeholder="correo" value ="<?=$correo?>">
  </div>

   <div class="form-group">
    <label for="cantidadpersonas">Cantidad de personas:</label>
    <select id="cantpersonas" class="form-control" name ="cant">

        <option selected><?=$cant_p?></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </select>
  </div>

  <div class="form-group">
    <label for="tipo_habitacion">Tipo habitacion:</label>
    <select id="tipo_habitacion" class="form-control" name ="tipo">
        <option selected ><?=$tipo_h?></option>
        <option>suit</option>
        <option>doble</option>
        <option>triple</option>
    </select>
  </div>  

  <div class="form-group">
    <label for="date">Fecha de entrada:</label>
    <input type="text" class="form-control" name="fecha_a" value ="<?=$fech_a?>">
  </div>

  <div class="form-group">
    <label for="date">Fecha de salida:</label>
    <input type="text" class="form-control" name="fecha_b" value ="<?=$fech_b?>">
  </div>
 
  <button style =
  "
  width: 100%;
  background:black;
  border: none;
  padding: 12px;
  color: white;
  margin: 16px 0;
  font-size: 16px;

  " 
  type="submit" class="btn btn-default">Modificar</button>
</form>