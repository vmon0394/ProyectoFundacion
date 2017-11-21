<?php

class cuantausuario{

	function contarusu(){
     $conexion = Conexion::Connect();
     $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $consulta ="SELECT COUNT(*) as cuenta FROM tbl_usuario";
     $query = $conexion->prepare($sql);
     $query->execute();
        
     $results = $query->fetchALL(PDO::FETCH_BOTH);
     Conexion::Disconnect();
     return $results;
	}
}