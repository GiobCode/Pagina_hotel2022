<?php
   
    include("conexion_bs.php");


    function disponible($num_h,$a,$b,$id)
    {
          include("conexion_bs.php");
          $resv = $miPDO->prepare("SELECT *FROM reservas where num_habitacion = '$num_h' and id_habitacion = '$id';");
          $resv->execute();
        
          foreach ($resv as $key => $valor)
          {

                $_a = strtotime($valor['fecha_entrada']);
                $_b = strtotime($valor['fecha_salida']);
                
                if($b < $_a or $a > $_b)
                {
                    continue;
                }else
                {
                    return 0;
                }
          }
           
          return 1;
    
    }



    $id_r = $_POST["id_r"];
    $id_h = $_POST["id_h"];
    $name = $_POST["nombre"];
    $correo = $_POST["correo"];
    $cant_p = $_POST["cant"];
    $tipo = $_POST["tipo"];
    $fecha_a = $_POST["fecha_a"];
    $fecha_b = $_POST["fecha_b"];
    $mr= $_POST["mr"];

   /*
    $ultimoid = $miPDO->prepare("SELECT * FROM reservas where id_reserva = (SELECT max(id_reserva) FROM reservas);");
    $ultimoid ->execute();

    $idr = $ultimoid->fetch(PDO::FETCH_ASSOC);
    $id_r = $idr['id_reserva'] + 1;
  */
   
   if($mr == 1)
   {
        $r = $miPDO->prepare("SELECT *FROM reservas Where id_reserva = '$id_r';");
        $r->execute();

        $hb = $r->fetch(PDO::FETCH_ASSOC);

        $habitacion_ac = $hb['id_habitacion'];
        $numerohabitac = $hb['num_habitacion'];
        $disponible_ac = $hb['b'];

        if($disponible_ac == 1)
        {
             $habitacion = $miPDO->prepare("UPDATE habitaciones set cantidad = cantidad + 1 where id_habitacion  = '$habitacion_ac';");
             $habitacion->execute();
             $disponible = $miPDO->prepare("UPDATE habitaciones_disponibles set disponible = 0 where id_habitacion = '$habitacion_ac' and id_disponible = '$numerohabitac';");
             $disponible->execute();
        }
    }
    


    //consultamos la habitacion con el id obtenido anterior mente
    $busqueda = $miPDO->prepare("SELECT *FROM habitaciones where id_habitacion = '$id_h';");
    $busqueda->execute();

    //obtenemos los datos necesarios de la habitacion 
    $res = $busqueda->fetch(PDO::FETCH_ASSOC);
    $cantidad = $res['cantidad'];
    $tipo_x = $res['tipo'];

   if($cantidad > 0)
   {

        $disp = $miPDO->prepare("SELECT *FROM habitaciones_disponibles where id_habitacion = '$id_h';");
        $disp ->execute();

        $num_h = 1;
        $a = strtotime($fecha_a);
        $b = strtotime($fecha_b);
      
        foreach ($disp as $clave => $datos)
        {
               
               $num_h = $datos['id_disponible'];
         
               //llamamos funcion y comprobamos si estan disponibles las fechas
               if(disponible($num_h,$a,$b,$id_h) == 1)
               {

                    //obtenemos los dias en total que se quedara el cliente , utilizando la funcion diff
                    $fecha1= new DateTime($fecha_a);
                    $fecha2= new DateTime($fecha_b);

                    $diff = $fecha1->diff($fecha2);
                    
                    //Realizamos operacion simple multiplicamos el precio de la habitacion  por los dias en que se quedara el cliente
                    $cantidad_pagar = ($res['precio'] * $diff->days);

                    if($mr == 0)
                    {
                        //realizamos la consulta

                        $consulta = $miPDO->prepare("INSERT INTO reservas(`id_reserva`,`nombre_cliente`,`tipo_habitacion`,`fecha_entrada`,`fecha_salida`,`cantidad_total`,`id_habitacion`,`correo`,`num_habitacion`,`cant_pagar`,`b`) 
                        values ('$id_r','$name','$tipo_x','$fecha_a','$fecha_b','$cant_p','$id_h','$correo','$num_h','$cantidad_pagar',0);");
                        $consulta->execute();

                        echo "<h1>Su reservacion se realizo con exito</h1>";
                    }else
                    {

                        $consulta = $miPDO->prepare("UPDATE reservas SET nombre_cliente = '$name', tipo_habitacion = '$tipo_x' , fecha_entrada = '$fecha_a' , fecha_salida = '$fecha_b' , cantidad_total = $cant_p , id_habitacion = $id_h , correo = '$correo',num_habitacion = $num_h , cant_pagar = $cantidad_pagar , b = 0 where id_reserva = '$id_r';");
                        $consulta->execute();
                        echo "<h1>Su  Modificacion se realizo con exito</h1>";

                    }

                    break;
               }

        }

        


    }else
    {
        echo "<h1>Habitacion no disponible</h1>";
    }
   
   //header("Location:reservaciones.php");

?>

<a  href ="reservaciones.php" type ="button">Regresar</a>

