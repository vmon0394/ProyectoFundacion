<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaSistema = date("Y-m-d");
//        $fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libPadrinos.php';

$GLOBALS['objUsu'] = new libPadrinos();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar padrino, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $documento_padrino = isset($_POST['documento']) ? $_POST['documento'] : "";
            $nombres_padrino = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $apellidos_padrino = isset($_POST['apellido']) ? $_POST['apellido'] : "";
            $telefono_padrino = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $celular_padrino = isset($_POST['celular']) ? $_POST['celular'] : "";
            $email_padrino = isset($_POST['email']) ? $_POST['email'] : "";
            $idCompania = isset($_POST['compania']) ? $_POST['compania'] : "";
            $sede = isset($_POST['sede']) ? $_POST['sede'] : "";
            $idCiudadCompania = isset($_POST['ciudadCompania']) ? $_POST['ciudadCompania'] : "";
            $aporte_quincenal = isset($_POST['aporte']) ? $_POST['aporte'] : "";
            $fecha_autorizacion = isset($_POST['fechaAutorizacion']) ? $_POST['fechaAutorizacion'] : "";

            $GLOBALS['objUsu']->setDocumento_padrino($documento_padrino);
            $GLOBALS['objUsu']->setNombres_padrino(strtoupper(strtr($nombres_padrino, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidos_padrino(strtoupper(strtr($apellidos_padrino, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefono_padrino($telefono_padrino);
            $GLOBALS['objUsu']->setCelular_padrino($celular_padrino);  
            $GLOBALS['objUsu']->setEmail_padrino($email_padrino);
            $GLOBALS['objUsu']->setIdCompania($idCompania);
            $GLOBALS['objUsu']->setSede(strtoupper(strtr($sede, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdCiudadCompania($idCiudadCompania);
            $GLOBALS['objUsu']->setAporte_quincenal($aporte_quincenal);
            $GLOBALS['objUsu']->setFecha_autorizacion($fecha_autorizacion);

            $GLOBALS['objUsu']->registrarPadrino();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar padrino, este retorna un vector con toda la información del registro.
    case '2': {

            $id_Padrino = isset($_POST['idPadrino']) ? $_POST['idPadrino'] : "";

            $GLOBALS['objUsu']->setId_Padrino($id_Padrino);

            $GLOBALS['objUsu']->consultarPadrino();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar padrino, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $id_Padrino = isset($_POST['idPadrino']) ? $_POST['idPadrino'] : "";
            $documento_padrino = isset($_POST['documento']) ? $_POST['documento'] : "";
            $nombres_padrino = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $apellidos_padrino = isset($_POST['apellido']) ? $_POST['apellido'] : "";
            $telefono_padrino = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $celular_padrino = isset($_POST['celular']) ? $_POST['celular'] : "";
            $email_padrino = isset($_POST['email']) ? $_POST['email'] : "";
            $idCompania = isset($_POST['compania']) ? $_POST['compania'] : "";
            $sede = isset($_POST['sede']) ? $_POST['sede'] : "";
            $idCiudadCompania = isset($_POST['ciudadCompania']) ? $_POST['ciudadCompania'] : "";
            $aporte_quincenal = isset($_POST['aporte']) ? $_POST['aporte'] : "";
            $fecha_autorizacion = isset($_POST['fechaAutorizacion']) ? $_POST['fechaAutorizacion'] : "";

            $GLOBALS['objUsu']->setId_Padrino($id_Padrino);
            $GLOBALS['objUsu']->setDocumento_padrino($documento_padrino);
            $GLOBALS['objUsu']->setNombres_padrino(strtoupper(strtr($nombres_padrino, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidos_padrino(strtoupper(strtr($apellidos_padrino, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefono_padrino($telefono_padrino);
            $GLOBALS['objUsu']->setCelular_padrino($celular_padrino);  
            $GLOBALS['objUsu']->setEmail_padrino($email_padrino);
            $GLOBALS['objUsu']->setIdCompania($idCompania);
            $GLOBALS['objUsu']->setSede(strtoupper(strtr($sede, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdCiudadCompania($idCiudadCompania);
            $GLOBALS['objUsu']->setAporte_quincenal($aporte_quincenal);
            $GLOBALS['objUsu']->setFecha_autorizacion($fecha_autorizacion);

            $GLOBALS['objUsu']->actualizarPadrino();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar padrino, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $id_Padrino = isset($_POST['idPadrino']) ? $_POST['idPadrino'] : "";

            $GLOBALS['objUsu']->setId_Padrino($id_Padrino);

            $GLOBALS['objUsu']->deshabilitarPadrino();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar padrino, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $id_Padrino = isset($_POST['idPadrino']) ? $_POST['idPadrino'] : "";

            $GLOBALS['objUsu']->setId_Padrino($id_Padrino);

            $GLOBALS['objUsu']->habilitarPadrino();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

}