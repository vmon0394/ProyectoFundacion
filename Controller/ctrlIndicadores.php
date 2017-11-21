<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libIndicadores.php';

$GLOBALS['objUsu'] = new libIndicadores();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar indicador, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $codigoIndicadores = isset($_POST['codigoIndicador']) ? $_POST['codigoIndicador'] : "";
            $nombreIndicadores = isset($_POST['indicador']) ? $_POST['indicador'] : "";
            $idHabilidad = isset($_POST['habilidad']) ? $_POST['habilidad'] : "";

            $GLOBALS['objUsu']->setCodigoIndicadores($codigoIndicadores);
            $GLOBALS['objUsu']->setNombreIndicadores($nombreIndicadores);
            $GLOBALS['objUsu']->setIdHabilidad($idHabilidad);

            $GLOBALS['objUsu']->registrarIndicador();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar indicador, este retorna un vector con toda la información del registro.
    case '2': {

            $idIndicador = isset($_POST['idIndicador']) ? $_POST['idIndicador'] : "";

            $GLOBALS['objUsu']->setIdIndicador($idIndicador);

            $GLOBALS['objUsu']->consultarIndicador();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar indicador, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta. 
    case '3': {

            $idIndicador = isset($_POST['idIndicador']) ? $_POST['idIndicador'] : "";
            $codigoIndicadores = isset($_POST['codigoIndicador']) ? $_POST['codigoIndicador'] : "";
            $nombreIndicadores = isset($_POST['indicador']) ? $_POST['indicador'] : "";
            $idHabilidad = isset($_POST['habilidad']) ? $_POST['habilidad'] : "";

            $GLOBALS['objUsu']->setIdIndicador($idIndicador);
            $GLOBALS['objUsu']->setCodigoIndicadores($codigoIndicadores);
            $GLOBALS['objUsu']->setNombreIndicadores($nombreIndicadores);
            $GLOBALS['objUsu']->setIdHabilidad($idHabilidad);

            $GLOBALS['objUsu']->actualizarIndicador();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar indicador, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idIndicador = isset($_POST['idIndicador']) ? $_POST['idIndicador'] : "";

            $GLOBALS['objUsu']->setIdIndicador($idIndicador);

            $GLOBALS['objUsu']->deshabilitarIndicador();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar indicador, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idIndicador = isset($_POST['idIndicador']) ? $_POST['idIndicador'] : "";

            $GLOBALS['objUsu']->setIdIndicador($idIndicador);

            $GLOBALS['objUsu']->habilitarIndicador();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}