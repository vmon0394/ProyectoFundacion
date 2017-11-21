<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libAliados.php';

$GLOBALS['objUsu'] = new libAliados();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar aliado, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $nit = isset($_POST['nit']) ? $_POST['nit'] : "";
            $nombreAliados = isset($_POST['aliado']) ? $_POST['aliado'] : "";
            $idMunicipio = isset($_POST['municipio']) ? $_POST['municipio'] : "";
            $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : "";
            $telefonoAliados = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $celularAliados = isset($_POST['celular']) ? $_POST['celular'] : "";
            $direccionAliados = isset($_POST['direccion']) ? $_POST['direccion'] : "";
            $correoAliados = isset($_POST['email']) ? $_POST['email'] : "";
            $idProyecto = isset($_POST['proyecto']) ? $_POST['proyecto'] : "";

            $GLOBALS['objUsu']->setNit($nit);
            $GLOBALS['objUsu']->setNombreAliados(strtoupper(strtr($nombreAliados, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdMunicipio($idMunicipio);
            $GLOBALS['objUsu']->setContacto(strtoupper(strtr($contacto, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoAliados($telefonoAliados);
            $GLOBALS['objUsu']->setCelularAliados($celularAliados);
            $GLOBALS['objUsu']->setDireccionAliados(strtoupper($direccionAliados));
            $GLOBALS['objUsu']->setCorreoAliados($correoAliados);
            $GLOBALS['objUsu']->setIdProyecto($idProyecto);

            $GLOBALS['objUsu']->registrarAliado();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar aliado, este retorna un vector con toda la información del registro.
    case '2': {

            $idAliado = isset($_POST['idAliado']) ? $_POST['idAliado'] : "";

            $GLOBALS['objUsu']->setIdAliado($idAliado);

            $GLOBALS['objUsu']->consultarAliado();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar aliado, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $idAliado = isset($_POST['idAliado']) ? $_POST['idAliado'] : "";
            $nit = isset($_POST['nit']) ? $_POST['nit'] : "";
            $nombreAliados = isset($_POST['aliado']) ? $_POST['aliado'] : "";
            $idMunicipio = isset($_POST['municipio']) ? $_POST['municipio'] : "";
            $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : "";
            $telefonoAliados = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $celularAliados = isset($_POST['celular']) ? $_POST['celular'] : "";
            $direccionAliados = isset($_POST['direccion']) ? $_POST['direccion'] : "";
            $correoAliados = isset($_POST['email']) ? $_POST['email'] : "";
            $idProyecto = isset($_POST['proyecto']) ? $_POST['proyecto'] : "";

            $GLOBALS['objUsu']->setIdAliado($idAliado);
            $GLOBALS['objUsu']->setNit($nit);
            $GLOBALS['objUsu']->setNombreAliados(strtoupper(strtr($nombreAliados, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdMunicipio($idMunicipio);
            $GLOBALS['objUsu']->setContacto(strtoupper(strtr($contacto, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoAliados($telefonoAliados);
            $GLOBALS['objUsu']->setCelularAliados($celularAliados);
            $GLOBALS['objUsu']->setDireccionAliados(strtoupper($direccionAliados));
            $GLOBALS['objUsu']->setCorreoAliados($correoAliados);
            $GLOBALS['objUsu']->setIdProyecto($idProyecto);

            $GLOBALS['objUsu']->actualizarAliado();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar aliado, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idAliado = isset($_POST['idAliado']) ? $_POST['idAliado'] : "";

            $GLOBALS['objUsu']->setIdAliado($idAliado);

            $GLOBALS['objUsu']->deshabilitarAliado();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar aliado, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idAliado = isset($_POST['idAliado']) ? $_POST['idAliado'] : "";

            $GLOBALS['objUsu']->setIdAliado($idAliado);

            $GLOBALS['objUsu']->habilitarAliado();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}