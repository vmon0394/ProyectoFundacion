<?php
include_once '../Model/db.conn.php';
include_once '../Model/libAgregartaller.php';
$idsemillero = activicomuni::idtaller(base64_decode($_REQUEST["ui"]));
date_default_timezone_set("America/Bogota");
?>
<script type="text/javascript">
    function partici(sel){
        if(sel.value=="Salidas Pedagógicas"){
            divC = document.getElementById("ocultarinput");
            divC.style.display = "none";
            div2 = document.getElementById("ocultarinput2");
            div2.style.display = "none";
            div3 = document.getElementById("ocultarinput3");
            div3.style.display = "none";
            div4 = document.getElementById("ocultarinput4");
            div4.style.display = "none";
            div5 = document.getElementById("ocultarinput5");
            div5.style.display = "none";
            div6 = document.getElementById("ocultarinput6");
            div6.style.display = "none";
            div7 = document.getElementById("ocultarinput7");
            div7.style.display = "none";
            div8 = document.getElementById("ocultarinput8");
            div8.style.display = "none";
            div9 = document.getElementById("ocultarinput9");
            div9.style.display = "none";
        }else if(sel.value=="Cierre"){
            divC = document.getElementById("ocultarinput");
            divC.style.display = "none";
            div2 = document.getElementById("ocultarinput2");
            div2.style.display = "none";
            div3 = document.getElementById("ocultarinput3");
            div3.style.display = "none";
            div4 = document.getElementById("ocultarinput4");
            div4.style.display = "none";
            div5 = document.getElementById("ocultarinput5");
            div5.style.display = "none";
            div6 = document.getElementById("ocultarinput6");
            div6.style.display = "none";
            div7 = document.getElementById("ocultarinput7");
            div7.style.display = "none";
            div8 = document.getElementById("ocultarinput8");
            div8.style.display = "none";
            div9 = document.getElementById("ocultarinput9");
            div9.style.display = "none";
        }else{
            divC = document.getElementById("ocultarinput");
            divC.style.display = "";
            divC = document.getElementById("ocultarinput");
            divC.style.display = "";
            div2 = document.getElementById("ocultarinput2");
            div2.style.display = "";
            div3 = document.getElementById("ocultarinput3");
            div3.style.display = "";
            div4 = document.getElementById("ocultarinput4");
            div4.style.display = "";
            div5 = document.getElementById("ocultarinput5");
            div5.style.display = "";
            div6 = document.getElementById("ocultarinput6");
            div6.style.display = "";
            div7 = document.getElementById("ocultarinput7");
            div7.style.display = "";
            div8 = document.getElementById("ocultarinput8");
            div8.style.display = "";
            div9 = document.getElementById("ocultarinput9");
            div9.style.display = "";
        }
    }
    </script>
