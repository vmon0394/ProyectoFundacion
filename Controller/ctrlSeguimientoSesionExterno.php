<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libSeguimientoSesionExterno.php';

$GLOBALS['objUsu'] = new libSeguimientoSesionExterno();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario seguimiento asesoría, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar seguimiento externos, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {

            $fechaSeguimientoSesion = isset($_POST['fechaSeguimientoEx']) ? $_POST['fechaSeguimientoEx'] : "";
            $observaciones = isset($_POST['observacionSeguimientoEx']) ? $_POST['observacionSeguimientoEx'] : "";
            $idHistoriaExterno = isset($_POST['idAsesoriaExterno']) ? $_POST['idAsesoriaExterno'] : "";

            $GLOBALS['objUsu']->setFechaSeguimientoSesion($fechaSeguimientoSesion);
            $GLOBALS['objUsu']->setObservaciones(strtoupper(strtr($observaciones, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdHistoriaExterno($idHistoriaExterno);

            $GLOBALS['objUsu']->registrarSeguimientoExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar seguimiento externo, este retorna un vector con toda la información del registro.
    case '2': {

            $idSeguimientoExterno = isset($_POST['idSeguimiento']) ? $_POST['idSeguimiento'] : "";

            $GLOBALS['objUsu']->setIdSeguimientoExterno($idSeguimientoExterno);

            $GLOBALS['objUsu']->consultarSeguimientoExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario seguimiento asesoría, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar seguimiento externos, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta.  
    case '3': {

            $idSeguimientoExterno = isset($_POST['idSeguimientoEx']) ? $_POST['idSeguimientoEx'] : "";
            $fechaSeguimientoSesion = isset($_POST['fechaSeguimientoEx']) ? $_POST['fechaSeguimientoEx'] : "";
            $observaciones = isset($_POST['observacionSeguimientoEx']) ? $_POST['observacionSeguimientoEx'] : "";

            $GLOBALS['objUsu']->setIdSeguimientoExterno($idSeguimientoExterno);
            $GLOBALS['objUsu']->setFechaSeguimientoSesion($fechaSeguimientoSesion);
            $GLOBALS['objUsu']->setObservaciones(strtoupper(strtr($observaciones, "áéíóúñ", "ÁÉÍÓÚÑ")));

            $GLOBALS['objUsu']->actualizarSeguimientoExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 del controlador recibe la información enviada del formulario seguimiento consultoría, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar seguimiento externos, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '4': {

            $fechaSeguimientoSesion = isset($_POST['fechaConsultoriaEx']) ? $_POST['fechaConsultoriaEx'] : "";
            $observaciones = isset($_POST['observacionConsultoriaEx']) ? $_POST['observacionConsultoriaEx'] : "";
            $idHistoriaExterno = isset($_POST['idConsultoriaExterno']) ? $_POST['idConsultoriaExterno'] : "";

            $GLOBALS['objUsu']->setFechaSeguimientoSesion($fechaSeguimientoSesion);
            $GLOBALS['objUsu']->setObservaciones(strtoupper($observaciones));
            $GLOBALS['objUsu']->setIdHistoriaExterno($idHistoriaExterno);

            $GLOBALS['objUsu']->registrarSeguimientoExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 del controlador recibe la información enviada del formulario seguimiento consultoría, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar seguimiento externos, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta. 
    case '5': {

            $idSeguimientoExterno = isset($_POST['idSeguimientoCEx']) ? $_POST['idSeguimientoCEx'] : "";
            $fechaSeguimientoSesion = isset($_POST['fechaConsultoriaEx']) ? $_POST['fechaConsultoriaEx'] : "";
            $observaciones = isset($_POST['observacionConsultoriaEx']) ? $_POST['observacionConsultoriaEx'] : "";

            $GLOBALS['objUsu']->setIdSeguimientoExterno($idSeguimientoExterno);
            $GLOBALS['objUsu']->setFechaSeguimientoSesion($fechaSeguimientoSesion);
            $GLOBALS['objUsu']->setObservaciones(strtoupper($observaciones));

            $GLOBALS['objUsu']->actualizarSeguimientoExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}