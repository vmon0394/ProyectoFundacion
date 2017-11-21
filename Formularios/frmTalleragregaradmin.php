<?php
include_once '../Model/db.conn.php';
include_once '../Model/libAgregartaller.php';
$idsemillero = activicomuni::idtaller(base64_decode($_REQUEST["ui"]));
date_default_timezone_set("America/Bogota");
?>
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
                        <select id="tipoTaller1" name="tipoTaller" class="input-large">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="Actividades Especiales">Actividades Especiales</option>
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
                    <label class="control-label" for="textinput">Fecha Inicial *</label>
                    <div class="controls input-group">
                        <input id="fechaTaller"  name="fechaTaller" type="date" value="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" min="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha Final *</label>
                    <div class="controls input-group">
                        <input name="fechaLimite" type="date" value="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" min="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" class="input-xlarge">
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

            <div class="control-group">
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
            <div class="control-group">
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
                <a href="semilleros.php"><button type="button" class="btn btn-primary">Volver</button></a>
            </div>
        </center>

    </div>
</form>
    
</section>
