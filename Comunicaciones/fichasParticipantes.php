<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Comunicaciones") {
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
                    <br>
                    <h1 align="center">Fichas Participantes</h1>
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

                        <div id="listadoFichas">

                            <br>
                            <div id="" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#a" data-toggle="tab" class="">Fichas Socio Familiares</a></li>
                                        <li><a href="#b" data-toggle="tab" class="">Fichas Eliminadas</a></li>
                                    </ul>

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="a">

                                            <br>
                                            <h4>Fichas Socio Familiares Existentes</h4>
                                            <br>
                                            <br>
                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:90px">Documento</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:120px">Nombres</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:120px">Apellidos</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Semillero</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  id="index_ajax">

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="b">

                                            <br>
                                            <h4>Fichas Socio Familiares Eliminadas</h4>
                                            <br>
                                            <br>
                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:90px">Documento</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:130px">Nombres</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:130px">Apellidos</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Semillero</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Habilitar</th>
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

                        <!-- FORMULARIO FICHA VOLUNTARIOS EXTERNOS Y EGRESADOS -->
                        <div id="fichaVoluntariosEgresados" style="display: none;">

                            <!-- INICIO FORMULARIO FICHA SOCIO FAMILIAR -->
                            <?php include_once '../Formularios/frmFichaVoluntariosEgresados.php'; ?>

                            <div id="divLimpiarVolunEgres">

                                <legend></legend>
                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="modiVolunEgres" data-dismiss="modal" style="display: none">Modificar</button> &nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" id="returnFichas3" data-dismiss="modal">Volver</button>
                                    </div>
                                </center>

                            </div>                            

                        </div> 

                    </div>
                </div>

                <!--.Footer-->                
                <?php //include_once '../includes/footer.php'; ?>

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesFichasParticipantes.js" type="text/javascript"></script>        
        <script src="../js/funcionesFichasParticipantesNinosSuperAdmin.js" type="text/javascript"></script>
        <script src="../js/funcionesFichasParticipantesAdultosSuperAdmin.js" type="text/javascript"></script>
        <script src="../js/funcionesVoluntariosEgresadosSuperAdmin.js" type="text/javascript"></script>

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