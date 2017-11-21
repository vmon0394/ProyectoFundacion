<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libValores.php';

$GLOBALS['objUsu'] = new libValores();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar valor, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $nombre_valor = isset($_POST['valor']) ? $_POST['valor'] : "";

            $GLOBALS['objUsu']->setNombre_valor(ucwords($nombre_valor));

            $GLOBALS['objUsu']->registrarValor();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar valor, este retorna un vector con toda la información del registro.
    case '2': {

            $id_valor = isset($_POST['idValor']) ? $_POST['idValor'] : "";

            $GLOBALS['objUsu']->setId_valor($id_valor);

            $GLOBALS['objUsu']->consultarValor();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar valor, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.
    case '3': {

            $id_valor = isset($_POST['idValor']) ? $_POST['idValor'] : "";
            $nombre_valor = isset($_POST['valor']) ? $_POST['valor'] : "";

            $GLOBALS['objUsu']->setId_valor($id_valor);
            $GLOBALS['objUsu']->setNombre_valor(ucwords($nombre_valor));

            $GLOBALS['objUsu']->actualizarValor();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar valor, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $id_valor = isset($_POST['idValor']) ? $_POST['idValor'] : "";

            $GLOBALS['objUsu']->setId_valor($id_valor);

            $GLOBALS['objUsu']->deshabilitarValor();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar valor, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $id_valor = isset($_POST['idValor']) ? $_POST['idValor'] : "";

            $GLOBALS['objUsu']->setId_valor($id_valor);

            $GLOBALS['objUsu']->habilitarValor();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}