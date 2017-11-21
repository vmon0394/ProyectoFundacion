<?php
	include_once '../Model/db.conn.php';
	

class tecnicaAll{

    function tecnicall(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT * FROM tbl_tecnicas ORDER BY nombreTecnica";
        $query=$conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

}


?>