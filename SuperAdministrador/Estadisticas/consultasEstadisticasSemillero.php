<?php

//Query de la tabla semilleros para traer el nombre del semillero al que se le va realizar el reporte
$sql = "SELECT s.nombreSemillero, h.nombreHabilidad FROM tbl_semilleros s INNER JOIN tbl_habilidades h ON h.idHabilidades = s.idHabilidad"
        . " WHERE s.idSemillero = '$semillero'";
$rs = mysqli_query($gaSql['link'], $sql);
$datos = mysqli_fetch_array($rs);

$tituloReporte = strtoupper($datos['nombreSemillero']);
$nombre = strtoupper('ESTADÍSTICAS ' . $datos['nombreSemillero']) . ".xls";
//$nombreIndex = strtoupper($datos['nombreSemillero']);
$nombreIndex = "SEMILLERO";
$habilidad = strtoupper($datos['nombreHabilidad']);


//Total activos
$sqlA = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE isdel = '1' AND idSemillero = '$semillero'";
$rsA = mysqli_query($gaSql['link'], $sqlA);
$activos = mysqli_num_rows($rsA);


//Procesos con mas de 1 año
$sqlM = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE isdel = '1' AND anosDePermanencia > '1' AND idSemillero = '$semillero'";
$rsM = mysqli_query($gaSql['link'], $sqlM);
$masDeUnAno = mysqli_num_rows($rsM);


//Nuevos año actual
$sqlN = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE anoRegistro = '$fechaSistema' AND idSemillero = '$semillero'";
$rsN = mysqli_query($gaSql['link'], $sqlN);
$nuevos = mysqli_num_rows($rsN);


//Retirados
$sqlR = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE isdel = '0' AND idSemillero = '$semillero'";
$rsR = mysqli_query($gaSql['link'], $sqlR);
$retirados = mysqli_num_rows($rsR);


//Asistencia talleres formativos
$sqlT = "SELECT * FROM `tbl_talleres` WHERE tipoTaller = 'Talleres Formativos' AND idSemillero = '$semillero'";
$rsT = mysqli_query($gaSql['link'], $sqlT);
$numTalleresF = mysqli_num_rows($rsT);

$conAsistieronF = 0;
$conFaltaronF = 0;

while ($datosT = mysqli_fetch_object($rsT)) {
    $cadenaAsis = split(";", $datosT->asistenciaTaller);

    for ($z = 0; $z < sizeof($cadenaAsis); $z++) {
        if ($cadenaAsis[$z] != "") {

            if ($cadenaAsis[$z] == 1) {
                $conAsistieronF++;
            }

            if ($cadenaAsis[$z] == 0) {
                $conFaltaronF++;
            }
        }
    }
}

//Asistencia talleres psicosociales
$sqlTP = "SELECT * FROM `tbl_talleres` WHERE tipoTaller = 'Taller Psicosocial' AND idSemillero = '$semillero'";
$rsTP = mysqli_query($gaSql['link'], $sqlTP);
$numTalleresP = mysqli_num_rows($rsTP);

$conAsistieronP = 0;
$conFaltaronP = 0;

while ($datosTP = mysqli_fetch_object($rsTP)) {
    $cadenaAsisP = split(";", $datosTP->asistenciaTaller);

    for ($z = 0; $z < sizeof($cadenaAsisP); $z++) {
        if ($cadenaAsisP[$z] != "") {

            if ($cadenaAsisP[$z] == 1) {
                $conAsistieronP++;
            }

            if ($cadenaAsisP[$z] == 0) {
                $conFaltaronP++;
            }
        }
    }
}


//Atenciones psicosociales
$sqlAP = "SELECT f.idFicha FROM tbl_seguimiento_sesion s INNER JOIN tbl_historia_clinica h ON h.idHistoria = s.idHistoria "
        . "INNER JOIN tbl_ficha_sociofamiliar f ON f.idFicha = h.idFicha WHERE f.idSemillero = '$semillero' AND s.fechaSeguimientoSesion LIKE '%$fechaSistema%'";
$rsAP = mysqli_query($gaSql['link'], $sqlAP);
$atencionesPsico = mysqli_num_rows($rsAP);

