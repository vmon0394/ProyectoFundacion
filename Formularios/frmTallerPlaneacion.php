<script type="text/javascript">
    function partic(sel){
        if(sel.value=="Encuentro de Padres"){
            divC = document.getElementById("participantess");
            divC.style.display = "";
        }else if(sel.value=="Salidas Pedagógicas"){
            divC = document.getElementById("participantess");
            divC.style.display = "";
        }else if(sel.value=="Campamento"){
            divC = document.getElementById("participantess");
            divC.style.display = "";
        }else{
            divC = document.getElementById("participantess");
            divC.style.display="none";
        }
    }
</script>
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
                        <select id="tipoTaller" name="tipoTaller" class="input-large">
                            <option value="0 ">SELECCIONE UN TIPO</option>               
                            <option value="Talleres Formativos">Talleres Formativos</option>
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
                <div class="control-group">
                    <label class="control-label" for="textinput">Técnica *</label>
                    <div class="controls input-group">
                        <select id="tecnicaTaller"  name="tecnicaTaller" class="input-xlarge">
                            <option value="0">SELECCIONE UNA TÉCNICA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tiemp *</label>
                    <div class="controls input-group">
                        <select id="tipoActividad"  name="tipoActividad" class="input-large">c
                            <option value="0">SELECCIONE UN TIPO DE ACTIVIDAD</option>
                            <option value="rutinaria">rutinaria</option>
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
                    <textarea id="observacionCancelacion" style='background: #D1F2EB;color:#000' name="observacionCancelacion" class="input-xxlarge" placeholder="Alertas y Acciones." rows="5">-</textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Dificultades:</label>
                <div class="controls input-group">
                <textarea id="dificultadesTaller" style='background: #D0ECE7;color:#000' name="dificultadesTaller" class="input-xxlarge" placeholder="Ingrese las Dificultades del Taller" rows="5">-</textarea>
                </div> 
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">sst:</label>
                <div class="controls input-group">
                <textarea id="recomendacionesTaller" style='background: #EAFAF1;color:#000' name="recomendacionesTaller" class="input-xxlarge" placeholder="Ingrese las Recomendaciones del Taller" rows="5">-</textarea>
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