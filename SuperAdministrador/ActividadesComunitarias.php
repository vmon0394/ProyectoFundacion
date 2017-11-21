<?php
session_start();

include_once '../Model/db.conn.php';

if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "SuperAdministrador") {
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

        <title>Fundación | Super Admin</title>

        <!-- Referencias js,css -->
        <?php include_once '../includes/head.php'; ?>
    </head>
    <body> 

        <div class="container-fluid content-wrapper">
            <br>
            <!--.Logo Bar & Login-->
            <div class="row-fluid">
                <div class="logobar">
                    <div class="logo pull-left">
                        <a href="#" title="Sistema de Gestión | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>          
                    </div>
                    <br>
                    <h1 align="center">Laboratorio lúdico</h1>
                </div>
            </div>
            <br>
           
            <!--.Navigation Bar -->
            <?php include_once 'menuLaboratorio.php'; ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">
                    <div class="tab-content"> 

                        <label class="alert alert-info">Los campos marcados con * son obligatorios.</label>
                        <form  method="POST" class="form-horizontal" action="../Controller/ctrlActividadcomuni.php" >     
                            <div class="tab-pane">

                                <div class="twoColumns">

                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Informacion Comunitaria *</label>
                                        <div class="controls input-group">
                                            <select  onchange="agregar();" name="informacion_actividad" class="input-large">
                                                <option value="0">ACTIVIDADES COMUNITARIAS</option>
                                                <option value="Hora Creativa: Tiene como objetivo que los participantes  exploren, compartan y construyan sus propios juguetes teniendo en cuenta la creatividad, la motivación, la autoestima, la integración.">HORA CREATIVA</option>
                                                <option value="Hora del Cuento: Es un espacio para estimular la imaginación y la creatividad de los participantes  y el gusto por la lectura.">HORA DEL CUENTO</option>
                                                <option value="Hora Interactiva: Brindar acceso a  los usuarios del Laboratorio Lúdico en el uso de las tecnologías de información, en el cual podrán acceder a Internet gratuito,  aprender el manejo de los computadores y encontrar material de apoyo para tareas escolares.">HORA INTERATIVA</option>
                                                <option value="Visitas de Instituciones educativas: Ofrecer talleres de fortalecimiento en valores y habilidades para la vida  a través del juego y el juguete con los estudiantes de primera infancia y primaria de las Instituciones Educativas aledañas al Laboratorio Lúdico.">VISITA DE INSTITUCIONES EDUCATIVAS</option>
                                                <option value="Préstamo externo de Juguetes: Facilitar a los participantes de los semilleros el uso de juegos y juguetes fuera del Laboratorio Lúdico para fortalecer las relaciones y la convivencia en sus hogares, además practicar los valores de la responsabilidad y la honestidad.">PRESTAMO EXTERNO DE JUGUETES</option>
                                                <option value="Hora del Juego y préstamo de juguetes: realzar actividades con los diferentes tipos de juegos y juguetes didácticos, los cuales pueden aplicarse a nivel individual y grupal para fortalecer las relaciones interpersonales, la comunicación y la sana convivencia.">HORA DEL JUEGO Y PRESTAMO DE JUGUETES</option>
                                                <option value="Hora de Ajedrez: fortalecimiento de valores y habilidades para la vida a través de la metodología del ajedrez.">HORA DE AJEDREZ</option>
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Actividad comunitaria *</label>
                                            <div class="controls input-group">
                                                <textarea id="Texto2" name="actividad_comunitaria" rows="5" placeholder="Actividades Comunitarias" class="input-xlarge" required></textarea>
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Acompañamiento* </label>
                                            <div class="controls input-group">
                                                <textarea name="acompanamiento" rows="3" placeholder="Acompañamiento Escolar " class="input-xlarge" required></textarea>
                                            </div>
                                    </div> 
                                    <div class="control-group">
                                        <label class="control-label" for="textinput">Visita Institucion* </label>
                                            <div class="controls input-group">
                                                <textarea name="visita_institucion" rows="3" placeholder="Informacion de Institucion " class="input-xlarge" required></textarea>
                                            </div>
                                    </div> 
                                    <div class="control-group">
                                       
                                            <div class="controls input-group">
                                                <input name="isactividadcomuni" value="1" type="hidden">
                                            </div>
                                    </div> 
                                </div>
                            </div>
                            <br>
                            <center>
                                <button type="submit" class="btn btn-primary" name="acc" value="c">Guardar</button>
                            </center>  
                        </form>                       

                        <center>
                            <div class="control-group">
                                <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary" name="acc" value="c">Guardar</button>  
                                <button type="button" class="btn btn-primary" id="modi" data-dismiss="modal" style="display: none">Modificar</button>
                                <button type="button" class="btn btn-primary" id="update" data-dismiss="modal" style="display: none">Actualizar</button>
                            </div>
                        </center>

                        <div class="control-group">                                
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Listado de usuarios &nbsp;&nbsp;</button>
                            <!-- tabs left -->
                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#x" data-toggle="tab" class="">Instituciones y semilleros</a></li>
                                        <li><a href="#y" data-toggle="tab" class="">Instituciones o semilleros eliminados</a></li>
                                    </ul>

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="x">

                                         <!--<table id="datatable" class="display">
                                            <thead>
                                                <tr>
                                                    <th>NIT</th>
                                                    <th>Nombre</th>
                                                    <th>Telefono</th>
                                                    <th>Celular</th>
                                                    <th>Contacto</th>
                                                    <th>Direccion</th>
                                                    <th>Consultar</th>
                                                    <th>Eliminar</th>
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
                                                        $sql = "SELECT tbl_usuario_laboratorio.documento,tbl_usuario_laboratorio.nombre,
                                                        tbl_usuario_laboratorio.telefono,tbl_usuario_laboratorio.celular,tbl_usuario_laboratorio.acudiente,tbl_usuario_laboratorio.direccion
                                                        FROM tbl_usuario_laboratorio WHERE tipoRegistro IN ( 'Institucion', 'Semillero',isdelUsuario= 1)";
                                                        $rs = $conexion->query($sql);
                                                            while ($numero = $rs->fetch_array()){
                                                            echo" 
                                                                <tr>
                                                                    <td>".$numero["documento"]."</td>
                                                                    <td>".$numero["nombre"]."</td>
                                                                    <td>".$numero["telefono"]."</td>
                                                                    <td>".$numero["celular"]."</td>
                                                                    <td>".$numero["acudiente"]."</td>
                                                                    <td>".$numero["direccion"]."</td>
                                                                    <td><a href='edita_barberia1.php?ui=".base64_encode($numero["documento"])."'><img class='acciones' src='img/modificar.png'/></a></td>
                                                                    <td><a href='../barbershop/Controller/barberia.controller.php?ui=".base64_encode($numero["documento"])."&acc=d'><img class='acciones' src='img/cajadebasura.jpg'/></a></td>
                                                                </tr>";
                                                            }
                                                    $link->desconectar();
                                                    } 
                                                ?>
                                            </tbody>
                                        </table>
                                        </div>

                                        <div class="tab-pane" id="y">

                                            <br>
                                            <h4>Instituciones o semilleros Eliminados</h4>
                                            <br>
                                            <br>
                                            <table id="datatable1" class="display">
                                            <thead>
                                                <tr>
                                                    <th>NIT</th>
                                                    <th>Nombre</th>
                                                    <th>Telefono</th>
                                                    <th>Celular</th>
                                                    <th>Contacto</th>
                                                    <th>Direccion</th>
                                                    <th>Habilitar</th>
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
                                                        $sql = "SELECT tbl_usuario_laboratorio.documento,tbl_usuario_laboratorio.nombre,
                                                        tbl_usuario_laboratorio.telefono,tbl_usuario_laboratorio.celular,tbl_usuario_laboratorio.acudiente,tbl_usuario_laboratorio.direccion
                                                        FROM tbl_usuario_laboratorio WHERE tipoRegistro IN ( 'Institucion', 'Semillero') AND isdelUsuario= 2";
                                                        $rs = $conexion->query($sql);
                                                            while ($numero = $rs->fetch_array()){
                                                            echo" 
                                                                <tr>
                                                                    <td>".$numero["documento"]."</td>
                                                                    <td>".$numero["nombre"]."</td>
                                                                    <td>".$numero["telefono"]."</td>
                                                                    <td>".$numero["celular"]."</td>
                                                                    <td>".$numero["acudiente"]."</td>
                                                                    <td>".$numero["direccion"]."</td>
                                                                    <td><a href='../barbershop/Controller/barberia.controller.php?ui=".base64_encode($numero["documento"])."&acc=d'><img class='acciones' src='img/cajadebasura.jpg'/></a></td>
                                                                </tr>";
                                                            }
                                                    $link->desconectar();
                                                    } 
                                                ?>
                                            </tbody>
                                        </table>

                                        </div>-->

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!--.Footer-->
                <?php //include_once '../includes/footer.php'; ?>

            </div>       
        </div>
        
        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
<!--        <script type="text/javascript">
         $(document).ready(function() {
            $(".servicios").select2();
         });   
         
        </script>-->
        <script src="../js/funcionesUsuariosLaboratorio.js" type="text/javascript"></script>
        
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