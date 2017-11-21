<?php
	include_once '../Model/db.conn.php';
	

class activicomuni{

    function agregaservicio($nombre_servicio,$url,$isdelservicio,$descripcion){

    	$conexion=fundacionconconcreto::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "INSERT INTO tbl_servicios(nombreServicio,url,isdelServicio,descripcion) VALUES(?,?,?,?)";
        $query=$conexion->prepare($consulta);
		$query->execute(array($nombre_servicio,$url,$isdelservicio,$descripcion));

		fundacionconconcreto::Disconnect();

    } 

    function Eliminarservicio($id_servicio){

    	$conexion=fundacionconconcreto::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "DELETE FROM  tbl_servicios WHERE idServicio = ?";
        $query=$conexion->prepare($consulta);
		$query->execute(array($id_servicio));

		fundacionconconcreto::Disconnect();
    }

    function Updateservicios($id_servicio,$nombre_servicio,$url,$isdelservicio,$descripcion){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "UPDATE tbl_servicios SET nombreServicio = ? ,url = ?,isdelServicio = ?,descripcion = ? WHERE idServicio = ?";
        $query=$conexion->prepare($consulta);
        $query->execute(array($nombre_servicio,$url,$isdelservicio,$descripcion,$id_servicio));

        fundacionconconcreto::Disconnect();
    }

    function Idservicio($id_servicio){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT * FROM tbl_servicios  WHERE idServicio = ?";
        $query=$conexion->prepare($consulta);
        $query->execute(array($id_servicio));
        $results = $query->fetch(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Serviciosall(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT * FROM tbl_servicios";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }
}


?>