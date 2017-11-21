<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaSistema = date("Y-m-d");
//        $fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libUsuarios.php';

$GLOBALS['objUsu'] = new libUsuarios();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar usuario, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $documento = isset($_POST['documento']) ? $_POST['documento'] : "";
            $nombres = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $apellidos = isset($_POST['apellido']) ? $_POST['apellido'] : "";
            $celularEmpleado = isset($_POST['celular']) ? $_POST['celular'] : "";
            $correoEmpleado = isset($_POST['email']) ? $_POST['email'] : "";
            $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
            $fechaDeIngreso = $fechaSistema;
            $tarjetaProfecional = isset($_POST['tarjeta']) ? $_POST['tarjeta'] : "";
           
            $GLOBALS['objUsu']->setDocumento($documento);
            $GLOBALS['objUsu']->setNombres(ucwords($nombres));
            $GLOBALS['objUsu']->setApellidos(ucwords($apellidos));
            $GLOBALS['objUsu']->setCelularEmpleado($celularEmpleado);
            $GLOBALS['objUsu']->setCorreoEmpleado($correoEmpleado);
            $GLOBALS['objUsu']->setCargo($cargo);
            $GLOBALS['objUsu']->setFechaDeIngreso($fechaDeIngreso);
            $GLOBALS['objUsu']->setTarjetaProfecional($tarjetaProfecional);

            $GLOBALS['objUsu']->registrarUsuario();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar usuario, este retorna un vector con toda la información del registro.
    case '2': {

            $idEmpleado = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";

            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->consultarUsuario();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar usuario, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $idEmpleado = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";
            $documento = isset($_POST['documento']) ? $_POST['documento'] : "";
            $nombres = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $apellidos = isset($_POST['apellido']) ? $_POST['apellido'] : "";
            $celularEmpleado = isset($_POST['celular']) ? $_POST['celular'] : "";
            $correoEmpleado = isset($_POST['email']) ? $_POST['email'] : "";
            $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
            $tarjetaProfecional = isset($_POST['tarjeta']) ? $_POST['tarjeta'] : "";

            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);
            $GLOBALS['objUsu']->setDocumento($documento);
            $GLOBALS['objUsu']->setNombres(ucwords($nombres));
            $GLOBALS['objUsu']->setApellidos(ucwords($apellidos));
            $GLOBALS['objUsu']->setCelularEmpleado($celularEmpleado);
            $GLOBALS['objUsu']->setCorreoEmpleado($correoEmpleado);
            $GLOBALS['objUsu']->setCargo($cargo);
            $GLOBALS['objUsu']->setTarjetaProfecional($tarjetaProfecional);

            $GLOBALS['objUsu']->actualizarUsuario();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar usuario, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idEmpleado = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";

            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->deshabilitarUsuario();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar usuario, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idEmpleado = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";

            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->habilitarUsuario();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 6 del controlador recibe el id del registro, este es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso el método restablecer usuario, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '6': {

            $idEmpleado = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";

            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->restablecerUsuario();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}