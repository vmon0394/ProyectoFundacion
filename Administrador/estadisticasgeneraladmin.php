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
    <script type="text/javascript">
    $(document).ready(function(){
        $("#registrartaller").on( "click", function() {
            $('#semilleros').show();
            $('#cerrar').show(); 
            $('#registrartaller').hide(); 
            $('#formulariogeneral').hide(); 
         });
        $("#cerrar").on( "click", function() {
            $('#semilleros').hide();
            $('#cerrar').hide(); 
            $('#registrartaller').show();
            $('#formulariogeneral').show(); 
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
                    <h1 align="center">Reporte General Semilleros</h1>
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
                    <center>
                        <h2>Estadisticas General</h2>
                    </center>
                    <br>
                    <p>Seleccione un Semillero:</p><section id="registrartaller"><button type='button' class='btn btn-primary' data-dismiss='modal'>Informacion de Semilleros</button></section> 
                    <section id="cerrar" style='position:relative;display:none'><button type='button' class='btn btn-primary' data-dismiss='modal'>Finalizar Informacion</button></section>
                    <br>
                    <section id="grafico"><input type="submit" onclick = "location='../Graficos/grafico_torta.php'" value="Graficos" class="btn btn-primary" /></section>
                    <section id="semilleros" style='position:relative;display:none'>
                       <h2>Reporte por semilleros 2017</h2>
                        <table class="table table-striped table-hover table-bordered table-condensed" id="">
                            <thead>
                                <tr>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:40px; text-align:center;">Nº</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Semilleros</th> <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Fecha Inicio</th>                                       
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Numero Talleres</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:168px; text-align:center;">Porcentaje (1 - 10)</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include_once '../Model/libReportesTalleres.php';
                                $combo = new libReportesTalleres();
                                $combo->reportenumerodetalleres();
                                echo $combo->getResult();
                            ?>
                            </tbody>
                        </table>
                    </section>
                        <br>
                    <section id="formulariogeneral">
                        <?php include_once '../Formularios/frmEstadisticasGeneral.php'; ?>
                    </section>
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