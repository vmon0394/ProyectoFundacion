<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libHistorialTalleres.php';

$GLOBALS['objUsu'] = new libHistorialTalleres();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar historial talleres, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {
        
            $fecha_sistema = $fechaSistema;

            $GLOBALS['objUsu']->setFecha_sistema($fecha_sistema);

            $GLOBALS['objUsu']->actualizaEdadPermanencia();

            //Crear historial
            $idUsuario = $_SESSION["idUsuario"];
            $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "";
            $ano = $fechaCompletaSistema;

            $GLOBALS['objUsu']->setIdUsuario($idUsuario);
            $GLOBALS['objUsu']->setContrasena($contrasena);
            $GLOBALS['objUsu']->setAno($ano);

            $GLOBALS['objUsu']->registrarHistorialTaller();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar historial taller, este retorna un vector con toda la información del registro.
    case '2': {

            $idTaller = isset($_POST['idTaller']) ? $_POST['idTaller'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);

            $GLOBALS['objUsu']->consultarHistorialTaller();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, en este caso 
    //el metodo consultar asistencia historial taller, este retorna un vector con toda la información de registro de la asistencia.
    case '3': {

            $idTaller = isset($_POST['taller']) ? $_POST['taller'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);

            $GLOBALS['objUsu']->consultarHistorialAsistencia();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }
}