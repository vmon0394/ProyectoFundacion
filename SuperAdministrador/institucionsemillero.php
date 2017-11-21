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
        <link rel="stylesheet" type="text/css" href="//cdn.datables.net/1.10.11/css/jquery.dataTables.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

        <script>
            $(document).ready( function () {
                $('#datatable').DataTable();
            });
        </script>
        <script>
            $(document).ready( function () {
                $('#datatable1').DataTable();
            });
        </script>
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
                        <?php include_once '../Formularios/frmsemillerooinstitucion.php'; ?>                       

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
                                        <li class="active"><a href="#x" data-toggle="tab" class="">Instituciones y semilleros</a></li>
                                        <li><a href="#y" data-toggle="tab" class="">Instituciones o semilleros eliminados</a></li>
                                    </ul>

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="x">

                                         <table id="datatable" class="display">
                                            <thead>
                                                <tr>
                                                    <th>NIT</th>
                                                    <th>Nombre</th>
                                                    <th>Telefono</th>
                                                    <th>Celular</th>
                                                    <th>Contacto</th>
                                                    <th>Direccion</th>
                                                    <th>Consultar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                                <tbody>

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
                                                        $sql = "SELECT tbl_usuario_laboratorio.documento,tbl_usuario_laboratorio.nombre,
                                                        tbl_usuario_laboratorio.telefono,tbl_usuario_laboratorio.celular,tbl_usuario_laboratorio.acudiente,tbl_usuario_laboratorio.direccion
                                                        FROM tbl_usuario_laboratorio WHERE tipoRegistro IN ( 'Institucion', 'Semillero',isdelUsuario= 1)";
                                                        $rs = $conexion->query($sql);
                                                            while ($numero = $rs->fetch_array()){
                                                            echo" 
                                                                <tr>
                                                                    <td>".$numero["documento"]."</td>
                                                                    <td>".$numero["nombre"]."</td>
                                                                    <td>".$numero["telefono"]."</td>
                                                                    <td>".$numero["celular"]."</td>
                                                                    <td>".$numero["acudiente"]."</td>
                                                                    <td>".$numero["direccion"]."</td>
                                                                    <td><a href='edita_barberia1.php?ui=".base64_encode($numero["documento"])."'><img class='acciones' src='img/modificar.png'/></a></td>
                                                                    <td><a href='../barbershop/Controller/barberia.controller.php?ui=".base64_encode($numero["documento"])."&acc=d'><img class='acciones' src='img/cajadebasura.jpg'/></a></td>
                                                                </tr>";
                                                            }
                                                    $link->desconectar();
                                                    } 
                                                ?>
                                            </tbody>
                                        </table>
                                        </div>

                                        <div class="tab-pane" id="y">

                                            <br>
                                            <h4>Instituciones o semilleros Eliminados</h4>
                                            <br>
                                            <br>
                                            <table id="datatable1" class="display">
                                            <thead>
                                                <tr>
                                                    <th>NIT</th>
                                                    <th>Nombre</th>
                                                    <th>Telefono</th>
                                                    <th>Celular</th>
                                                    <th>Contacto</th>
                                                    <th>Direccion</th>
                                                    <th>Habilitar</th>
                                                </tr>
                                            </thead>
                                                <tbody>

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
                                                        $sql = "SELECT tbl_usuario_laboratorio.documento,tbl_usuario_laboratorio.nombre,
                                                        tbl_usuario_laboratorio.telefono,tbl_usuario_laboratorio.celular,tbl_usuario_laboratorio.acudiente,tbl_usuario_laboratorio.direccion
                                                        FROM tbl_usuario_laboratorio WHERE tipoRegistro IN ( 'Institucion', 'Semillero') AND isdelUsuario= 2";
                                                        $rs = $conexion->query($sql);
                                                            while ($numero = $rs->fetch_array()){
                                                            echo" 
                                                                <tr>
                                                                    <td>".$numero["documento"]."</td>
                                                                    <td>".$numero["nombre"]."</td>
                                                                    <td>".$numero["telefono"]."</td>
                                                                    <td>".$numero["celular"]."</td>
                                                                    <td>".$numero["acudiente"]."</td>
                                                                    <td>".$numero["direccion"]."</td>
                                                                    <td><a href='../barbershop/Controller/barberia.controller.php?ui=".base64_encode($numero["documento"])."&acc=d'><img class='acciones' src='img/cajadebasura.jpg'/></a></td>
                                                                </tr>";
                                                            }
                                                    $link->desconectar();
                                                    } 
                                                ?>
                                            </tbody>
                                        </table>

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