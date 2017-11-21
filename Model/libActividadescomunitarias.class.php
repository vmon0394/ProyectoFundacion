<?php
	include_once '../Model/db.conn.php';
	

class activicomuni{

	function agregarActividadconmu($infoactivi,$comunitaria,$acompa,$visitainsti,$isactividad){

		$conexion=fundacionconconcreto::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $consulta = "INSERT INTO tbl_actividades_comunitarias(informacion_actividad,actividad_comunitaria,acompanamiento,visita_institucion,isactividadcomuni) VALUES(?,?,?,?,?)";
        $query=$conexion->prepare($consulta);
		$query->execute(array($infoactivi,$comunitaria,$acompa,$visitainsti,$isactividad));

		fundacionconconcreto::Disconnect();
    }

    function agregaservicio($nombre_servicio,$url,$isdelservicio,$descripcion){

    	$conexion=fundacionconconcreto::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $consulta = "INSERT INTO tbl_servicios(nombreServicio,url,isdelServicio,descripcion) VALUES(?,?,?,?,?)";
        $query=$conexion->prepare($consulta);
		$query->execute(array($nombre_servicio,$url,$isdelservicio,$descripcion));

		fundacionconconcreto::Disconnect();

    } 

}


?>