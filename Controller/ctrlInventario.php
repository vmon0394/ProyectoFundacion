<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libInventario.php';

$GLOBALS['objUsu'] = new libInventario();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar padrino, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $nombreMaterial = isset($_POST['nombreMaterial']) ? $_POST['nombreMaterial'] : "";
            $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            $autor = isset($_POST['autor']) ? $_POST['autor'] : "";
            $fechaRegistro = $fechaCompletaSistema;
            $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";            

            $GLOBALS['objUsu']->setNombreMaterial($nombreMaterial);
            $GLOBALS['objUsu']->setCodigo($codigo);
            $GLOBALS['objUsu']->setDescripcion($descripcion);
            $GLOBALS['objUsu']->setAutor($autor);
            $GLOBALS['objUsu']->setFechaRegistro($fechaRegistro);  
            $GLOBALS['objUsu']->setEstado($estado);
            $GLOBALS['objUsu']->setIdZona($idZona);

            $GLOBALS['objUsu']->registrarInventario();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar inventario, este retorna un vector con toda la información del registro.
    case '2': {

            $idMaterial = isset($_POST['idMaterial']) ? $_POST['idMaterial'] : "";

            $GLOBALS['objUsu']->setIdMaterial($idMaterial);

            $GLOBALS['objUsu']->consultarInventario();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar padrino, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $idMaterial = isset($_POST['idMaterial']) ? $_POST['idMaterial'] : "";
            $nombreMaterial = isset($_POST['nombreMaterial']) ? $_POST['nombreMaterial'] : "";
            $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            $autor = isset($_POST['autor']) ? $_POST['autor'] : "";
            $fechaRegistro = $fechaCompletaSistema;
            $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";            

            $GLOBALS['objUsu']->setIdMaterial($idMaterial);
            $GLOBALS['objUsu']->setNombreMaterial($nombreMaterial);
            $GLOBALS['objUsu']->setCodigo($codigo);
            $GLOBALS['objUsu']->setDescripcion($descripcion);
            $GLOBALS['objUsu']->setAutor($autor);
            $GLOBALS['objUsu']->setFechaRegistro($fechaRegistro);  
            $GLOBALS['objUsu']->setEstado($estado);
            $GLOBALS['objUsu']->setIdZona($idZona);

            $GLOBALS['objUsu']->actualizarInventario();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar padrino, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idMaterial = isset($_POST['idMaterial']) ? $_POST['idMaterial'] : "";

            $GLOBALS['objUsu']->setIdMaterial($idMaterial);

            $GLOBALS['objUsu']->deshabilitarInventario();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar padrino, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idMaterial = isset($_POST['idMaterial']) ? $_POST['idMaterial'] : "";

            $GLOBALS['objUsu']->setIdMaterial($idMaterial);

            $GLOBALS['objUsu']->habilitarInventario();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
    }
}