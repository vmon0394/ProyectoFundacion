<?php
	include_once '../Model/db.conn.php';
	

class asistenciaactividad{

    function cargartabla(){

    	$conexion=fundacionconconcreto::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT * FROM tbl_usuario_laboratorio";
        $query=$conexion->prepare($consulta);
		$query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);

		fundacionconconcreto::Disconnect();
        return $results;
    }

    function cargarusuario($idficha){

        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT * FROM tbl_usuario_laboratorio WHERE idUsuario = ?";
        $query=$conexion->prepare($consulta);
        $query->execute(array($idficha));
        $results = $query->fetchALL(PDO::FETCH_BOTH);

        fundacionconconcreto::Disconnect();
        return $results;
    }

    function cargartabla2($idactividad){

        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT * FROM tbl_asistencia_laboratorio WHERE idActividad = ?";
        $query=$conexion->prepare($consulta);
        $query->execute(array($idactividad));
        $results = $query->fetchALL(PDO::FETCH_BOTH);

        fundacionconconcreto::Disconnect();
        return $results;
    } 
}


?>