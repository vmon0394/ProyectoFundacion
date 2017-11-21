<?php
session_start();
//if (!isset($_SESSION["usuario"]) || ($_SESSION["perfil"] != "Facilitador" && $_SESSION["perfil"] != "Psicólogo")) {
//    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
//}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>Fundación | Facilitador</title>

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
                        <a href="#" title="Sistema de Gestion | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>          
                    </div>
                    <br>
                    <h1 align="center">Planeación</h1>
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

                        <form  method="POST" class="form-horizontal" id="frmPlaneacion">     
                            <div class="tab-pane">
                                <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
                                <br> 

                                <div class="twoColumns">

                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Fecha *</label>
                                        <div class="controls input-group">
                                            <input id="fecha"  name="fecha" type="date" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Valor *</label>
                                        <div class="controls input-group">
                                            <select id="valor"  name="valor" class="input-large">
                                                <option value="0">SELECCIONE VALOR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Eje Tematico *</label>
                                        <div class="controls input-group">
                                            <input id="eje"  name="eje" type="text" placeholder="Ingrese el Eje Tematico del Taller" class="input-xlarge">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Tema Especifico *</label>
                                        <div class="controls input-group">
                                            <input id="tema"  name="tema" type="text" placeholder="Ingrese el Tema Especifico" class="input-xlarge">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Objetivo *</label>
                                        <div class="controls input-group">
                                            <textarea id="objetivo" name="objetivo" placeholder="Ingrese el Objetivo del Taller" rows="5" class="input-xlarge"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="continue" data-dismiss="modal">Continuar</button>  
                                    </div>
                                </center>

                            </div>
                        </form>

                        <form  method="POST" class="form-horizontal" id="frmTiempos">     
                            <div class="tab-pane">

                                <legend></legend>

                                <div class="control-group">
                                    <label class="control-label" for="textinput">Tiempo *</label>
                                    <div class="controls input-group">
                                        <input id="tiempo"  name="tiempo" type="text" placeholder="Ingrese el Tiempo del Taller" class="input-xlarge">
                                    </div>
                                </div>

                                <div class="twoColumns">

                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Descripción de Actividades *</label>
                                        <div class="controls input-group">
                                            <textarea id="descripcion" name="descripcion" placeholder="Ingrese la Descripción del Taller" rows="5" class="input-xlarge"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Logros *</label>
                                        <div class="controls input-group">
                                            <textarea id="logros" name="logros" placeholder="Ingrese los Logros del Taller" rows="5" class="input-xlarge"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Dificultades *</label>
                                        <div class="controls input-group">
                                            <textarea id="dificultades" name="dificultades" placeholder="Ingrese las Dificultades del Taller" rows="5" class="input-xlarge"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Recomendaciones *</label>
                                        <div class="controls input-group">
                                            <textarea id="recomendaciones" name="recomendaciones" placeholder="Ingrese las Recomendaciones del Taller" rows="5" class="input-xlarge"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <center>
                                    <div class="control-group">
                                        <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Guardar</button>  
                                    </div>
                                </center>

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