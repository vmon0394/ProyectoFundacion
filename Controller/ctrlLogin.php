<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaSistema = date("Y-m-d");
//        $fechaSistema = date("Y");
$time = date("H:i");
$fechaHora = date("d-m-Y h:i:s A");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripslashes($_GET['opcion'])) : '0';
include_once("../Model/libLogin.php");

$GLOBALS['objUsu'] = new libLogin();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método login, y retorna una respuesta de ejecución y el mensaje correspondiente 
    //a las respuesta; según el tipo de perfil que se retorna en la respuesta es direccionado a su correspondientes interfaces.
    case '1': {

            $usuario = isset($_POST['user']) ? $_POST['user'] : ".co";
            $contrasena = isset($_POST['password']) ? $_POST['password'] : "";

            $GLOBALS['objUsu']->setUsuario($usuario);
            $GLOBALS['objUsu']->setContrasena($contrasena);

            $GLOBALS['objUsu']->login();
            $resultado = $GLOBALS['objUsu']->getMensaje();

            if ($resultado == "SuperAdministrador") {
                $GLOBALS['objUsu']->registrarUltimoIngreso($_SESSION["idUsuario"], $fechaHora);
                echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'exito' => 'SuperAdministrador/usuarios.php'));
            } else if ($resultado == "Administrador") {
                $GLOBALS['objUsu']->registrarUltimoIngreso($_SESSION["idUsuario"], $fechaHora);
                echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'exito' => 'Administrador/usuarios.php'));
            } else if ($resultado == "Comunicaciones") {
                $GLOBALS['objUsu']->registrarUltimoIngreso($_SESSION["idUsuario"], $fechaHora);
                echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'exito' => 'Comunicaciones/semilleros.php'));
            } else if ($resultado == "Facilitador") {
                $GLOBALS['objUsu']->registrarUltimoIngreso($_SESSION["idUsuario"], $fechaHora);
                echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'exito' => 'Facilitador/semilleros.php'));
            } else if ($resultado == "Psicólogo") {
                $GLOBALS['objUsu']->registrarUltimoIngreso($_SESSION["idUsuario"], $fechaHora);
                echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'exito' => 'Psicologo/semillerosPsico.php'));
            } else if ($resultado == "Ajedrez") {
                $GLOBALS['objUsu']->registrarUltimoIngreso($_SESSION["idUsuario"], $fechaHora);
                echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'exito' => 'Ajedrez/actividadesLaboratorio.php'));
            } else {
                echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            }
            break;
        }
}