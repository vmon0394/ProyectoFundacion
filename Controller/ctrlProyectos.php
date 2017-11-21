<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libProyectos.php';

$GLOBALS['objUsu'] = new libProyectos();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar proyecto, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {

            $nombreProyecto = isset($_POST['proyecto']) ? $_POST['proyecto'] : "";

            $GLOBALS['objUsu']->setNombreProyecto(strtoupper($nombreProyecto));

            $GLOBALS['objUsu']->registrarProyecto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar proyecto, este retorna un vector con toda la información del registro.
    case '2': {

            $idProyecto = isset($_POST['idProyecto']) ? $_POST['idProyecto'] : "";

            $GLOBALS['objUsu']->setIdProyecto($idProyecto);

            $GLOBALS['objUsu']->consultarProyecto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar proyecto, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta.  
    case '3': {

            $idProyecto = isset($_POST['idProyecto']) ? $_POST['idProyecto'] : "";
            $nombreProyecto = isset($_POST['proyecto']) ? $_POST['proyecto'] : "";

            $GLOBALS['objUsu']->setIdProyecto($idProyecto);
            $GLOBALS['objUsu']->setNombreProyecto(strtoupper($nombreProyecto));

            $GLOBALS['objUsu']->actualizarProyecto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar proyecto, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '4': {

            $idProyecto = isset($_POST['idProyecto']) ? $_POST['idProyecto'] : "";

            $GLOBALS['objUsu']->setIdProyecto($idProyecto);

            $GLOBALS['objUsu']->deshabilitarProyecto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar proyecto, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta. 
    case '5': {

            $idProyecto = isset($_POST['idProyecto']) ? $_POST['idProyecto'] : "";

            $GLOBALS['objUsu']->setIdProyecto($idProyecto);

            $GLOBALS['objUsu']->habilitarProyecto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}