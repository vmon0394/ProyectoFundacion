<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libTestimonios.php';

$GLOBALS['objUsu'] = new libTestimonios();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar testimonio, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {

            $idTaller = isset($_POST['tallerTestimonio']) ? $_POST['tallerTestimonio'] : "";
            $testimonio = isset($_POST['Testimonio']) ? $_POST['Testimonio'] : "";
            $idEmpleado = $_SESSION["idUsuario"];
            $anoRegistro = $fechaSistema;

            $GLOBALS['objUsu']->setIdTaller($idTaller);
            $GLOBALS['objUsu']->setTestimonio(strtoupper(strtr($testimonio, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);
            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->registrarTestimonio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar testimonio, este retorna un vector con toda la información del registro.
    case '2': {

            $id_testimonio = isset($_POST['idTestimonio']) ? $_POST['idTestimonio'] : "";

            $GLOBALS['objUsu']->setId_testimonio($id_testimonio);

            $GLOBALS['objUsu']->consultarTestimonio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar testimonio, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta.  
    case '3': {


            $id_testimonio = isset($_POST['idTestimonio']) ? $_POST['idTestimonio'] : "";
            $idTaller = isset($_POST['tallerTestimonio']) ? $_POST['tallerTestimonio'] : "";
            $testimonio = isset($_POST['Testimonio']) ? $_POST['Testimonio'] : "";
            $idEmpleado = $_SESSION["idUsuario"];

            $GLOBALS['objUsu']->setId_testimonio($id_testimonio);
            $GLOBALS['objUsu']->setIdTaller($idTaller);
            $GLOBALS['objUsu']->setTestimonio(strtoupper(strtr($testimonio, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->actualizarTestimonio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

}