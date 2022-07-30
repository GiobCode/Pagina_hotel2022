<?php 
    include("barra.php");

    if(isset($_GET['nueva']))
    {
         
    }
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
       <img src="icon.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top"><h2 style ="text-align: center;">Nueva reservacion</h2>
  </div>

  <div class="form-group">
    <input type="text" name="mr"  class="form-control" style ="display: none;" value ="0"><br>
    <input type="text" name="id_r" class="form-control" style = "width: 30%;" placeholder="id reserva"><br>
    <input type="text" name="id_h" class="form-control" style = "width: 30%;" placeholder="id habitacion"><br>
  </div>

  <div class="form-group">
    <input type="text" class="form-control" name="nombre" placeholder="nombre"><br>
    <input type="email" class="form-control" name="correo" placeholder="correo">
  </div>

   <div class="form-group">
    <label for="cantidadpersonas">Cantidad de personas:</label>
    <select id="cantpersonas" class="form-control" name ="cant">
        <option selected>1</option>
        <option>2</option>
        <option>3</option>
    </select>
  </div>

  <div class="form-group">
    <label for="tipo_habitacion">Tipo habitacion:</label>
    <select id="tipo_habitacion" class="form-control" name ="tipo">
        <option selected >suit</option>
        <option id = "doble">doble</option>
        <option>triple</option>
    </select>
  </div>  

  <div class="form-group">
    <label for="date">Fecha de entrada:</label>
    <input type="date" class="form-control" name="fecha_a">
  </div>

  <div class="form-group">
    <label for="date">Fecha de salida:</label>
    <input type="date" class="form-control" name="fecha_b">
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
  type="submit" class="btn btn-default">Reservar</button>
</form>