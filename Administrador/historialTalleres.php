<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Administrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
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
    <script type="text/javascript">
        function partici(sel){
            if(sel.value=="SELECCIONE"){
                divC = document.getElementById("reportetaller2016");
                diva = document.getElementById("reportetaller2017");
                divC.style.display = "none";
                diva.style.display = "none";
            }else if(sel.value=="Reporte Talleres 2016"){
                divb = document.getElementById("reportetaller2016");
                diva = document.getElementById("reportetaller2017");
                divb.style.display = "";
                diva.style.display = "none";
            }else if (sel.value=="Reporte Talleres 2017"){
                diva = document.getElementById("reportetaller2017");
                divb = document.getElementById("reportetaller2016");
                diva.style.display = "";
                divb.style.display = "none";
            }else{
                divt = document.getElementById("reportetaller2016");
                divr = document.getElementById("reportetaller2017");
                divt.style.display = "none";
                divr.style.display = "none";
            }
        }

        function partici1(sel){
            if(sel.value=="SELECCIONE"){
                reg1 = document.getElementById("reportegeneral2016");
                reg2 = document.getElementById("reportegeneral2017");
                reg1.style.display = "none";
                reg2.style.display = "none";
            }else if(sel.value=="Reporte General 2016"){
                reg1 = document.getElementById("reportegeneral2016");
                reg2 = document.getElementById("reportegeneral2017");
                reg1.style.display = "";
                reg2.style.display = "none";
            }else if(sel.value=="Reporte General 2017"){
                reg1 = document.getElementById("reportegeneral2016");
                reg2 = document.getElementById("reportegeneral2017");
                reg1.style.display = "none";
                reg2.style.display = "";
            }else{
                reg1 = document.getElementById("reportegeneral2016");
                reg2 = document.getElementById("reportegeneral2017");
                reg1.style.display = "none";
                reg2.style.display = "none";
            }
        }
    </script>
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
                    <h1 align="center">Historial de Talleres</h1>
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
                    <div class="control-group">
                        <label class="control-label" for="textinput">Reporte de Talleres </label>
                            <div class="controls input-group">
                                <select onChange="partici(this)" class="input-xlarge">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="Reporte Talleres 2016">Reporte de Talleres 2016</option>
                                    <option value="Reporte Talleres 2017">Reporte de Talleres 2017</option>
                                </select>
                            </div>
                    </div> 
                    <br>
                    <div class="tab-content"> 
                        <section id="reportetaller2016" style='position:relative;display:none'>
                            <div class="table-responsive">
                                <h2>Reporte de Talleres del año 2016</h2>
                                <table class="table table-striped table-hover table-bordered table-condensed" id="">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:40px; text-align:center;">Nº</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Semilleros</th>                                        
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Numero Talleres</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:168px; text-align:center;">Porcentaje (1 - 10)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once '../Model/libReportesTalleres.php';
                                        $combo = new libReportesTalleres();
                                        $combo->reporteTallere2016();
                                        echo $combo->getResult();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </section> 
                        <section id="reportetaller2017" style='position:relative;display:none'>
                            <div class="table-responsive">
                                <h2>Reporte de Talleres del año 2017</h2>
                                <table class="table table-striped table-hover table-bordered table-condensed" id="">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:40px; text-align:center;">Nº</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Semilleros</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Fecha Inicio</th>                                     
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:480px; text-align:center;">Numero Talleres</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:168px; text-align:center;">Porcentaje (1 - 10)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include_once '../Model/libReportesTalleres.php';
                                        $combo = new libReportesTalleres();
                                        $combo->reporteTalleresSemillero();
                                        echo $combo->getResult();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </section>                   
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Reporte General </label>
                            <div class="controls input-group">
                                <select onChange="partici1(this)" class="input-xlarge">
                                    <option value="SELECCIONE1">SELECCIONE</option>
                                    <option value="Reporte General 2016">Reporte General 2016</option>
                                    <option value="Reporte General 2017">Reporte General 2017</option>
                                </select>
                            </div>
                    </div>
                    <section id="reportegeneral2016" style='position:relative;display:none'>
                        <h2>Reporte General año 2016</h2>
                        <br>
                        <?php include_once '../Formularios/frmEstadisticasGeneral2016.php'; ?>                 
                    </section>
                    <section id="reportegeneral2017" style='position:relative;display:none'>
                        <h2>Reporte General año 2017</h2>
                        <br>
                        <?php include_once '../Formularios/frmEstadisticasGeneral.php'; ?>                 
                    </section>
                </div>

                <!--.Footer-->
                
                
            </div>       
        </div>
        
        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>

        <!-- Control de recargas de las tablas, siempre debe ir de ultima en las referencias js -->
        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>
        <script src="../js/funcionesHistorialTalleres.js" type="text/javascript"></script>
        
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