<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libHabilidades.php';

$GLOBALS['objUsu'] = new libHabilidades();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar habilidad, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $codigoHabilidad = isset($_POST['codigo']) ? $_POST['codigo'] : "";
            $nombreHabilidad = isset($_POST['habilidad']) ? $_POST['habilidad'] : "";

            $GLOBALS['objUsu']->setCodigoHabilidad($codigoHabilidad);
            $GLOBALS['objUsu']->setNombreHabilidad($nombreHabilidad);

            $GLOBALS['objUsu']->registrarHabilidad();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar habilidad, este retorna un vector con toda la información del registro.
    case '2': {

            $idHabilidades = isset($_POST['idHabilidad']) ? $_POST['idHabilidad'] : "";

            $GLOBALS['objUsu']->setIdHabilidades($idHabilidades);

            $GLOBALS['objUsu']->consultarHabilidad();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar habilidad, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $idHabilidades = isset($_POST['idHabilidad']) ? $_POST['idHabilidad'] : "";
            $codigoHabilidad = isset($_POST['codigo']) ? $_POST['codigo'] : "";
            $nombreHabilidad = isset($_POST['habilidad']) ? $_POST['habilidad'] : "";

            $GLOBALS['objUsu']->setIdHabilidades($idHabilidades);
            $GLOBALS['objUsu']->setCodigoHabilidad($codigoHabilidad);
            $GLOBALS['objUsu']->setNombreHabilidad($nombreHabilidad);

            $GLOBALS['objUsu']->actualizarHabilidad();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar habilidad, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idHabilidades = isset($_POST['idHabilidad']) ? $_POST['idHabilidad'] : "";

            $GLOBALS['objUsu']->setIdHabilidades($idHabilidades);

            $GLOBALS['objUsu']->deshabilitarHabilidad();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar habilidad, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idHabilidades = isset($_POST['idHabilidad']) ? $_POST['idHabilidad'] : "";

            $GLOBALS['objUsu']->setIdHabilidades($idHabilidades);

            $GLOBALS['objUsu']->habilitarHabilidad();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}