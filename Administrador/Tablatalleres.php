<?php
include_once '../Model/db.conn.php';
include_once '../Model/libAgregartaller.php';
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Administrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
    $reportetaller = activicomuni::tallerporsemi(base64_decode($_REQUEST["ui"]));
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
                                <table id="datatable" class="display">
                                    <thead>
                                        <tr>
                                            <th>Tipo de taller</th>
                                            <th>Nombre</th>
                                            <th>Fecha</th>
                                            <th>Objetivo</th>
                                            <th>Observacion</th>
                                            <th>Ver PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $reportetaller = activicomuni::tallerporsemi(base64_decode($_REQUEST["ui"]));
                                        foreach ($reportetaller as $row) {
                                        echo"
                                        <tr>
                                            <td>".$row["tipoTaller"]."</td>
                                            <td>".$row["nombreTaller"]."</td>
                                            <td>".$row["fechaTaller"]."</td>
                                            <td>".$row["objetivo"]."</td>
                                            <td>".$row["observacion"]."</td>
                                            <td>
                                                <center><a href='app/reportes/Reportesemillerotaller.php?ui=".base64_encode($row["idTaller"])."' target='_blank' ><img src='../img/ojo.png' border= '0' height='20' width='30'/></a></center>
                                            </td>
                                        </tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
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