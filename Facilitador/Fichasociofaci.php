<?php
include_once '../Model/db.conn.php';
include_once '../Model/libSelesociofamiliar.php';
include_once '../Model/libSemillerosGeneral.php';
$idsemillero = semillerosgeneral::semillerosto(base64_decode($_REQUEST["ui"]));
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
                        <h2>Semilllero <?php echo $idsemillero[1] ?></h2>
                                <table id="datatable" class="display">
                                    <thead>
                                        <tr>
                                            <th>Documento</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Sexo</th>
                                            <th>Año de Ingreso</th>
                                            <th>Fecha de Reingreso</th>
                                            <th>Fecha Deshabilitado</th>
                                            <th>Modificar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $historialsocio = historialfichasocio::idsemisocio(base64_decode($_REQUEST["ui"]));
                                        foreach ($historialsocio as $row) {

                                            if($row["fechaDeshabilitado"] == "NULL"){
                                                $deshabilitado = "";
                                            }else if($row["fechaDeshabilitado"] != "NULL"){
                                                $deshabilitado = $row["fechaDeshabilitado"];
                                            }
                                        echo"
                                        <tr>
                                            <td>".$row["documento"]."</td>
                                            <td>".$row["nombres"]."</td>
                                            <td>".$row["apellidos"]."</td>
                                            <td>".$row["sexo"]."</td>
                                            <td>".$row["anoDeIngreso"]."</td>
                                            <td>".$row["fechaReingreso"]."</td>
                                            <td>".$deshabilitado."</td>
                                            <td>
                                                <center><a href='configurarfichafaci.php?ui=".base64_encode($row["idFicha"])."'><img src='../img/chulo.png' border= '0' height='20' width='30'/></a></center>
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