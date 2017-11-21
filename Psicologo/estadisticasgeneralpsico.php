<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Psicólogo") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}

$usuario = $_SESSION["idUsuario"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>Fundación | Psicologo</title>

        <!-- Referencias js,css -->
        <?php include_once '../includes/head.php'; ?>
    </head>
    <body>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#registrartaller").on( "click", function() {
            $('#semilleros').show();
            $('#cerrar').show(); 
            $('#registrartaller').hide(); 
         });
        $("#cerrar").on( "click", function() {
            $('#semilleros').hide();
            $('#cerrar').hide(); 
            $('#registrartaller').show();
        });
    });
    </script>
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
                    <h1 align="center">Reporte General Semilleros</h1>
                </div>
            </div>
            <br>
            <br>
            <!--.Navigation Bar -->
            <?php include_once 'menuPsicologo.php'; ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">  
                <center>
                <h2>Estadisticas General</h2>
                </center>
                <br>
                <p>Seleccione un Semillero:</p><section id="registrartaller"><button type='button' class='btn btn-primary' data-dismiss='modal'>Informacion de Semilleros</button></section> 
                <section id="cerrar" style='position:relative;display:none'><button type='button' class='btn btn-primary' data-dismiss='modal'>Finalizar Informacion</button></section>  
                <br>
                <section id="semilleros" style='position:relative;display:none'>  
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
                                $sql = "SELECT * FROM tbl_semilleros WHERE idPsicologo = '".$usuario."' ORDER BY nombreSemillero";
                                $rs = $conexion->query($sql);
                                    while ($numero = $rs->fetch_array()){
                                    echo" 
                                        <a href='infosemilleropsico.php?ui=".base64_encode($numero["idSemillero"])."'><button type='button' class='btn btn-primary' data-dismiss='modal'>".$numero["nombreSemillero"]."</button></a><br><br>";
                                     }
                                     $link->desconectar();
                                } 
                        ?>
                    </section>
                    
                </div>

            </div>
        </div>

        <!--.Footer-->


    </div>       
</div>

<!-- Referencias js -->
<?php include_once '../includes/endBody.php'; ?>
<script src="../js/funcionesReporteGeneralSemilleros.js" type="text/javascript"></script>

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