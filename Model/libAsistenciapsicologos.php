<?php
	include_once '../Model/db.conn.php';
	

class agregarasistenciapsico{

    function agregaasistenciapsi($idTaller,$asistenciaTaller){

    	$conexion=fundacionconconcreto::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "UPDATE tbl_talleres SET asistenciaTaller=? WHERE idTaller=? ";
        $query=$conexion->prepare($consulta);
		$query->execute(array($asistenciaTaller,$idTaller));

		fundacionconconcreto::Disconnect();
    } 
}




