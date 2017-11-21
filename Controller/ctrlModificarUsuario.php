<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripslashes($_GET['opcion'])) : '0';
include_once("../Model/libModificarUsuario.php");

$GLOBALS['objUsu'] = new libModificarUsuario();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método modificar usuario, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta.  
    case '1': {

            $idUsuario = $_SESSION["idUsuario"];
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
            $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "";

            $GLOBALS['objUsu']->setIdUsuario($idUsuario);
            $GLOBALS['objUsu']->setUsuario($usuario);
            $GLOBALS['objUsu']->setContrasena($contrasena);

            $GLOBALS['objUsu']->modificarUsuario();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método modificar contraseña, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta.  
    case '2': {

            $idUsuario = $_SESSION["idUsuario"];
            $contrasena = isset($_POST['contrasena2']) ? $_POST['contrasena2'] : "";
            $nuevaContrasena = isset($_POST['nuevaContrasena']) ? $_POST['nuevaContrasena'] : "";

            $GLOBALS['objUsu']->setIdUsuario($idUsuario);
            $GLOBALS['objUsu']->setContrasena($contrasena);
            $GLOBALS['objUsu']->setNuevaContrasena($nuevaContrasena);

            $GLOBALS['objUsu']->modificarContrasena();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}