<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libOrganizaciones.php';

$GLOBALS['objUsu'] = new libOrganizaciones();

switch ($opcion){

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar organizacion, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $nombreOrganizacion = isset($_POST['organizacion']) ? $_POST['organizacion'] : "";
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
            $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : "";
            $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $contacto2 = isset($_POST['contacto2']) ? $_POST['contacto2'] : "";
            $cargo2 = isset($_POST['cargo2']) ? $_POST['cargo2'] : "";
            $telefono2 = isset($_POST['telefono2']) ? $_POST['telefono2'] : "";
            $celular2 = isset($_POST['celular2']) ? $_POST['celular2'] : "";
            $email2 = isset($_POST['email2']) ? $_POST['email2'] : "";

            $GLOBALS['objUsu']->setNombreOrganizacion(strtoupper(strtr($nombreOrganizacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setDireccion($direccion);
            $GLOBALS['objUsu']->setContacto(strtoupper(strtr($contacto, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setCargo($cargo);
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setCelular($celular);
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setContacto2(strtoupper(strtr($contacto2, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setCargo2($cargo2);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setCelular2($celular2);
            $GLOBALS['objUsu']->setEmail2($email2);

            $GLOBALS['objUsu']->registrarOrganizacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar organizacion, este retorna un vector con toda la información del registro.
    case '2': {

            $idOrganizacion = isset($_POST['idOrganizacion']) ? $_POST['idOrganizacion'] : "";

            $GLOBALS['objUsu']->setIdOrganizacion($idOrganizacion);

            $GLOBALS['objUsu']->consultarOrganizacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar organización, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {

            $idOrganizacion = isset($_POST['idOrganizacion']) ? $_POST['idOrganizacion'] : "";
            $nombreOrganizacion = isset($_POST['organizacion']) ? $_POST['organizacion'] : "";
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
            $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : "";
            $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $contacto2 = isset($_POST['contacto2']) ? $_POST['contacto2'] : "";
            $cargo2 = isset($_POST['cargo2']) ? $_POST['cargo2'] : "";
            $telefono2 = isset($_POST['telefono2']) ? $_POST['telefono2'] : "";
            $celular2 = isset($_POST['celular2']) ? $_POST['celular2'] : "";
            $email2 = isset($_POST['email2']) ? $_POST['email2'] : "";

            $GLOBALS['objUsu']->setIdOrganizacion($idOrganizacion);
            $GLOBALS['objUsu']->setNombreOrganizacion(strtoupper(strtr($nombreOrganizacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setDireccion($direccion);
            $GLOBALS['objUsu']->setContacto(strtoupper(strtr($contacto, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setCargo($cargo);
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setCelular($celular);
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setContacto2(strtoupper(strtr($contacto2, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setCargo2($cargo2);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setCelular2($celular2);
            $GLOBALS['objUsu']->setEmail2($email2);

            $GLOBALS['objUsu']->actualizarOrganizacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar organización, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idOrganizacion = isset($_POST['idOrganizacion']) ? $_POST['idOrganizacion'] : "";

            $GLOBALS['objUsu']->setIdOrganizacion($idOrganizacion);

            $GLOBALS['objUsu']->deshabilitarOrganizacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar organización, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idOrganizacion = isset($_POST['idOrganizacion']) ? $_POST['idOrganizacion'] : "";

            $GLOBALS['objUsu']->setIdOrganizacion($idOrganizacion);

            $GLOBALS['objUsu']->habilitarOrganizacion();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}
?>