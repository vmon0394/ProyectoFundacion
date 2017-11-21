<?php

	include_once '../Model/db.conn.php';
	include_once '../Model/libAgregaractividad.php';

	$accion=$_REQUEST["acc"];
     switch ($accion) {
       case 'agrelista1':

       $documento   = $_POST["documento"];
       $nombre      = $_POST["nombre"];
       $apellido    = $_POST["apellido"];
       $sexo        = $_POST["sexo"];
       $edad        = $_POST["edad"];
       $telefono    = $_POST["telefono"];
       $celular     = $_POST["celular"];
       $direccion   = $_POST["direccion"];
       $barrio      = $_POST["barrio"];
       $idActividad = $_POST["idActividad"];
       $activo      = $_POST["activo"];       

       try{
       	actividadlabo::agregarlistaactividad($documento,$nombre,$apellido,$sexo,$edad,$telefono,$celular,$direccion,$barrio,$idActividad,$activo);
       	$mensaje="Se registro correctamente";
   		$tipo_mensaje = "success";
       }catch (Exception $e){
          switch ($e->getCode()) {
            case '23000':
              $mensaje = "El usuario ya se encuentra en esta actividad.";
              $tipo_mensaje = "info";
            break;
            
            default:
              $mensaje=$e->getMessage();
              break;
          }
          
        }

         header("location: ../SuperAdministrador/visualizarAsistenciaActividad.php?actividad=".$idActividad."&msn=".$mensaje."&tm=".$tipo_mensaje);

       break;

   }

?>