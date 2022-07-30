<?php 
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
  box-shadow: 7px 13px 37px #A06D9E;
  "
  method = "POST"
  action="habitaciones_nv.php">
  
 
 <div class="form-group" style = "font-size:40px;">  
       <img src="icon.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top"><h2 style ="text-align: center;">REGISTRO DE HABITACION</h2>
  </div>

  <div class="form-group">
     <div class="form-group">
        <label for="id">id de la habitacion:</label>
        <input type="text" class="form-control" name ="id">
    </div>
    <br>

    <label for="tipo_h">Tipo habitacion:</label>
    <select style="background: white;" id="tipo_h" class="form-control" name ="tipo">
        <option selected >siut</option>
        <option>doble</option>
        <option>triple</option>
    </select>
  </div>
  <br>
 
 </div>

 <div class="form-group">
    <textarea class ="form-control " style="background: white; color:black;" name="descripcion" rows="5" cols="35" name ="descripcion_h">Descripcion</textarea>
 </div>

  <br>
 <div class="form-group">
    <label for="precio">precio :</label>
    <input type="text" class="form-control" name="precio">
  </div>
  <br>
  
  <div class="form-group">
    <label for="cant">cantidad de habitaciones :</label>
    <input type="text" class="form-control" name="cantidad">
  </div>
 <hr>


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
  type="submit" class="btn btn-default">Registrar</button>
</form>
