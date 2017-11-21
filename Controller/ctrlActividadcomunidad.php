<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaSistema = date("Y-m-d");
//        $fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libActividadescomuni.php';

$GLOBALS['objUsu'] = new libactividades();

switch ($opcion) {

	case '1': {

		$info_actividad = isset($_POST['informacion_actividad']) ? $_POST['informacion_actividad'] : "";
		$actividad_comu	= isset($_POST['actividad_comunitaria']) ? $_POST['actividad_comunitaria'] : "";
		$acompanamiento	= isset($_POST['acompanamiento']) ? $_POST['acompanamiento'] : "";
		$visita_institu	= isset($_POST['visita_institucion']) ? $_POST['visita_institucion'] : "";

		$GLOBALS['objUsu']->setinfo_actividad($info_actividad);
		$GLOBALS['objUsu']->setactividad_comu($actividad_comu);
		$GLOBALS['objUsu']->setacompanamiento($acompanamiento);
		$GLOBALS['objUsu']->setvisita_institu($visita_institu);

		$GLOBALS['objUsu']->registraractivi();
		echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
        break;
	}
}

?>