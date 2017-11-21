<?php

$nombre = "";
$estado = "";

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

$tituloReporte = "PADRINOS Y PARTICIPANTES";
$nombre = "PADRINOS ASIGANDOS.xls";
$nombreIndex = "PADRINOS ASIGANDOS";

//Query de la tabla padrinos para traer todos los registros de padrinos
$query = "SELECT m.id_mov_padrino_ficha, p.sede, p.nombres_padrino, p.apellidos_padrino, f.nombres, f.apellidos, s.nombreSemillero "
        . "FROM tbl_mov_padrino_ficha m INNER JOIN tbl_padrinos p ON p.id_Padrino = m.idPadrino "
        . "INNER JOIN tbl_ficha_sociofamiliar f ON f.idFicha = m.idFicha INNER JOIN tbl_semilleros s ON s.idSemillero = f.idSemillero";

mysqli_query($gaSql['link'], "SET NAMES utf8");
$rResult = mysqli_query($gaSql['link'], $query) or fatal_error('MySQL Error: ' . mysqli_error($gaSql['link']));

$aRow = mysqli_num_rows($rResult);

include_once'../Model/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()
        ->setCreator("ingenieroweb.com.co")
        ->setLastModifiedBy("ingenieroweb.com.co")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("Aprendices")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("ingenieroweb.com.co  con  phpexcel")
        ->setCategory($nombreIndex);

$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValueA('A' . 1, $tituloReporte)
        ->setCellValueA('A' . 2, 'ITEM')
        ->setCellValueK('B' . 2, 'SEDE')
        ->setCellValueB('C' . 2, 'PADRINO')
        ->setCellValueC('D' . 2, 'PARTICIPANTE')
        ->setCellValueN('E' . 2, 'SEMILLERO');

if ($aRow > 0) {

    $i = 4;
    $j = 1;

    while ($registro = mysqli_fetch_object($rResult)) {

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValueA('A' . $i, $j++)
                ->setCellValueB('B' . $i, $registro->sede)
                ->setCellValueC('C' . $i, $registro->nombres_padrino . " " . $registro->apellidos_padrino)
                ->setCellValueD('D' . $i, $registro->nombres . " " . $registro->apellidos)
                ->setCellValueE('E' . $i, $registro->nombreSemillero);

        $i++;
    }
} else {

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('A' . 4, 'No se han asignado padrinos a los participantes.');
}

$h = 'A';
$j = 1;
while ($j <= 50) {
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells($h . '2:' . $h . '3');
    $h++;
    $j++;
}

$estiloTituloReporte = array(
    'font' => array(
        'name' => 'Verdana',
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
        'color' => array('argb' => '12ad54')
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
        'color' => array('argb' => '12ad54')
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
        'rotation' => 0,
        'wrap' => FALSE
    )
);

$estiloInformacionStyle1 = new PHPExcel_Style();
$estiloInformacionStyle1->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => false,
                'size' => 11,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => '8dc449')
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

$estiloInformacionStyle2 = new PHPExcel_Style();
$estiloInformacionStyle2->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => false,
                'size' => 11,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'ffffff')
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
                'size' => 11,
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
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'inside' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '000000'
                    )
                )
            )
));

$estiloInformacion3 = new PHPExcel_Style();
$estiloInformacion3->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => false,
                'size' => 11,
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
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                )
            )
));

if ($aRow > 0) {

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');
    $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A2:E3')->applyFromArray($estiloTituloColumnas);

    $x = 4;
    while ($x <= ($i - 1)) {
        if ($x % 2 != 0) {
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle1, "A" . $x . ":E" . $x);
        } else {
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle2, "A" . $x . ":E" . $x);
        }
        $x++;
    }

    // Inmovilizar paneles 
    $objPHPExcel->getActiveSheet(0)->freezePane('A4');
    $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 4);
} else {

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');
    $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A2:E3')->applyFromArray($estiloTituloColumnas);
}

//Definir ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
$h = 'B';
$j = 1;
while ($j <= 50) {

    $objPHPExcel->getActiveSheet()->getColumnDimension($h)->setWidth(45);
    $h++;
    $j++;
}
$objPHPExcel->getActiveSheet()->calculateColumnWidths();

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

mysqli_close($gaSql['link']);
echo json_encode($aRow);
