<?php
include_once '../Model/db.conn.php';
include_once '../Model/libServiciosmodificado.php';
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
        <link rel="stylesheet" type="text/css" href="//cdn.datables.net/1.10.11/css/jquery.dataTables.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="SistemaFundacion/js/sweetalert.min.js"></script>
        <title>Fundación | SuperAmin</title>
        <script>
            $(document).ready( function () {
                $('#datatable').DataTable();
            });
        </script>
        <script>
          $(document).ready(function(){

            <?php
            if(isset($_GET["msn"]) and isset($_GET["tm"]))
            {
              echo "swal('".$_GET["msn"]."','','".$_GET["tm"]."');";
            }
           ?>
        });
        </script>
        <title>Fundación | SuperAmin</title>

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
                    <h1 align="center">Registro Servicios</h1>
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
                    
                        <label class="alert alert-info">Los campos marcados con * son obligatorios.</label>
                        <form  method="POST" class="form-horizontal" action="../Controller/ctrlServiciosModificados.php" enctype="multipart/form-data" >     
                            <div class="tab-pane">

                                <div class="twoColumns">

                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Nombre servicio *</label>
                                        <div class="controls input-group">
                                            <input type="text" name="nombreServicio" required>
                                        </div>
                                    </div>
            
                                    <div class="control-group">
                                        <center>
                                            <h4>Favor nombrar el servicio como se le indica a continuación: nombreServicio_Fecha.pdf</h4>
                                            <h5>Formatos permitidos PDF</h5>
                                        </center>
                                            <div class="controls input-group">
                                                <input type="file" multiple name="Imagen_Upload" onchange="url.value = this.value.replace('C:\\fakepath\\', '')" >
                                            </div>
                                            <div>
                                               <input type="hidden" name="url"> 
                                            </div>
                                    </div>
                                    <div class="control-group">
                                            <div class="controls input-group">
                                                <input type="hidden" name="isdelServicio" value="1" class="input-xlarge" required>
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Descripcion de Servicio* </label>
                                            <div class="controls input-group">
                                                <textarea name="descripcion" rows="3" placeholder="Descripcion de servicio " class="input-xlarge" required></textarea>
                                            </div>
                                    </div>  
                                </div>
                            </div>
                            <br>
                            <center>
                                <button type="submit" class="btn btn-primary" name="acc" value="jfaci">Guardar</button>
                            </center>  
                        </form>


                        <div class="control-group">                                
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Listado de Servicios &nbsp;&nbsp;</button>
                            <!-- tabs left -->
                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
                       
                                    <table id="datatable" class="display">
                                        <thead>
                                            <tr>
                                                <th>Nombre De Servicio</th>
                                                <th>Descripcion</th>
                                                <th>Ver PDF</th>
                                                <th>Modificar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                         $servicio = activicomuni::Serviciosall();
                                            foreach ($servicio as $numero) {
                                                    echo" 
                                                        <tr>
                                                            <td>".$numero["nombreServicio"]."</td>
                                                            <td>".$numero["descripcion"]."</td>
                                                            <td><center><a href='../Archivos/Servicio_Documentos/".$numero["url"]."' target='_blank'><img src='../img/ojo.png' border= '0' height='20' width='30'/></a></center></td>
                                                            <td><center><a href='ModificarServiciofacilitador.php?ui=".base64_encode($numero["idServicio"])."'><img src='../img/chulo.png' border= '0' height='20' width='30'/></a></center></td>
                                                            <td><center><a href='../Controller/ctrlServiciosModificados.php?ui=".base64_encode($numero["idServicio"])."&acc=efa'><img src='../img/dele.png' border= '0' height='20' width='40'/></a></center></td>
                                                        </tr>";
                                                    }
                                        ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    <!--.Footer-->
                </div>
            </div>
        </div>

        <!-- Referencias js -->
        
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesServicios.js" type="text/javascript"></script>

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