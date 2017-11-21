<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Administrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>
<!Interfaz gráfica que permite el registro de usuarios al sistema y a su vez visualizar todos los usuarios existentes y su estado si se encuentra activo o inactivo>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/alertify.css">
        <link rel="stylesheet" type="text/css" href="../css/themes/default.css">
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
                    <h1 align="center">Registro de Usuarios</h1>
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

                        <?php include_once '../Formularios/frmUsuarios.php'; ?>
                        
                        <br>
                        <center>
                            <div class="control-group">
                                <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" id="save">Guardar</button>
                                <button type="button" class="btn btn-primary" id="modi" data-dismiss="modal" style="display: none">Modificar</button>
                                <button type="button" class="btn btn-primary" id="update" data-dismiss="modal" style="display: none">Actualizar</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" id="restore" data-dismiss="modal" style="display: none">Restablecer Usuario</button>
                            </div>
                        </center>

                        <div class="control-group">                                
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Listado de Administradores &nbsp;&nbsp;</button>
                            <!-- tabs left -->
                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#a" data-toggle="tab" class="">Administradores</a></li>
                                        <li><a href="#b" data-toggle="tab" class="">Administradores Inactivos</a></li>
                                    </ul>

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="a">

                                            <br>
                                             <?php
                                              include_once '../Model/libUsuarios.php';
                                              $usuario = new libUsuarios();
                                              $usuario->contarUsuarios();
                                              echo  $usuario->getResult();

                                             ?>
                                            <br>
                                            <br>
                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                  
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Documento</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Nombres</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Apellidos</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Celular</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Perfil</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Último Ingreso</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Deshabilitar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  id="index_ajax">
                                                    
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="b">

                                            <br>
                                            <?php
                                              include_once '../Model/libUsuarios.php';
                                              $usuario = new libUsuarios();
                                              $usuario->contarUsuarioseliminados();
                                              echo  $usuario->getResult();

                                             ?>
                                            <br>
                                            <br>
                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Documento</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Nombres</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Apellidos</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Celular</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Perfil</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Último Ingreso</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
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
                </div>

                <!--.Footer-->


            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesUsuarios.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/alertify.min.js"></script>

        <!-- Control de recargas de las tablas, siempre debe ir de ultima en las referencias js -->
        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

        <input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
        <div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

    </body>
</html>
<!--
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
<div class="modal fade" id="confirmacionRestablecer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 5000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <center>
                    <div class="form-group">
                        <p id="modal-message">New message</p>
                    </div>             
                    <br>
                    <div class="control-group">
                        <button type="button" class="btn btn-primary" id="yes" data-dismiss="modal">Si</button> &nbsp;&nbsp; 
                        <button type="button" class="btn btn-primary" id="not" data-dismiss="modal">No</button>
                    </div>
                </center>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
-->