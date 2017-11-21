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
                        <a href="#" title="Sistema de Gestion | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>          
                    </div>
                    <br>
                    <h1 align="center">Préstamo y Devoluciones</h1>
                </div>
            </div>
            <br>
            <br>
            <!--.Navigation Bar -->
            <?php include_once 'menuLaboratorio.php'; ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">
                    <div class="tab-content"> 
                         <label class="alert alert-info">Todos los campos en este formulario son obligatorios </label>

                        <?php include_once '../Formularios/frmPrestamoDevolucion.php'; ?>
                         
                         <div class="control-group">                                
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Artículos Prestados &nbsp;&nbsp;</button>
                            <!-- tabs left -->
                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                <div class="tabbable tabs-left">
                                    <div class="tab-content">


                                           <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>              
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Nombre</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Apellido</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Material</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">fecha préstamo</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">fecha a Devolver</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:80px">Devolver</th>
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
                    </div>
                </div>

                <!--.Footer-->
               
            </div>       
      
        
        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesPrestamoDevolucion.js" type="text/javascript"></script>

        <!-- Control de recargas de las tablas, siempre debe ir de ultima en las referencias js -->
        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>

        <input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
        <div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

    </body>
</html>

<div class="modal fade" id="confirmacionRestablecer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 5000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <?php include_once'../Formularios/frmEntregaMaterial.php'; ?>
            </div>
            <div class="modal-footer">
                <center>
                    <button id="entregaMaterial" name="entregaMaterial" type="button" class="btn btn-primary" data-dismiss="modal">Entregar</button>
                </center>
            </div>
        </div>
    </div>
</div>
    