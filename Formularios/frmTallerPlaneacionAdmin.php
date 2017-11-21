<!--<?php
include_once '../Model/db.conn.php';
include_once '../Model/libAgregartaller.php';
?>
<script src="http://code.jquery.com/jquery-1.0.4.js"></script>-->
<!--<script>
      $(document).ready(function () {
          $("#tipoTaller").change(function () {
              var value = $(this).val();
              $("#tipoTaller1").val(value);
          });
      });
</script>
<script type="text/javascript">

    function partic(sel){

        if(sel.value == "0"){
            divs = document.getElementById("formulario2");
            divs.style.display="none";
            divC = document.getElementById("participantess");
            divC.style.display = "";
        }else if(sel.value=="Talleres Formativos"){
            divC = document.getElementById("participantess");
            divC.style.display = "";
            divs = document.getElementById("formulario2");
            divs.style.display = "none";
        }else{
            divC = document.getElementById("participantess");
            divC.style.display="none";
            divs = document.getElementById("formulario2");
            divs.style.display="";
        }
    }
</script>
<section id="participantess">-->
<?php
    include_once '../Model/db.conn.php';
    include_once '../Model/libTecnicasAll.php';
?>
<form  method="POST" class="form-horizontal" id="frmTaller">     
    <div class="tab-pane">
        <label class="alert alert-info">Los campos marcados con * son obligatorios </label>

        <!--<div id="NavegacionP">
            <ul class="nav nav-tabs" id="myNav">
                <li><a href=""  id="p1T" class="btn-success">Planeación</a></li>
                <li><a href=""  id="p2T">Taller</a></li>
                <h3 align="center" id="tituloTaller"></h3>
            </ul>
        </div>-->   

        <input id="idTaller"  name="idTaller" type="hidden">

        <!-- PASO1 -->
        <!--<div id="paso1T" class="tab-pane active">-->

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Semillero *</label>
                    <div class="controls input-group">
                        <select id="semilleroTallerD"  name="semilleroTallerD" disabled="true" class="input-xlarge">
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboSemilleros2();
                            echo $combo->getResult();
                            ?>
                        </select>
                        <input id="semilleroTaller"  name="semilleroTaller" type="hidden">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Taller *</label>
                    <div class="controls input-group">
                        <select id="tipoTaller" onChange="partic(this)" name="tipoTaller" class="input-large">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="Actividades Especiales">Actividades Especiales</option>
                            <option value="Talleres Formativos">Talleres Formativos</option>
                            <option value="Salidas Pedagógicas">Salidas Pedagógicas</option>
                            <option value="Vacaciones recreativas">Vacaciones recreativas</option>
                            <option value="Encuentro de Padres">Encuentro de Padres</option>
                            <option value="Campamento">Campamento</option>
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
                    <label class="control-label" for="textinput">Fecha *</label>
                    <div class="controls input-group">
                        <input id="fechaTaller"  name="fechaTaller" type="date" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Habilidad *</label>
                    <div class="controls input-group">
                        <select id="idHabilidad" name="idHabilidad" class="input-xlarge"  onchange="Carga('../Controller/ctrlCombos.php?opcion=2&habili=' + document.getElementById('idHabilidad').value, 'tecnicaTaller');">
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboHabilidades();
                            echo $combo->getResult();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Valor *</label>
                    <div class="controls input-group">
                        <select id="valorTaller"  name="valorTaller" class="input-large">
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboValores();
                            echo $combo->getResult();
                            ?>                       
                        </select>
                    </div>
                </div>
                <br> 
                <br> 
                <!--<div class="control-group">
                    <label class="control-label" for="textinput">Técnica *</label>
                    <div class="controls input-group">
                        <select id="tecnicaTaller"  name="tecnicaTaller" class="input-xlarge">
                            <option value="0">SELECCIONE UNA TÉCNICA</option>
                        </select>
                    </div>
                </div>-->
                <div class="control-group">
                    <label class="control-label" for="textinput">Técnica *</label>
                    <div class="controls input-group">
                        <select id="tecnicaTaller" name="tecnicaTaller" class="input-xlarge">
                            <option value="0">SELECCIONE UNA TÉCNICA</option>
                                <?php
                                    $tecnica = tecnicaAll::tecnicall();
                                    foreach ($tecnica as $tec){
                                        echo"
                                            <option value='".$tec["idTecnica"]."'>".$tec["nombreTecnica"]."</option>
                                        ";
                                    }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo de Actividad *</label>
                    <div class="controls input-group">
                        <select id="tipoActividad"  name="tipoActividad" class="input-xlarge">
                            <option value="0">SELECCIONE UN TIPO DE ACTIVIDAD</option>
                            <option value="Rutinaria">Rutinaria</option>
                            <option value="NoRutinaria">No rutinaria</option>    
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
                    <div class="controls input-group">
                        <a href="tecnicas.php"  target="_blank">Ir a Tecnicas</a>
                    </div>
                </div>
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
                <textarea id="objetivoTaller" style='background: #F2D7D5;color:#000;' name="objetivoTaller" class="input-xxlarge" placeholder="Ingrese la Objetivo del Taller" rows="5"></textarea>
                </div> 
            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">Desarrollo del Taller: *</label>
                <div class="controls input-group">
                    <textarea id="actividadInicial" style='background: #FADBD8;color:#000' name="actividadInicial" class="input-xxlarge" placeholder="Ingrese la descripción de la actividad inicial." rows="5"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Experiencias Significativa: *</label>
                <div class="controls input-group">
                    <textarea style='background: #EBDEF0;color:#000' id="actividadCentral" name="actividadCentral" class="input-xxlarge" placeholder="Ingrese la descripción de la actividad central." rows="5">-</textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Aspectos a Fortalecer: *</label>
                <div class="controls input-group">
                    <textarea id="actividadFinal" style='background: #E8DAEF;color:#000' name="actividadFinal" class="input-xxlarge" placeholder="Ingrese la descripción de la actividad final." rows="5">-</textarea> 
                </div>
            </div> 

        <!--</div>-->

        <!-- PASO2 -->
        <!--<div id="paso2T" class="tab-pane" style="display: none;">-->

            <div class="control-group">
                <label class="control-label" for="textinput">Personaje del Taller y Tertimonio:</label>
                <div class="controls input-group">
                <textarea id="descripcionTaller" style='background: #D4E6F1;color:#000' name="descripcionTaller" class="input-xxlarge" placeholder="Personaje del Taller y Tertimonio" rows="5">-</textarea>
                </div> 
            </div>
            <!--<div class="control-group">
                Descripción de Actividades:
                <br>
                <input type ="hidden" value="NULL" id="descripcionTaller" name="descripcionTaller" class="input-xxlarge" placeholder="Ingrese la Descripción del Taller" rows="5"> 
            </div>-->
           <!--<div class="control-group">
                <label class="control-label" for="textinput">Experincias Significativas:</label>
                <div class="controls input-group">
                <textarea id="logrosTaller" style='background: #D6EAF8;color:#000' name="logrosTaller" class="input-xxlarge" placeholder="Experincias Significativasr" rows="5"></textarea> 
                </div>
            </div>-->
            <div class="control-group">
                <label class="control-label" for="textinput">Alertas y Acciones: </label>
                <div class="controls input-group">
                    <textarea id="observacionCancelacion" style='background: #D1F2EB;color:#000' name="observacionCancelacion" class="input-xxlarge" placeholder="Alertas y Acciones." rows="5"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Dificultades:</label>
                <div class="controls input-group">
                <textarea id="dificultadesTaller" style='background: #D0ECE7;color:#000' name="dificultadesTaller" class="input-xxlarge" placeholder="Ingrese las Dificultades del Taller" rows="5">-</textarea>
                </div> 
            </div>
         
            <div class="control-group">
                <label class="control-label" for="textinput">Seguridad y salud en el trabajo (SST):</label>
                <div class="controls input-group">
                <textarea id="recomendacionesTaller" style='background: #EAFAF1;color:#000;' name="recomendacionesTaller" class="input-xxlarge" placeholder="- Riesgos asociados a la actividad: - Procedimiento o normas de seguridad: - Elementos de protección:" rows="5"></textarea>
                </div> 
            </div>  

        <center>
            <div class="control-group">
                <button type="button" class="btn btn-primary" id="returnTalleres" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                <button type="button" class="btn btn-primary" id="saveTalleres" data-dismiss="modal">Guardar</button>  
                <button type="button" class="btn btn-primary" id="modiTalleres" data-dismiss="modal" style="display: none">Modificar</button>
                <button type="button" class="btn btn-primary" id="updateTalleres" data-dismiss="modal" style="display: none">Actualizar</button> &nbsp;&nbsp;
                <button type="button" class="btn btn-primary" id="returnTalleresSemi" data-dismiss="modal">Volver</button>
            </div>
        </center>

    </div>
