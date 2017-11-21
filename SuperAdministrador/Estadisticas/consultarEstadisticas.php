<?php

session_start();

$idSemillero = isset($_GET['semillero']) ? $_GET['semillero'] : '0';
/*
 * variables de las columnas 
 */
$Columns = array('totalInscritos','activos','masDeUnAno','nuevos','retirados');

$sIndexColumn = 'idSemillero';

$sTable = "tbl_semilleros";

include_once '../../model/conexionConsultas.php';
/*
 * funcion local
 */
function fatal_error($sErrorMessage = '') {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    die($sErrorMessage);
}
/*
 * MySQL coneccion 
 */
if (!$gaSql['link'] = mysqli_connect($gaSql['server'], $gaSql['user'], $gaSql['password'])) {
    fatal_error('Could not open connection to server');
}

if (!mysqli_select_db($gaSql['link'], $gaSql['db'])) {
    fatal_error('Could not select database ' . $gaSql['db'] . $gaSql['link']);
}
/*
 * paginación
 */
$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = " LIMIT " . intval($_GET['iDisplayStart']) . ", " .
            intval($_GET['iDisplayLength']);
}
/*
 * Ordenando
 */
$sOrder = "";
if (isset($_GET['iSortCol_0'])) {
    $sOrder = " ORDER BY  ";
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= "`" . $aColumns[intval($_GET['iSortCol_' . $i])] . "` " .
                    ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
        }
    }

    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == " ORDER BY") {
        $sOrder = "";
    }
}

$sWhere = " WHERE idSemillero = '$idSemillero'";
if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
    $sWhere .= " AND (";
    for ($i = 0; $i < count($aColumns); $i++) {

        $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . htmlspecialchars(stripslashes($_GET['sSearch'])) . "%' OR ";
    }

    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ')';
}
/*
 * filtrado de columna individual
 */
for ($i = 0; $i < count($aColumns); $i++) {
    if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
        if ($sWhere == "") {
            $sWhere = "WHERE ";
        } else {
            $sWhere .= " AND ";
        }
        $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . mysqli_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
    }
}
/*
 * Obtener datos p  ara mostrar
 */
$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
		FROM   $sTable 
                $sWhere
		$sOrder
		$sLimit
		";

mysqli_query($gaSql['link'], "SET NAMES utf8");
$rResult = mysqli_query($gaSql['link'], $sQuery) or fatal_error('MySQL Error: ' . mysqli_errno($gaSql['link']));

/*
*longitud conjunto de datos después de la filtración
*/
$sQuery = "
		SELECT FOUND_ROWS()
	";
$rResultFilterTotal = mysqli_query($gaSql['link'], $sQuery) or fatal_error('MySQL Error: ' . mysqli_errno());
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];

/*
 * longitud total de datos
 */
$sQuery = "
		SELECT COUNT(" . $sIndexColumn . ")
		FROM   $sTable;
	";

$rResultTotal = mysqli_query($gaSql['link'], $sQuery) or fatal_error('MySQL Error: ' . mysqli_errno());
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];

/*
 * salida
 */
$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);


//$conta = 0;
//$estado = "";
//while ($aRow = mysqli_fetch_array($rResult)) {
//    $conta++;
//    $row = array();
////    $row[] = $conta; //Nº
//    $ID = 0;
//    for ($i = 0; $i < count($aColumns); $i++) {
//        /* General output */
//        if ($aColumns[$i] == "idTaller") {
//            $ID = $aRow[$aColumns[$i]];
//            $row[] = "<center>" . $conta . "</center>";
//        } else {
//            $row[] = $aRow[$aColumns[$i]];
//        }
//    }
//
//    $output['aaData'][] = $row;
//}

mysqli_close($gaSql['link']);
echo json_encode($output);
?>

