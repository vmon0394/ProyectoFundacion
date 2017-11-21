<?php
require ("../Model/con_grafico.php");
require ("../Model/FPDF/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial',"B",12);

$pdf->SetFillColor(255, 237, 0, 1);
$pdf->Cell(117);


$pdf->Cell(75,10,'Semilleros de Paz',1,0,'R', True);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(232, 202, 180, 1);
$pdf->Cell(15,8,"Id",1,0,"C",True);
$pdf->Cell(47,8,"Rubro",1,0,"C",True);
$pdf->Cell(105,8,"Descripcion",1,0,"C",True);
$pdf->Cell(25,8,"Tiempo",1,0,"C",True);
$pdf->Ln(8);
$pdf->SetFont('Arial',"",10);

//CONSULTA

$presupuesto = mysqli_query($connection,'SELECT id, rubro, descripcion, tiempo FROM tbl_presupuestoform WHERE (id BETWEEN 1 AND 2) AND NOT id IN (2)');

$presupuesto2 = mysqli_query($connection, 'SELECT id, rubro, descripcion, tiempo FROM tbl_presupuestoform WHERE (id BETWEEN 2 AND 3) AND id IN (2)');

$presupuesto3 = mysqli_query($connection, 'SELECT id, rubro, descripcion, tiempo FROM tbl_presupuestoform WHERE (id BETWEEN 2 AND 3) AND NOT id IN (2)');

while ($resultado = mysqli_fetch_array($presupuesto)) {

		$pdf->Cell(15,8,$resultado['id'],1,0,"C");
		$pdf->Cell(47,8,$resultado['rubro'],1);
		$pdf->Cell(105,8,$resultado['descripcion'],1);
		$pdf->Cell(25,8,$resultado['tiempo'],1,0,"R");
		$pdf->Ln(8);
	}
	$pdf->Ln(8);

$pdf->SetFont('Arial',"B",9);
$pdf->SetFillColor(255, 219, 112, 1);
while ($resultado = mysqli_fetch_array($presupuesto2)) {

		$pdf->Cell(10,10,$resultado['id'],1,0,"C",True);
		$pdf->Cell(80,10,$resultado['rubro'],1,0,"L",True);
		$pdf->MultiCell(95,5,$resultado['descripcion'],1,1,"L",1);
		$pdf->SetXY(195,92);
		$pdf->Cell(10,10,$resultado['tiempo'],1,0,"R",True);
		$pdf->Ln(8);

	}
	$pdf->Ln(8);	

	while ($resultado = mysqli_fetch_array($presupuesto3)) {

		$pdf->Cell(15,8,$resultado['id'],1,0,"C");
		$pdf->Cell(115,8,$resultado['rubro'],1);
		$pdf->Cell(37,8,$resultado['descripcion'],1);
		$pdf->Cell(25,8,$resultado['tiempo'],1,0,"R");
		$pdf->Ln(8);

	}

$pdf->AddPage();
$pdf->SetFont('Arial',"B",12);
$pdf->SetFillColor(232, 202, 180, 1);

$tabla = array(
	'Subtotal',
	'Aporte Fundación Conconcreto',
	'Aporte Fundación Sofía Pérez de Soto',
	'UVA'
);

$pdf->Cell(26,8,$tabla[0],1,0,"C",True);
$pdf->Cell(67,8,utf8_decode($tabla[1]),1,0,"C",True);
$pdf->Cell(80,8,utf8_decode($tabla[2]),1,0,"C",True);
$pdf->Cell(23,8,$tabla[3],1,0,"C",True);
$pdf->Ln(8);

	$pdf->Cell(26,8,'$35.766.185',1,0,"L");
	$pdf->Cell(67,8,'$35.766.185',1,0,"L");
	$pdf->Cell(80,8,'$ -',1,0,"L");
	$pdf->Cell(23,8,'$1.280.000',1,0,"L");

$pdf->Ln(8);

$pdf->Output();


?>