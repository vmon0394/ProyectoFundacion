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
                        <a href="#" title="Sistema de GestiÃ³n | FundaciÃ³n Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>          
                    </div>
                    <br>
                    <h1 align="center">Salidas Pedagógicas</h1>
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

                        <br>
                        <div class="table-responsive">                            
                            <table class="table table-striped table-hover table-bordered table-condensed" id="">
                                <thead>
                                    <tr>
 					                    <th class="text-center" style="padding-right: 10px; color: #000; width:40px; text-align:center;">Nº</th>
                                        <th  style="padding-right: 10px; color: #000; width:480px; text-align:center;">Salida Pedagógica</th>
                                        <th  style="padding-right: 10px; color: #000; width:480px; text-align:center;">Objetivo</th>
                                        <th  style="padding-right: 10px; color: #000; width:480px; text-align:center;">Fecha Taller</th>
                                        <th  style="padding-right: 10px; color: #000; width:480px; text-align:center;">Asistencia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once '../Model/libReportesTalleres.php';
                                    $combo = new libReportesTalleres();
                                    $combo->listasalidasped();
                                    echo $combo->getResult();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                         <a href="estadisticasgeneraladmin.php"><button type="button" class="btn btn-primary center"  data-dismiss="modal">Volver</button></a>
                    </div>
                </div>

                <!--.Footer-->
                <?php //include_once '../includes/footer.php'; ?>

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>

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