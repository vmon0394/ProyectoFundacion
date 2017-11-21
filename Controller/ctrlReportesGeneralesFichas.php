<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libReportesGeneralesFichas.php';

$GLOBALS['objUsu'] = new libReportesGeneralesFichas();

switch ($opcion) {

    case '1': {

            $anoRegistro = $fechaSistema;

            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->reporteGeneralSemillerosNino();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    case '2': {

            $semillero = "";
            $tama = 0;

            $idSemillero = isset($_POST['semillero']) ? $_POST['semillero'] : "";
            $anoRegistro = $fechaSistema;

            if (isset($_POST['semillero'])) {
                $wherex = " AND (";
                foreach ($idSemillero as $idSemilleroL) {
                    $wherex.=" f.idSemillero = '$idSemilleroL' OR ";
                }
                $wherex = substr($wherex, 0, sizeof($wherex) - 4);
                $wherex.=")";
                $semillero.=$wherex;
            }
            
            $GLOBALS['objUsu']->setIdSemillero($semillero);
            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->reporteGeneralPorSemillerosNino();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    case '3': {

            $anoRegistro = $fechaSistema;

            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->reporteGeneralSemillerosAdulto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    case '4': {

            $semillero = "";
            $tama = 0;

            $idSemillero = isset($_POST['semilleroA']) ? $_POST['semilleroA'] : "";
            $anoRegistro = $fechaSistema;

            if (isset($_POST['semilleroA'])) {
                $wherex = " AND (";
                foreach ($idSemillero as $idSemilleroL) {
                    $wherex.=" f.idSemillero = '$idSemilleroL' OR ";
                }
                $wherex = substr($wherex, 0, sizeof($wherex) - 4);
                $wherex.=")";
                $semillero.=$wherex;
            }

            $GLOBALS['objUsu']->setIdSemillero($semillero);
            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->reporteGeneralPorSemillerosAdulto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }
}