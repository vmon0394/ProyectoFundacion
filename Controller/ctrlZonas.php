<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libZonas.php';

$GLOBALS['objUsu'] = new libZonas();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set a la 
    //librería y ejecutar el método llamado, en este caso el método registrar zona, y retorna una respuesta de ejecución y el mensaje correspondiente a 
    //las respuesta.
    case '1': {

            $nombreZona = isset($_POST['zona']) ? $_POST['zona'] : "";
            $idMunicipio = isset($_POST['municipio']) ? $_POST['municipio'] : "";

            $GLOBALS['objUsu']->setNombreZona(strtoupper(strtr($nombreZona, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdMunicipio($idMunicipio);

            $GLOBALS['objUsu']->registrarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el
    //metodo llamado, en este caso el metodo consultar zona, este retorna un vector con toda la información del registro.
    case '2': {

            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";

            $GLOBALS['objUsu']->setIdZona($idZona);

            $GLOBALS['objUsu']->consultarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set a la 
    //librería y ejecutar el método llamado, en este caso el método actualizar zona, y retorna una respuesta de ejecución y el mensaje correspondiente 
    //a las respuesta.
    case '3': {

            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";
            $nombreZona = isset($_POST['zona']) ? $_POST['zona'] : "";
            $idMunicipio = isset($_POST['municipio']) ? $_POST['municipio'] : "";

            $GLOBALS['objUsu']->setIdZona($idZona);
            $GLOBALS['objUsu']->setNombreZona(strtoupper(strtr($nombreZona, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdMunicipio($idMunicipio);

            $GLOBALS['objUsu']->actualizarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, 
    //en este caso deshabilitar zona, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '4': {

            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";

            $GLOBALS['objUsu']->setIdZona($idZona);

            $GLOBALS['objUsu']->deshabilitarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar zona, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta. 
    case '5': {

            $idZona = isset($_POST['idZona']) ? $_POST['idZona'] : "";

            $GLOBALS['objUsu']->setIdZona($idZona);

            $GLOBALS['objUsu']->habilitarZona();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}