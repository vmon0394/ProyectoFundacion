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
                        <a href="#" title="Sistema de Gestión | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>          
                    </div>
                    <br>
                    <h1 align="center">Formatos Fundación</h1>
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


                        <form  method="POST" class="form-horizontal" id="frmUploadFormato" enctype="multipart/form-data">     
                            <div class="tab-pane">
                                <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
                                <br> 
                                <input id="idFormato"  name="idFormato" type="hidden">

                                <div class="control-group">
                                    <div class="controls"> 

                                        <div class="control-group">
                                            <label class="control-label" for="textinput">Nombre Formato *</label>
                                            <div class="controls input-group">
                                                <input id="formato"  name="formato" type="text" placeholder="Ingrese el Nombre del Formato" class="input-xxlarge">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <legend></legend>
                                <center>
                                    <h5>Formatos permitidos DOC, DOCX, XLS, XLSX Y PDF y Tamaño máximo 2MG.</h5>
                                </center>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="controls">
                                            <input name="archivoFormato" id="archivoFormato" type="file" size="35" />
                                        </div>
                                    </div>
                                </div>

                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" id="enviarFormato">Cargar Formato</button>
                                        <button type="button" class="btn btn-primary" id="updateFormato" style="display: none">Actualizar</button>
                                    </div>
                                </center>
                                <legend></legend>
                            </div>
                        </form>

                        <div class="control-group">                                
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Lista de Formatos &nbsp;&nbsp;</button>
                            
                            <!-- tabs left -->
                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
                            <br>
                            <?php  
                            include_once '../Model/libFormatos.php';
                            $formatos = new libFormatos();
                            $formatos->contarFormatos();
                            echo  $formatos->getResult();
                            ?>  
                            <br>
                                <div class="table-responsive">                            
                                    <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                <th class="text-center" style="padding-right: 10px; color: #000; width:600px">Formato</th>
                                                <th class="text-center" style="padding-right: 10px; color: #000; width:30px">Descargar</th>
                                                <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Eliminar</th>
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
                <?php //include_once '../includes/footer.php'; ?>

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesFormatos.js" type="text/javascript"></script>

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