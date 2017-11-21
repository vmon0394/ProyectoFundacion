<?php

session_start();

//Esta variable recibe el servicio enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libServicios.php';

$GLOBALS['objUsu'] = new libServicios();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar valor, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);
            $nombreServicio = isset($_POST['nombreServicio']) ? $_POST['nombreServicio'] : "";

            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);
            $GLOBALS['objUsu']->setNombreServicio($nombreServicio);

            $GLOBALS['objUsu']->cargarServicio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar valor, este retorna un vector con toda la información del registro.
    case '2': {

            $idServicio = isset($_POST['idServicio']) ? $_POST['idServicio'] : "";

            $GLOBALS['objUsu']->setIdServicio($idServicio);

            $GLOBALS['objUsu']->consultarServicio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar valor, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.
    case '3': {

            $idServicio = isset($_POST['idServicio']) ? $_POST['idServicio'] : "";
            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);
            $nombreServicio = isset($_POST['nombreServicio']) ? $_POST['nombreServicio'] : "";

            $GLOBALS['objUsu']->setIdServicio($idServicio);
            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);
            $GLOBALS['objUsu']->setNombreServicio($nombreServicio);

            $GLOBALS['objUsu']->actualizarServicio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar valor, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idServicio = isset($_POST['idServicio']) ? $_POST['idServicio'] : "";

            $GLOBALS['objUsu']->setIdServicio($idServicio);

            $GLOBALS['objUsu']->eliminarServicio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
    
}