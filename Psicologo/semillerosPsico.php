<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Psicólogo") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="SistemaFundacion/js/sweetalert.min.js"></script>
        <title>Fundación | SuperAmin</title>
        <script>
          $(document).ready(function(){

            <?php
            if(isset($_GET["msn"]) and isset($_GET["tm"]))
            {
              echo "swal('".$_GET["msn"]."','','".$_GET["tm"]."');";
            }
           ?>
        });
        </script>
        <title>Fundación | Psicólogo</title>

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
                        <a href="#" title="Sistema de Gestion | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>              
                    </div>
                    <br>
                    <h1 align="center">Semilleros</h1>
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
                    <div class="tab-content"> 

                        <div id="consulta" style="display: none;">

                            <br>
                            <?php include_once '../Formularios/frmSemilleros.php'; ?>

                            <center>
                                <div class="control-group">
                                    <button type="button" class="btn btn-primary" id="return" data-dismiss="modal" style="display: none">Volver</button>
                                </div>
                            </center> 

                        </div>

                        <div id="listadoSemilleros">

                            <div class="control-group">                                
                                <br>

                                <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                    <div class="tabbable tabs-left">

                                        <div class="tab-content">

                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Semillero</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Categoria</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Fichas</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Talleres</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  id="index_ajax">

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div id="listadoFichas" style="display: none">

                            <?php include_once 'listadoFichasPsico.php'; ?>

                        </div>

                        <!-- FORMULARIO FICHA SOCIO FAMILIAR NIÑOS -->
                        <div id="fichaSocioFamiliarNinos" style="display: none; z-index: 2000px;">

                            <!-- INICIO FORMULARIO FICHA SOCIO FAMILIAR -->
                            <?php include_once '../Formularios/frmFichaNinosAdmin.php'; ?>

                            <legend></legend>
                            <center>
                                <div class="control-group">                                    
                                    <button type="button" class="btn btn-primary" id="modiNino" data-dismiss="modal" style="display: none">Modificar</button> &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary" id="returnFichas" data-dismiss="modal">Volver</button>
                                </div>
                            </center>

                        </div>

                        <!-- FORMULARIO FICHA SOCIO FAMILIAR ADULTOS -->
                        <div id="fichaSocioFamiliarAdultos" style="display: none;">

                            <!-- INICIO FORMULARIO FICHA SOCIO FAMILIAR -->
                            <?php include_once '../Formularios/frmFichaAdultosAdmin.php'; ?>

                            <legend></legend>
                            <center>
                                <div class="control-group">
                                    <button type="button" class="btn btn-primary" id="modiAdulto" data-dismiss="modal" style="display: none">Modificar</button> &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary" id="returnFichas2" data-dismiss="modal">Volver</button>
                                </div>
                            </center>

                        </div> 

                        <!-- FORMULARIO DE TALLERES PSICOSOCIALES -->
                        <div id="divFrmTalleresPsio" style="display: none">

                            <?php include_once '../Formularios/frmTallerPlaneacionPsico.php'; ?>

                        </div>

                    </div>
                </div>

                <!--.Footer-->


            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesSemillerosPsicologo.js" type="text/javascript"></script>
        <script src="../js/funcionesFichasNinos.js" type="text/javascript"></script>
        <script src="../js/funcionesFichasAdultos.js" type="text/javascript"></script>
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