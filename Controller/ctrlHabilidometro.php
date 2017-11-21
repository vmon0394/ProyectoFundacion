<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaSistema = date("Y-m-d");
$anoSistema = date("Y");
$time = date("H:i");

$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libHabilidometro.php';

$GLOBALS['objUsu'] = new libHabilidometro();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar técnica, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {

            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);
            $idSemillero = isset($_POST['semillero']) ? $_POST['semillero'] : "";
            $fecha_habilidometro = isset($_POST['fecha']) ? $_POST['fecha'] : "";
            $ano_habilidometro = $anoSistema;

            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);
            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setFecha_habilidometro($fecha_habilidometro);
            $GLOBALS['objUsu']->setAno_habilidometro($ano_habilidometro);

            $GLOBALS['objUsu']->cargarHabilidometro();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar técnica, este retorna un vector con toda la información del registro.
    case '2': {

            $idHabilidometro = isset($_POST['idHabilidometro']) ? $_POST['idHabilidometro'] : "";

            $GLOBALS['objUsu']->setIdHabilidometro($idHabilidometro);

            $GLOBALS['objUsu']->consultarHabilidometro();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método modificar técnica, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $idHabilidometro = isset($_POST['idHabilidometro']) ? $_POST['idHabilidometro'] : "";
            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);
            $idSemillero = isset($_POST['semillero']) ? $_POST['semillero'] : "";
            $fecha_habilidometro = isset($_POST['fecha']) ? $_POST['fecha'] : "";
            $ano_habilidometro = $anoSistema;

            $GLOBALS['objUsu']->setIdHabilidometro($idHabilidometro);
            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);
            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setFecha_habilidometro($fecha_habilidometro);
            $GLOBALS['objUsu']->setAno_habilidometro($ano_habilidometro);

            $GLOBALS['objUsu']->modificarHabilidometro();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //eliminar técnica, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '4': {

            $idHabilidometro = isset($_POST['idHabilidometro']) ? $_POST['idHabilidometro'] : "";

            $GLOBALS['objUsu']->setIdHabilidometro($idHabilidometro);

            $GLOBALS['objUsu']->eliminarHabilidometro();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}