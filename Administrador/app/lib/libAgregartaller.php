<?php
	include_once '../Model/db.conn.php';
	

class activicomuni{

    function agregartaller($idSemillero,$tipoTaller,$nombreTaller,$fechaTaller,$idHabilidad,$valorNuclear,$idTecnica,$tipoActividad,$estadoTaller,$fechaLimite,$actividadInicial,$actividadCentral,$actividadFinal,$asistenciaTaller,$observacion,$objetivo,$descripcionDeActividades,$logros,$dificultades,$recomendaciones,$isdelTaller){

      $conexion=fundacionconconcreto::Connect();
		  $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $consulta = "INSERT INTO tbl_talleres(idSemillero,tipoTaller,nombreTaller,fechaTaller,idHabilidad,valorNuclear,idTecnica,tipoActividad,estadoTaller,fechaLimite,actividadInicial,actividadCentral,actividadFinal,asistenciaTaller,observacion,objetivo,descripcionDeActividades,logros,dificultades,recomendaciones,isdelTaller) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $query=$conexion->prepare($consulta);
		  $query->execute(array($idSemillero,$tipoTaller,$nombreTaller,$fechaTaller,$idHabilidad,$valorNuclear,$idTecnica,$tipoActividad,$estadoTaller,$fechaLimite,$actividadInicial,$actividadCentral,$actividadFinal,$asistenciaTaller,$observacion,$objetivo,$descripcionDeActividades,$logros,$dificultades,$recomendaciones,$isdelTaller));

		fundacionconconcreto::Disconnect();

    }

    function idprofesor($id_profesor){
   		$conexion = fundacionconconcreto::Connect();
   		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   		$sql = "SELECT * FROM tbl_semilleros WHERE idProfesor=? ";
   		$query = $conexion->prepare($sql);
   		$query->execute(array($id_profesor));
          
   		$results = $query->fetchALL(PDO::FETCH_BOTH);
   		fundacionconconcreto::Disconnect();
  		return $results;
   }

   function TalleresAll($idtaller){
      $conexion = fundacionconconcreto::Connect();
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT tbl_talleres.*, tbl_semilleros.nombreSemillero FROM tbl_talleres INNER JOIN tbl_semilleros ON (tbl_talleres.idSemillero = tbl_semilleros.idSemillero) WHERE idTaller=? ";
      $query = $conexion->prepare($sql);
      $query->execute(array($idtaller));
          
      $results = $query->fetchALL(PDO::FETCH_BOTH);
      fundacionconconcreto::Disconnect();
      return $results;
    }

   function idtaller($id_taller){
      $conexion = fundacionconconcreto::Connect();
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM tbl_semilleros WHERE idSemillero=?";
      $query = $conexion->prepare($sql);
      $query->execute(array($id_taller));
          
      $results = $query->fetch(PDO::FETCH_BOTH);
      fundacionconconcreto::Disconnect();
      return $results;
   }

}


?>