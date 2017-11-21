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
                $("#reportetaller").on( "click", function() {
                    $('#semitalleres').show();
                    $('#atras').show();
                    $('#tablas').hide();
                    $('#reportetaller').hide();
                    $('#semillerosocio').hide();  
                });
                $("#atras").on( "click", function() {
                    $('#semitalleres').hide();
                    $('#atras').hide(); 
                    $('#tablas').show();
                    $('#reportetaller').show();
                    $('#semillerosocio').hide();  
                });

                $("#historiafichoso").on("click", function(){
                    $('#semillerosocio').show();
                    $('#atras2').show();
                    $('#atras').hide(); 
                    $('#tablas').hide();
                    $('#reportetaller').hide();
                });
                 $("#atras2").on( "click", function() {
                    $('#semitalleres').hide();
                    $('#semillerosocio').hide();
                    $('#atras2').hide(); 
                    $('#atras').hide(); 
                    $('#tablas').show();
                    $('#reportetaller').show();  
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
                    <h1 align="center">Semilleros Asignados</h1>
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
                <section id="reportetaller"><button type='button' class='btn btn-primary' data-dismiss='modal'>Reporte taller en PDF</button></section>
                    <div class="tab-content"> 
                    <section id="semitalleres" style='position:relative;display:none' >
                        <h2>Semilleros Disponibles</h2>
                           <table class="table table-striped table-hover table-bordered table-condensed" id="">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:40px; text-align:center;">Nº</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Semilleros</th>                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once '../Model/libReportesTalleres.php';
                                        $combo = new libReportesTalleres();
                                        $combo->listasemillerospdf();
                                        echo $combo->getResult();
                                        ?>
                                    </tbody>
                            </table>
                        <br>
                        <section id="atras"><button type='button' class='btn btn-primary' data-dismiss='modal'>Volver</button></section>
                    </section>
                    <section id="semillerosocio" style='position:relative;display:none' >
                        <h2>Buscar fichas por semilleros</h2>
                            <table class="table table-striped table-hover table-bordered table-condensed" id="">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:40px; text-align:center;">Nº</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Semilleros</th>                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once '../Model/libReportesTalleres.php';
                                        $combo = new libReportesTalleres();
                                        $combo->listasemilleros();
                                        echo $combo->getResult();
                                        ?>
                                    </tbody>
                            </table>
                        <br>
                        <section id="atras2"><button type='button' class='btn btn-primary' data-dismiss='modal'>Volver</button></section>
                    </section>
                        <div id="consulta" style="display: none;">

                            <br>
                            <?php include_once '../Formularios/frmSemillerosFacilitador.php'; ?> 

                        </div>

                        <div id="listadoSemilleros">
                            <br>

                            <div class="control-group">                                
                            <section id="tablas">
                                <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
                                    <br>
                                    <section id="historiafichoso"><button type='button' class='btn btn-primary' data-dismiss='modal'>Historial Ficha sociofamiliar</button></section>
                                    <div class="tabbable tabs-left">

                                        <div class="tab-content">
                                           
                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Semillero</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Categoría</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Facilitador</th>
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

                                <br>
                                <center>
                                    <div class="control-group">                                    
                                        <button type="button" class="btn btn-primary" id="vaciarTalleres" data-dismiss="modal">Limpiar Talleres Semilleros</button>
                                    </div>
                                </center>
                            </section>
                            </div>

                        </div>

                        <div id="listadoFichas" style="display: none">

                            <?php include_once 'listadoFichas.php'; ?>

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

                        <!-- FORMULARIO FICHA VOLUNTARIOS Y EGRESADOS -->
                        <div id="fichaSocioFamiliarVolunEgres" style="display: none;">

                            <!-- INICIO FORMULARIO FICHA SOCIO FAMILIAR -->
                            <?php include_once '../Formularios/frmFichaVoluntariosEgresados.php'; ?>

                            <legend></legend>
                            <center>
                                <div class="control-group">
                                    <button type="button" class="btn btn-primary" id="modiVolunEgres" data-dismiss="modal" style="display: none">Modificar</button> &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary" id="returnFichas3" data-dismiss="modal">Volver</button>
                                </div>
                            </center>

                        </div> 

                        <!-- FORMULARIO DE TALLERES -->
                        <div id="divFrmTalleres" style="display: none">

                            <?php include_once '../Formularios/frmTallerPlaneacionAdmin.php'; ?>

                        </div>

                    </div>
                </div>

                <!--.Footer-->

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesSemillerosAdministrador.js" type="text/javascript"></script>
        <script src="../js/funcionesTestimonios.js" type="text/javascript"></script>
        <script src="../js/funcionesEvidencias.js" type="text/javascript"></script>
        <script src="../js/funcionesFichasNinos.js" type="text/javascript"></script>
        <script src="../js/funcionesFichasAdultos.js" type="text/javascript"></script>
        <script src="../js/funcionesVoluntariosEgresados.js" type="text/javascript"></script>
        <script src="../js/funcionesTalleresAdministrador.js" type="text/javascript"></script>

        <!-- Control de recargas de las tablas, siempre debe ir de ultima en las referencias js -->
        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>

        <input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
        <div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

    </body>
</html>
<!-- ventana que muestra los mensajes de los niños que faltan a las fichas -->
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

<div class="modal fade" id="exampleLimpiarTalleres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 5000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">

                <form  method="POST" class="form-horizontal" id="frmContrasenaEliminarTalleres">     
                    <div class="tab-pane">

                        <label class="alert alert-error">Recuerda que esta acción permitirá eliminar los talleres realizados a los semilleros durante el año, esta información no se perderá por completo ya que será trasladada o uno nuevo archivo.
                            <br>
                            Si desea ejecutar esta acción ingrese la contraseña de usuario y de clic en eliminar talleres.
                        </label>
                        <br> 

                        <div class="control-group">
                            <label class="control-label" for="textinput">Contraseña : </label>
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-lock"></i></span><input class="span2" name="contrasena" placeholder="Contraseña" id="contrasena" size="16" type="password">
                            </div> 
                        </div>
                        <center>
                            <div class="control-group">
                                <button type="button" class="btn btn-primary" id="deleteTalleresYear" data-dismiss="modal">Eliminar Talleres</button>
                            </div>
                        </center>

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTablaHistorialSemilleros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 7000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalTablaLabel">New message</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">                            
                    <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolHistorialSemilleros">
                        <thead>
                            <tr>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                <th class="text-center" style="padding-right: 10px; color: #000; width:400px">Semillero</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Fecha</th>
                            </tr>
                        </thead>
                        <tbody  id="index_ajax">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>