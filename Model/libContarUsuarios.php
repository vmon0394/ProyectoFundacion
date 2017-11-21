<?php

class contarusuarios{

  function Contarusu(){
   $conexion = Conexion::Connect();
   $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "SELECT count(*) AS contarusuarios FROM tbl_usuario";
   $query = $conexion->prepare($sql);
   $query->execute(array($id_usuario));
          
   $results = $query->fetch(PDO::FETCH_BOTH);
   Conexion::Disconnect();
   return $results;
      }


}

?>

