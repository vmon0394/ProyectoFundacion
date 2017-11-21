<?php

	include_once '../Model/db.conn.php';
	include_once '../Model/libAgregartaller.php';

	 $accion=$_REQUEST["acc"];
     switch ($accion) {
       case 'taller1':

   		$idSemillero				      =	$_POST["idSemillero"];
   		$tipoTaller					      =	$_POST["tipoTaller"];
   		$nombreTaller				      =	$_POST["nombreTaller"];
   		$fechaTaller              =	$_POST["fechaTaller"];
   		$idHabilidad				      =	$_POST["idHabilidad"];
   		$valorNuclear				      =	$_POST["valorNuclear"];
   		$idTecnica					      =	$_POST["idTecnica"];
   		$tiempo						        =	$_POST["tiempo"];
   		$estadoTaller				      =	$_POST["estadoTaller"];
      $fechaLimite              = $_POST["fechaLimite"];
   		$actividadInicial			    =	$_POST["actividadInicial"];
   		$actividadCentral			    =	$_POST["actividadCentral"];
   		$actividadFinal				    =	$_POST["actividadFinal"];
   		$asistenciaTaller			    =	$_POST["asistenciaTaller"];
   		$observacion				      =	$_POST["observacion"];
   		$objetivo					        =	$_POST["objetivo"];
   		$descripcionDeActividades	=	$_POST["descripcionDeActividades"];
   		$logros						        =	$_POST["logros"];
   		$dificultades				      =	$_POST["dificultades"];
   		$recomendaciones			    =	$_POST["recomendaciones"];
   		$isdelTaller				      = $_POST["isdelTaller"];	


   		try{
   			activicomuni::agregartaller($idSemillero,$tipoTaller,$nombreTaller,$fechaTaller,$idHabilidad,$valorNuclear,$idTecnica,$tiempo,$estadoTaller,$fechaLimite,$actividadInicial,$actividadCentral,$actividadFinal,$asistenciaTaller,$observacion,$objetivo,$descripcionDeActividades,$logros,$dificultades,$recomendaciones,$isdelTaller);
   			$mensaje="Se registro correctamente el Taller";
   			$tipo_mensaje = "success";
   		}catch (Exception $e){
          switch ($e->getCode()) {
            case '23000':
              $mensaje = "El Taller Ingresado Ya existe Intenta con otro.";
              $tipo_mensaje = "info";
            break;
            
            default:
              $mensaje=$e->getMessage();
              break;
          }
          
        }

         header("location: ../SuperAdministrador/semilleros.php?msn=".$mensaje."&tm=".$tipo_mensaje);

       break;
       case 'taller2':

      $idSemillero              = $_POST["idSemillero"];
      $tipoTaller               = $_POST["tipoTaller"];
      $nombreTaller             = $_POST["nombreTaller"];
      $fechaTaller              = $_POST["fechaTaller"];
      $idHabilidad              = $_POST["idHabilidad"];
      $valorNuclear             = $_POST["valorNuclear"];
      $idTecnica                = $_POST["idTecnica"];
      $tiempo                   = $_POST["tiempo"];
      $estadoTaller             = $_POST["estadoTaller"];
      $fechaLimite              = $_POST["fechaLimite"];
      $actividadInicial         = $_POST["actividadInicial"];
      $actividadCentral         = $_POST["actividadCentral"];
      $actividadFinal           = $_POST["actividadFinal"];
      $asistenciaTaller         = $_POST["asistenciaTaller"];
      $observacion              = $_POST["observacion"];
      $objetivo                 = $_POST["objetivo"];
      $descripcionDeActividades = $_POST["descripcionDeActividades"];
      $logros                   = $_POST["logros"];
      $dificultades             = $_POST["dificultades"];
      $recomendaciones          = $_POST["recomendaciones"];
      $isdelTaller              = $_POST["isdelTaller"];  


      try{
        activicomuni::agregartaller($idSemillero,$tipoTaller,$nombreTaller,$fechaTaller,$idHabilidad,$valorNuclear,$idTecnica,$tiempo,$estadoTaller,$fechaLimite,$actividadInicial,$actividadCentral,$actividadFinal,$asistenciaTaller,$observacion,$objetivo,$descripcionDeActividades,$logros,$dificultades,$recomendaciones,$isdelTaller);
        $mensaje="Se registro correctamente el Taller";
        $tipo_mensaje = "success";
      }catch (Exception $e){
          switch ($e->getCode()) {
            case '23000':
              $mensaje = "El Taller Ingresado Ya existe Intenta con otro.";
              $tipo_mensaje = "info";
            break;
            
            default:
              $mensaje=$e->getMessage();
              break;
          }
          
        }

         header("location: ../Facilitador/semilleros.php?msn=".$mensaje."&tm=".$tipo_mensaje);

       break;
   }

?>


