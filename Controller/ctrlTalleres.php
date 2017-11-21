<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libTalleres.php';

$GLOBALS['objUsu'] = new libTalleres();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar taller, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta.
    case '1': {

            $idSemillero = isset($_POST['semilleroTaller']) ? $_POST['semilleroTaller'] : "";
            $tipoTaller = isset($_POST['tipoTaller']) ? $_POST['tipoTaller'] : "";
            $nombreTaller = isset($_POST['nombreTaller']) ? $_POST['nombreTaller'] : "";
            $fechaTaller = isset($_POST['fechaTaller']) ? $_POST['fechaTaller'] : "";
            $idHabilidad = isset($_POST['idHabilidad']) ? $_POST['idHabilidad'] : "";
            $valorNuclear = isset($_POST['valorTaller']) ? $_POST['valorTaller'] : "";
            $actividadInicial = isset($_POST['actividadInicial']) ? $_POST['actividadInicial'] : "";
            $actividadCentral = isset($_POST['actividadCentral']) ? $_POST['actividadCentral'] : "";
            $actividadfinal = isset($_POST['actividadFinal']) ? $_POST['actividadFinal'] : "";
            $idTecnica = isset($_POST['tecnicaTaller']) ? $_POST['tecnicaTaller'] : "";
            $tipoActividad= isset($_POST['tipoActividad']) ? $_POST['tipoActividad'] : "";
            $estadoTaller = isset($_POST['estadoTaller']) ? $_POST['estadoTaller'] : "";
            $objetivo = isset($_POST['objetivoTaller']) ? $_POST['objetivoTaller'] : "";
            $descripcionDeActividades = isset($_POST['descripcionTaller']) ? $_POST['descripcionTaller'] : "";
            $logros = isset($_POST['logrosTaller']) ? $_POST['logrosTaller'] : "";
            $dificultades = isset($_POST['dificultadesTaller']) ? $_POST['dificultadesTaller'] : "";
            $recomendaciones = isset($_POST['recomendacionesTaller']) ? $_POST['recomendacionesTaller'] : "";
            $observacion = isset($_POST['observacionCancelacion']) ? $_POST['observacionCancelacion'] : "";

            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setTipoTaller($tipoTaller);
            $GLOBALS['objUsu']->setNombreTaller($nombreTaller);
            $GLOBALS['objUsu']->setFechaTaller($fechaTaller);
            $GLOBALS['objUsu']->setIdHabilidad($idHabilidad);
            $GLOBALS['objUsu']->setValorNuclear($valorNuclear);
            $GLOBALS['objUsu']->setActividadInicial($actividadInicial);
            $GLOBALS['objUsu']->setActividadCentral($actividadCentral);
            $GLOBALS['objUsu']->setActividadfinal($actividadfinal);
            $GLOBALS['objUsu']->setIdTecnica($idTecnica);
            $GLOBALS['objUsu']->setTipoActividad($tipoActividad);
            $GLOBALS['objUsu']->setEstadoTaller($estadoTaller);

            $fecha = isset($_POST['fechaTaller']) ? $_POST['fechaTaller'] : "";

            //Esta línea captura la fecha ingresada por el usuario del día que se realiza el taller, y al día de la fecha se le suman 8 días más 
            //para asignar la fecha límite para la actualización del registro.
            $fechaLimite = date('Y-m-d', strtotime("$fecha + 8 day"));

            $GLOBALS['objUsu']->setFechaLimite($fechaLimite);
            $GLOBALS['objUsu']->setObjetivo($objetivo);
            $GLOBALS['objUsu']->setDescripcionDeActividades($descripcionDeActividades);
            $GLOBALS['objUsu']->setLogros($logros);
            $GLOBALS['objUsu']->setDificultades($dificultades);
            $GLOBALS['objUsu']->setRecomendaciones($recomendaciones);            
            $GLOBALS['objUsu']->setObservacion($observacion);

            $GLOBALS['objUsu']->registrarTaller();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 2 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, en este caso 
    //el metodo consultar taller, este retorna un vector con toda la información del registro.
    case '2': {

            $idTaller = isset($_POST['idTaller']) ? $_POST['idTaller'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);

            $GLOBALS['objUsu']->consultarTaller();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar taller, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '3': {

            $idTaller = isset($_POST['idTaller']) ? $_POST['idTaller'] : "";
            $idSemillero = isset($_POST['semilleroTaller']) ? $_POST['semilleroTaller'] : "";
            $tipoTaller = isset($_POST['tipoTaller']) ? $_POST['tipoTaller'] : "";
            $nombreTaller = isset($_POST['nombreTaller']) ? $_POST['nombreTaller'] : "";
            $fechaTaller = isset($_POST['fechaTaller']) ? $_POST['fechaTaller'] : "";
            $idHabilidad = isset($_POST['idHabilidad']) ? $_POST['idHabilidad'] : "";
            $valorNuclear = isset($_POST['valorTaller']) ? $_POST['valorTaller'] : "";
            $actividadInicial = isset($_POST['actividadInicial']) ? $_POST['actividadInicial'] : "";
            $actividadCentral = isset($_POST['actividadCentral']) ? $_POST['actividadCentral'] : "";
            $actividadfinal = isset($_POST['actividadFinal']) ? $_POST['actividadFinal'] : "";
            $idTecnica = isset($_POST['tecnicaTaller']) ? $_POST['tecnicaTaller'] : "";
            $tipoActividad = isset($_POST['tipoActividad']) ? $_POST['tipoActividad'] : "";
            $estadoTaller = isset($_POST['estadoTaller']) ? $_POST['estadoTaller'] : "";
            $objetivo = isset($_POST['objetivoTaller']) ? $_POST['objetivoTaller'] : "";
            $descripcionDeActividades = isset($_POST['descripcionTaller']) ? $_POST['descripcionTaller'] : "";
            $logros = isset($_POST['logrosTaller']) ? $_POST['logrosTaller'] : "";
            $dificultades = isset($_POST['dificultadesTaller']) ? $_POST['dificultadesTaller'] : "";
            $recomendaciones = isset($_POST['recomendacionesTaller']) ? $_POST['recomendacionesTaller'] : "";
            $observacion = isset($_POST['observacionCancelacion']) ? $_POST['observacionCancelacion'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);
            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setTipoTaller($tipoTaller);
            $GLOBALS['objUsu']->setNombreTaller($nombreTaller);
            $GLOBALS['objUsu']->setFechaTaller($fechaTaller);
            $GLOBALS['objUsu']->setIdHabilidad($idHabilidad);
            $GLOBALS['objUsu']->setValorNuclear($valorNuclear);
            $GLOBALS['objUsu']->setActividadInicial($actividadInicial);
            $GLOBALS['objUsu']->setActividadCentral($actividadCentral);
            $GLOBALS['objUsu']->setActividadfinal($actividadfinal);
            $GLOBALS['objUsu']->setIdTecnica($idTecnica);
            $GLOBALS['objUsu']->setTipoActividad($tipoActividad);
            $GLOBALS['objUsu']->setEstadoTaller($estadoTaller);

//            $fecha = isset($_POST['fechaTaller']) ? $_POST['fechaTaller'] : "";

            //Esta línea captura la fecha ingresada por el usuario del día que se realiza el taller, y al día de la fecha se le suman 8 días más 
            //para asignar la fecha límite para la actualización del registro.
//            $fechaLimite = date('Y-m-d', strtotime("$fecha + 8 day"));

//            $GLOBALS['objUsu']->setFechaLimite($fechaLimite);
            $GLOBALS['objUsu']->setObjetivo($objetivo);
            $GLOBALS['objUsu']->setDescripcionDeActividades($descripcionDeActividades);
            $GLOBALS['objUsu']->setLogros($logros);
            $GLOBALS['objUsu']->setDificultades($dificultades);
            $GLOBALS['objUsu']->setRecomendaciones($recomendaciones);            
            $GLOBALS['objUsu']->setObservacion($observacion);

            $GLOBALS['objUsu']->actualizarTaller();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 4 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar taller, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '4': {

            $idTaller = isset($_POST['idTaller']) ? $_POST['idTaller'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);

            $GLOBALS['objUsu']->deshabilitarTaller();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar taller, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta. 
    case '5': {

            $idTaller = isset($_POST['idTaller']) ? $_POST['idTaller'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);

            $GLOBALS['objUsu']->habilitarTaller();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 6 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, en este caso 
    //el metodo consultar asistencia taller, este retorna un vector con toda la información de registro de la asistencia.
    case '6': {

            $idTaller = isset($_POST['taller']) ? $_POST['taller'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);

            $GLOBALS['objUsu']->consultarAsistencia();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 7 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método toma asistencia taller, y retorna una respuesta de ejecución y 
    //el mensaje correspondiente a las respuesta.
    case '7': {

            $idTaller = isset($_POST['idTallerA']) ? $_POST['idTallerA'] : "";
            $asistenciaTaller = isset($_POST['cadenaDeAsistencia']) ? $_POST['cadenaDeAsistencia'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);
            $GLOBALS['objUsu']->setAsistenciaTaller($asistenciaTaller);

            $GLOBALS['objUsu']->tomaAsistencia();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 8 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, en este caso 
    //el metodo habilitar fecha limite taller, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '8': {

            $idTaller = isset($_POST['idTaller']) ? $_POST['idTaller'] : "";
            $fechaLimite = isset($_POST['habilitarFechaLimiteTaller']) ? $_POST['habilitarFechaLimiteTaller'] : "";

            $GLOBALS['objUsu']->setIdTaller($idTaller);
            $GLOBALS['objUsu']->setFechaLimite($fechaLimite);

            $GLOBALS['objUsu']->habilitarFechaLimite();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}