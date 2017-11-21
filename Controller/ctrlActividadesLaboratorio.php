<?php

session_start();

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libActividadesLaboratorio.php';

$GLOBALS['objUsu'] = new libActividades();

switch ($opcion) {
    
    case '1':{
        
            $idServicio = isset($_POST['idServicio']) ? $_POST['idServicio'] : "";
            $nombreActividad = isset($_POST['nombreActividad']) ? $_POST['nombreActividad'] : "";
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
            $idValor = isset($_POST['idValor']) ? $_POST['idValor'] : "";
            $hora = isset($_POST['hora']) ? $_POST['hora'] : "";
            $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            $asistenciaActividad = isset($_POST['asistencia']) ? $_POST['asistencia'] : "";
            $objetivo = isset($_POST['objetivo']) ? $_POST['objetivo'] : "";
            $logros = isset($_POST['logros']) ? $_POST['logros'] : "";
            $dificultades = isset($_POST['dificultades']) ? $_POST['dificultades'] : "";
            $recomendaciones = isset($_POST['recomendaciones']) ? $_POST['recomendaciones'] : "";
            $testimonios = isset($_POST['testimonios']) ? $_POST['testimonios'] : "";
            $alertas = isset($_POST['alertas']) ? $_POST['alertas'] : "";

            $GLOBALS['objUsu']->setIdServicio($idServicio);
            $GLOBALS['objUsu']->setNombreActividad($nombreActividad);
            $GLOBALS['objUsu']->setFecha($fecha);
            $GLOBALS['objUsu']->setIdValor($idValor);
            $GLOBALS['objUsu']->setHora($hora);
            $GLOBALS['objUsu']->setEstado($estado);
            $GLOBALS['objUsu']->setDescripcion($descripcion);
            $GLOBALS['objUsu']->setAsistenciaActividad($asistenciaActividad);
            $GLOBALS['objUsu']->setObjetivo($objetivo);
            $GLOBALS['objUsu']->setLogros($logros);
            $GLOBALS['objUsu']->setDificultades($dificultades);
            $GLOBALS['objUsu']->setRecomendaciones($recomendaciones);
            $GLOBALS['objUsu']->setTestimonios($testimonios);
            $GLOBALS['objUsu']->setAlertas($alertas);

            $GLOBALS['objUsu']->registrarActividad();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
                break;
    } 
    case '2': {

            $idActividad = isset($_POST['idActividad']) ? $_POST['idActividad'] : "";

            $GLOBALS['objUsu']->setIdActividad($idActividad);

            $GLOBALS['objUsu']->consultarActividad();
            
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }
    case '3':{
        
            $idActividad = isset($_POST['idActividad']) ? $_POST['idActividad'] : "";

            $GLOBALS['objUsu']->setIdActividad($idActividad);

            $GLOBALS['objUsu']->deshabilitarActividad();
            
        echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
    }
    case '4':{
            
            $idActividad = isset($_POST['idActividad']) ? $_POST['idActividad'] : "";
            $idServicio = isset($_POST['idServicio']) ? $_POST['idServicio'] : "";
            $nombreActividad = isset($_POST['nombreActividad']) ? $_POST['nombreActividad'] : "";
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
            $idValor = isset($_POST['idValor']) ? $_POST['idValor'] : "";
            $hora = isset($_POST['hora']) ? $_POST['hora'] : "";
            $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
            $asistenciaActividad = isset($_POST['asistencia']) ? $_POST['asistencia'] : "";
            $objetivo = isset($_POST['objetivo']) ? $_POST['objetivo'] : "";
            $logros = isset($_POST['logros']) ? $_POST['logros'] : "";
            $dificultades = isset($_POST['dificultades']) ? $_POST['dificultades'] : "";
            $recomendaciones = isset($_POST['recomendaciones']) ? $_POST['recomendaciones'] : "";
            $testimonios = isset($_POST['testimonios']) ? $_POST['testimonios'] : "";
            $alertas = isset($_POST['alertas']) ? $_POST['alertas'] : "";

            $GLOBALS['objUsu']->setIdActividad($idActividad);
            $GLOBALS['objUsu']->setIdServicio($idServicio);
            $GLOBALS['objUsu']->setNombreActividad($nombreActividad);
            $GLOBALS['objUsu']->setFecha($fecha);
            $GLOBALS['objUsu']->setIdValor($idValor);
            $GLOBALS['objUsu']->setHora($hora);
            $GLOBALS['objUsu']->setEstado($estado);
            $GLOBALS['objUsu']->setDescripcion($descripcion);
            $GLOBALS['objUsu']->setAsistenciaActividad($asistenciaActividad);
            $GLOBALS['objUsu']->setObjetivo($objetivo);
            $GLOBALS['objUsu']->setLogros($logros);
            $GLOBALS['objUsu']->setDificultades($dificultades);
            $GLOBALS['objUsu']->setRecomendaciones($recomendaciones);
            $GLOBALS['objUsu']->setTestimonios($testimonios);
            $GLOBALS['objUsu']->setAlertas($alertas);

            $GLOBALS['objUsu']->actualizarActividad();

        echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
    } 
    
    case '5': {

            $idActividad = isset($_POST['idActividad']) ? $_POST['idActividad'] : "";

            $GLOBALS['objUsu']->setIdActividad($idActividad);

            $GLOBALS['objUsu']->habilitarActividad();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 8 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, en este caso 
    //el metodo habilitar fecha limite taller, y retorna una respuesta de ejecución y el mensaje correspondiente a las respuesta.
    case '8': {

            $idActividad = isset($_POST['idActividad']) ? $_POST['idActividad'] : "";
            $fechaLimite = isset($_POST['habilitarFechaLimiteActividad']) ? $_POST['habilitarFechaLimiteActividad'] : "";

            $GLOBALS['objUsu']->setIdActividad($idActividad);
            $GLOBALS['objUsu']->setFechaLimite($fechaLimite);

            $GLOBALS['objUsu']->habilitarFechaLimiteActividad();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}