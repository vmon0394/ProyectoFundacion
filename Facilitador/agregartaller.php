<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["perfil"] != "Facilitador" && $_SESSION["perfil"] != "Psicólogo")) {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}

include_once '../Model/db.conn.php';
include_once '../Model/libAgregartaller.php';

$idsemillero = activicomuni::idtaller(base64_decode($_REQUEST["ui"]));
$usuario = $_SESSION["idUsuario"];
//$idSemillero = isset($_GET['semillero']) ? $_GET['semillero'] : '0';
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
    <script type="text/javascript">
    $(document).ready(function(){
        $("#registrartaller").on( "click", function() {
            $('#semilleros').show();
            $('#cerrar').show();  
         });
        $("#cerrar").on( "click", function() {
            $('#semilleros').hide();
            $('#cerrar').hide(); 
        });
    });
    </script>

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
                    <h1 align="center">Opcion Taller</h1>
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

                        <div>

                            <?php include_once '../Formularios/frmTalleragregar.php'; ?>

                        </div>

                        </div>      
                    </div>
                </div>

                <!--.Footer-->

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesSemillerosFacilitador.js" type="text/javascript"></script>
        <script src="../js/funcionesTestimonios.js" type="text/javascript"></script>
        <script src="../js/funcionesEvidencias.js" type="text/javascript"></script>
        <script src="../js/funcionesFichasNinos.js" type="text/javascript"></script>
        <script src="../js/funcionesFichasAdultos.js" type="text/javascript"></script>
        <script src="../js/funcionesVoluntariosEgresados.js" type="text/javascript"></script>
        <script src="../js/funcionesTalleres.js" type="text/javascript"></script>

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