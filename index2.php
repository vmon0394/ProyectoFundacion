<?php
include_once('prueba.php');
$pdf = new PDF();
 
$pdf->AddPage();
 
$miCabecera = array('Nombre', 'Apellido', 'Matrícula', 'Edad', 'Estado Civil', 'Peso (kg)', 'Estatura (m)');
$misDatos = array('Hugo', 'Martínez', '20420423', '11', 'Soltero', '98', '1.85');
 
$pdf->cabeceraVertical($miCabecera);
$pdf->datosVerticales($misDatos);
 
$pdf->cabeceraHorizontal($miCabecera);
$pdf->datosHorizontal($misDatos);
 
$pdf->Output(); //Salida al navegador
?>