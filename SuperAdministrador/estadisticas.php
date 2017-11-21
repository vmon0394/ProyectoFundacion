<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["perfil"] != "Facilitador" && $_SESSION["perfil"] != "SuperAdministrador")) {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>

<?php include_once'../Model/conexion.php'?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>Fundación | Super Admin</title>
        
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.mins.js" type="text/javascript"></script>
        
        <!-- Referencias js,css -->
        <?php include_once '../includes/head.php'; ?>
    </head>
    <body>

        <div class="container-fluid content-wrapper">
            <br>
            <br>
            <!--.Logo Bar & Login-->
            <div class="row-fluid">
                <div class="logobar">
                    <div class="logo pull-left">
                        <a href="#" title="Sistema de Gestión | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>          
                    </div>
                    <br>
                    <h1 align="center">Estadísticas </h1>
                </div>
            </div>
            <br>
            <br>
            <!--.Navigation Bar -->
            <?php include_once 'menu.php'; ?>
            <!--/.Navigation Bar-->  
            <div>
                <table id='datatables'>
                    <thead>
                        <tr>           
                             <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Total inscritos</th>
                             <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Activos</th>
                             <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Con procesos de mas de 1 año</th>
                             <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Nuevos 2016</th>
                             <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Retirados</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        if(mysql_num_rows($result)>0) {
                            while ($row = mysql_fech_array ($result)) {
                            ?>  
                            <tr>
                                <td><?=$row['nombre']?></td>
                                <td><?=$row['idProfesor']?></td>
                                <td><?=$row['barrio']?></td>
                                <td><?=$row['direccion']?></td>
                                <td><?=$row['organizacion']?></td>
                            </tr>
                        <?php
                            }
                        }
                        ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>