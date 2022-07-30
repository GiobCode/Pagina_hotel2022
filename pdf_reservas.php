<?php
    include("fpdf.php");
    include("conexion_bs.php");
    
    $idr = $_GET['pdfr'];

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
    $num_h = $datos['num_habitacion'];
    $correo = $datos['correo'];
    $total = $datos['cant_pagar'];
  

    $pdf = new FPDF();
    $pdf->addPage();
    $pdf->SetFont("Arial", 'B', 20);
    
//$pdf->Image('hotel samaros/img/icon.jpg',10,-10,-300);

    $pdf->Ln();

    $pdf->Cell(53,50,"HOTEL   MAROS",);
    $pdf->Ln();
    $pdf->Cell(53,50,"Resivo de reserva",);
    $pdf->Ln();
    $pdf->Cell(180,10,"Nombre cliente : ".$nombre,1,1);
    $pdf->Ln();
    $pdf->Cell(180,10,"Correo : ".$correo,1,1);
    $pdf->Ln();
    $pdf->Cell(180,10,"Tipo habitacion : ".$tipo_h,1,1);
    $pdf->Ln();
    $pdf->Cell(180,10,"Numero habitacion: ".$num_h,1,1);
    $pdf->Ln();
    $pdf->Cell(180,10,"Fecha entrada: ".$fech_a,1,1);
    $pdf->Ln();
    $pdf->Cell(180,10,"Fecha salida: ".$fech_b,1,1);
    $pdf->Ln();
    $pdf->Cell(180,10,"Total pago : ".$total,1,1);
    

    $pdf->output();
?>
