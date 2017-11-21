<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libCompanias.php';

$GLOBALS['objUsu'] = new libCompanias();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar compania, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {

            $nombre_compania = isset($_POST['compania']) ? $_POST['compania'] : "";

            $GLOBALS['objUsu']->setNombre_compania(strtoupper(strtr($nombre_compania, "áéíóúñ", "ÁÉÍÓÚÑ")));

            $GLOBALS['objUsu']->registrarCompania();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar compania, este retorna un vector con toda la información del registro.
    case '2': {

            $id_compania = isset($_POST['idCompania']) ? $_POST['idCompania'] : "";

            $GLOBALS['objUsu']->setId_compania($id_compania);

            $GLOBALS['objUsu']->consultarCompania();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar compania, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta.  
    case '3': {

            $id_compania = isset($_POST['idCompania']) ? $_POST['idCompania'] : "";
            $nombre_compania = isset($_POST['compania']) ? $_POST['compania'] : "";

            $GLOBALS['objUsu']->setId_compania($id_compania);
            $GLOBALS['objUsu']->setNombre_compania(strtoupper(strtr($nombre_compania, "áéíóúñ", "ÁÉÍÓÚÑ")));

            $GLOBALS['objUsu']->actualizarCompania();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar compania, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '4': {

            $id_compania = isset($_POST['idCompania']) ? $_POST['idCompania'] : "";

            $GLOBALS['objUsu']->setId_compania($id_compania);

            $GLOBALS['objUsu']->deshabilitarCompania();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar compania, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta. 
    case '5': {

            $id_compania = isset($_POST['idCompania']) ? $_POST['idCompania'] : "";

            $GLOBALS['objUsu']->setId_compania($id_compania);

            $GLOBALS['objUsu']->habilitarCompania();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}