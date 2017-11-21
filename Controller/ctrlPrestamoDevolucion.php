<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libPrestamoDevolucion.php';

$GLOBALS['objUsu'] = new libPrestamoDevolucion();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar ficha niños, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '1': {
        
            $documento = isset($_POST['documento']) ? $_POST['documento'] : "";
            $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
            $fechaPrestamo = isset($_POST['fechaPrestamo']) ? $_POST['fechaPrestamo'] : "";
            $fechaDevolucion = isset($_POST['fechaDevolucion']) ? $_POST['fechaDevolucion'] : "";
            $fechaEntrega = isset($_POST['fechaEntrega']) ? $_POST['fechaEntrega'] : "";
            
            $GLOBALS['objUsu']->setDocumento($documento);
            $GLOBALS['objUsu']->setCodigo($codigo);
            $GLOBALS['objUsu']->setFechaPrestamo($fechaPrestamo);
            $GLOBALS['objUsu']->setFechaDevolucion($fechaDevolucion);
            $GLOBALS['objUsu']->setFechaEntrega($fechaEntrega);
            
            $GLOBALS['objUsu']->registrarPrestamoDevolucion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 2 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar ficha adultos, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '2': {
            
           $idPrestamo = isset($_POST['idPrestamo2']) ? $_POST['idPrestamo2'] : "";
           $fechaEntrega = $fechaCompletaSistema;
           $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
           $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : "";
           
           
           $GLOBALS['objUsu']->setIdPrestamo($idPrestamo);
           $GLOBALS['objUsu']->setFechaEntrega($fechaEntrega);
           $GLOBALS['objUsu']->setEstado($estado);
           $GLOBALS['objUsu']->setObservacion($observacion);

           $GLOBALS['objUsu']->entregarMaterial();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar ficha, este retorna un vector con toda la información del registro.
    case '3': {

            $idPrestamo = isset($_POST['idPrestamo']) ? $_POST['idPrestamo'] : "";
            
            $GLOBALS['objUsu']->setIdPrestamo($idPrestamo);

            $GLOBALS['objUsu']->consultarEstadoActualMaterial();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }
    }