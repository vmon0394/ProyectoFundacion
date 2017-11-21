<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Administrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}

$idTaller = 0;
if (isset($_GET['taller'])) {
    $idTaller = $_GET['taller'] != 0 ? $_GET['taller'] : 0;
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
            <!--.Navigation Bar -->
            <?php //include_once 'menu.php';  ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">
                    <div class="tab-content"> 

                        <form  method="POST" class="form-horizontal" id="frmAsistencia">  
                            
                            <input id="idTallerA"  name="idTallerA" type="hidden">
                            <input id="tamano"  name="tamano" type="hidden">
                            <input id="cadenaDeAsistencia"  name="cadenaDeAsistencia" type="hidden">

                            <div class="tab-pane">
                                <h2 align="center" id="semillero"></h2>
                                <br>
                                <h3 align="center" id="nombreTaller"></h3>
                                <br>
                                <div class="table-responsive">                            
                                    <table class="table table-striped table-hover table-bordered table-condensed" id="tablaAsisitencias">

                                    </table>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesHistorialTalleres.js" type="text/javascript"></script>

        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>
        
        <script>
            tomaHistorialAsistencia(<?php echo "'$idTaller'" ?>);
        </script>

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