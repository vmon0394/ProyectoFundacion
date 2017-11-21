<?php
include_once '../Model/db.conn.php';
include_once '../Model/libAsistenciapsicologos.php';
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Psicólogo") {
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
        <title>Fundación | Psicólogo</title>

        <!-- Referencias js,css -->
        <?php include_once '../includes/head.php'; ?>
    </head>
    <body>
        <script type="text/javascript">
            function partic(sel){
                if(sel.value <= 1){
                    divC = document.getElementById("lista");
                    divC.style.display = "";
                    divf = document.getElementById("lista2");
                    divf.style.display = "none";
                    divb = document.getElementById("lista3");
                    divb.style.display = "none";
                    divs = document.getElementById("lista4");
                    divs.style.display = "none";
                }else if(sel.value == "seleccione"){
                    divC = document.getElementById("lista2");
                    divC.style.display = "";
                    divf = document.getElementById("lista");
                    divf.style.display = "none";
                    divb = document.getElementById("lista3");
                    divb.style.display = "none";
                    divs = document.getElementById("lista4");
                    divs.style.display = "none";
                }else if(sel.value > 2){
                    divC = document.getElementById("lista3");
                    divC.style.display = "";
                    divf = document.getElementById("lista2");
                    divf.style.display = "none";
                    divb = document.getElementById("lista");
                    divb.style.display = "none";
                    divs = document.getElementById("lista4");
                    divs.style.display = "none";
                }else if(sel.value == "numeroasis" ){
                    divC = document.getElementById("lista3");
                    divC.style.display = "none";
                    divf = document.getElementById("lista2");
                    divf.style.display = "none";
                    divb = document.getElementById("lista");
                    divb.style.display = "none";
                    divs = document.getElementById("lista4");
                    divs.style.display = "";
                }else{
                    divC = document.getElementById("lista2");
                    divC.style.display = "";
                    divf = document.getElementById("lista");
                    divf.style.display = "none";
                    divb = document.getElementById("lista3");
                    divb.style.display = "none";
                    divs = document.getElementById("lista4");
                    divs.style.display = "none";
                }
            }
            function justNumbers(e){
                var keynum = window.event ? window.event.keyCode : e.which;
                if ((keynum == 8) || (keynum == 46))
                return true;
                return /\d/.test(String.fromCharCode(keynum));
            }
        </script>
        <div class="container-fluid content-wrapper">
            <br>
            <!--.Navigation Bar -->
            <?php //include_once 'menu.php';  ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">
                    <div class="tab-content"> 
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
                                $sql = "SELECT * FROM tbl_talleres  WHERE idTaller = '".$idTaller."'";
                                $rs = $conexion->query($sql);
                                $numero = $rs->fetch_assoc();

                                $sql1 = "SELECT tbl_semilleros.nombreSemillero FROM tbl_semilleros  INNER JOIN tbl_talleres ON ( tbl_talleres.idSemillero = tbl_semilleros.idSemillero ) WHERE tbl_talleres.idTaller = '".$idTaller."'";
                                $rss = $conexion->query($sql1);
                                $nombresemi = $rss->fetch_assoc();
                                    $link->desconectar();
                                }
                                $asistencia = $numero["asistenciaTaller"] ;
                                $semilleron = $nombresemi["nombreSemillero"]; 
                                $nombretall = $numero["nombreTaller"];
                        ?>
                        <section id="lista" style='position:relative;display:none'>
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

                            <center>
                                <div class="control-group">
                                    <button type="button" class="btn btn-primary" id="saveAsistencia" data-dismiss="modal">Guardar</button>  
                                </div>
                            </center>

                        </form>
                        </section>
                        <section id="lista4" style='position:relative;display:none'>
                        <form action="../Controller/ctrlAgregarasistenciapsico.php" method="POST" class="form-horizontal">
                            <div class="tab-pane">
                                <div class="twoColumns">
                                    <input  name="idTaller" type="hidden" value="<?php echo $idTaller; ?>" class="input-xlarge">
                                        <div class="control-group">
                                            <label class="control-label" for="textinput">Numero De Participantes *</label>
                                                <div class="controls input-group">
                                                    <input  name="asistenciaTaller" onkeypress="return justNumbers(event)" type="text" placeholder="Ingrese el Numero de Participantes" class="input-xlarge" required>
                                                </div>
                                        </div>
                                </div>
                            </div>
                            <center>
                                <div class="control-group">
                                    <button type="submit" class="btn btn-primary" name="acc" value="asistencia1">Guardar</button>  
                                </div>
                            </center>
                        </form>
                        </section>
                        <section id="lista2" style='margin-left:40%;'>
                            <?php 
                                echo"
                                <select onChange='partic(this)'>
                                    <option value='seleccione'>SELECCIONE</option>
                                    <option value=".array_sum(array($asistencia)).">ASISTENCIA</option>
                                    <option value='numeroasis'>NUMERO DE ASISTENTES</option>
                                </select> ";
                            ?>
                        </section>
                        <section id="lista3" style='position:relative;display:none;margin-left:30%;'>
                            <div class="tab-pane">
                                <h2>Semillero: <?php echo $semilleron; ?></h2>
                                <br>
                                <h3>Taller: <?php echo $nombretall; ?></h3>
                                <br>
                                <h3>Numero de Asistentes: <?php echo $asistencia; ?></h3>
                                <br>
                            </div>
                        </section>
                    </div>
                </div>

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesTalleresPsicologo.js" type="text/javascript"></script>

        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>
        
        <script>
            tomaAsistenciaPsico(<?php echo "'$idTaller'" ?>);
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