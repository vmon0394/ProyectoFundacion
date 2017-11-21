<?php

	include_once '../Model/db.conn.php';
	include_once '../Model/libAsistenciapsicologos.php';

	 $accion=$_REQUEST["acc"];
     switch ($accion) {
       case 'asistencia1':

       $idTaller			=	$_POST["idTaller"];
       $asistenciaTaller	=	$_POST["asistenciaTaller"];

       try{
       	agregarasistenciapsico::agregaasistenciapsi($idTaller,$asistenciaTaller);
       	$mensaje="Se registro correctamente la asistencia";
   		$tipo_mensaje = "success";
       }catch (Exception $e){
          switch ($e->getCode()) {
            case '23000':
              $mensaje = "NO SE PUDO GUARDAR INTENTA DE NUEVO!.";
              $tipo_mensaje = "info";
            break;
            
            default:
              $mensaje=$e->getMessage();
              break;
          }
          
        }

         header("location: ../Psicologo/semillerosPsico.php?msn=".$mensaje."&tm=".$tipo_mensaje);

       break;
   }

?>
