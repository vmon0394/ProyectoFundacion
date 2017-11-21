<?php

session_start();

$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libTecnicas.php';

$GLOBALS['objUsu'] = new libTecnicas();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar técnica, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {

            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);
            $nombreTecnica = isset($_POST['tecnica']) ? $_POST['tecnica'] : "";
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $idHabilidad = isset($_POST['habilidad']) ? $_POST['habilidad'] : "";
            $idEmpleado = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);
            $GLOBALS['objUsu']->setNombreTecnica($nombreTecnica);
            $GLOBALS['objUsu']->setValor($valor);
            $GLOBALS['objUsu']->setIdHabilidad($idHabilidad);
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->cargarTecnica();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar técnica, este retorna un vector con toda la información del registro.
    case '2': {

            $idTecnica = isset($_POST['idTecnica']) ? $_POST['idTecnica'] : "";

            $GLOBALS['objUsu']->setIdTecnica($idTecnica);

            $GLOBALS['objUsu']->consultarTecnica();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método modificar técnica, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $idTecnica = isset($_POST['idTecnica']) ? $_POST['idTecnica'] : "";
            $fileName = $_FILES["file"]["name"];
            $tamano = intval($_FILES["file"]['size']);
            $tipo = $_FILES["file"]['type'];
            $extension = explode('.', $_FILES['file']['name']);
            $nombreTecnica = isset($_POST['tecnica']) ? $_POST['tecnica'] : "";
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $idHabilidad = isset($_POST['habilidad']) ? $_POST['habilidad'] : "";
            $idEmpleado = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setIdTecnica($idTecnica);
            $GLOBALS['objUsu']->setFileName($fileName);
            $GLOBALS['objUsu']->setTamano($tamano);
            $GLOBALS['objUsu']->setTipo($tipo);
            $GLOBALS['objUsu']->setExtension($extension);
            $GLOBALS['objUsu']->setNombreTecnica($nombreTecnica);
            $GLOBALS['objUsu']->setValor($valor);
            $GLOBALS['objUsu']->setIdHabilidad($idHabilidad);
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->modificarTecnica();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //eliminar técnica, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '4': {

            $idTecnica = isset($_POST['idTecnica']) ? $_POST['idTecnica'] : "";

            $GLOBALS['objUsu']->setIdTecnica($idTecnica);

            $GLOBALS['objUsu']->eliminarTecnica();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}