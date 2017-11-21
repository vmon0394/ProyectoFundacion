
<?php include_once'../Model/conexion.php'?>


<?php
$result = mysql_query("SELECT * FROM tbl_semilleros");

//Total activos
$sqlA = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE isdel = '1' AND idSemillero = '$semillero'";
$rsA = mysqli_query($gaSql['link'], $sqlA);
$activos = mysqli_num_rows($rsA);


//total inscritos 
$sqlTi = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE idSemillero = '$semillero'";
$rsTi = mysqli_query($gaSql['link'], $sqlTi);
$totalInscritos = mysqli_num_rows($rsTi);


//Procesos con mas de 1 año
$sqlM = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE isdel = '1' AND anosDePermanencia > '1' AND idSemillero = '$semillero'";
$rsM = mysqli_query($gaSql['link'], $sqlM);
$masDeUnAno = mysqli_num_rows($rsM);


//Nuevos año actual
$sqlN = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE anoRegistro = '$fechaSistema' AND idSemillero = '$semillero'";
$rsN = mysqli_query($gaSql['link'], $sqlN);
$nuevos = mysqli_num_rows($rsN);


//Retirados
$sqlR = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE isdel = '0' AND idSemillero = '$semillero'";
$rsR = mysqli_query($gaSql['link'], $sqlR);
$retirados = mysqli_num_rows($rsR);
?>