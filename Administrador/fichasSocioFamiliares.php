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
                    <h1 align="center">Consulta Fichas Socio familiares</h1>
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
                        <form  method="POST" class="form-horizontal" id="frmIngreso">     
                            <div class="tab-pane">
                                <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
                                <br> 

                                <div class="control-group">
                                    <div class="controls">
                                        <div class="control-group">
                                            <label class="control-label" for="textinput">Semillero *</label>
                                            <div class="controls input-group">
                                                <select id="semillero" name="semillero" class="input-xlarge">
                                                    <option>SELECCIONE SEMILLERO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="consult" data-dismiss="modal">Consultar</button>  
                                    </div>
                                </center>

                            </div>
                        </form>

                        <div class="control-group">                                
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Listado de Fichas &nbsp;&nbsp;</button>
                            <!-- tabs left -->
                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#a" data-toggle="tab" class="">Fichas Socio familiares</a></li>
                                        <li><a href="#b" data-toggle="tab" class="">Fichas Eliminadas</a></li>
                                    </ul>

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="a">

                                            <br>
                                            <h4>Fichas Socio familiares Existentes</h4>
                                            <br>
                                            <br>
                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Documento</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Nombres</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Apellidos</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Sexo</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Año Ingreso</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Grado</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:30px">Archivos</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:30px">Ver</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  id="index_ajax">

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="b">

                                            <br>
                                            <h4>Fichas Socio familiares Eliminadas</h4>
                                            <br>
                                            <br>
                                            <div class="table-responsive">                            
                                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Documento</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Nombres</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Apellidos</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Sexo</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Año Ingreso</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Grado</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:30px">Ver</th>
                                                            <th class="text-center" style="padding-right: 10px; color: #000; width:30px">Habilitar</th>
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

                        <div id="detalleFicha">

                            <?php include_once 'detalleFichasSociodamiliar.php'; ?>

                            <br>
                            <div class="control-group">                                
                                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo2">Documentos &nbsp;&nbsp;</button>
                                <!-- tabs left -->
                                <div id="demo2" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                    <div class="table-responsive">                            
                                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Tipo</th>
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Fecha</th>
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:40px">Ver</th>
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:40px">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody  id="index_ajax">

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="control-group">                                
                                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo2">Observaciones &nbsp;&nbsp;</button>
                                <!-- tabs left -->
                                <div id="demo2" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                    <div class="table-responsive">                            
                                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Tipo</th>
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Observación</th>
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:40px">Persona</th>
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:40px">Editar</th>
                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:40px">Eliminar</th>
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

                <!--.Footer-->
                <?php //include_once '../includes/footer.php'; ?>
                
            </div>       
        </div>
        <!--/.Content Wrapper-->


        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>

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