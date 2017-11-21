<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libSalidas.php';

$GLOBALS['objUsu'] = new libSalidas();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar salida, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $salida = isset($_POST['salida']) ? $_POST['salida'] : "";
            $fechaSalida = isset($_POST['fechaSalida']) ? $_POST['fechaSalida'] : "";
            $numParticipantes = isset($_POST['numParticipantes']) ? $_POST['numParticipantes'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
           

            $GLOBALS['objUsu']->setSalida($salida);
            $GLOBALS['objUsu']->setFechaSalida($fechaSalida);
            $GLOBALS['objUsu']->setNumParticipantes($numParticipantes);
            $GLOBALS['objUsu']->setDescripcion($descripcion);
           

            $GLOBALS['objUsu']->registrarSalida();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar habilidad, este retorna un vector con toda la información del registro.
    case '2': {

            $idSalida = isset($_POST['idSalida']) ? $_POST['idSalida'] : "";

            $GLOBALS['objUsu']->setIdSalida($idSalida);

            $GLOBALS['objUsu']->consultarSalida();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar habilidad, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $idSalida = isset($_POST['idSalida']) ? $_POST['idSalida'] : "";
            $salida = isset($_POST['salida']) ? $_POST['salida'] : "";
            $fechaSalida = isset($_POST['fechaSalida']) ? $_POST['fechaSalida'] : "";
            $numParticipantes = isset($_POST['numParticipantes']) ? $_POST['numParticipantes'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            
            $GLOBALS['objUsu']->setIdSalida($idSalida);
            $GLOBALS['objUsu']->setSalida($salida);
            $GLOBALS['objUsu']->setFechaSalida($fechaSalida);
            $GLOBALS['objUsu']->setNumParticipantes($numParticipantes);
            $GLOBALS['objUsu']->setDescripcion($descripcion);

            $GLOBALS['objUsu']->actualizarSalida();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar habilidad, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idSalida = isset($_POST['idSalida']) ? $_POST['idSalida'] : "";

            $GLOBALS['objUsu']->setIdSalida($idSalida);

            $GLOBALS['objUsu']->deshabilitarSalida();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar habilidad, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idSalida = isset($_POST['idSalida']) ? $_POST['idSalida'] : "";

            $GLOBALS['objUsu']->setIdSalida($idSalida);

            $GLOBALS['objUsu']->habilitarSalida();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}