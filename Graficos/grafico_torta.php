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

                $sql = "SELECT count(*) AS participantes FROM tbl_ficha_sociofamiliar WHERE isdel = 1";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Total Participantes: ",  $registros["participantes"] ?>', <?php echo $registros["participantes"] ?>],

                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT count(tipoTaller) AS totalgeneral FROM tbl_talleres WHERE fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Total General: ", $registros["totalgeneral"] ?>', <?php echo $registros["totalgeneral"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT count(tipoTaller) AS tformativos FROM tbl_talleres WHERE tipoTaller='Talleres Formativos' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Talleres Formativos" ?>', <?php echo $registros["tformativos"] ?>],
                <?php 
                }
                ?>

                <?php 
                $sql = "SELECT count(tipoTaller) AS tpsicosocial FROM tbl_talleres WHERE tipoTaller='Taller Psicosocial' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                $result = mysqli_query($connection,$sql);
                while ($registros = mysqli_fetch_array($result))
                {
                ?>
                    ['<?php echo "Talleres Psicosociales" ?>', <?php echo $registros["tpsicosocial"] ?>],
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
    <center><input type="submit" onclick = "location='grafico_torta2.php'" value="Grafico 2" class="btn btn-primary" /></center>
    <br>
     <center><input type="submit" onclick = "location='../Administrador/estadisticasgeneraladmin.php'" value="Volver" class="btn btn-primary" /></center>
</html>