</form>
<!--</section>-->

<!--<section id="formulario2" style='position:relative;display:none'>

<form action="../Controller/ctrlTalleresagregar.php" method="POST" class="form-horizontal">
    <div class="tab-pane">
        <label class="alert alert-info">Los campos marcados con * son obligatorios </label>

        <input id="idTaller"  name="idTaller" type="hidden">
        
        <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Semillero *</label>
                    <div class="controls input-group">
                        <select id="semilleroTaller"  name="idSemillero" disabled="true" class="input-xlarge">
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboSemilleros2();
                            echo $combo->getResult();
                            ?>
                        </select>
                        <input id="semilleroTaller"  name="semilleroTaller" type="hidden">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Taller *</label>
                    <div class="controls input-group">
                        <select id="tipoTaller1" onChange="partic(this)" name="tipoTaller" class="input-large">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="Actividades Especiales">Actividades Especiales</option>
                            <option value="Talleres Formativos">Talleres Formativos</option>
                            <option value="Salidas Pedagógicas">Salidas Pedagógicas</option>
                            <option value="Vacaciones recreativas">Vacaciones recreativas</option>
                            <option value="Encuentro de Padres">Encuentro de Padres</option>
                            <option value="Campamento">Campamento</option>
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
                    <label class="control-label" for="textinput">Fecha *</label>
                    <div class="controls input-group">
                        <input id="fechaTaller"  name="fechaTaller" type="date" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Habilidad *</label>
                    <div class="controls input-group">
                        <select id="idHabilidad" name="idHabilidad" class="input-xlarge"  onchange="Carga('../Controller/ctrlCombos.php?opcion=2&habili=' + document.getElementById('idHabilidad').value, 'tecnicaTaller');">
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboHabilidades();
                            echo $combo->getResult();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Valor *</label>
                    <div class="controls input-group">
                        <select id="valorTaller"  name="valorNuclear" class="input-large">
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboValores();
                            echo $combo->getResult();
                            ?>                       
                        </select>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Técnica *</label>
                    <div class="controls input-group">
                        <select id="tecnicaTaller"  name="idTecnica" class="input-xlarge">
                            <option value="0">SELECCIONE UNA TÉCNICA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tiempo *</label>
                    <div class="controls input-group">
                        <input id="tiempoTaller"  name="tiempo" type="text" placeholder="Ingrese el Tiempo del Taller" class="input-xlarge">
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

            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">Actividad Inicial: *</label>
                <div class="controls input-group">
                    <textarea id="actividadInicial" name="actividadInicial" class="input-xxlarge" placeholder="Ingrese la descripción de la actividad inicial." rows="5"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Actividad Central: *</label>
                <div class="controls input-group">
                    <textarea id="actividadCentral" name="actividadCentral" class="input-xxlarge" placeholder="Ingrese la descripción de la actividad central." rows="5"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Actividad Final: *</label>
                <div class="controls input-group">
                    <textarea id="actividadFinal" name="actividadFinal" class="input-xxlarge" placeholder="Ingrese la descripción de la actividad final." rows="5"></textarea> 
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Observación: </label>
                <div class="controls input-group">
                    <textarea id="observacionCancelacion" name="observacion" class="input-xxlarge" placeholder="Ingrese la observación y/o motivo en caso que el taller sea cancelado o aplazado." rows="5"></textarea> 
                </div>
            </div>

        <!--</div>-->

        <!-- PASO2 -->
        <!--<div id="paso2T" class="tab-pane" style="display: none;">-->

            <!--<div class="control-group">
                <label class="control-label" for="textinput">Objetivo:</label>
                <div class="controls input-group">
                <textarea id="objetivoTaller" name="objetivo" class="input-xxlarge" placeholder="Ingrese la Objetivo del Taller" rows="5"></textarea>
                </div> 
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Descripción de Actividades:</label>
                <div class="controls input-group">
                <textarea id="descripcionTaller" name="descripcionDeActividades" class="input-xxlarge" placeholder="Ingrese la Descripción del Taller" rows="5"></textarea>
                </div> 
            </div>
            <!--<div class="control-group">
                Descripción de Actividades:
                <br>
                <input type ="hidden" value="NULL" id="descripcionTaller" name="descripcionTaller" class="input-xxlarge" placeholder="Ingrese la Descripción del Taller" rows="5"> 
            </div>-->
            <!--<div class="control-group">
                <label class="control-label" for="textinput">Logros:</label>
                <div class="controls input-group">
                <textarea id="logrosTaller" name="logros" class="input-xxlarge" placeholder="Ingrese los Logros del Taller" rows="5"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Dificultades:</label>
                <div class="controls input-group">
                <textarea id="dificultadesTaller" name="dificultades" class="input-xxlarge" placeholder="Ingrese las Dificultades del Taller" rows="5"></textarea>
                </div> 
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Recomendaciones:</label>
                <div class="controls input-group">
                <textarea id="recomendacionesTaller" name="recomendaciones" class="input-xxlarge" placeholder="Ingrese las Recomendaciones del Taller" rows="5"></textarea>
                </div> 
            </div>
            <div class="control-group">
                <input name="isdelTaller" type="hidden" value="1" class="input-xlarge">
            </div>

        <center>
            <div class="control-group">
                <button type="button" class="btn btn-primary" id="returnTalleres" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="acc" value="taller1">Guardar</button>  
                <button type="button" class="btn btn-primary" id="modiTalleres" data-dismiss="modal" style="display: none">Modificar</button>
                <button type="button" class="btn btn-primary" id="updateTalleres" data-dismiss="modal" style="display: none">Actualizar</button> &nbsp;&nbsp;
                <button type="button" class="btn btn-primary" id="returnTalleresSemi" data-dismiss="modal">Volver</button>
            </div>
        </center>

    </div>
</form>
    
</section>-->

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