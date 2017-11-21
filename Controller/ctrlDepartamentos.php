<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libDepartamentos.php';

$GLOBALS['objUsu'] = new libDepartamentos();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar departamento, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : "";

            $GLOBALS['objUsu']->setDepartamento(strtoupper(strtr($departamento, "áéíóúñ", "ÁÉÍÓÚÑ")));

            $GLOBALS['objUsu']->registrarDepartamento();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar departamento, este retorna un vector con toda la información del registro.
    case '2': {

            $idDepartamento = isset($_POST['idDepartamento']) ? $_POST['idDepartamento'] : "";

            $GLOBALS['objUsu']->setIdDepartamento($idDepartamento);

            $GLOBALS['objUsu']->consultarDepartamento();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar departamento, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta. 
    case '3': {

            $idDepartamento = isset($_POST['idDepartamento']) ? $_POST['idDepartamento'] : "";
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : "";

            $GLOBALS['objUsu']->setIdDepartamento($idDepartamento);
            $GLOBALS['objUsu']->setDepartamento(strtoupper(strtr($departamento, "áéíóúñ", "ÁÉÍÓÚÑ")));

            $GLOBALS['objUsu']->actualizarDepartamento();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}