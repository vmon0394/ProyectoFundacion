<form  method="POST" class="form-horizontal" id="frmActividades">     
    <div class="tab-pane">
      
        
        <input id="idActividad"  name="idActividad" type="hidden">

        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Servicio *</label>
                <div class="controls input-group">
                    <select id="idServicio"  name="idServicio" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboServicios();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>  
            <div class="control-group">
                <label class="control-label" for="textinput">Nombre actividad *</label>
                <div class="controls input-group">
                    <input id="nombreActividad"  name="nombreActividad" type="text" placeholder="Ingrese el Nombre del Taller" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Fecha *</label>
                <div class="controls input-group">
                    <input id="fecha"  name="fecha" type="date" class="input-large">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">Valor </label>
                <div class="controls input-group">
                    <select id="idValor"  name="idValor" class="input-large">
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
                <label class="control-label" for="textinput">Tiempo Día *</label>
                <div class="controls input-group">
                    <select id="hora"  name="hora" class="input-large">
                        <option value="0">SELECCIONE UNA HORA</option>
                        <option value="am">Mañana</option>
                        <option value="pm">Tarde</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Estado *</label>
                <div class="controls input-group">
                    <select id="estado"  name="estado" class="input-large">
                        <option value="0">SELECCIONE UN ESTADO</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Realizado">Realizado</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Descripcion *</label>
                <div class="controls input-group">
                <textarea id="descripcion" name="descripcion" class="input-xlarge" placeholder="Ingrese la Descripción " rows="3"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Objetivo *</label>
                <div class="controls input-group">
                    <textarea id="objetivo" name="objetivo" class="input-xlarge" placeholder="Ingrese el Objetivo " rows="3"></textarea> 
                </div>
            </div><br><br>
            <div class="control-group">
                <label class="control-label" for="textinput">Logros </label>
                <div class="controls input-group">
                <textarea id="logros" name="logros" class="input-xlarge" placeholder="Ingrese los Logros de la Actividad" rows="3"></textarea> 
                </div>
            </div>



            <div class="control-group">
                <label class="control-label" for="textinput">Aspectos a Mejorar </label>
                <div class="controls input-group">
                <textarea id="dificultades" name="dificultades" class="input-xlarge" rows="3"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Recomendaciones </label>
                <div class="controls input-group">
                <textarea id="recomendaciones" name="recomendaciones" class="input-xlarge" placeholder="Ingrese las Recomendaciones " rows="3"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Testimonios </label>
                <div class="controls input-group">
                <textarea id="testimonios" name="testimonios" class="input-xlarge" placeholder="Ingrese los Testimonios " rows="3"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Alertas y Acciones </label>
                <div class="controls input-group">
                <textarea id="alertas" name="alertas" class="input-xlarge" placeholder="Ingrese las Alertas " rows="3"></textarea>
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Asistencia</label>
                <div class="controls input-group">
                    <input id="asistencia"  name="asistencia" type="number" class="input-large">
                </div>
            </div>
                
        </div>
    </div>  

           
    <center>
        <div class="control-group">
            <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
            <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Guardar</button>  
            <button type="button" class="btn btn-primary" id="modi" data-dismiss="modal" style="display: none">Modificar</button>
            <button type="button" class="btn btn-primary" id="update" data-dismiss="modal" style="display: none">Actualizar</button> &nbsp;&nbsp;
            <!--<button type="button" class="btn btn-primary" id="returnTalleresSemi" data-dismiss="modal">Volver</button>-->
        </div>
    </center>
</form>

<div class="control-group">                                
    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demoT">Listado De Actividades &nbsp;&nbsp;</button>
  
    <div id="demoT" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

        <div class="tabbable tabs-left">

            <div class="tab-content">

                <br>
                <div class="table-responsive">                            
                    <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
                        <thead>
                            <tr>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°
                                </th><th class="text-center" style="padding-right: 10px; color: #000; width:500px">Servicio</th>                                        
                                <th class="text-center" style="padding-right: 10px; color: #000; width:500px">Actividad</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Fecha realización</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Estado</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Asistencia</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Consultar</th>
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