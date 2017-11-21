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
                    <h1 align="center">Detalles de los Talleres</h1>
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

                        <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
                        <form  method="POST" class="form-horizontal" id="frmDetallesTalleres">     
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
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Desde *</label>
                                        <div class="controls input-group">
                                            <input id="fechaDesde"  name="fechaDesde" type="date" class="input-xlarge">
                                        </div>
                                    </div>          

                                    <br>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Tipo *</label>
                                        <div class="controls input-group">
                                            <select id="tipoBusqeda" name="tipoBusqeda" class="input-large">
                                                <option value="0">SELECCIONE UN TIPO</option>
                                                <option value="1">Dificultades</option>
                                                <option value="2">Experiencias Significativas</option>
                                                <option value="3">Recomendaciones</option>
                                                <option value="4">Testimonios</option>
                                                <option value="5">Alertas</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Hasta *</label>
                                        <div class="controls input-group">
                                            <input id="fechaHasta"  name="fechaHasta" type="date" class="input-xlarge">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>

                        <center>
                            <div class="control-group">
                                <button type="button" class="btn btn-primary" id="clear" data-dismiss="modal">Limpiar</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" id="consult" data-dismiss="modal">Consultar</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" id="download" data-dismiss="modal" style="display: none;">Descargar</button>
                            </div>
                        </center>

                        <div id="consultaDetallers" style="display: none;">

                            <br>
                            <div id="" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                <br>
                                <h2 align="center" id="tituloDetalle">Detalles de los Talleres</h2>
                                <br>

                                <div class="table-responsive">                            
                                    <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Fecha</th>
                                                <th class="text-center" style="padding-right: 10px; color: #000; width:600px">Descripción</th>
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
        <script src="../js/funcionesConsultaDetallesTalleres.js" type="text/javascript"></script>

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