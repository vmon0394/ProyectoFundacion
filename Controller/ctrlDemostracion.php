<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libDemostracion.php';

$GLOBALS['objUsu'] = new libDemostracion();

switch ($opcion) {
    case '1':{
        $id = isset($_POST['id']) ? $_POST['id']: '0';
        
        $GLOBALS['objUsu']-> setId($id);
        $GLOBALS['objUsu']->registrarDemostracion();
        echo json_decode(array('res'=>$GLOBALS['objUsu']->getRespuesta(),'msg' => $GLOBALS['objUsu']->getMensaje()));
        break;
    }
}
