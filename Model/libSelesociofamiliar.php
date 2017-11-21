<?php
	include_once '../Model/db.conn.php';

	class historialfichasocio{

		function idsemisocio($idSemillero){
   			$conexion = fundacionconconcreto::Connect();
   			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   			$sql = "SELECT * FROM tbl_ficha_sociofamiliar WHERE idSemillero=? ";
   			$query = $conexion->prepare($sql);
   			$query->execute(array($idSemillero));
          
   			$results = $query->fetchALL(PDO::FETCH_BOTH);
   			fundacionconconcreto::Disconnect();
  			return $results;
   		}

      function idficha($idficha){
        $conexion = fundacionconconcreto::Connect();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_ficha_sociofamiliar WHERE idFicha=? ";
        $query = $conexion->prepare($sql);
        $query->execute(array($idficha));
          
        $results = $query->fetch(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
      }

    function actufechasociofa($idficha,$fechaingreso,$fechadeshabilitado){
        $conexion = fundacionconconcreto::Connect();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tbl_ficha_sociofamiliar SET fechaReingreso=? , fechaDeshabilitado=? WHERE idFicha=?";
        $query = $conexion->prepare($sql);
        $query->execute(array($fechaingreso,$fechadeshabilitado,$idficha));
        fundacionconconcreto::Disconnect();
    }

	}
	
?>