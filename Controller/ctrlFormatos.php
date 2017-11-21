<?php

session_start();

$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libFormatos.php';

$GLOBALS['objUsu'] = new libFormatos();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar formato, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {
        
            $nombre_formato = isset($_POST['formato']) ? $_POST['formato'] : "";

            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);

            $GLOBALS['objUsu']->setNombre_formato(ucwords($nombre_formato));
            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);

            $GLOBALS['objUsu']->cargarFormato();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar formato, este retorna un vector con toda la información del registro.
    case '2': {

            $id_formato = isset($_POST['idFormato']) ? $_POST['idFormato'] : "";

            $GLOBALS['objUsu']->setId_formato($id_formato);

            $GLOBALS['objUsu']->consultarFormato();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método modificar formato, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $id_formato = isset($_POST['idFormato']) ? $_POST['idFormato'] : "";
            $nombre_formato = isset($_POST['formato']) ? $_POST['formato'] : "";
            
            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);

            $GLOBALS['objUsu']->setId_formato($id_formato);
            $GLOBALS['objUsu']->setNombre_formato(ucwords($nombre_formato));
            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);

            $GLOBALS['objUsu']->modificarFormato();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //eliminar formato, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '4': {

            $id_formato = isset($_POST['idFormato']) ? $_POST['idFormato'] : "";

            $GLOBALS['objUsu']->setId_formato($id_formato);

            $GLOBALS['objUsu']->eliminarFormato();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}