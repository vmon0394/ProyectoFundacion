<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaSistema = date("Y-m-d");
//        $fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libUsuariosLaboratorio.php';

$GLOBALS['objUsu'] = new libUsuariosLaboratorio();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar usuario, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {
        
            $servicios = '';
            if (isset($_POST['servicios']) ? $_POST['servicios'] : ""){
              $servicios = implode(';', $_POST['servicios']);
            }
            
            $tipoRegistro = isset($_POST['tipoRegistro']) ? $_POST['tipoRegistro'] : "";
            $documento = isset($_POST['documento']) ? $_POST['documento'] : "";
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
            $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $acudiente = isset($_POST['acudiente']) ? $_POST['acudiente'] : "";
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
            $institucion = isset($_POST['institucion']) ? $_POST['institucion'] : "";
            $semillero = isset($_POST['semillero']) ? $_POST['semillero'] : "";
     
            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setDocumento($documento);
            $GLOBALS['objUsu']->setNombre($nombre);
            $GLOBALS['objUsu']->setApellido($apellido);
            $GLOBALS['objUsu']->setEdad($edad);
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setCelular($celular);
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setAcudiente($acudiente);
            $GLOBALS['objUsu']->setDireccion($direccion);
            $GLOBALS['objUsu']->setInstitucion($institucion);
            $GLOBALS['objUsu']->setIdSemillero($semillero);
            $GLOBALS['objUsu']->setIdServicio($servicios);

            $GLOBALS['objUsu']->registrarUsuarioLaboratorio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar usuario, este retorna un vector con toda la información del registro.
    case '2': {

            $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";

            $GLOBALS['objUsu']->setIdUsuario($idUsuario);

            $GLOBALS['objUsu']->consultarUsuarioLaboratorio();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar usuario, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '3': {
        
            $servicios = '';
            if (isset($_POST['servicios']) ? $_POST['servicios'] : ""){
              $servicios = implode(';', $_POST['servicios']);
            }
            
            $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";
            $tipoRegistro = isset($_POST['tipoRegistro']) ? $_POST['tipoRegistro'] : "";
            $documento = isset($_POST['documento']) ? $_POST['documento'] : "";
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
            $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $acudiente = isset($_POST['acudiente']) ? $_POST['acudiente'] : "";
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
            $institucion = isset($_POST['institucion']) ? $_POST['institucion'] : "";
            $semillero = isset($_POST['semillero']) ? $_POST['semillero'] : "";
            $servicios = isset($_POST['servicios']) ? $_POST['servicios'] : "";
            
            $GLOBALS['objUsu']->setIdUsuario($idUsuario);
            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setDocumento($documento);
            $GLOBALS['objUsu']->setNombre($nombre);
            $GLOBALS['objUsu']->setApellido($apellido);
            $GLOBALS['objUsu']->setEdad($edad);
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setCelular($celular);
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setAcudiente($acudiente);
            $GLOBALS['objUsu']->setDireccion($direccion);
            $GLOBALS['objUsu']->setInstitucion($institucion);
            $GLOBALS['objUsu']->setIdSemillero($semillero);
            $GLOBALS['objUsu']->setIdServicio($servicios);

            $GLOBALS['objUsu']->actualizarUsuarioLaboratorio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar usuario, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '4': {

            $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";

            $GLOBALS['objUsu']->setIdUsuario($idUsuario);

            $GLOBALS['objUsu']->deshabilitarUsuarioLaboratorio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar usuario, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '5': {

            $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";

            $GLOBALS['objUsu']->setIdUsuario($idUsuario);

            $GLOBALS['objUsu']->habilitarUsuarioLaboratorio();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 6 del controlador recibe el id del registro, este es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso el método restablecer usuario, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '6': {

            $idEmpleado = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";

            $GLOBALS['objUsu']->setIdEmpleado($idEmpleado);

            $GLOBALS['objUsu']->restablecerUsuario();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}