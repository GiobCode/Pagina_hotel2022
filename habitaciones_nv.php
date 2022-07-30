<?php


   include("conexion_bs.php");
   
   $id = $_POST["id"];
   $tipo = $_POST["tipo"];
   $cantidad = $_POST["cantidad"];
   /*$servicio = $_POST["servicio"];*/
   $descripcion = $_POST["descripcion"];
   $precio = $_POST["precio"];


   $consulta = $miPDO->prepare("INSERT INTO habitaciones(`id_habitacion`,`tipo`,`precio`,`cantidad`,`descripcion`) values ('$id','$tipo','$precio','$cantidad','$descripcion');");

   $consulta ->execute();

   for($i = 1; $i<=$cantidad; $i++)
   {
       $b = 0;
       $id_h = $id;
       include("habitacion_disponible.php");
   }
            
   
  // header("Location:habitaciones.php");
?>

<html>
  <h1>SU REGISTRO SE REALIZO CON EXITO</h1>
  <a href ="habitaciones.php"><button>Regresar</button></a>
</html> 