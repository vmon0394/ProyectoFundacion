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

$tituloReporte = "REGISTRO PADRINOS FUNDACIÓN CONCONCRETO";
$nombre = "PADRINOS.xls";
$nombreIndex = "PADRINOS";

//Query de la tabla padrinos para traer todos los registros de padrinos
$query = "SELECT p.id_Padrino, p.documento_padrino, p.nombres_padrino, p.apellidos_padrino, p.telefono_padrino, p.celular_padrino, p.email_padrino, "
        . "c.nombre_compania, p.sede, d.departamento, m.municipio, p.aporte_quincenal, p.fecha_autorizacion, p.isdel_padrino FROM tbl_padrinos p "
        . "INNER JOIN tbl_compania_relacionadas c ON c.id_compania = p.idCompania INNER JOIN tbl_municipios m ON m.idMunicipio = p.idCiudadCompania "
        . "INNER JOIN tbl_departamentos d ON d.idDepartamento = m.idDepartamento";

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
        ->setCellValueK('B' . 2, 'Nº DOCUMENTO')
        ->setCellValueB('C' . 2, 'NOMBRES')
        ->setCellValueC('D' . 2, 'APELLIDOS')
        ->setCellValueN('E' . 2, 'TELÉFONO')
        ->setCellValueO('F' . 2, 'CELULAR')
        ->setCellValueS('G' . 2, 'E-MAIL')
        ->setCellValueD('H' . 2, 'COMPAÑIA')
        ->setCellValueI('I' . 2, 'SEDE')
        ->setCellValueE('J' . 2, 'DEP. COMPAÑIA')
        ->setCellValueG('K' . 2, 'MUNICIPIO COMPAÑIA')
        ->setCellValueH('L' . 2, 'APORTE QUINCENAL')
        ->setCellValueJ('M' . 2, 'FECHA AUTORIZACIÓN')
        ->setCellValueJ('N' . 2, 'ESTADO');

if ($aRow > 0) {

    $i = 4;
    $j = 1;

    //Contadores de estado
    $contActivo = 0;
    $contInactivo = 0;

    //Contadores de genero
    $contMasculino = 0;
    $contFemenino = 0;

    while ($registro = mysqli_fetch_object($rResult)) {

        if ($registro->isdel_padrino == "1") {
            $estado = "ACTIVO";
            $contActivo++;
        } else if ($registro->isdel_padrino == "0") {
            $estado = "INACTIVO";
            $contInactivo++;
        }

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValueA('A' . $i, $j++)
                ->setCellValueB('B' . $i, $registro->documento_padrino)
                ->setCellValueC('C' . $i, $registro->nombres_padrino)
                ->setCellValueD('D' . $i, $registro->apellidos_padrino)
                ->setCellValueE('E' . $i, $registro->telefono_padrino)
                ->setCellValueF('F' . $i, $registro->celular_padrino)
                ->setCellValueG('G' . $i, $registro->email_padrino)
                ->setCellValueH('H' . $i, $registro->nombre_compania)
                ->setCellValueH('I' . $i, $registro->sede)
                ->setCellValueI('J' . $i, $registro->departamento)
                ->setCellValueJ('K' . $i, $registro->municipio)
                ->setCellValueK('L' . $i, $registro->aporte_quincenal)
                ->setCellValueL('M' . $i, $registro->fecha_autorizacion)
                ->setCellValueL('N' . $i, $estado);

        $i++;
    }

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('A' . ($i + 1), 'PADRINOS ACTIVOS')
            ->setCellValueB('A' . ($i + 2), 'PADRINOS INACTIVOS');

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . ($i + 1) . ':B' . ($i + 1));
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . ($i + 2) . ':B' . ($i + 2));

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('C' . ($i + 1), $contActivo)
            ->setCellValueB('C' . ($i + 2), $contInactivo);
} else {

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('A' . 3, 'No hay Padrinos.');
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

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:N1');
    $objPHPExcel->getActiveSheet()->getStyle('A1:N1')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A2:N3')->applyFromArray($estiloTituloColumnas);

    $x = 4;
    while ($x <= ($i - 1)) {
        if ($x % 2 != 0) {
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle1, "A" . $x . ":N" . $x);
        } else {
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle2, "A" . $x . ":N" . $x);
        }
        $x++;
    }

    // Inmovilizar paneles 
    $objPHPExcel->getActiveSheet(0)->freezePane('A4');
    $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 4);

    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A" . ($i + 1) . ":B" . ($i + 1));
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A" . ($i + 2) . ":B" . ($i + 2));
    ;

    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion3, "C" . ($i + 1));
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion3, "C" . ($i + 2));
} else {

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:N1');
    $objPHPExcel->getActiveSheet()->getStyle('A1:N1')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A2:N3')->applyFromArray($estiloTituloColumnas);
}

//Definir ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
$h = 'B';
$j = 1;
while ($j <= 50) {

    $objPHPExcel->getActiveSheet()->getColumnDimension($h)->setWidth(30);
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
