<?php

session_start();

date_default_timezone_set('America/Bogota');
$fechaSistema = date("Y-m-d");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libSemilleros.php';

$GLOBALS['objUsu'] = new libSemilleros();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar semillero, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '1': {

            $nombreSemillero = isset($_POST['semillero']) ? $_POST['semillero'] : "";
            $idProfesor = isset($_POST['facilitador']) ? $_POST['facilitador'] : "";
            $idPsicologo = isset($_POST['psicologo']) ? $_POST['psicologo'] : "";
            $idCategoria = isset($_POST['categoria']) ? $_POST['categoria'] : "";
            $idZona = isset($_POST['zona']) ? $_POST['zona'] : "";
            $idProyecto = isset($_POST['proyecto']) ? $_POST['proyecto'] : "";
            $comuna = isset($_POST['comuna']) ? $_POST['comuna'] : "";
            $barrio = isset($_POST['barrio']) ? $_POST['barrio'] : "";
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
            $organizacion = isset($_POST['organizacion']) ? $_POST['organizacion'] : "";
            $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : "";
            $emailContacto = isset($_POST['emailContacto']) ? $_POST['emailContacto'] : "";
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $idHabilidad = isset($_POST['habilidad']) ? $_POST['habilidad'] : "";
            $aliado1 = isset($_POST['aliado1']) ? $_POST['aliado1'] : "";
            $aliado2 = isset($_POST['aliado2']) ? $_POST['aliado2'] : "";
            $aliado3 = isset($_POST['aliado3']) ? $_POST['aliado3'] : "";
            $ano = $fechaSistema;

            $GLOBALS['objUsu']->setNombreSemillero(strtoupper(strtr($nombreSemillero, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdProfesor($idProfesor);
            $GLOBALS['objUsu']->setIdPsicologo($idPsicologo);
            $GLOBALS['objUsu']->setIdCategoria($idCategoria);
            $GLOBALS['objUsu']->setIdZona($idZona);
            $GLOBALS['objUsu']->setIdProyecto($idProyecto);
            $GLOBALS['objUsu']->setComuna($comuna);
            $GLOBALS['objUsu']->setBarrio(strtoupper($barrio));
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setOrganizacion(strtoupper(strtr($organizacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setContacto(strtoupper(strtr($contacto, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setEmailContacto($emailContacto);
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setIdHabilidad($idHabilidad);
            $GLOBALS['objUsu']->setAliado1($aliado1);
            $GLOBALS['objUsu']->setAliado2($aliado2);
            $GLOBALS['objUsu']->setAliado3($aliado3);
            $GLOBALS['objUsu']->setAno($fechaSistema);
            $GLOBALS['objUsu']->setAno($ano);

            $GLOBALS['objUsu']->registrarSemillero();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar semillero, este retorna un vector con toda la información del registro.
    case '2': {

            $idSemillero = isset($_POST['idSemillero']) ? $_POST['idSemillero'] : "";

            $GLOBALS['objUsu']->setIdSemillero($idSemillero);

            $GLOBALS['objUsu']->consultarSemillero();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar semillero, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a las respuesta. 
    case '3': {

            $idSemillero = isset($_POST['idSemillero']) ? $_POST['idSemillero'] : "";
            $nombreSemillero = isset($_POST['semillero']) ? $_POST['semillero'] : "";
            $idProfesor = isset($_POST['facilitador']) ? $_POST['facilitador'] : "";
            $idPsicologo = isset($_POST['psicologo']) ? $_POST['psicologo'] : "";
            $idCategoria = isset($_POST['categoria']) ? $_POST['categoria'] : "";
            $idZona = isset($_POST['zona']) ? $_POST['zona'] : "";
            $idProyecto = isset($_POST['proyecto']) ? $_POST['proyecto'] : "";
            $comuna = isset($_POST['comuna']) ? $_POST['comuna'] : "";
            $barrio = isset($_POST['barrio']) ? $_POST['barrio'] : "";
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
            $organizacion = isset($_POST['organizacion']) ? $_POST['organizacion'] : "";
            $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : "";
            $emailContacto = isset($_POST['emailContacto']) ? $_POST['emailContacto'] : "";
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
            $idHabilidad = isset($_POST['habilidad']) ? $_POST['habilidad'] : "";
            $aliado1 = isset($_POST['aliado1']) ? $_POST['aliado1'] : "";
            $aliado2 = isset($_POST['aliado2']) ? $_POST['aliado2'] : "";
            $aliado3 = isset($_POST['aliado3']) ? $_POST['aliado3'] : "";
            $ano = $fechaSistema;

            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setNombreSemillero(strtoupper(strtr($nombreSemillero, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdProfesor($idProfesor);
            $GLOBALS['objUsu']->setIdPsicologo($idPsicologo);
            $GLOBALS['objUsu']->setIdCategoria($idCategoria);
            $GLOBALS['objUsu']->setIdZona($idZona);
            $GLOBALS['objUsu']->setIdProyecto($idProyecto);
            $GLOBALS['objUsu']->setComuna($comuna);
            $GLOBALS['objUsu']->setBarrio(strtoupper($barrio));
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setOrganizacion(strtoupper(strtr($organizacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setContacto(strtoupper(strtr($contacto, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setEmailContacto($emailContacto);
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setIdHabilidad($idHabilidad);            
            $GLOBALS['objUsu']->setAliado1($aliado1);
            $GLOBALS['objUsu']->setAliado2($aliado2);
            $GLOBALS['objUsu']->setAliado3($aliado3);
            $GLOBALS['objUsu']->setAno($ano);

            $GLOBALS['objUsu']->actualizarSemillero();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar semillero, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '4': {

            $idSemillero = isset($_POST['idSemillero']) ? $_POST['idSemillero'] : "";

            $GLOBALS['objUsu']->setIdSemillero($idSemillero);

            $GLOBALS['objUsu']->deshabilitarSemillero();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar semillero, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta. 
    case '5': {

            $idSemillero = isset($_POST['idSemillero']) ? $_POST['idSemillero'] : "";

            $GLOBALS['objUsu']->setIdSemillero($idSemillero);

            $GLOBALS['objUsu']->habilitarSemillero();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}