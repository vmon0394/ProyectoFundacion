<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaSistema = date("Y-m-d");
$anoSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libMovPadrinosFichas.php';

$GLOBALS['objUsu'] = new libMovPadrinosFichas();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar asignación padrino, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $idPadrino = isset($_POST['padrinos']) ? $_POST['padrinos'] : "";
            $idFicha = isset($_POST['participante']) ? $_POST['participante'] : "";

            $GLOBALS['objUsu']->setIdPadrino($idPadrino);
            $GLOBALS['objUsu']->setIdFicha($idFicha);

            $GLOBALS['objUsu']->registrarAsignacionPadrino();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar asignación padrino, este retorna un vector con toda la información del registro.
    case '2': {

            $id_mov_padrino_ficha = isset($_POST['idMovPadrinoFicha']) ? $_POST['idMovPadrinoFicha'] : "";

            $GLOBALS['objUsu']->setId_mov_padrino_ficha($id_mov_padrino_ficha);

            $GLOBALS['objUsu']->consultarAsignacionPadrino();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar asignación padrino, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $id_mov_padrino_ficha = isset($_POST['idMovPadrinoFicha']) ? $_POST['idMovPadrinoFicha'] : "";
            $idPadrino = isset($_POST['padrinos']) ? $_POST['padrinos'] : "";
            $idFicha = isset($_POST['participante']) ? $_POST['participante'] : "";

            $GLOBALS['objUsu']->setId_mov_padrino_ficha($id_mov_padrino_ficha);
            $GLOBALS['objUsu']->setIdPadrino($idPadrino);
            $GLOBALS['objUsu']->setIdFicha($idFicha);

            $GLOBALS['objUsu']->actualizarAsignacionPadrino();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}