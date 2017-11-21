<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "SuperAdministrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>Fundación | Super Admin</title>

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
                    <h1 align="center">Atención y Seguimiento Psicológico <br> y/o Consultoría - Participantes</h1>
                </div>
            </div>
            <br>
            <!--.Navigation Bar -->
            <?php include_once 'menu.php'; ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->


            <div class="row-fluid">                
                <div class="breadcrumb">

                    <div class="tab-content"> 

                        <form  method="POST" class="form-horizontal" id="frmHistoriaMedica">     
                            <div class="tab-pane">
                                <label class="alert alert-info">Si desea consultar o iniciar una nueva asesoría o consultoría, seleccione un tipo de registro e ingrese el documento en el consecutivo.</label>
                                <br>

                                <div class="twoColumns">

                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Tipo Registro *</label>
                                        <div class="controls input-group">
                                            <select id="tipoRegistro" name="tipoRegistro" class="input-large">
                                                <option value="0">SELECCIONE UN TIPO</option>
                                                <option value="Asesoria">Asesoría</option>
                                                <option value="Consultoria">Consultoría</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div id="nombreTipo"><h3>Asesorías y Consultorías</h3></div>
                                    </div>

                                </div>

                            </div>
                        </form>

                        <!-- FORMULARIO ASESORIA PARTICIPANTE -->
                        <div id="historialParticipante" style="display: none;">

                            <!-- INICIO FORMULARIO ASESORIA PARTICIPANTE -->
                            <?php include_once '../Formularios/frmAsesoriaParticipante.php'; ?>

                            <div id="divLimpiarAsesoria" style="display: none;">

                                <legend></legend>
                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="clearAsesoria" data-dismiss="modal">Finalizar</button> &nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" id="verImprimirAsesoria" data-dismiss="modal">Imprimir</button>
                                    </div>
                                </center>

                            </div>   

                        </div>

                        <!-- FORMULARIO CONSULTORIA PARTICIPANTE -->
                        <div id="consultoriaParticipante" style="display: none;">

                            <!-- INICIO FORMULARIO CONSULTORIA PARTICIPANTE -->
                            <?php include_once '../Formularios/frmConsultoriaParticipante.php'; ?>

                            <div id="divLimpiarConsultoria" style="display: none;">

                                <legend></legend>
                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="clearConsultoria" data-dismiss="modal">Finalizar</button> &nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" id="verImprimirConsultoria" data-dismiss="modal">Imprimir</button>
                                    </div>
                                </center>

                            </div>   

                        </div>

                        <div id="listadoHistorias" style="display: block;">

                            <legend></legend>

                            <!-- INICIO FORMULARIO CONSULTORIA PARTICIPANTE -->
                            <?php include_once 'listadoHistoriasMedicas.php'; ?>

                        </div>

                    </div>
                </div>

                <!--.Footer-->
                
                
            </div>       
        </div>
        <!--/.Content Wrapper-->

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesHistorialMedico.js" type="text/javascript"></script>
        <script src="../js/funcionesAsesoriaParticipante.js" type="text/javascript"></script>
        <script src="../js/funcionesConsultoriaParticipante.js" type="text/javascript"></script>

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