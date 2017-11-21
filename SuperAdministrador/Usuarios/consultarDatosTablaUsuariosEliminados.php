<?php

session_start();

date_default_timezone_set('America/Bogota');
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Variables de las colummnas
 */
$aColumns = array('idEmpleado', 'documentoEmp', 'nombresEmp', 'apellidosEmp', 'cargo', 'ultimoIngreso', 'isdelEmpleado');
$sJoin = " INNER JOIN tbl_usuario ON tbl_usuario.id_Empleado = tbl_personal_empleados.idEmpleado ";

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "idEmpleado";

/* DB table to use */
$sTable = "tbl_personal_empleados";

/* Database connection information */
include_once '../../Model/conexionConsultas.php';

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
    fatal_error('Could not select database ' . $gaSql['db'] . $gaSql['link']);
}

/*
 * Paging
 */
$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = " LIMIT " . intval($_GET['iDisplayStart']) . ", " .
            intval($_GET['iDisplayLength']);
}

/*
 * Ordering
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

/*
 * Filtering
 * NOTE this does not match the built-in DataTables filtering which does it
 * word by word on any field. It's possible to do here, but concerned about efficiency
 * on very large tables, and MySQL's regex functionality is very limited
 */

$sWhere = " WHERE isdelEmpleado = '0' AND cargo <> 'SuperAdministrador' ";
if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
    $sWhere .= " AND (";
    for ($i = 0; $i < count($aColumns); $i++) {

        $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . htmlspecialchars(stripslashes($_GET['sSearch'])) . "%' OR ";
    }

    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ')';
}

/* Individual column filtering */
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

/*  $script = '<script type="text/javascript">';
  $script .= 'console.log' . '("PHP mensaje: ' . $sWhere . '")';
  $script .= '</script>';
  echo $script;

  /** SQL queries
 * Get data to display
 */
$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
		FROM   $sTable 
                $sJoin
                $sWhere
		$sOrder
		$sLimit
		";

/* $script = '<script type="text/javascript">';
  $script .= 'console.log' . '("PHP mensaje: ' . $sQuery . '")';
  $script .= '</script>';
  echo $script;

  /** SQL queries
 * Get data to display
 */

mysqli_query($gaSql['link'], "SET NAMES utf8");
$rResult = mysqli_query($gaSql['link'], $sQuery) or fatal_error('MySQL Error: ' . mysqli_errno($gaSql['link']));

/* Data set length after filtering */
$sQuery = "
		SELECT FOUND_ROWS()
	";
$rResultFilterTotal = mysqli_query($gaSql['link'], $sQuery) or fatal_error('MySQL Error: ' . mysqli_errno());
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];

/* Total data set length */
$sQuery = "
		SELECT COUNT(" . $sIndexColumn . ")
		FROM   $sTable
                    $sJoin;
	";

$rResultTotal = mysqli_query($gaSql['link'], $sQuery) or fatal_error('MySQL Error: ' . mysqli_errno());
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];

/*
 * Output
 */
$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);

$conta = 0;
$estado = "";
while ($aRow = mysqli_fetch_array($rResult)) {
    $conta++;
    $row = array();
//    $row[] = $conta; //Nº
    $ID = 0;
    for ($i = 0; $i < count($aColumns); $i++) {
        /* General output */
        if ($aColumns[$i] == "idEmpleado") {
            $ID = $aRow[$aColumns[$i]];
            $row[] = "<center>" . $conta . "</center>";
        } else if ($aColumns[$i] == "isdelEmpleado") {
            $estado = $aRow[$aColumns[$i]];
        } else {
            $row[] = $aRow[$aColumns[$i]];
        }
    }

    $row[] = "<center><a href='#' title='$ID' data-toggle='modal' class='consult' target='_blank'><img src='../img/consultar.png' class='img-responsive img-rounded' width='35%' height='35%' title='Consultar Usuario'/></a></center>";
    if ($estado == "0") {
        $row[] = "<center><a href='#' title='$ID' data-toggle='modal' class='enable' target='_blank'><img src='../img/chulo.png' class='img-responsive img-rounded' width='40%' height='40%' title='Habilitar Usuario'/></a></center>";
    }

    $output['aaData'][] = $row;
}

mysqli_close($gaSql['link']);
echo json_encode($output);
?>
