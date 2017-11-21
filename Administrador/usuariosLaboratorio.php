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
                    <h1 align="center">Laboratorio lúdico</h1>
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

                        <label class="alert alert-info">Los campos marcados con * son obligatorios. <br />
                        Para seleccionar varios servicios mantenga la tecla control y, sin soltarla de click soble los servicios que desea marcar.</label>
                        <?php include_once '../Formularios/frmUsuariosLaboratorio.php'; ?>                       

                        <center>
                            <div class="control-group">
                                <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Guardar</button>  
                                <button type="button" class="btn btn-primary" id="modi" data-dismiss="modal" style="display: none">Modificar</button>
                                <button type="button" class="btn btn-primary" id="update" data-dismiss="modal" style="display: none">Actualizar</button>
                            </div>
                        </center>

                        <div class="control-group">                                
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Listado de usuarios &nbsp;&nbsp;</button>
                            <!-- tabs left -->
                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#x" data-toggle="tab" class="">Usuarios</a></li>
                                        <li><a href="#y" data-toggle="tab" class="">Usuarios eliminados</a></li>
                                    </ul>
                                    

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="x">
                                            <br>
                                            <?php  
                                            include_once '../Model/libUsuariosLaboratorio.php';
                                            $usuarios = new libUsuariosLaboratorio();
                                            $usuarios->contarUsuariosLaboratorio();
                                            echo  $usuarios->getResult();
                                            ?>  
                                            <br>
                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Nombres </th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Apellidos</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Edad</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Identificación</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Acudiente</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">Consultar</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  id="index_ajax">

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="y">

                                            <br>
                                            <?php  
                                            include_once '../Model/libUsuariosLaboratorio.php';
                                            $usuarios = new libUsuariosLaboratorio();
                                            $usuarios->contarUsuariosLaboratorioEliminado();
                                            echo  $usuarios->getResult();
                                            ?>  
                                            <br>
                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Nombres </th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Apellidos</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Identificacion</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Acudiente</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">Habilitar</th>
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
                <?php //include_once '../includes/footer.php'; ?>

            </div>       
        </div>
        
        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
<!--        <script type="text/javascript">
         $(document).ready(function() {
            $(".servicios").select2();
         });   
         
        </script>-->
        <script src="../js/funcionesUsuariosLaboratorio.js" type="text/javascript"></script>
        
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