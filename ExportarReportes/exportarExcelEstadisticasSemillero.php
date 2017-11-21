<?php

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

$estado = "";
$nombre = "";

$semillero = isset($_GET['semillero']) ? $_GET['semillero'] : '0';

$mensaje = "No hay Participantes.";


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

//Archivo con las diferentes consultas a la base de datos para traer los datos para las estadisticas
include_once 'consultasEstadisticasSemillero.php';


//Total inscritos
//Query de la tabla ficha socio familiares para traer los participantes del semilleros
$query = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE idSemillero = '$semillero'";

mysqli_query($gaSql['link'], "SET NAMES utf8");
$rResult = mysqli_query($gaSql['link'], $query) or fatal_error('MySQL Error: ' . mysql_error());

$aRow = mysqli_num_rows($rResult);

include_once'../Model/PHPExcel.php';

$ultmaLetra = "";

if ($aRow > 0) {
    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getSheetCount();

    $objPHPExcel->getProperties()
            ->setCreator("ingenieroweb.com.co")
            ->setLastModifiedBy("ingenieroweb.com.co")
            ->setTitle("Exportar excel desde mysql")
            ->setSubject("Semilleros")
            ->setDescription("Documento generado con PHPExcel")
            ->setKeywords("ingenieroweb.com.co  con  phpexcel")
            ->setCategory("semi");

    //Cabecera
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('A' . 2, 'ESTADÍSTICAS SEMILLERO ' . $tituloReporte)
            ->setCellValueC('A' . 3, 'SEMILLERO / FECHA')
            ->setCellValueC('B' . 3, date("d-m-Y", strtotime($fechaCompletaSistema)))
            ->setCellValueC('A' . 4, 'TEMÁTICA')
            ->setCellValueC('B' . 4, $habilidad)
            ->setCellValueC('C' . 3, 'PARTICIPANTES')
            ->setCellValueC('C' . 4, 'Total inscritos')
            ->setCellValueC('D' . 4, 'Activos')
            ->setCellValueC('E' . 4, 'Con proceso de más de 1 año')
            ->setCellValueC('F' . 4, 'Nuevos ' . $fechaSistema)
            ->setCellValueC('G' . 4, 'Retirados')
            ->setCellValueC('B' . 5, 'Talleres formativos')
            ->setCellValueC('B' . 6, 'Talleres psicosociales')
            ->setCellValueC('B' . 7, 'Atenciones psicosociales-sesiones')
            ->setCellValueC('B' . 8, 'Personas  atendidas')
            ->setCellValueC('B' . 9, 'Salidas Pedagógicas')
            ->setCellValueC('B' . 10, 'Vacaciones recreativas')
            ->setCellValueC('B' . 11, 'Campamento')
            ->setCellValueC('B' . 12, 'Cierre')
            ->setCellValueC('H' . 3, 'Promedio Participación')
            ->setCellValueC('I' . 3, 'Promedio % Participación')
            ->setCellValueC('J' . 3, 'Cantidad de talleres')
            ->setCellValueC('H' . 3, 'Cantidad de talleres')
            ->setCellValueC('I' . 3, 'Asistencias')
            ->setCellValueC('J' . 3, 'Promedio Participación')
            ->setCellValueC('K' . 3, 'Promedio % Participación');

    //Contenido
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('A' . 5, $tituloReporte)
            ->setCellValueA('C' . 5, $aRow)
            ->setCellValueA('D' . 5, $activos)
            ->setCellValueA('E' . 5, $masDeUnAno)
            ->setCellValueA('F' . 5, $nuevos)
            ->setCellValueA('G' . 5, $retirados)
            //Datos de la cantidad de talleres
            ->setCellValueA('H' . 5, $numTalleresF)
            ->setCellValueA('H' . 6, $numTalleresP)
            ->setCellValueA('H' . 7, $atencionesPsico)
            //Datos de particiáción
            ->setCellValueA('I' . 5, $conAsistieronF)
            ->setCellValueA('I' . 6, $conAsistieronP)
            ->setCellValueA('I' . 8, $personasAtendidas)
            ->setCellValueA('I' . 9, $conAsistieronSP)
            ->setCellValueA('I' . 10, $conAsistieronVR)
            ->setCellValueA('I' . 11, $conAsistieronCm)
            ->setCellValueA('I' . 12, $conAsistieronCi);

    $i = 5;
    while ($i <= 6) {
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValueA('J' . $i, '=I' . $i . '/H' . $i)
                ->setCellValueA('K' . $i, '=(J' . $i . '*100)/D5');
        $i++;
    }

    $h = 'C';
    $j = 1;
    while ($j <= 5) {
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells($h . '5:' . $h . '12');
        $h++;
        $j++;
    }

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('C3:G3');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A5:A12');
} else {
    $objPHPExcel = new PHPExcel();

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('A' . 2, $tituloReporte)
            ->setCellValueA('A' . 3, $mensaje);

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A3:D3');
}

$estiloTituloReporte = array(
    'font' => array(
        'name' => 'Arial',
        'bold' => true,
        'italic' => false,
        'strike' => false,
        'size' => 16,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('argb' => 'A9D08E')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE
    )
);

$estiloTituloColumnas = array(
    'font' => array(
        'name' => 'Arial',
        'bold' => true,
        'size' => 12,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('argb' => 'FFFF00')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
            'color' => array(
                'rgb' => '3a2a47'
            )
        ),
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap' => TRUE
        ));


$estiloTituloColumnas2 = array(
    'font' => array(
        'name' => 'Arial',
        'bold' => true,
        'size' => 12,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('argb' => 'A9D08E')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
            'color' => array(
                'rgb' => '3a2a47'
            )
        ),
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap' => TRUE
        ));

$estiloTituloColumnas3 = array(
    'font' => array(
        'name' => 'Arial',
        'bold' => true,
        'size' => 12,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('argb' => 'F8CBAD')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb' => '3a2a47'
            )
        ),
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap' => TRUE
        ));

$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => false,
                'size' => 12,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'FFFFFFFF')
            ),
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                )
            )
));

$estiloInformacion2 = new PHPExcel_Style();
$estiloInformacion2->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'size' => 12,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'FFFFFFFF')
            ),
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'rotation' => 0,
                'wrap' => TRUE
            )
));

$estiloInformacion3 = new PHPExcel_Style();
$estiloInformacion3->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => false,
                'size' => 12,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'FFFFFFFF')
            ),
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'rotation' => 0,
                'wrap' => TRUE
            )
));

if ($aRow > 0) {

    for ($col = 'A'; $col != 'C'; $col++) {
        $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
    }

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:K2');
    $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A3:K3')->applyFromArray($estiloTituloColumnas);
    $objPHPExcel->getActiveSheet()->getStyle('A4:K4')->applyFromArray($estiloTituloColumnas2);


    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:K12");
    $objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($estiloTituloColumnas3);
} else {
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:D2');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A3:D3');
    $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A3:D3')->applyFromArray($estiloTituloColumnas);
}
for ($ie = 'A'; $ie <= $ultmaLetra; $ie++) {

    $objPHPExcel->setActiveSheetIndex(0)
            ->getColumnDimension($ie)->setAutoSize(TRUE);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle($nombreIndex);

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=' . $nombre);
header('Cache-Control: max-age=0');

$data = "Excel2007";

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $data);
$objWriter->save('php://output');
exit;

mysql_close();
echo json_encode($aRow);
