<?php
   include("conexion_bs.php");

   $usser= $_POST["usser"];
   $pass = $_POST["pass"];
   
   $consulta = $miPDO->prepare("SELECT * FROM usuarios where usser = '$usser'");
   $consulta ->execute();

   $llave = $consulta->fetch(PDO::FETCH_ASSOC);


   if($llave['password'] == $pass)
   {
       echo "usuario reconocido";
       header("Location:reservaciones.php");
   }else
   {
       echo "no se encontro el usuario";
       header("Location:login.php");
   }


   
?>