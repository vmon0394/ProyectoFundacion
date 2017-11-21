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
                    <h1 align="center">Registro Aliados</h1>
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
                        <form  method="POST" class="form-horizontal" id="frmAliados">     
                            <div class="tab-pane">
                                <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
                                <br> 
                                <input id="idAliado"  name="idAliado" type="hidden">

                                <div class="twoColumns">

                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Proyecto *</label>
                                        <div class="controls input-group">
                                            <select id="proyecto" name="proyecto" class="input-xlarge">
                                                <?php
                                                include_once '../Model/libCombos.php';
                                                $combo = new libCombos();
                                                $combo->comboProyectos();
                                                echo $combo->getResult();
                                                ?>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">NIT *</label>
                                        <div class="controls input-group">
                                            <input id="nit"  name="nit" type="text" placeholder="Ingrese el NIT del Aliado" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Nombre Aliado *</label>
                                        <div class="controls input-group">
                                            <input id="aliado"  name="aliado" type="text" placeholder="Ingrese el Nombre del Aliado" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Departamento *</label>
                                        <div class="controls input-group">
                                            <select id="departamento" name="departamento" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamento').value, 'municipio');">
                                                <?php
                                                include_once '../Model/libCombos.php';
                                                $combo = new libCombos();
                                                $combo->comboDepartamentos();
                                                echo $combo->getResult();
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Municipio *</label>
                                        <div class="controls input-group">
                                            <select id="municipio" name="municipio" class="input-xlarge">
                                                <option value="0">SELECCIONE UN MUNICIPIO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Dirección *</label>
                                        <div class="controls input-group">
                                            <input id="direccion"  name="direccion" type="text" placeholder="Ingrese la Dirección del Aliado" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Contacto *</label>
                                        <div class="controls input-group">
                                            <input id="contacto"  name="contacto" type="text" placeholder="Ingrese el Nombre del Contacto" class="input-xlarge">
                                        </div>
                                    </div>                                    
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Teléfono *</label>
                                        <div class="controls input-group">
                                            <input id="telefono"  name="telefono" type="text" placeholder="Ingrese el Teléfono del Contacto" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Celular</label>
                                        <div class="controls input-group">
                                            <input id="celular"  name="celular" type="text" placeholder="Ingrese el Celular del Contacto" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">E-mail *</label>
                                        <div class="controls input-group">
                                            <input id="email"  name="email" type="text" placeholder="Ingrese el E-mail del Contacto" class="input-xlarge">
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
                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Listado de los Aliados &nbsp;&nbsp;</button>
                                    <!-- tabs left -->
                                    <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                        <div class="tabbable tabs-left">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#a" data-toggle="tab" class="">Aliados</a></li>
                                                <li><a href="#b" data-toggle="tab" class="">Aliados Eliminados</a></li>
                                            </ul>

                                            <div class="tab-content">

                                                <div class="tab-pane active" id="a">

                                                    <br>
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
                                                            $sql = "SELECT COUNT(*) as contaraliados FROM tbl_aliados WHERE isdelAliados = 1";
                                                            $rs = $conexion->query($sql);
                                                                if ($numero = $rs->fetch_assoc()){
                                                                echo  "<h4>Aliados Existentes: ".$numero['contaraliados']."</h4>";
                                                                }else{
                                                                $this->result="Se Presento un Error";
                                                                }
                                                        $link->desconectar();
                                                             } 
                                                     ?> 
                                                    <br>
                                                    <br>
                                                    <div class="table-responsive">                            
                                                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:150px">NIT</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Aliado</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Contacto</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
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
                                                            $sql = "SELECT COUNT(*) as contaraliados FROM tbl_aliados WHERE isdelAliados = 0";
                                                            $rs = $conexion->query($sql);
                                                                if ($numero = $rs->fetch_assoc()){
                                                                echo  "<h4>Aliados Eliminados: ".$numero['contaraliados']."</h4>";
                                                                }else{
                                                                $this->result="Se Presento un Error";
                                                                }
                                                        $link->desconectar();
                                                             } 
                                                     ?> 
                                                    <br>
                                                    <br>
                                                    <div class="table-responsive">                            
                                                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol2">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:150px">NIT</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Aliado</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Contacto</th>
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
                        </form>
                    </div>
                </div>

                <!--.Footer-->
                <?php //include_once '../includes/footer.php'; ?>
                
            </div>       
        </div>
        <!--/.Content Wrapper-->

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesAliados.js" type="text/javascript"></script>
        
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