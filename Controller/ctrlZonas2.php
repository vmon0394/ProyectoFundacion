<?php

session_start();

//Esta variable recibe el servicio enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libZonas2.php';

$GLOBALS['objUsu'] = new libZonas2();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar valor, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $nombreZona = isset($_POST['nombreZona']) ? $_POST['nombreZona'] : "";
            $alias = isset($_POST['alias']) ? $_POST['alias'] : "";

            $GLOBALS['objUsu']->setNombreZona($nombreZona);
            $GLOBALS['objUsu']->setAlias($alias);

            $GLOBALS['objUsu']->registrarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar valor, este retorna un vector con toda la información del registro.
    case '2': {

            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";

            $GLOBALS['objUsu']->setIdZona($idZona);

            $GLOBALS['objUsu']->consultarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar zona, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.
    case '3': {

            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";
            $nombreZona = isset($_POST['nombreZona']) ? $_POST['nombreZona'] : "";
            $alias = isset($_POST['alias']) ? $_POST['alias'] : "";

            $GLOBALS['objUsu']->setIdZona($idZona);
            $GLOBALS['objUsu']->setNombreZona($nombreZona);
            $GLOBALS['objUsu']->setAlias($alias);

            $GLOBALS['objUsu']->actualizarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar valor, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";

            $GLOBALS['objUsu']->setIdZona($idZona);

            $GLOBALS['objUsu']->deshabilitarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar servicio, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";

            $GLOBALS['objUsu']->setIdZona($idZona);

            $GLOBALS['objUsu']->habilitarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}