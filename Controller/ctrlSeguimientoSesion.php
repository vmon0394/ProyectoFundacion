<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libSeguimientoSesion.php';

$GLOBALS['objUsu'] = new libSeguimientoSesion();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario seguimiento asesoría, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar seguimiento, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {

            $tipoRegistro = isset($_POST['tipoRegistroAsesoria']) ? $_POST['tipoRegistroAsesoria'] : "";
            $fechaSeguimientoSesion = isset($_POST['fechaSeguimiento']) ? $_POST['fechaSeguimiento'] : "";
            $observaciones = isset($_POST['observacionSeguimiento']) ? $_POST['observacionSeguimiento'] : "";
            $idHistoria = isset($_POST['idAsesoria']) ? $_POST['idAsesoria'] : "";

            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setFechaSeguimientoSesion($fechaSeguimientoSesion);
            $GLOBALS['objUsu']->setObservaciones(strtoupper(strtr($observaciones, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdHistoria($idHistoria);

            $GLOBALS['objUsu']->registrarSeguimiento();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar seguimiento, este retorna un vector con toda la información del registro.
    case '2': {

            $idSeguimiento = isset($_POST['idSeguimiento']) ? $_POST['idSeguimiento'] : "";

            $GLOBALS['objUsu']->setIdSeguimiento($idSeguimiento);

            $GLOBALS['objUsu']->consultarSeguimiento();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario seguimiento asesoría, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar seguimiento, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta.  
    case '3': {

            $idSeguimiento = isset($_POST['idSeguimiento']) ? $_POST['idSeguimiento'] : "";
            $fechaSeguimientoSesion = isset($_POST['fechaSeguimiento']) ? $_POST['fechaSeguimiento'] : "";
            $observaciones = isset($_POST['observacionSeguimiento']) ? $_POST['observacionSeguimiento'] : "";

            $GLOBALS['objUsu']->setIdSeguimiento($idSeguimiento);
            $GLOBALS['objUsu']->setFechaSeguimientoSesion($fechaSeguimientoSesion);
            $GLOBALS['objUsu']->setObservaciones(strtoupper(strtr($observaciones, "áéíóúñ", "ÁÉÍÓÚÑ")));

            $GLOBALS['objUsu']->actualizarSeguimiento();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 del controlador recibe la información enviada del formulario seguimiento consultoría, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar seguimiento, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '4': {

            $tipoRegistro = isset($_POST['tipoRegistroConsultoria']) ? $_POST['tipoRegistroConsultoria'] : "";
            $fechaSeguimientoSesion = isset($_POST['fechaConsultoria']) ? $_POST['fechaConsultoria'] : "";
            $observaciones = isset($_POST['observacionConsultoria']) ? $_POST['observacionConsultoria'] : "";
            $idHistoria = isset($_POST['idConsultoria']) ? $_POST['idConsultoria'] : "";

            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setFechaSeguimientoSesion($fechaSeguimientoSesion);
            $GLOBALS['objUsu']->setObservaciones(strtoupper($observaciones));
            $GLOBALS['objUsu']->setIdHistoria($idHistoria);

            $GLOBALS['objUsu']->registrarSeguimiento();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 del controlador recibe la información enviada del formulario seguimiento consultoría, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar seguimiento, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta. 
    case '5': {

            $idSeguimiento = isset($_POST['idSeguimientoC']) ? $_POST['idSeguimientoC'] : "";
            $fechaSeguimientoSesion = isset($_POST['fechaConsultoria']) ? $_POST['fechaConsultoria'] : "";
            $observaciones = isset($_POST['observacionConsultoria']) ? $_POST['observacionConsultoria'] : "";

            $GLOBALS['objUsu']->setIdSeguimiento($idSeguimiento);
            $GLOBALS['objUsu']->setFechaSeguimientoSesion($fechaSeguimientoSesion);
            $GLOBALS['objUsu']->setObservaciones(strtoupper($observaciones));

            $GLOBALS['objUsu']->actualizarSeguimiento();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}