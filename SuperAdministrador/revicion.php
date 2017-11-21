<?php
$a = $_POST['documento'];
$b = $_POST['nombre'];
$c = $_POST['apellido'];
$servicios = '';
if (isset($_POST['servicios']) ? $_POST['servicios'] : "") {
    $servicios = implode(';', $_POST['servicios']);
    
}

$suma = $servicios.' '.$a.' '.$b.' '.$c;
echo '<br />'. $suma;


?>
