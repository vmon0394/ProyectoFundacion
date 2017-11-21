<?php
	
	require_once("../Model/db.conn.php");
	require_once("../Model/LibInstitusemille.php");

	$accion=$_REQUEST["acc"];
       switch ($accion) {
        case 'c':

        $nombre 	= $_POST["nombre_instu_semi"];
        $telefono	= $_POST["telefono"];
        $celular	= $_POST["celular"];
        $correo		= $_POST["correo"];
        $contacto	= $_POST["contacto"];
        $direccion	= $_POST["direccion"];
        $isintitu	= $_POST["isDelainstitusemille"];

        try {
        	agregarinstitu::Crear($nombre,$telefono,$celular,$correo,$contacto,$direccion,$isintitu);
        	$mensaje = "Se Registro Correctamente";
        } catch (Exception $e){
          		switch ($e->getCode()) {
           	 		case '23000':
              		$mensaje = "Esta Institucion o Semillero ya se encuentra registrada en la base de datos Intenta con otro Nombre.";
            		break;
            
            		default:
              		$mensaje=$e->getMessage();
              		break;
          		}
          
        	}

         header("location: ../institucionsemillero.php?msn=".$mensaje);

       break;
   
   }

?>