<?php 

session_start();

date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libPresupuestoForm.php';

$GLOBALS['objUsu'] = new libPresupuestoForm();


//El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
 //a la librería y ejecutar el método llamado, en este caso el método resgistrar presupuesto, y retorna una respuesta de ejecución y 
//el mensaje correspondiente a la respuesta.
switch ($opcion) {

	case '1': {

		$Id = isset($_POST['Id']) ? $_POST['Id'] : "";
        $Rubro = isset($_POST['Rubro']) ? $_POST['Rubro'] : "";
        $Descripcion = isset($_POST['Descripcion']) ? $_POST['Descripcion'] : "";
        $Tiempo = isset($_POST['Tiempo']) ? $_POST['Tiempo'] : "";

        $GLOBALS['objUsu']->setId($Id);
        $GLOBALS['objUsu']->setRubro($Rubro);
        $GLOBALS['objUsu']->setDescripcion($Descripcion);
        $GLOBALS['objUsu']->setTiempo($Tiempo);

        $GLOBALS['objUsu']->registrarPresupuesto();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
		break;

	}
}

?>