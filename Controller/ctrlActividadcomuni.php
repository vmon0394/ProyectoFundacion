<?php

	include_once '../Model/db.conn.php';
	include_once '../Model/libActividadescomunitarias.class.php';

	 $accion=$_REQUEST["acc"];
     switch ($accion) {
     case 'c':

     $infoactivi  	= $_POST["informacion_actividad"];
     $comunitaria 	=	$_POST["actividad_comunitaria"];
     $acompa		    =	$_POST["acompanamiento"];
     $visitainsti 	=	$_POST["visita_institucion"];
     $isactividad	  =	$_POST["isactividadcomuni"];

     try{
     	activicomuni::agregarActividadconmu($infoactivi,$comunitaria,$acompa,$visitainsti,$isactividad);
     	$mensaje = "Se Registro correctamente";
     }catch (Exception $e){
          switch ($e->getCode()) {
            case '23000':
              $mensaje = "El Registro ya Existe";
            break;
            
            default:
              $mensaje=$e->getMessage();
              break;
          }
          
        }

         header("location: ../SuperAdministrador/ActividadesComunitarias.php?msn=".$mensaje);

       break;

   }


?>