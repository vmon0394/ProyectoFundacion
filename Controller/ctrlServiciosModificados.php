<?php

	include_once '../Model/db.conn.php';
	include_once '../Model/libServiciosmodificado.php';

	 $accion=$_REQUEST["acc"];
     switch ($accion) {
       case 'j':

        $nombreservicio     = $_POST["nombreServicio"];
        $url                = $_POST["url"];
        $isdelservicio      = $_POST["isdelServicio"];
        $descripcion        = $_POST["descripcion"];
        $nombre_archivo     = $_FILES['Imagen_Upload']['name'];
        $ruta               = $_FILES['Imagen_Upload']['tmp_name'];
        $destino            = "../Archivos/Servicio_Documentos/".$nombre_archivo;


       try{
          if($nombre_archivo != ""){
             if(copy($ruta, $destino)){

            }else{
              $mensaje = "Se Presenta Un Error Al Subir El Archivo Verifica Si El Formato del Archivo es Correcto";
              $tipo_mensaje = "info";
            }
          }
          
          activicomuni::agregaservicio($nombreservicio,$url,$isdelservicio,$descripcion);
          $mensaje = "El Servicio Se Registro correctamente";
          $tipo_mensaje = "success";
        }catch (Exception $e){
            switch ($e->getCode()) {
              case '23000':
                $mensaje = "El Servicio ya existe en Nuestra Aplicacion Fundacion Conconcreto Intenta con Otro.";
                $tipo_mensaje = "info";
              break;
            
              default:
                $mensaje=$e->getMessage();
              break;
            }
          
          }

         header("location: ../Administrador/servicios.php?msn=".$mensaje."&tm=".$tipo_mensaje);

       break;

       case 'jfaci':

        $nombreservicio     = $_POST["nombreServicio"];
        $url                = $_POST["url"];
        $isdelservicio      = $_POST["isdelServicio"];
        $descripcion        = $_POST["descripcion"];
        $nombre_archivo     = $_FILES['Imagen_Upload']['name'];
        $ruta               = $_FILES['Imagen_Upload']['tmp_name'];
        $destino            = "../Archivos/Servicio_Documentos/".$nombre_archivo;


       try{
          if($nombre_archivo != ""){
             if(copy($ruta, $destino)){

            }else{
              $mensaje = "Se Presenta Un Error Al Subir El Archivo Verifica Si El Formato del Archivo es Correcto";
              $tipo_mensaje = "info";
            }
          }
          
          activicomuni::agregaservicio($nombreservicio,$url,$isdelservicio,$descripcion);
          $mensaje = "El Servicio Se Registro correctamente";
          $tipo_mensaje = "success";
        }catch (Exception $e){
            switch ($e->getCode()) {
              case '23000':
                $mensaje = "El Servicio ya existe en Nuestra Aplicacion Fundacion Conconcreto Intenta con Otro.";
                $tipo_mensaje = "info";
              break;
            
              default:
                $mensaje=$e->getMessage();
              break;
            }
          
          }

         header("location: ../Facilitador/servicios.php?msn=".$mensaje."&tm=".$tipo_mensaje);

       break;

        case 'e':

        try{
          $servicio = activicomuni::Eliminarservicio(base64_decode($_REQUEST["ui"]));
          $mensaje="Se ha Eliminado Correctamente El Servicio";
          $tipo_mensaje = "success";
        }catch (Exception $e){
          $mensaje="Ha ocurrido un error, el error fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
        }
        header ("location: ../Administrador/servicios.php?msn=".$mensaje."&tm=".$tipo_mensaje);

        break;

        case 'efa':

        try{
          $servicio = activicomuni::Eliminarservicio(base64_decode($_REQUEST["ui"]));
          $mensaje="Se ha Eliminado Correctamente El Servicio";
          $tipo_mensaje = "success";
        }catch (Exception $e){
          $mensaje="Ha ocurrido un error, el error fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
        }
        header ("location: ../Facilitador/servicios.php?msn=".$mensaje."&tm=".$tipo_mensaje);

        break;

        case 'mser':
        $id_servicio        = $_POST["idServicio"];
        $nombreservicio     = $_POST["nombreServicio"];
        $url                = $_POST["url"];
        $isdelservicio      = $_POST["isdelServicio"];
        $descripcion        = $_POST["descripcion"];
        $nombre_archivo     = $_FILES['Imagen_Upload']['name'];
        $ruta               = $_FILES['Imagen_Upload']['tmp_name'];
        $destino            = "../Archivos/Servicio_Documentos/".$nombre_archivo;


       try{
          if($nombre_archivo != ""){
            if(copy($ruta, $destino)){

            }else{
              $mensaje = "Se Presento Un Error Al Subir El Archivo Verifica Si El Formato del Archivo es Correcto";
              $tipo_mensaje = "info";
            }
          }

          activicomuni::Updateservicios($id_servicio,$nombreservicio,$url,$isdelservicio,$descripcion);
          $mensaje = "Se Actualizo Correctamente.";
          $tipo_mensaje = "success";
           }catch (Exception $e){
          $mensaje="Ha ocurrido un error, el error fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
          $tipo_mensaje = "info";
            }
          header("location: ../Administrador/servicios.php?msn=".$mensaje."&tm=".$tipo_mensaje);

        break;

        case 'mserfaci':
        $id_servicio        = $_POST["idServicio"];
        $nombreservicio     = $_POST["nombreServicio"];
        $url                = $_POST["url"];
        $isdelservicio      = $_POST["isdelServicio"];
        $descripcion        = $_POST["descripcion"];
        $nombre_archivo     = $_FILES['Imagen_Upload']['name'];
        $ruta               = $_FILES['Imagen_Upload']['tmp_name'];
        $destino            = "../Archivos/Servicio_Documentos/".$nombre_archivo;


       try{
          if($nombre_archivo != ""){
            if(copy($ruta, $destino)){

            }else{
              $mensaje = "Se Presento Un Error Al Subir El Archivo Verifica Si El Formato del Archivo es Correcto";
              $tipo_mensaje = "info";
            }
          }

          activicomuni::Updateservicios($id_servicio,$nombreservicio,$url,$isdelservicio,$descripcion);
          $mensaje = "Se Actualizo Correctamente.";
          $tipo_mensaje = "success";
           }catch (Exception $e){
          $mensaje="Ha ocurrido un error, el error fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
          $tipo_mensaje = "info";
            }
          header("location: ../Facilitador/servicios.php?msn=".$mensaje."&tm=".$tipo_mensaje);

        break;

      }


?>