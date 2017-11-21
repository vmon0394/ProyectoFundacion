<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libProyectosCC.php';

$GLOBALS['objUsu'] = new libProyectosCC();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar salida, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $fechaIntervecion = isset($_POST['fechaIntervecion']) ? $_POST['fechaIntervecion'] : "";
            $numParticipantes = isset($_POST['numParticipantes']) ? $_POST['numParticipantes'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";

            $GLOBALS['objUsu']->setNombre($nombre);
            $GLOBALS['objUsu']->setFechaIntervecion($fechaIntervecion);
            $GLOBALS['objUsu']->setNumParticipantes($numParticipantes);
            $GLOBALS['objUsu']->setDescripcion($descripcion);

            $GLOBALS['objUsu']->registrarIntervencion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar habilidad, este retorna un vector con toda la información del registro.
    case '2': {

            $idIntervecion = isset($_POST['idIntervecion']) ? $_POST['idIntervecion'] : "";

            $GLOBALS['objUsu']->setIdIntervecion($idIntervecion);

            $GLOBALS['objUsu']->consultarIntervencion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar habilidad, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {
            $idIntervecion = isset($_POST['idIntervecion']) ? $_POST['idIntervecion'] : "";
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $fechaIntervencion = isset($_POST['fechaIntervecion']) ? $_POST['fechaIntervecion'] : "";
            $numParticipantes = isset($_POST['numParticipantes']) ? $_POST['numParticipantes'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            
            $GLOBALS['objUsu']->setIdIntervecion($idIntervecion);
            $GLOBALS['objUsu']->setNombre($nombre);
            $GLOBALS['objUsu']->setFechaIntervecion($fechaIntervecion);
            $GLOBALS['objUsu']->setNumParticipantes($numParticipantes);
            $GLOBALS['objUsu']->setDescripcion($descripcion);

            $GLOBALS['objUsu']->actualizarIntervencion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar habilidad, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idIntervecion = isset($_POST['idIntervecion']) ? $_POST['idIntervecion'] : "";

            $GLOBALS['objUsu']->setIdIntervecion($idIntervecion);

            $GLOBALS['objUsu']->deshabilitarIntervencion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar habilidad, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idIntervecion = isset($_POST['idIntervecion']) ? $_POST['idIntervecion'] : "";

            $GLOBALS['objUsu']->setIdIntervecion($idIntervecion);

            $GLOBALS['objUsu']->habilitarIntervecion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}