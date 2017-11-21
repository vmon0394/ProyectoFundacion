<?php
include_once '../Model/db.conn.php';
include_once '../Model/libSelesociofamiliar.php';
$idfichaso = historialfichasocio::idficha(base64_decode($_REQUEST["ui"]));
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
        <script>
            $(document).ready( function () {
                $('#datatable').DataTable();
            });
        </script>
        <title>Fundación | Super Admin</title>

        <!-- Referencias js,css -->
        <?php include_once '../includes/head.php'; ?>
    </head>
    <body>
        <div class="container-fluid content-wrapper">
            <br>
            <!--.Navigation Bar -->
            <?php //include_once 'menu.php';  ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">
                    <div class="tab-content">
                        <form action="../Controller/Ctrlconfigurarfechas.php" method="POST">

                        <div class="twoColumns">

                            <input name="idFicha" value="<?php echo $idfichaso[0]; ?>" type="hidden">

                            <div class="control-group">
                                <label class="control-label" for="textinput">Documento </label>
                                <div class="controls input-group">
                                <input value="<?php echo $idfichaso[11]; ?>" type="text">
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label" for="textinput">Nombres </label>
                                <div class="controls input-group">
                                <input value="<?php echo $idfichaso["nombres"]; ?>" type="text">
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label" for="textinput">Apellidos </label>
                                <div class="controls input-group">
                                <input value="<?php echo $idfichaso["apellidos"]; ?>" type="text">
                                </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="textinput">Fecha de Ingreso </label>
                                <div class="controls input-group">
                                <input type="date" value="<?php echo $idfichaso["anoDeIngreso"]; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textinput">Años de Permanencia </label>
                                <div class="controls input-group">
                                <input type="text" value="<?php echo $idfichaso["anosDePermanencia"]; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textinput">Fecha de Reingreso </label>
                                <div class="controls input-group">
                                <input type="date" name="fechaReingreso" value="<?php echo $idfichaso["fechaReingreso"]; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textinput">Fecha Deshabilitado </label>
                                <div class="controls input-group">
                                <input type="date" name="fechaDeshabilitado" value="<?php echo $idfichaso["fechaDeshabilitado"]; ?>">
                                </div>
                            </div>
                         </div>
                            <center><button type="submit" class="btn btn-primary" name="acc" value="fechareac">Guardar</button></center>
                        </form>
                    </div>
                </div>

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesActividadesLaboratorio.js" type="text/javascript"></script>

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