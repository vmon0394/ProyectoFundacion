<?php
	include_once '../Model/db.conn.php';

	class actividadlabo{

		function agregaractivi($idServicio,$nombreActividad,$fecha,$idValor,$hora,$estado,$descripcion,$cadenaIdNinosActividad,$asistenciaActividad,$fechaLimite,$objetivo,$logros,$dificultades,$recomendaciones,$isdelActividad){

			$conexion=fundacionconconcreto::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      		$consulta = "INSERT INTO tbl_actividades_laboratorio(idServicio,nombreActividad,fecha,idValor,hora,estado,descripcion,cadenaIdNinosActividad,asistenciaActividad,fechaLimite,objetivo,logros,dificultades,recomendaciones,isdelActividad) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      		$query=$conexion->prepare($consulta);
			$query->execute(array($idServicio,$nombreActividad,$fecha,$idValor,$hora,$estado,$descripcion,$cadenaIdNinosActividad,$asistenciaActividad,$fechaLimite,$objetivo,$logros,$dificultades,$recomendaciones,$isdelActividad));

			fundacionconconcreto::Disconnect();
		}

		function agregarlistaactividad($documento,$nombre,$apellido,$sexo,$edad,$telefono,$celular,$direccion,$barrio,$idActividad,$activo){

			$conexion=fundacionconconcreto::Connect();
		  	$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      		$consulta = "INSERT INTO tbl_asistencia_laboratorio(documento,nombre,apellido,sexo,edad,telefono,celular,direccion,barrio,idActividad,activo) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
      		$query=$conexion->prepare($consulta);
		  	$query->execute(array($documento,$nombre,$apellido,$sexo,$edad,$telefono,$celular,$direccion,$barrio,$idActividad,$activo));

		fundacionconconcreto::Disconnect();
		}

	}	
?>

