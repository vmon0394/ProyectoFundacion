<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["perfil"] != "Facilitador" && $_SESSION["perfil"] != "Psicólogo")) {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}

include_once '../Model/db.conn.php';
include_once '../Model/libAgregartaller.php';


$usuario = $_SESSION["idUsuario"];
//$idSemillero = isset($_GET['semillero']) ? $_GET['semillero'] : '0';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>Fundación | Facilitador</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="SistemaFundacion/js/sweetalert.min.js"></script>

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
                   <section id="registrartaller"><button type='button' class='btn btn-primary' data-dismiss='modal'>Registrar Taller</button></section>
                   <br>
                    <section id="semilleros" style='position:relative;display:none'>  
                       <?php
                            include_once '../Model/conexion.php';
                            $link = new Conexion();

                            $resp;
                            $conexion =$link->conectar();
       
                            if (!$conexion) {
                                $this->respuesta = "fail";
                                $this->mensaje = $this->link->getError();
                                $resp = FALSE;
                            } else {
                                $tabla = "";
                                $sql = "SELECT * FROM tbl_semilleros  WHERE idProfesor = '".$usuario."'";
                                $rs = $conexion->query($sql);
                                    while ($numero = $rs->fetch_array()){
                                    echo" 
                                        <a href='agregartaller.php?ui=".base64_encode($numero["idSemillero"])."'><button type='button' class='btn btn-primary' data-dismiss='modal'>".$numero["nombreSemillero"]."</button></a><br><br>";
                                     }
                                     $link->desconectar();
                                } 
                        ?>
                    </section>
                    <section id="cerrar" style='position:relative;display:none'><button type='button' class='btn btn-primary' data-dismiss='modal'>Cerrar</button></section>
                    <div class="tab-content"> 
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
                                        $combo->fichasociofamiliares();
                                        echo $combo->getResult();
                                        ?>
                                    </tbody>
                            </table>
                        <br>
                        <section id="atras2"><button type='button' class='btn btn-primary' data-dismiss='modal'>Volver</button></section>
                    </section>

                        <div id="consulta" style="display: none;">

                            <?php include_once '../Formularios/frmSemillerosFacilitador.php'; ?>

                        </div>

                        <div id="listadoSemilleros" style="display: block;">  
                            <br>

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
                                                        <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Categoría</th>
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

                        <!-- TABLA CON EL LISTADO DE LAS FICHAS DEL SEMILLERO SELECCIONADO -->
                        <div id="listadoFichas" style="display: none;">

                            <?php include_once 'listadoFichas.php'; ?>

                        </div>

                        <!-- FORMULARIO FICHA SOCIO FAMILIAR NIÑOS -->
                        <div id="fichaSocioFamiliarNinos" style="display: none; z-index: 2000px;">

                            <!-- INICIO FORMULARIO FICHA SOCIO FAMILIAR -->
                            <?php include_once '../Formularios/frmFichaNinos.php'; ?>

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
                            <?php include_once '../Formularios/frmFichaAdultos.php'; ?>

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
        <script src="../js/funcionesSemillerosFacilitador.js" type="text/javascript"></script>
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