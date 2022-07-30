<?php
   include("conexion_bs.php");

   if(isset($_GET['search']))
   {
   	   $id = $_GET['search'];

   	   $reserva =$miPDO->prepare("SELECT *FROM reservas where id_reserva = '$id';");
       
         $reserva->execute();
         $datos = $reserva->fetch(PDO::FETCH_ASSOC);

         $num_h = $datos['num_habitacion'];
         $id_h = $datos['id_habitacion'];

         //eliminamos reserva
         $elim = $miPDO->prepare("DELETE FROM reservas where id_reserva = '$id';");

        
         if($datos['b'] == 1)
         {
             //modificamos la habitacion ahora lo volvemos disponible
            $disponibles = $miPDO->prepare("UPDATE habitaciones_disponibles SET disponible = 0 where id_disponible = '$num_h' and id_habitacion = '$id_h';");
             
             //modificamos la cantidad de habitaciones dispobibles , ahora hay una mas disponible
            $habitacion = $miPDO->prepare("UPDATE habitaciones set cantidad = cantidad + 1 where id_habitacion  = '$id_h';");

            $disponibles->execute();
            $habitacion->execute();
         }

         $elim ->execute();
         

         header("Location:reservaciones.php");
   }

?>
