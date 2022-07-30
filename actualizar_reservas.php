<?php

    include("conexion_bs.php");

    function elimina($id,$id_h,$num_h,$b)
    {
        
         include("conexion_bs.php");

         //eliminamos reserva
         $elim = $miPDO->prepare("DELETE FROM reservas where id_reserva = '$id';");

         //modificamos la habitacion ahora lo volvemos disponible
         
         if($b == 1)
         {
             //modificamos la cantidad de habitaciones dispobibles , ahora hay una mas disponible
             $habitacion = $miPDO->prepare("UPDATE habitaciones set cantidad = cantidad + 1 where id_habitacion  = '$id_h';");

             $disponibles = $miPDO->prepare("UPDATE habitaciones_disponibles SET disponible = 0 where id_disponible = '$num_h' and id_habitacion = '$id_h';");
             
             $disponibles->execute();
             $habitacion->execute();
         }

         $elim ->execute();
        
    }


    function activar_reserva($id_h,$num_h)
    {
             
          include("conexion_bs.php");

          $disponibles = $miPDO->prepare("UPDATE habitaciones_disponibles SET disponible = 1 where id_disponible = '$num_h' and id_habitacion = '$id_h';");

          $modificar = $miPDO->prepare("UPDATE habitaciones SET cantidad = cantidad - 1 where id_habitacion = '$id_h';");
                
          $reservar = $miPDO->prepare("UPDATE reservas SET b = 1 where num_habitacion = '$num_h' and id_habitacion = '$id_h';");

          $disponibles->execute();
          $modificar->execute();
          $reservar->execute();

    }
    

	$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
    
    $consulta = $miPDO->prepare("SELECT *FROM reservas;");
    $consulta->execute();

    foreach ($consulta as $key => $valor)
    {
    	    $fecha = strtotime($valor['fecha_salida']);
            if($fecha_actual > $fecha)
            {
                elimina($valor['id_reserva'],$valor['id_habitacion'],$valor['num_habitacion'],$valor['b']);
            }


            $fecha1 = strtotime($valor['fecha_entrada']);
            if($fecha_actual >= $fecha1 && $valor['b'] == 0)
            {
                activar_reserva($valor['id_habitacion'],$valor['num_habitacion']);
            }
    }

?>