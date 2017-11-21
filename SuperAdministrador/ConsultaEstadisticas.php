<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["perfil"] != "Facilitador" && $_SESSION["perfil"] != "SuperAdministrador")) {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>

<?php include_once'../Model/conexion.php'?>
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
                    <h1 align="center">Estadísticas Semilleros</h1>
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

                        <label class="alert alert-info">Selecione un semillero para ver sus estadísticas </label>
                        <br>
                        <form  method="POST" class="form-horizontal" id="frmEstadisticas">     
                            <div class="tab-pane">

                                <div class="twoColumns">

                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Semillero *</label>
                                        <div class="controls input-group">
                                            <select id="semillero"  name="semillero" class="input-xlarge">
                                                <?php
                                                include_once '../Model/libCombos.php';
                                                $combo = new libCombos();
                                                $combo->comboSemilleros2();
                                                echo $combo->getResult();
                                                ?>
                                            </select>
                                        </div>
                                    </div>  
                                   
                                </div>

                            </div>
                        </form>
                            <br>
                        <center>
                            <div class="control-group">
                                <button type="button" class="btn btn-primary" id="clear" data-dismiss="modal">Limpiar</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" id="consult" data-dismiss="modal">Consultar</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" id="download" data-dismiss="modal" style="display: none;">Descargar</button>
                            </div>
                        </center>

                        <div id="consultaEstadistica" style="display: none;">

                            <br>
                            <div id="" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                <br>
                                <h2 align="center" id="tituloReporte">Detalles Semilleros</h2>
                                <br>

                                <div class="table-responsive">                            
                                    <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                        <thead>
                                            <tr>
                                                <!--<th href="" class="text-center" style="padding-right: 10px; color: #000; width:210px">Manejo de emociones</th>-->
                                                <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Total inscritos</th>
                                                <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Activos</th>
                                                <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Con procesos de mas de 1 año</th>
                                                <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Nuevos 2016</th>
                                                <th href="" class="text-center" style="padding-right: 10px; color: #000; width:200px">Retirados</th>
<!--                                                <th href="" class="text-center" style="padding-right: 10px; color: #000; width:50px">Cantidad talleres</th>
                                                <th href="" class="text-center" style="padding-right: 10px; color: #000; width:50px">Asistencias</th>
                                                <th href="" class="text-center" style="padding-right: 10px; color: #000; width:50px">Promedio participacion</th>
                                                <th href="" class="text-center" style="padding-right: 10px; color: #000; width:50px">Promedio % participacion</th>-->
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

                <!--.Footer-->


            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesConsultaEstadisticas.js" type="text/javascript"></script>

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