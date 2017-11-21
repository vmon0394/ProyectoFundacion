<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Administrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}

include_once '../Model/libSemilleros.php';
 $semillero = new libSemilleros();
 $semillero->zonaseleccionada();

 $semillero = (base64_decode($_REQUEST["ui"]));
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
        <title>Fundación | Administrador</title>

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
                    <h1 align="center">Consultar Semilleros Por Zona</h1>
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
                        <label class="alert alert-info">Zonas Registradas</label>


                        <center>
                            <div class="control-group">
                                <a href="consultarsemillerosadmi.php"><button type="button" class="btn btn-primary" data-dismiss="modal">Volver</button></a>
                        </center>       
                            <br>
        <!--constructor-->
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
                                        $sql = "SELECT COUNT(*) as contarsemilleros FROM tbl_semilleros WHERE idZona = '".$semillero."'";
                                        $rs = $conexion->query($sql);
                                        if ($numero = $rs->fetch_assoc()){
                                        echo  "<h3>Semilleros Registrados: ".$numero['contarsemilleros']."</h3>";
                                        }else{
                                $this->result="Se Presento un Error";
                                        }
                                $link->desconectar();
                                        } 
                            ?>     

        <!--constructor-->
                        <table id="datatable" class="display">
                        <thead>
                            <tr>
                                <th>Nombre Semillero</th>
                                <th>Comuna</th>
                                <th>Barrio</th>
                                <th>Direccion</th>
                                <th>Organizacion</th>
                                <th>Telefono</th>
                                <th>Año Registro</th>
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
                                $sql = "SELECT tbl_zonas.idZona, tbl_semilleros.NombreSemillero,tbl_semilleros.comuna,
                                tbl_semilleros.barrio,tbl_semilleros.direccion,tbl_semilleros.organizacion,tbl_semilleros.telefono,tbl_semilleros.anoRegistro 
                                FROM tbl_semilleros INNER JOIN tbl_zonas ON (tbl_semilleros.idZona = tbl_zonas.idZona) WHERE tbl_zonas.idZona = '".$semillero."'";
                                $rs = $conexion->query($sql);
                                    while ($numero = $rs->fetch_array()){
                                    echo" 
                                        <tr>
                                            <td>".$numero["NombreSemillero"]."</td>
                                            <td>".$numero["comuna"]."</td>
                                            <td>".$numero["barrio"]."</td>
                                            <td>".$numero["direccion"]."</td>
                                            <td>".$numero["organizacion"]."</td>
                                            <td>".$numero["telefono"]."</td>
                                            <td>".$numero["anoRegistro"]."</td>
                                            </td>
                                        </tr>";
                                     }
                                     $link->desconectar();
                                } 
                            ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>

                <!--.Footer-->
        </div>       


        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesSemilleros.js" type="text/javascript"></script>

        <!-- Control de recargas de las tablas, siempre debe ir de ultima en las referencias js -->
        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>

        <input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
        <div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

    </body>
</html>