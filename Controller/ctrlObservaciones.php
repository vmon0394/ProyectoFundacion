<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libObservaciones.php';

$GLOBALS['objUsu'] = new libObservaciones();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar observación, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {

            $fechaObservacion = isset($_POST['fechaObservacion']) ? $_POST['fechaObservacion'] : "";
            $tipoObservacion = isset($_POST['tipoObservaion']) ? $_POST['tipoObservaion'] : "";
            $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : "";
            $idEmpleado = $_SESSION["idEmpleado"];
            $idFicha = isset($_POST['idFichaObserva']) ? $_POST['idFichaObserva'] : "";

            $GLOBALS['objUsu']->setFechaObservacion($fechaObservacion);
            $GLOBALS['objUsu']->setTipoObservacion($tipoObservacion);
            $GLOBALS['objUsu']->setObservacion(strtoupper(strtr($observacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);
            $GLOBALS['objUsu']->setIdFicha($idFicha);

            $GLOBALS['objUsu']->registrarObservacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar observación, este retorna un vector con toda la información del registro.
    case '2': {

            $idObservaion = isset($_POST['idObservaion']) ? $_POST['idObservaion'] : "";

            $GLOBALS['objUsu']->setIdObservaion($idObservaion);

            $GLOBALS['objUsu']->consultarObservacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar observación, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta.  
    case '3': {


            $idObservaion = isset($_POST['idObservaion']) ? $_POST['idObservaion'] : "";
            $fechaObservacion = isset($_POST['fechaObservacion']) ? $_POST['fechaObservacion'] : "";
            $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : "";
            $idEmpleado = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setIdObservaion($idObservaion);
            $GLOBALS['objUsu']->setFechaObservacion($fechaObservacion);
            $GLOBALS['objUsu']->setObservacion(strtoupper(strtr($observacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->actualizarObservacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 del controlador recibe la información enviada del formulario adultos, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar observación, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '4': {

            $fechaObservacion = isset($_POST['fechaObservacionAdulto']) ? $_POST['fechaObservacionAdulto'] : "";
            $tipoObservacion = $_SESSION["perfil"];
            $observacion = isset($_POST['observacionAdulto']) ? $_POST['observacionAdulto'] : "";
            $idEmpleado = $_SESSION["idEmpleado"];
            $idFicha = isset($_POST['idFichaObservaAdulto']) ? $_POST['idFichaObservaAdulto'] : "";

            $GLOBALS['objUsu']->setFechaObservacion($fechaObservacion);
            $GLOBALS['objUsu']->setTipoObservacion($tipoObservacion);
            $GLOBALS['objUsu']->setObservacion(strtoupper($observacion));
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);
            $GLOBALS['objUsu']->setIdFicha($idFicha);

            $GLOBALS['objUsu']->registrarObservacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 del controlador recibe la información enviada del formulario adultos, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar observación, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta. 
    case '5': {


            $idObservaion = isset($_POST['idObservaionAdulto']) ? $_POST['idObservaionAdulto'] : "";
            $fechaObservacion = isset($_POST['fechaObservacionAdulto']) ? $_POST['fechaObservacionAdulto'] : "";
            $observacion = isset($_POST['observacionAdulto']) ? $_POST['observacionAdulto'] : "";
            $idEmpleado = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setIdObservaion($idObservaion);
            $GLOBALS['objUsu']->setFechaObservacion($fechaObservacion);
            $GLOBALS['objUsu']->setObservacion(strtoupper($observacion));
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->actualizarObservacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 6 del controlador recibe la información enviada del formulario voluntarios y egresados, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar observación, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '6': {

            $fechaObservacion = isset($_POST['fechaObservacionVolunEgres']) ? $_POST['fechaObservacionVolunEgres'] : "";
            $tipoObservacion = $_SESSION["perfil"];
            $observacion = isset($_POST['observacionVolunEgres']) ? $_POST['observacionVolunEgres'] : "";
            $idEmpleado = $_SESSION["idEmpleado"];
            $idFicha = isset($_POST['idFichaObservaVolunEgres']) ? $_POST['idFichaObservaVolunEgres'] : "";

            $GLOBALS['objUsu']->setFechaObservacion($fechaObservacion);
            $GLOBALS['objUsu']->setTipoObservacion($tipoObservacion);
            $GLOBALS['objUsu']->setObservacion(strtoupper($observacion));
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);
            $GLOBALS['objUsu']->setIdFicha($idFicha);

            $GLOBALS['objUsu']->registrarObservacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 7 del controlador recibe la información enviada del formulario voluntarios y egresados, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar observación, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta. 
    case '7': {


            $idObservaion = isset($_POST['idObservaionVolunEgres']) ? $_POST['idObservaionVolunEgres'] : "";
            $fechaObservacion = isset($_POST['fechaObservacionVolunEgres']) ? $_POST['fechaObservacionVolunEgres'] : "";
            $observacion = isset($_POST['observacionVolunEgres']) ? $_POST['observacionVolunEgres'] : "";
            $idEmpleado = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setIdObservaion($idObservaion);
            $GLOBALS['objUsu']->setFechaObservacion($fechaObservacion);
            $GLOBALS['objUsu']->setObservacion(strtoupper($observacion));
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->actualizarObservacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}