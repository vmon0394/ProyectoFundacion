<?php
include_once '../Model/db.conn.php';
include_once '../Model/libAsisteciaActividad.php';
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Facilitador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}

$idActividad = 0;
if (isset($_GET['actividad'])) {
    $idActividad = $_GET['actividad'] != 0 ? $_GET['actividad'] : 0;
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
         <script>
            $(document).ready( function () {
                $('#datatable1').DataTable();
            });
        </script>
        <script>
          $(document).ready(function(){

            <?php
            if(isset($_GET["msn"]) and isset($_GET["tm"]))
            {
              echo "swal('".$_GET["msn"]."','','".$_GET["tm"]."');";
            }
           ?>
        });
        </script>
        <title>Fundación | Super Admin</title>

        <!-- Referencias js,css -->
        <?php include_once '../includes/head.php'; ?>
    </head>
    <body>
        <script type="text/javascript">
            function partic(sel){
                if(sel.value > 1){
                    divC = document.getElementById("lista");
                    divC.style.display = "";
                    divf = document.getElementById("lista2");
                    divf.style.display = "none";
                    divt = document.getElementById("lista1");
                    divt.style.display = "none";
                }else if(sel.value == "seleccione"){
                    divf = document.getElementById("lista1");
                    divf.style.display = "";
                    divC = document.getElementById("lista");
                    divC.style.display = "none";
                    divt = document.getElementById("lista2");
                    divt.style.display = "none";
                }else if(sel.value  <=0){
                    divf = document.getElementById("lista2");
                    divf.style.display = "";
                    divC = document.getElementById("lista1");
                    divC.style.display = "none";
                    divt = document.getElementById("lista");
                    divt.style.display = "none";
                }else{
                    divf = document.getElementById("lista1");
                    divf.style.display = "";
                    divC = document.getElementById("lista");
                    divC.style.display = "none";
                    divt = document.getElementById("lista2");
                    divt.style.display = "none";
                }
            }
            function mostrar(){
                document.getElementById('formularioacti').style.display='block';
                document.getElementById('buscarusuario').style.display='none';
            }
             function buscar(){
                document.getElementById('buscarusuario').style.display='block';
                document.getElementById('formularioacti').style.display='none';
                document.getElementById('lista2').style.display='none';
            }
            function volver(){
                document.getElementById('buscarusuario').style.display='none';
                document.getElementById('formularioacti').style.display='none';
                document.getElementById('lista2').style.display='block';
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
                                $sql = "SELECT * FROM tbl_actividades_laboratorio  WHERE idActividad = '".$idActividad."'";
                                $rs = $conexion->query($sql);
                                $numero = $rs->fetch_assoc();

                                $link->desconectar();
                                }
                                $nombreactividad    = $numero["nombreActividad"] ;
                                $asistencia         = $numero["asistenciaActividad"];
                        ?>
                        <section id="lista1" style='margin-left:40%;'>
                            <?php 
                                echo"
                                <select onChange='partic(this)'>
                                    <option value='seleccione'>SELECCIONE</option>
                                    <option value=".array_sum(array($asistencia)).">ASISTENCIA</option>
                                </select> ";
                            ?>
                        </section>
                        <section id="lista2" style='position:relative;display:none'>
                                <table id="datatable" class="display">
                                    <thead>
                                        <tr>
                                            <th>Documento</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Celular</th>
                                            <th>Direccion</th>
                                            <th>Barrio</th>
                                            <th>Observacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $asistencias1 = asistenciaactividad::cargartabla2($idActividad);
                                        foreach ($asistencias1 as $row) {

                                        echo"
                                        <tr>
                                            <td>".$row["documento"]."</td>
                                            <td>".$row["nombre"]."</td>
                                            <td>".$row["apellido"]."</td>
                                            <td>".$row["telefono"]."</td>
                                            <td>".$row["celular"]."</td>
                                            <td>".$row["direccion"]."</td>
                                            <td>".$row["barrio"]."</td>
                                            <td>".$row["activo"]."</td>
                                        </tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <br>
                                <button name="mostrar" type="submit" class="btn btn-primary" value="mostrar" onclick="mostrar();">Nueva Asistencia</button>
                                <button name="buscar" type="submit" class="btn btn-primary" value="buscar" onclick="buscar();">Buscar Usuario Existente</button>
                            <section id="formularioacti" style='position:relative;display:none'>
                                <form action="../Controller/ctrlAgregarlistaActividad.php" method="POST" class="form-horizontal">
                                    <div class="control-group">
                                    <br>
                                        <label class="control-label" for="textinput">Documento *</label>
                                            <div class="controls input-group">
                                                <input  name="documento" type="text" placeholder="Ingresa el Documento del usuario" required class="input-xlarge">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Nombre *</label>
                                            <div class="controls input-group">
                                                <input  name="nombre" type="text" placeholder="Ingresa el Nombre del usuario" required class="input-xlarge">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Apellidos *</label>
                                            <div class="controls input-group">
                                                <input  name="apellido" type="text" placeholder="Ingresa el Nombre del usuario" required class="input-xlarge">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Sexo *</label>
                                            <div class="controls input-group">
                                                <input type="radio" name="sexo" value="FEMENINO" checked>Mujer
                                                <br>
                                                <input type="radio" name="sexo" value="MASCULINO" checked>Hombre 
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Edad *</label>
                                            <div class="controls input-group">
                                                <input  name="edad" type="number" placeholder="Ingresa La edad" required class="input-xlarge">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Telefono *</label>
                                            <div class="controls input-group">
                                                <input  name="telefono" type="text" onkeypress="return justNumbers(event)" placeholder="Ingresar el Numero Telefonico" class="input-xlarge">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Celular *</label>
                                            <div class="controls input-group">
                                                <input  name="celular" type="text" onkeypress="return justNumbers(event)" placeholder="Ingresar el Numero Celular" class="input-xlarge">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Direccion *</label>
                                            <div class="controls input-group">
                                                <input  name="direccion" type="text" placeholder="Ingresa la Direccion" class="input-xlarge">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Barrio *</label>
                                            <div class="controls input-group">
                                                <input  name="barrio" type="text" placeholder="Ingresa el Barrio donde vive" class="input-xlarge">
                                            </div>
                                    </div>
                                    <input  name="idActividad" type="hidden" value="<?php echo $idActividad ?>" class="input-xlarge">
                                    <input  name="activo" type="hidden" value="Asistio" class="input-xlarge">
                                    <button name="acc" type="submit" class="btn btn-primary" value="agrelista1" >Registrar</button>
                                </form>
                            </section>
                        </section>
                        <section id ="buscarusuario" style='position:relative;display:none' >
            
                            <div class="tab-pane">
                                <table id="datatable1" class="display">
                                    <thead>
                                        <tr>
                                            <th>Documento</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Celular</th>
                                            <th>Direccion</th>
                                            <th>Barrio</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $asistencias = asistenciaactividad::cargartabla();
                                        foreach ($asistencias as $row) {

                                        echo"
                                        <tr>
                                            <td>".$row["documento"]."</td>
                                            <td>".$row["nombre"]."</td>
                                            <td>".$row["apellido"]."</td>
                                            <td>".$row["telefono"]."</td>
                                            <td>".$row["celular"]."</td>
                                            <td>".$row["direccion"]."</td>
                                            <td>".$row["barrioOvereda"]."</td>
                                            <td>
                                            <center><a href='visualizarusuariosactividad.php?actividad=".$idActividad."&ui=".base64_encode($row["idFicha"])."'><img src='../img/consultar.png' border= '0' height='20' width='30'/></a></center>
                                            </td>
                                        </tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <br>
                                <button name="volver" type="submit" class="btn btn-primary" value="volver" onclick="volver();">Volver</button>
                            </div>
                        </section>
                        <section id="lista" style='position:relative;display:none'>
                            <div class="tab-pane">
                                <center><h2>Actividad: <?php echo $nombreactividad; ?></h2></center>
                                <br>
                                <center><h3>Asistencia: <?php echo $asistencia; ?> Personas</h3></center>
                            </div>
                        </section>
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