<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Hotel samaros</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <style>

    body
    {
      background:#E3DAC9;
      
    color:black;
    }

    #boton1
    {
        background-image: url("https://www.flaticon.es/svg/vstatic/svg/3917/3917034.svg?token=exp=1656644382~hmac=882913a546a3350cb5f55605ccefc207");
    }

 

    </style>
    </head>

    <body>
   
  
  <form
  style =
  "
  width: 500px;
  padding: 30px;
  margin: auto;
  margin-top: 100px;
  border-radius: 4px;
  font-family: 'calibri';
  color: black;
  background:white;
  box-shadow: 7px 13px 37px black;
  "
  action="login_nv.php" method ="POST">

  <div class="form-group" style = "font-size:40px;">  
       <img src="icon.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top">HOTEL SAMAROS
  </div>

  <div class="form-group">  
    <label for="usurario">Usuario :</label>
    <input type="text" class="form-control" name ="usser">
  </div>
  <br>
   <div class="form-group">
    <label for="cantidadpersonas">Contraseña :</label>
    <input type="password" class="form-control" name="pass">
  </div><br><br>
  
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
  type="submit" class="btn btn-default">Iniciar sesion</button>
</form>


   </body>

</html>