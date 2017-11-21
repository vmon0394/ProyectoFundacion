<?php
session_start();
if (!isset($_SESSION["usuario"]) || ($_SESSION["perfil"] != "Facilitador")) {
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
            <!--.Logo Bar & Login-->
            <div class="row-fluid">
                <div class="logobar">
                    <div class="logo pull-left">
                        <a href="#" title="Sistema de Gestión | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>              
                    </div>
                    <br>
                    <h1 align="center">Laboratorio lúdico </h1>
                </div>
            </div>
            <br>
            <!--.Navigation Bar -->
            <?php include_once 'menuLaboratorio.php'; ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">    
                <div class="breadcrumb">
                    <div class="tab-content"> 
                        <form  method="POST" class="form-horizontal" id="frmZonas">     
                            <div class="tab-pane" >
                                <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
                                <br> 
                                <input id="idZona"  name="idZona" type="hidden">

                                <div class="control-group">
                                    <div class="controls">
                                        <div class="control-group">
                                            <label class="control-label" for="textinput">Nombre zona *</label>
                                            <div class="controls input-group">
                                                <input id="nombreZona"  name="nombreZona" type="text" placeholder="Ingrese el Nombre de la Zona" class="input-xlarge">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="control-group">
                                            <label class="control-label" for="textinput">Alias zona *</label>
                                            <div class="controls input-group">
                                                <input id="alias"  name="alias" type="text" placeholder="Ingrese el Alias de la Zona" class="input-xlarge">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Guardar</button>  
                                        <button type="button" class="btn btn-primary" id="modi" data-dismiss="modal" style="display: none">Modificar</button>
                                        <button type="button" class="btn btn-primary" id="update" data-dismiss="modal" style="display: none">Actualizar</button>
                                    </div>
                                </center>

                                <div class="control-group">                                
                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Listado de Zonas &nbsp;&nbsp;</button>
                                    <!-- tabs left -->
                                    <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                        <div class="tabbable tabs-left">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#a" data-toggle="tab" class="">Zonas</a></li>
                                                <li><a href="#b" data-toggle="tab" class="">Zonas eliminadas</a></li>
                                            </ul>

                                            <div class="tab-content">

                                                <div class="tab-pane active" id="a">

                                                    <br>
                                                    <h4>Zonas existentes</h4>
                                                    <br>
                                                    <br>
                                                    <div class="table-responsive">                            
                                                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:400px">Nombre Zona</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Alias</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Consultar</th>
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
                                                    <h4>Zonas Eliminadas</h4>
                                                    <br>
                                                    <br>
                                                    <div class="table-responsive">                            
                                                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol2">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Zonas</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">alias</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Habilitar</th>
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
                        </form>
                    </div>
                </div>

                <!--.Footer-->
                
                
            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesZonas2.js" type="text/javascript"></script>

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