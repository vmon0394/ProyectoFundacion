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
                    <h1 align="center">Prueba Imagen</h1>
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
                        <form  method="POST" class="form-horizontal" id="frmCargarFotoPerfil" enctype="multipart/form-data" >     
                            <div class="tab-pane">
                                <!--<div class="twoColumns">-->
                                <br>
                                <br>
                                <div class="twoColumns">
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Fecha Nacimiento *</label>
                                        <div class="controls input-group">
                                            <input id="fechaNacimiento"  name="fechaNacimiento" type="date" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Edad *</label>
                                        <div class="controls input-group">
                                            <input id="edad"  name="edad" type="text" disabled="true" placeholder="Ingrese la Edad" class="input-large">
                                        </div>
                                    </div>
                                    <div class="control-group">
                    <label class="control-label" for="sexo">Sexo *</label>
                    <div class="controls input-group">
                        <label class="radio inline" for="sexo">
                            <input type="radio" name="sexo" id="sexo-1" value="MASCULINO">
                            MASCULINO
                        </label>
                        <label class="radio inline" for="sexo">
                            <input type="radio" name="sexo" id="sexo-2" value="FEMENINO">
                            FEMENINO
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Depar. Nacimiento *</label>
                    <div class="controls input-group">
                        <select id="departamentoNacimiento" name="departamentoNacimiento" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoNacimiento').value, 'ciudadNacimiento');">
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
                                        <center>

                                                
                                                    <?php include '../Model/conexiones.php';
                                                    $sql1 = "SELECT * FROM tabla_imagen WHERE id = '8'";
                                                    $resultado2 = $conexion->query($sql1);
                                                    while ($row = $resultado2->fetch_assoc()){
                                                    ?>
                                                    <img width="140" height="60" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>"/>
                                                    <?php
                                                        }
                                                    ?>
                                        <input name="imagen" id="imagen" type="file" size="35" /><br>
                                        <button type="submit" value="aceptar">Aceptar</button>
                                        </center>
                                    </div>
                                    <div class="control-group">
                    <label class="control-label" for="textinput">Nombres *</label>
                    <div class="controls input-group">
                        <input id="nombres"  name="nombres" type="text" placeholder="Ingrese el Nombre del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Apellidos *</label>
                    <div class="controls input-group">
                        <input id="apellidos"  name="apellidos" type="text" placeholder="Ingrese los Apellidos del Participante" class="input-xlarge">
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

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesPruebaImagen.js" type="text/javascript"></script>
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