$idFichasAtenciones = array();

while ($datosAP = $rsAP->fetch_assoc()) {
    array_push($idFichasAtenciones, $datosAP['idFicha']);
}

$idAtendidos = array_unique($idFichasAtenciones);

$personasAtendidas = sizeof($idAtendidos);

//Salidas pedagógicas
$sqlSP = "SELECT * FROM `tbl_talleres` WHERE tipoTaller = 'Salidas Pedagógicas' AND idSemillero = '$semillero'";
mysqli_query($gaSql['link'], "SET NAMES utf8");
$rsSP = mysqli_query($gaSql['link'], $sqlSP);
$numTalleresSP = mysqli_num_rows($rsSP);

$conAsistieronSP = 0;
$conFaltaronSP = 0;

while ($datosSP = mysqli_fetch_object($rsSP)) {
    $cadenaAsisSP = split(";", $datosSP->asistenciaTaller);

    for ($z = 0; $z < sizeof($cadenaAsisSP); $z++) {
        if ($cadenaAsisSP[$z] != "") {

            if ($cadenaAsisSP[$z] == 1) {
                $conAsistieronSP++;
            }

            if ($cadenaAsisSP[$z] == 0) {
                $conFaltaronSP++;
            }
        }
    }
}

//Vacaciones recreativas
$sqlVR = "SELECT * FROM `tbl_talleres` WHERE tipoTaller = 'Vacaciones Recreativas' AND idSemillero = '$semillero'";
mysqli_query($gaSql['link'], "SET NAMES utf8");
$rsVR = mysqli_query($gaSql['link'], $sqlVR);
$numTalleresVR = mysqli_num_rows($rsVR);

$conAsistieronVR = 0;
$conFaltaronVR = 0;

while ($datosVR = mysqli_fetch_object($rsVR)) {
    $cadenaAsisVR = split(";", $datosVR->asistenciaTaller);

    for ($z = 0; $z < sizeof($cadenaAsisVR); $z++) {
        if ($cadenaAsisVR[$z] != "") {

            if ($cadenaAsisVR[$z] == 1) {
                $conAsistieronVR++;
            }

            if ($cadenaAsisVR[$z] == 0) {
                $conFaltaronVR++;
            }
        }
    }
}

//Campamento
$sqlCm = "SELECT * FROM `tbl_talleres` WHERE tipoTaller = 'Campamento' AND idSemillero = '$semillero'";
mysqli_query($gaSql['link'], "SET NAMES utf8");
$rsCm = mysqli_query($gaSql['link'], $sqlCm);
$numTalleresCm = mysqli_num_rows($rsCm);

$conAsistieronCm = 0;
$conFaltaronCm = 0;

while ($datosCm = mysqli_fetch_object($rsCm)) {
    $cadenaAsisCm = split(";", $datosCm->asistenciaTaller);

    for ($z = 0; $z < sizeof($cadenaAsisCm); $z++) {
        if ($cadenaAsisCm[$z] != "") {

            if ($cadenaAsisCm[$z] == 1) {
                $conAsistieronCm++;
            }

            if ($cadenaAsisCm[$z] == 0) {
                $conFaltaronCm++;
            }
        }
    }
}

//Cierre
$sqlCi = "SELECT * FROM `tbl_talleres` WHERE tipoTaller = 'Cierre' AND idSemillero = '$semillero'";
mysqli_query($gaSql['link'], "SET NAMES utf8");
$rsCi = mysqli_query($gaSql['link'], $sqlCi);
$numTalleresCi = mysqli_num_rows($rsCi);

$conAsistieronCi = 0;
$conFaltaronCi = 0;

while ($datosCi = mysqli_fetch_object($rsCi)) {
    $cadenaAsisCi = split(";", $datosCi->asistenciaTaller);

    for ($z = 0; $z < sizeof($cadenaAsisCi); $z++) {
        if ($cadenaAsisCi[$z] != "") {

            if ($cadenaAsisCi[$z] == 1) {
                $conAsistieronCi++;
            }

            if ($cadenaAsisCi[$z] == 0) {
                $conFaltaronCi++;
            }
        }
    }
}