<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["perfil"] != "Facilitador" && $_SESSION["perfil"] != "Psicólogo")) {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
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
                    <h1 align="center">Ficha Socio Familiar</h1>
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

                        <form  method="POST" class="form-horizontal" id="frmFichaSocioFamiliar">     
                            <div class="tab-pane">
                                <label class="alert alert-info">Los campos marcados con * son obligatorios </label>

                                <div class="twoColumns">

                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Tipo Registro *</label>
                                        <div class="controls input-group">
                                            <select id="tipoRegistro" name="tipoRegistro" class="input-large">
                                                <!--<option value="0">SELECCIONE UN TIPO</option>-->
                                                <option value="Niño">Niño</option>
                                                <option value="Adulto">Adulto</option>
<!--                                                <option value="Egresados">Egresados</option>
                                                <option value="VoluntariosEx">Voluntarios Externos</option>-->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div id="nombreTipo"><h3>Registro Ficha Niños</h3></div>
                                    </div>

                                </div>

                            </div>
                        </form>

                        <!-- FORMULARIO FICHA SOCIO FAMILIAR NIÑOS -->
                        <div id="fichaSocioFamiliarNinos" style="display: block;">

                            <!-- INICIO FORMULARIO FICHA SOCIO FAMILIAR -->
                            <?php include_once '../Formularios/frmFichaNinos.php'; ?>

                            <div id="divLimpiar">

                                <legend></legend>
                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="clearNino" data-dismiss="modal">Nuevo</button>
                                    </div>
                                </center>

                            </div>

                        </div>

                        <!-- FORMULARIO FICHA SOCIO FAMILIAR ADULTOS -->
                        <div id="fichaSocioFamiliarAdultos" style="display: none;">

                            <!-- INICIO FORMULARIO FICHA SOCIO FAMILIAR -->
                            <?php include_once '../Formularios/frmFichaAdultos.php'; ?>

                            <div id="divLimpiarAdulto">

                                <legend></legend>
                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="clearAdulto" data-dismiss="modal">Nuevo</button>
                                    </div>
                                </center>

                            </div>                            

                        </div>               
                        
                        <!-- FORMULARIO FICHA VOLUNTARIOS EXTERNOS Y EGRESADOS -->
                        <div id="fichaVoluntariosEgresados" style="display: none;">

                            <!-- INICIO FORMULARIO FICHA SOCIO FAMILIAR -->
                            <?php include_once '../Formularios/frmFichaVoluntariosEgresados.php'; ?>

                            <div id="divLimpiarVolunEgres">

                                <legend></legend>
                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="clearVolunEgres" data-dismiss="modal">Nuevo</button>
                                    </div>
                                </center>

                            </div>                            

                        </div>                  

                    </div>
                </div>

                <!--.Footer-->
                
                
            </div>       
        </div>
        <!--/.Content Wrapper-->

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesFichaSocioFamiliar.js" type="text/javascript"></script>
        <script src="../js/funcionesFichasNinos.js" type="text/javascript"></script>
        <script src="../js/funcionesFichasAdultos.js" type="text/javascript"></script>
        <script src="../js/funcionesVoluntariosEgresados.js" type="text/javascript"></script>

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