<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Administrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>Fundación | Administrador</title>

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
                    <h1 align="center">Consultar Semilleros</h1>
                </div>
            </div>
            <br>
            <br>
            <!--.Navigation Bar -->
            <?php include_once 'menu.php'; ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">
                    <div class="tab-content"> 
                        <label class="alert alert-info">Aca Podras consultar, cuántos semilleros hay por Zona y por Aliado </label>


                        <center>
                            <div class="control-group">
                                <a href="consultarsemillerosadmi.php"><button type="button" class="btn btn-primary" data-dismiss="modal">Consultar Zonas</button></a>
                                <a href="consultaraliadosadmi.php"><button type="button" class="btn btn-primary" data-dismiss="modal">Consultar Aliados</button></a>
                                <a href="semillerosAdmin.php"><button type="button" class="btn btn-primary" data-dismiss="modal">Volver</button></a>
                            </div>

                            <img src="../img/zonasintervension.jpg"  border="0" height="270" width="710" />
                        </center>       
                            <br>
        <!--constructor-->
                        
                            <br>

                    </div>

                </div>
            </div>

                <!--.Footer-->
        </div>       
        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesSemilleros.js" type="text/javascript"></script>

        <!-- Control de recargas de las tablas, siempre debe ir de ultima en las referencias js -->
        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>

        <input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
        <div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

    </body>
</html>