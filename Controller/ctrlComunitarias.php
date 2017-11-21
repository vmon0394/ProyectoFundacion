<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libComunitarias.php';

$GLOBALS['objUsu'] = new libComunitarias();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar salida, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $fechaActividad = isset($_POST['fechaActividad']) ? $_POST['fechaActividad'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            $numParticipantes = isset($_POST['numParticipantes']) ? $_POST['numParticipantes'] : "";

            $GLOBALS['objUsu']->setNombre($nombre);
            $GLOBALS['objUsu']->setFechaActividad($fechaActividad);
            $GLOBALS['objUsu']->setDescripcion($descripcion);
            $GLOBALS['objUsu']->setNumParticipantes($numParticipantes);

            $GLOBALS['objUsu']->registrarComunitaria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar habilidad, este retorna un vector con toda la información del registro.
    case '2': {

            $idComunitaria = isset($_POST['idComunitaria']) ? $_POST['idComunitaria'] : "";

            $GLOBALS['objUsu']->setIdComunitaria($idComunitaria);

            $GLOBALS['objUsu']->consultarComunitaria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar habilidad, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {
            $idComunitaria = isset($_POST['idComunitaria']) ? $_POST['idComunitaria'] : "";
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $fechaActividad = isset($_POST['fechaActividad']) ? $_POST['fechaActividad'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            $numParticipantes = isset($_POST['numParticipantes']) ? $_POST['numParticipantes'] : "";
            
            $GLOBALS['objUsu']->setIdComunitaria($idComunitaria);
            $GLOBALS['objUsu']->setNombre($nombre);
            $GLOBALS['objUsu']->setFechaActividad($fechaActividad);
            $GLOBALS['objUsu']->setDescripcion($descripcion);
            $GLOBALS['objUsu']->setNumParticipantes($numParticipantes);

            $GLOBALS['objUsu']->actualizarComunitaria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar habilidad, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idComunitaria = isset($_POST['idComunitaria']) ? $_POST['idComunitaria'] : "";

            $GLOBALS['objUsu']->setIdComunitaria($idComunitaria);

            $GLOBALS['objUsu']->deshabilitarComunitaria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar habilidad, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idComunitaria = isset($_POST['idComunitaria']) ? $_POST['idComunitaria'] : "";

            $GLOBALS['objUsu']->setIdComunitaria($idComunitaria);

            $GLOBALS['objUsu']->habilitarComunitaria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}