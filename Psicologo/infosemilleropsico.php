<?php
include_once '../Model/db.conn.php';
include_once '../Model/libSemillerosGeneral.php';
include_once '../Model/libreporteGeneralPsicosociales.php';
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Psicólogo") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
$idsemillero2   =   semillerosgeneral::semillerosto(base64_decode($_REQUEST["ui"]));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>Fundación | Facilitador</title>

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
                    <h1 align="center"><?php echo $idsemillero2[1]?></h1>
                </div>
            </div>
            <br>
            <br>
            <!--.Navigation Bar -->
            <?php include_once 'menuPsicologo.php'; ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">  
                <center>
                <h2>Estadisticas <?php echo $idsemillero2[1]?></h2>
                </center>
                <br>         
                <?php
                $profesores   =   semillerosgeneral::idprofesores(base64_decode($_REQUEST["ui"]));
                    foreach ($profesores as $row ) {
                        echo" <p>Facilitadores: ".$row["nombresEmp"]." ".$row["apellidosEmp"]."<br></p>";
                    }
                ?>
                <?php
                $profesores   =   semillerosgeneral::idpsicologos(base64_decode($_REQUEST["ui"]));
                    foreach ($profesores as $row ) {
                        echo" <p>Psicologos: ".$row["nombresEmp"]." ".$row["apellidosEmp"]."<br></p>";
                    }
                ?>
                <p>Lugar: <?php echo $idsemillero2[8]?> </p>
                <p>Direccion: <?php echo $idsemillero2[9]?> </p>
                <p>Organizacion: <?php echo $idsemillero2[10]?> </p>
                <hr>
                <?php
                $tallerforma   =   psicosocialcontar::tallerpsicosocialsemi(base64_decode($_REQUEST["ui"]));
                    foreach ($tallerforma as $row ) {
                        echo" <h4>Talleres Psicosociales: ".$row["tpsicosocial"]."</h4>";
                    }
                ?>
                 <hr>
                <?php
                $tallerforma   =   psicosocialcontar::encuentropadres(base64_decode($_REQUEST["ui"]));
                    foreach ($tallerforma as $row ) {
                        echo" <h4>Encuentro de Padres: ".$row["padres"]."</h4>";
                    }
                ?>
                 
                 <hr>
                <?php
                $tallerforma   =   psicosocialcontar::totaltallersemi(base64_decode($_REQUEST["ui"]));
                    foreach ($tallerforma as $row ) {
                        echo" <h4>TOTAL: ".$row["totaltalleresse"]."</h4><br>
                        <p>Rendimiento: <progress max='36' value='".$row["totaltalleresse"]."'></progress><font color='red'> %".$row["totaltalleresse"]."</font></td></p>";
                    }
                ?>
                 <hr>
                </div>

            </div>
        </div>

        <!--.Footer-->


    </div>       
</div>

<!-- Referencias js -->
<?php include_once '../includes/endBody.php'; ?>
<script src="../js/funcionesReporteGeneralSemilleros.js" type="text/javascript"></script>

<!-- Control de recargas de las tablas, siempre debe ir de ultima en las referencias js -->
<script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>

<input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
<div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

</body>
</html>

<div class="modal fade" id="exampleconfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 8000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p id="modal-message">New message</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>