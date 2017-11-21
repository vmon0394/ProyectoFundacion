<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libArchivosHistoriaExternos.php';

$GLOBALS['objUsu'] = new libArchivosHistoriaExternos();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método cargar archivos a externos, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $nombreDocumento = $_FILES["file"]["name"];
            $fechaExterno = $fechaCompletaSistema;
            $observacionExterno = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            $idHistoriaExterno = isset($_POST['lider']) ? $_POST['lider'] : "";

            $fileName = $_FILES["file"]["name"];
            $tipo = $_FILES["file"]['type'];
            $tamano = intval($_FILES["file"]['size']);
            $extension = explode('.', $_FILES['file']['name']);
            $carpeta = isset($_POST['folder']) ? $_POST['folder'] : "";

            $GLOBALS['objUsu']->setFechaExterno($fechaExterno);
            $GLOBALS['objUsu']->setObservacionExterno(strtoupper(strtr($observacionExterno, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdHistoriaExterno($idHistoriaExterno);

            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setExtension($extension);
            $GLOBALS['objUsu']->setCarpeta($carpeta);

            $GLOBALS['objUsu']->cargarArchivosExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //eliminar archivo a externo, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '2': {

            $idArchivoExterno = isset($_POST['idArchivo']) ? $_POST['idArchivo'] : "";

            $GLOBALS['objUsu']->setIdArchivoExterno($idArchivoExterno);

            $GLOBALS['objUsu']->eliminarArchivoExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}