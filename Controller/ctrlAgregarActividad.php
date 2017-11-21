<?php

	include_once '../Model/db.conn.php';
	include_once '../Model/libAgregaractividad.php';

	$accion=$_REQUEST["acc"];
     switch ($accion) {
       case 'actividad1':

       $idServicio				     = $_POST["idServicio"];
       $nombreActividad			   = $_POST["nombreActividad"];
       $fecha 					       = $_POST["fecha"];
       $idValor					       = $_POST["idValor"];
       $hora					         = $_POST["hora"];
       $estado					       = $_POST["estado"];
       $descripcion				     = $_POST["descripcion"];
       $cadenaIdNinosActividad = $_POST["cadenaIdNinosActividad"];
       $asistenciaActividad		 = $_POST["asistenciaActividad"];
       $fechaLimite				     = $_POST["fechaLimite"];
       $objetivo				       = $_POST["objetivo"];
       $logros					       = $_POST["logros"];
       $dificultades			     = $_POST["dificultades"];
       $recomendaciones			   = $_POST["recomendaciones"];
       $isdelActividad			   = $_POST["isdelActividad"];

       try{
       	actividadlabo::agregaractivi($idServicio,$nombreActividad,$fecha,$idValor,$hora,$estado,$descripcion,$cadenaIdNinosActividad,$asistenciaActividad,$fechaLimite,$objetivo,$logros,$dificultades,$recomendaciones,$isdelActividad);
       	$mensaje="Se registro correctamente La Actividad";
   		$tipo_mensaje = "success";
       }catch (Exception $e){
          switch ($e->getCode()) {
            case '23000':
              $mensaje = "La Actividad ingresada ya existe Intenta con otra.";
              $tipo_mensaje = "info";
            break;
            
            default:
              $mensaje=$e->getMessage();
              break;
          }
          
        }

         header("location: ../SuperAdministrador/actividadesLaboratorio.php?msn=".$mensaje."&tm=".$tipo_mensaje);

       break;

   }

?>