<link rel="stylesheet"  href="css/estilos.css">
<form action="../Controller/ctrlTalleresagregar.php" method="POST" class="form-horizontal">
    <div class="tab-pane">
        <label class="alert alert-info">Los campos marcados con * son obligatorios </label>

        <input id="idTaller"  name="idTaller" type="hidden">
        
        <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Semillero *</label>
                    <div class="controls input-group">
                    	<h3 id="titusemi"><?php echo $idsemillero[1] ?></h3>
                        <input id="semilleroTaller"  name="idSemillero" value="<?php echo $idsemillero[0] ?>" type="hidden" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Taller *</label>
                    <div class="controls input-group">
                        <select id="tipoTaller1" onChange="partici(this)" name="tipoTaller" class="input-large">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="Actividades Especiales">Actividades Especiales</option>
                            <option value="Salidas Pedagógicas">Salidas Pedagógicas</option>
                            <option value="Vacaciones recreativas">Vacaciones recreativas</option>
                            <option value="Encuentro de Padres">Encuentro de Padres</option>
                            <option value="Campamento">Campamento</option>
                            <option value="Muestra">Muestra</option>
                            <option value="Cierre">Cierre</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Taller *</label>
                    <div class="controls input-group">
                        <input id="nombreTaller"  name="nombreTaller" type="text" placeholder="Ingrese el Nombre del Taller" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha Inicial *</label>
                    <div class="controls input-group">
                        <input id="fechaTaller"  name="fechaTaller" type="date" value="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha Final *</label>
                    <div class="controls input-group">
                        <input name="fechaLimite" type="date" value="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>"  class="input-xlarge">
                    </div>
                </div>
                <div class="control-group" id="ocultarinput" onkeypress="return justNumbers(event)">
                    <label class="control-label" for="textinput">Habilidad *</label>
                    <div class="controls input-group">
                        <select id="idHabilidad"  name="idHabilidad" class="input-xlarge"  onchange="Carga('../Controller/ctrlCombos.php?opcion=2&habili=' + document.getElementById('idHabilidad').value, 'tecnicaTaller');">
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboHabilidades();
                            echo $combo->getResult();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group" id="ocultarinput2" onkeypress="return justNumbers(event)">
                    <label class="control-label" for="textinput">Valor *</label>
                    <div class="controls input-group">
                        <select name="valorNuclear" class="input-large">
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboValores();
                            echo $combo->getResult();
                            ?>                       
                        </select>
                    </div>
                </div> 
                <div class="control-group" id="ocultarinput3" onkeypress="return justNumbers(event)">
                    <label class="control-label" for="textinput">Técnica *</label>
                    <div class="controls input-group">
                        <select id="tecnicaTaller" name="idTecnica" class="input-xlarge">
                            <option value="100">SELECCIONE UNA TÉCNICA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo  de Actividad
                     *</label>
                    <div class="controls input-group">
                        <select id="tipoActividad"  name="tipoActividad" class="input-large">cc
                            <option value="0">SELECCIONE UN TIPO DE ACTIVIDAD</option>
                            <option value="rutinaria">Rutinaria</option>
                            <option value="Norutinaria">No rutinaria       </option>

                            






                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Estado *</label>
                    <div class="controls input-group">
                        <select id="estadoTaller"  name="estadoTaller" class="input-large">c
                            <option value="0">SELECCIONE UN ESTADO</option>
                            <option value="Cancelado">Cancelado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Realizado">Realizado</option>





                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Asistencia *</label>
                    <div class="controls input-group">
                        <input name="asistenciaTaller" type="number" placeholder="Ingrese el Numero de personas" class="input-xlarge">
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Objetivo:</label>
                <div class="controls input-group">
                <textarea  name="objetivo" class="input-xxlarge" style='background: #b2ff9a;color:#000;'  placeholder="Ingrese la Objetivo del Taller" rows="5" required ></textarea>
                </div> 
            </div>
            <div class="control-group" id="ocultarinput4" onkeypress="return justNumbers(event)">
                <label class="control-label" for="textinput">Desarrollo del Taller: *</label>
                <div class="controls input-group">
                    <textarea  name="actividadInicial" style='background: #b2ff9a;color:#000' class="input-xxlarge" placeholder="Ingrese la descripción de la actividad inicial." rows="5"></textarea> 
                </div>
            </div>
            <div class="control-group" id="ocultarinput5" onkeypress="return justNumbers(event)">
                <label class="control-label" for="textinput">Experiencias Significativa: *</label>
                <div class="controls input-group">
                    <textarea name="actividadCentral" style='background: #b2ff9a;color:#000' class="input-xxlarge" placeholder="Ingrese la descripción de la actividad central." rows="5"></textarea> 
                </div>
            </div>
            <div class="control-group" id="ocultarinput6" onkeypress="return justNumbers(event)">
                <label class="control-label" for="textinput">Aspectos a Fortalecer: *</label>
                <div class="controls input-group">
                    <textarea name="actividadFinal" style='background: #8bff67;color:#000' class="input-xxlarge" placeholder="Ingrese la descripción de la actividad final." rows="5"></textarea> 
                </div>
            </div> 

        <!--</div>-->

        <!-- PASO2 -->
        <!--<div id="paso2T" class="tab-pane" style="display: none;">-->
            <div class="control-group" id="ocultarinput7" onkeypress="return justNumbers(event)">
                <label class="control-label" for="textinput">Personaje del Taller y Tertimonio:</label>
                <div class="controls input-group">
                <textarea name="descripcionDeActividades" style='background: #6dd64c;color:#000' class="input-xxlarge" placeholder="Ingrese la Descripción del Taller" rows="5"></textarea>
                </div> 
            </div>
             <div class="control-group" id="ocultarinput8" onkeypress="return justNumbers(event)">
                <label class="control-label" for="textinput">Experincias Significativas:</label>
                <div class="controls input-group">
                <textarea name="logros" class="input-xxlarge" style='background: #8bff67;color:#000' placeholder="Ingrese los Logros del Taller" rows="5"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Alertas y Acciones: </label>
                <div class="controls input-group">
                    <textarea id="observacionCancelacion" style='background: #6dd64c;color:#000' name="observacion" class="input-xxlarge" placeholder="Ingrese la observación y/o motivo en caso que el taller sea cancelado o aplazado." rows="5"></textarea> 
                </div>
            </div>
            <!--<div class="control-group">
                Descripción de Actividades:
                <br>
                <input type ="hidden" value="NULL" id="descripcionTaller" name="descripcionTaller" class="input-xxlarge" placeholder="Ingrese la Descripción del Taller" rows="5"> 
            </div>-->
            <div class="control-group">
                <label class="control-label" for="textinput">Dificultades:</label>
                <div class="controls input-group">
                <textarea id="dificultadesTaller" style='background: #43c91a;color:#000' name="dificultades" class="input-xxlarge" placeholder="Ingrese las Dificultades del Taller" rows="5"></textarea>
                </div> 
            </div>
            <div class="control-group" id="ocultarinput9" onkeypress="return justNumbers(event)">
                <label class="control-label" for="textinput">Seguridad y salud en el trabajo (SST):</label>
                <div class="controls input-group">
                <textarea name="recomendaciones" style='background: #43c91a;color:#000' class="input-xxlarge" placeholder="Ingrese las Recomendaciones del Taller" rows="5"></textarea>
                </div> 
            </div>
            <div class="control-group">
                <input name="isdelTaller" type="hidden" value="1" class="input-xlarge">
            </div>

        <center>
            <div class="control-group">
                <button type="button" class="btn btn-primary" id="returnTalleres" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="acc" value="taller2">Guardar</button>  
                <button type="button" class="btn btn-primary" id="modiTalleres" data-dismiss="modal" style="display: none">Modificar</button>
                <button type="button" class="btn btn-primary" id="updateTalleres" data-dismiss="modal" style="display: none">Actualizar</button> &nbsp;&nbsp;
                <a href="semilleros.php"><button type="button" class="btn btn-primary">Volver</button></a>
            </div>
        </center>

    </div>
</form>
    
</section>

<div class="control-group">                                
    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demoT">Listado de Talleres &nbsp;&nbsp;</button>
    <!-- tabs left -->
    <div id="demoT" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

        <div class="tabbable tabs-left">

            <div class="tab-content">

                <br>
                <div class="table-responsive">                            
                    <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolTalleres">
                        <thead>
                            <tr>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Tipo</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:200px">Nombre Taller</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:120px">Fecha Taller</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:120px">Fecha Limite</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Asistencia</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                            </tr>
                        </thead>
                        <tbody  id="index_ajax">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>