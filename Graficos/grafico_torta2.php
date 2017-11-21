<?php 
require_once("php/connection.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>Fundación | Administrador</title>

        <!-- Referencias js,css -->

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>        
        <?php include_once '../includes/head.php'; ?>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Reportes'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Reporte',
            data: [
                <?php

                $sql = "SELECT count(tipoTaller) AS padres FROM tbl_talleres WHERE tipoTaller='Encuentro de Padres' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Encuentro de padres" ?>', <?php echo $registros["padres"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT count(*) AS Campamento FROM tbl_salidas WHERE isdelSalida = 1 AND fechaSalida BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Campamento" ?>', <?php echo $registros["Campamento"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT count(tipoTaller) AS actiespe FROM tbl_talleres WHERE isdelTaller = 1 AND tipoTaller='Actividades Especiales' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Actividades especiales" ?>', <?php echo $registros["actiespe"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT count(*) AS comunitarias FROM tbl_comunitarias WHERE isdelActividad = 1";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Actividades Comunitarias" ?>', <?php echo $registros["comunitarias"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT count(tipoTaller) AS salidaspe FROM tbl_talleres WHERE tipoTaller='Salidas Pedagógicas' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Salidas Pedagógicas" ?>', <?php echo $registros["salidaspe"] ?>],
                <?php 
                }
                ?>

                 <?php 
                $sql = "SELECT count(tipoTaller) AS vacaciones FROM tbl_talleres WHERE tipoTaller='Vacaciones recreativas' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Vacaciones Recreativas" ?>', <?php echo $registros["vacaciones"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT count(tipoTaller) AS Muestra FROM tbl_talleres WHERE tipoTaller='Muestra' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Muestra Total" ?>', <?php echo $registros["Muestra"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT count(tipoTaller) AS Cierre FROM tbl_talleres WHERE tipoTaller='Cierre' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Cierre Total" ?>', <?php echo $registros["Cierre"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT COUNT(*) AS idseguimiento FROM tbl_historia_clinica WHERE fechaIngreso BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Atenciones Psicosociales" ?>', <?php echo $registros["idseguimiento"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT COUNT(idSeguimientoExterno) AS idseguimientoex FROM tbl_seguimiento_sesion_externos WHERE fechaSeguimientoSesion BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Seguimiento Externo" ?>', <?php echo $registros["idseguimientoex"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT COUNT(DISTINCT idHistoria) AS idpersonatendi FROM tbl_seguimiento_sesion WHERE fechaSeguimientoSesion BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Personas Atendidas" ?>', <?php echo $registros["idpersonatendi"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT COUNT(*) AS contarproyecto FROM tbl_intervenciones WHERE isdelIntervencion = 1 AND fechaIntervencion BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Proyectos CC" ?>', <?php echo $registros["contarproyecto"] ?>],
                <?php 
                }
                ?>

            ]
        }]
    });
});
		</script>
	</head>
	<body>

<script src="js/highcharts.js"></script>
<script src="js/highcharts-3d.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
	</body>
    <br>
    <center><input type="submit" onclick = "location='grafico_torta.php'" value="Grafico 1" class="btn btn-primary" /></center>
    <br>
     <center><input type="submit" onclick = "location='../Administrador/estadisticasgeneraladmin.php'" value="Volver" class="btn btn-primary" /></center>
</html>
