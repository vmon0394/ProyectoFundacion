<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Comunicaciones") {
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
                        <a href="#" title="Sistema de Gestión | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>              
                    </div>
                    <br>
                    <h1 align="center">Registro Organizaciones</h1>
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
                        <form  method="POST" class="form-horizontal" id="frmOrganizaciones">     
                            <div class="tab-pane">
                                <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
                                <br> 
                                <input id="idOrganizacion"  name="idOrganizacion" type="hidden">

                                <div class="twoColumns">
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Nombre Organización *</label>
                                        <div class="controls input-group">
                                            <input id="organizacion"  name="organizacion" type="text" placeholder="Ingrese el Nombre de la Organización" class="input-xlarge">
                                        </div>
                                    </div> 
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Dirección *</label>
                                        <div class="controls input-group">
                                            <input id="direccion"  name="direccion" type="text" class="input-large">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Contacto *</label>
                                        <div class="controls input-group">
                                            <input id="contacto"  name="contacto" type="text" placeholder="Ingrese nombre del Contacto" class="input-large">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Cargo *</label>
                                        <div class="controls input-group">
                                            <input id="cargo" name="cargo" placeholder="Ingrese cargo del contacto" class="input-large">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Telefono *</label>
                                        <div class="controls input-group">
                                            <input id="telefono" name="telefono" placeholder="Ingrese telefono del contacto" class="input-large">
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
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Contacto 2</label>
                                        <div class="controls input-group">
                                            <input id="contacto2"  name="contacto2" type="text" placeholder="Ingrese nombre del Contacto" class="input-large">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Cargo</label>
                                        <div class="controls input-group">
                                            <input id="cargo2" name="cargo2" placeholder="Ingrese cargo del contacto" class="input-large">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Telefono </label>
                                        <div class="controls input-group">
                                            <input id="telefono2" name="telefono2" placeholder="Ingrese telefono del contacto" class="input-large">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Celular</label>
                                        <div class="controls input-group">
                                            <input id="celular2"  name="celular2" type="text" placeholder="Ingrese el Celular del Contacto" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">E-mail</label>
                                        <div class="controls input-group">
                                            <input id="email2"  name="email2" type="text" placeholder="Ingrese el E-mail del Contacto" class="input-xlarge">
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
                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Listado de Organizaciones &nbsp;&nbsp;</button>
                                    <!-- tabs left -->
                                    <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                        <div class="tabbable tabs-left">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#a" data-toggle="tab" class="">Organizaciones</a></li>
                                                <li><a href="#b" data-toggle="tab" class="">Organizaciones Eliminadas</a></li>
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
                                                            $sql = "SELECT COUNT(*) as contarorganizacion FROM tbl_organizaciones WHERE isdelOrganizacion = 1";
                                                            $rs = $conexion->query($sql);
                                                                if ($numero = $rs->fetch_assoc()){
                                                                echo  "<h4>Organizaciones Existentes: ".$numero['contarorganizacion']."</h4>";
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
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Organización</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Contacto</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Cargo</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Teléfono</th>
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
                                                            $sql = "SELECT COUNT(*) as contarorganizacion FROM tbl_organizaciones WHERE isdelOrganizacion = 0";
                                                            $rs = $conexion->query($sql);
                                                                if ($numero = $rs->fetch_assoc()){
                                                                echo  "<h4>Organizaciones Eliminadas: ".$numero['contarorganizacion']."</h4>";
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
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Organización</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Contacto</th>
                                                                    <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Teléfono</th>
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
                
                
            </div>       
        </div>
        <!--/.Content Wrapper-->

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesOrganizaciones.js" type="text/javascript"></script>
        
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