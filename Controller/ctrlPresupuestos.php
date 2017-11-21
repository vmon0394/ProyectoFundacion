<?php

session_start();

$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libPresupuestos.php';

$GLOBALS['objUsu'] = new libPresupuestos();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar presupuesto, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {
        
            $nombre_presupuesto = isset($_POST['presupuesto']) ? $_POST['presupuesto'] : "";

            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);

            $GLOBALS['objUsu']->setNombre_presupuesto(ucwords($nombre_presupuesto));
            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);

            $GLOBALS['objUsu']->cargarPresupuesto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar presupuesto, este retorna un vector con toda la información del registro.
    case '2': {

            $id_presupuesto = isset($_POST['idPresupuesto']) ? $_POST['idPresupuesto'] : "";

            $GLOBALS['objUsu']->setId_presupuesto($id_presupuesto);

            $GLOBALS['objUsu']->consultarPresupuesto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método modificar presupuesto, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $id_presupuesto = isset($_POST['idPresupuesto']) ? $_POST['idPresupuesto'] : "";
            $nombre_presupuesto = isset($_POST['presupuesto']) ? $_POST['presupuesto'] : "";
            
            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);

            $GLOBALS['objUsu']->setId_presupuesto($id_presupuesto);
            $GLOBALS['objUsu']->setNombre_presupuesto(ucwords($nombre_presupuesto));
            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);

            $GLOBALS['objUsu']->modificarPresupuesto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //eliminar presupuesto, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '4': {

            $id_presupuesto = isset($_POST['idPresupuesto']) ? $_POST['idPresupuesto'] : "";

            $GLOBALS['objUsu']->setId_presupuesto($id_presupuesto);

            $GLOBALS['objUsu']->eliminarPresupuesto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}