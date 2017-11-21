<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaHora = date("d-m-Y h:i:s A");

include_once 'conexion.php';
$link = new Conexion();
$conexion = $link->conectar();

$sql = "UPDATE `tbl_usuario` SET logoutIngreso = '$fechaHora' WHERE idUsuario = '" . $_SESSION["idUsuario"] . "'";
$rs = $conexion->query($sql);

$link->desconectar();

session_destroy(); //destruimos la sesion 
echo '<meta http-equiv="refresh" content="0;url=../" />';
//echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
?>