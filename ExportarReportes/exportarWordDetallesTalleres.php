<?php

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

$tipoBusqeda = "";

$semillero = isset($_GET['semillero']) ? $_GET['semillero'] : '0';
$tipo = isset($_GET['tipoBusqeda']) ? $_GET['tipoBusqeda'] : '0';

if ($tipo == '1') {
    $tipoBusqeda = "dificultades";
} else if ($tipo == '2') {
    $tipoBusqeda = "logros";
} else if ($tipo == '3') {
    $tipoBusqeda = "recomendaciones";
}

$fechaDesde = isset($_GET['fechaDesde']) ? $_GET['fechaDesde'] : '0';
$fechaHasta = isset($_GET['fechaHasta']) ? $_GET['fechaHasta'] : '0';

$mensaje = "No hay Aprendices.";


include_once '../Model/conexionConsultas.php';

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
 * no need to edit below this line
 */

/*
 * Local functions
 */

function fatal_error($sErrorMessage = '') {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    die($sErrorMessage);
}

/*
 * MySQL connection
 */
if (!$gaSql['link'] = mysqli_connect($gaSql['server'], $gaSql['user'], $gaSql['password'])) {
    fatal_error('Could not open connection to server');
}

if (!mysqli_select_db($gaSql['link'], $gaSql['db'])) {
    fatal_error('Could not select database ');
}

$sql = "SELECT * FROM tbl_semilleros WHERE idSemillero = '$semillero'";

mysqli_query($gaSql['link'], "SET NAMES utf8");
$rs = mysqli_query($gaSql['link'], $sql);
$datos = mysqli_fetch_array($rs);

$tituloReporte = strtoupper($datos['nombreSemillero']);
$nombreIndex = strtoupper($datos['nombreSemillero']);

//Query de la tabla ficha socio familiares para traer los participantes del semilleros
$query = "SELECT nombreTaller, fechaTaller, $tipoBusqeda FROM `tbl_talleres` "
        . "WHERE idSemillero = '$semillero' AND  fechaTaller between '$fechaDesde' AND '$fechaHasta'";

mysqli_query($gaSql['link'], "SET NAMES utf8");
$rResult = mysqli_query($gaSql['link'], $query) or fatal_error('MySQL Error: ' . mysql_error());

$aRow = mysqli_num_rows($rResult);

require_once '../Model/PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();

// New portrait section
$section = $PHPWord->createSection();

$PHPWord->addFontStyle('r2Style', array('bold' => false, 'italic' => false, 'size' => 14));
$PHPWord->addParagraphStyle('p2Style', array('align' => 'center', 'spaceAfter' => 100));
$section->addText(strtoupper($tipoBusqeda) . " " . $tituloReporte, 'r2Style', 'p2Style');
$section->addTextBreak(1);

if ($aRow > 0) {

    while ($registro = mysqli_fetch_object($rResult)) {

        // Add text elements , ENT_QUOTES,"ISO-8859-1"
        $section->addText("Taller: " . utf8_decode($registro->nombreTaller), array('name' => 'Arial', 'size' => '12'));
        $section->addText("Fecha: " . date("d-m-Y", strtotime($registro->fechaTaller)), array('name' => 'Arial', 'size' => '12'));
        $section->addText(strip_tags(utf8_decode($registro->$tipoBusqeda)), array('name' => 'Arial', 'size' => '12'));
        $section->addTextBreak(1);
    }

    // Save File
    $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('Text.docx');
} else {

    // Add text elements
    $section->addText('No registra talleres', array('name' => 'Verdana'));
    $section->addTextBreak(1);

    $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('Text.docx');
}

header('Content-Description: File Transfer');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename=' . basename(strtoupper($tipoBusqeda) . " " . $nombreIndex . '.docx'));
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize('Text.docx'));
readfile('Text.docx');
unlink('Text.docx');
