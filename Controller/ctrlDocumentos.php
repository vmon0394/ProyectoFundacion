<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libDocumentos.php';

$GLOBALS['objUsu'] = new libDocumentos();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método cargar archivos, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $tipoDocumento = isset($_POST['tipoArchivo']) ? $_POST['tipoArchivo'] : "";
            $nombreDocumento = $_FILES["file"]["name"];
            $fecha = $fechaCompletaSistema;
            $idFicha = isset($_POST['lider']) ? $_POST['lider'] : "";

            $fileName = $_FILES["file"]["name"];
            $tipo = $_FILES["file"]['type'];
            $tamano = intval($_FILES["file"]['size']);
            $extension = explode('.', $_FILES['file']['name']);
            $carpeta = isset($_POST['folder']) ? $_POST['folder'] : "";

            $GLOBALS['objUsu']->setTipoDocumento($tipoDocumento);
            $GLOBALS['objUsu']->setNombreDocumento($nombreDocumento);
            $GLOBALS['objUsu']->setFecha($fecha);
            $GLOBALS['objUsu']->setIdFicha($idFicha);

            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setExtension($extension);
            $GLOBALS['objUsu']->setCarpeta($carpeta);

            $GLOBALS['objUsu']->cargarArchivos();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //eliminar archivo, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '2': {

            $idFicha = isset($_POST['idFicha']) ? $_POST['idFicha'] : "";

            $GLOBALS['objUsu']->setIdFicha($idFicha);

            $GLOBALS['objUsu']->eliminarArchivo();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
    case '3': {

        $tipoDocumento = isset($_POST['tipoArchivo']) ? $_POST['tipoArchivo'] : "";
        $nombreDocumento = $_FILES["file"]["name"];
        $fecha = $fechaCompletaSistema;
        $idFicha = isset($_POST['lider']) ? $_POST['lider'] : "";

        $fileName = $_FILES["file"]["name"];
        $tipo = $_FILES["file"]['type'];
        $tamano = intval($_FILES["file"]['size']);
        $extension = explode('.', $_FILES['file']['name']);
        $carpeta = isset($_POST['folder']) ? $_POST['folder'] : "";

        $GLOBALS['objUsu']->setTipoDocumento($tipoDocumento);
        $GLOBALS['objUsu']->setNombreDocumento($nombreDocumento);
        $GLOBALS['objUsu']->setFecha($fecha);
        $GLOBALS['objUsu']->setIdFicha($idFicha);

        $GLOBALS['objUsu']->setFileName($fileName);
        $GLOBALS['objUsu']->setTipo($tipo);
        $GLOBALS['objUsu']->setTamano($tamano);
        $GLOBALS['objUsu']->setExtension($extension);
        $GLOBALS['objUsu']->setCarpeta($carpeta);

        $GLOBALS['objUsu']->cargarArchivosPerfil();
        echo json_encode(array('res'=>$GLOBALS['objUsu']->getRespuesta(),'msg' =>$GLOBALS['objUsu']->getMensaje(), 'row'=>$GLOBALS['objUsu']->getResult()));
        break;
    }
    case '4': {

            $idFicha = isset($_POST['idFicha']) ? $_POST['idFicha'] : "";

            $GLOBALS['objUsu']->setIdFicha($idFicha);

            $GLOBALS['objUsu']->consultarUrl();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(),'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }
}