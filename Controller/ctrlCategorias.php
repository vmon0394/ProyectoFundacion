<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libCategorias.php';

$GLOBALS['objUsu'] = new libCategorias();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar categoría, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $nombreCategoria = isset($_POST['categoria']) ? $_POST['categoria'] : "";

            $GLOBALS['objUsu']->setNombreCategoria(strtoupper(strtr($nombreCategoria)));

            $GLOBALS['objUsu']->registrarCategoria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar categoría, este retorna un vector con toda la información del registro.
    case '2': {

            $idCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : "";

            $GLOBALS['objUsu']->setIdCategoria($idCategoria);

            $GLOBALS['objUsu']->consultarCategoria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar categoría, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.
    case '3': {

            $idCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : "";
            $nombreCategoria = isset($_POST['categoria']) ? $_POST['categoria'] : "";

            $GLOBALS['objUsu']->setIdCategoria($idCategoria);
            $GLOBALS['objUsu']->setNombreCategoria(strtoupper(strtr($nombreCategoria, "áéíóúñ", "ÁÉÍÓÚÑ")));

            $GLOBALS['objUsu']->actualizarCategoria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar categoría, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : "";

            $GLOBALS['objUsu']->setIdCategoria($idCategoria);

            $GLOBALS['objUsu']->deshabilitarCategoria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar categoría, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : "";

            $GLOBALS['objUsu']->setIdCategoria($idCategoria);

            $GLOBALS['objUsu']->habilitarCategoria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}