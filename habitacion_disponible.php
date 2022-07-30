 <?php 

     include("conexion_bs.php");

 	 $disponible = $miPDO->prepare("INSERT INTO habitaciones_disponibles(`disponible`,`id_habitacion`,`id_disponible`) values('$b','$id_h','$i');");
 	 $disponible -> execute();

 ?>