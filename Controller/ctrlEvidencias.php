<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libEvidencias.php';

$GLOBALS['objUsu'] = new libEvidencias();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método cargar archivos, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $idTaller = isset($_POST['idTaller']) ? $_POST['idTaller'] : "";
            $anoRegistro = $fechaSistema;

            $fileName = $_FILES["file"]["name"];
            $tipo = $_FILES["file"]['type'];
            $tamano = intval($_FILES["file"]['size']);
            $extension = explode('.', $_FILES['file']['name']);
            $carpeta = isset($_POST['folder']) ? $_POST['folder'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);
            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setExtension($extension);
            $GLOBALS['objUsu']->setCarpeta($carpeta);

            $GLOBALS['objUsu']->cargarEvidencia();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //eliminar archivo, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '2': {

            $id_evidencia = isset($_POST['idEvidencia']) ? $_POST['idEvidencia'] : "";

            $GLOBALS['objUsu']->setId_evidencia($id_evidencia);

            $GLOBALS['objUsu']->eliminarEvidencia();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}