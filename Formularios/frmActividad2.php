<?php
include_once '../Model/db.conn.php';
include_once '../Model/libAgregaractividad.php';
date_default_timezone_set("America/Bogota");
?>
<script type="text/javascript">
    function partici(sel){
        if(sel.value=="Institucion"){
            divC = document.getElementById("participantess");
            divC.style.display = "";
        }else{
            divC = document.getElementById("participantess");
            divC.style.display="none";
        }
    }

    function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
        
        return /\d/.test(String.fromCharCode(keynum));
        }
</script>

<form action="../Controller/ctrlAgregarActividad.php" method="POST" class="form-horizontal">   
    <div class="tab-pane">
      
        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Servicio *</label>
                <div class="controls input-group">
                    <select onChange="partici(this)" name="idServicio" class="input-xlarge">
                        <option value="0">SELECCIONE UN SERVICIO</option>
                        <option value="Institucion">Institucion</option>
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
                    <input  name="nombreActividad" type="text" placeholder="Ingrese el Nombre del Taller" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Fecha *</label>
                <div class="controls input-group">
                    <input name="fecha" type="date" value="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" min="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" class="input-large">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">Fecha Limite *</label>
                <div class="controls input-group">
                    <input name="fechaLimite" type="date" value="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" min="<?php date_default_timezone_set("America/Bogota") ; echo date("Y-m-d");?>" class="input-large">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">Valor </label>
                <div class="controls input-group">
                    <select name="idValor" class="input-large">
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
                    <select name="hora" class="input-large">
                        <option value="0">SELECCIONE UNA HORA</option>
                        <option value="am">Mañana</option>
                        <option value="pm">Tarde</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Estado *</label>
                <div class="controls input-group">
                    <select name="estado" class="input-large">
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
                    <textarea name="objetivo" class="input-xlarge" placeholder="Ingrese el Objetivo " rows="3"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Logros </label>
                <div class="controls input-group">
                <textarea name="logros" class="input-xlarge" placeholder="Ingrese los Logros de la Actividad" rows="3"></textarea> 
                </div>
            </div>



            <div class="control-group">
                <label class="control-label" for="textinput">Dificultades </label>
                <div class="controls input-group">
                <textarea id="dificultades" name="dificultades" class="input-xlarge" placeholder="Ingrese las Dificultades" rows="3"></textarea> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Recomendaciones </label>
                <div class="controls input-group">
                <textarea id="recomendaciones" name="recomendaciones" class="input-xlarge" placeholder="Ingrese las Recomendaciones " rows="3"></textarea>
                </div>
            </div> 
            <section id="participantess" style='position:relative;display:none'>
             <div class="control-group">
                <label class="control-label" for="textinput">Numero de Participantes</label>
                <div class="controls input-group">
                    <input name="asistenciaActividad" onkeypress="return justNumbers(event)" type="text" class="input-xlarge">
                </div>
            </div>
            </section>
            <input name="cadenaIdNinosActividad" type="hidden" value="0" class="input-large">
          
            <input name="isdelActividad" type="hidden"  value="1" class="input-large">               
    </div>  
    <br>
           
    <center>
        <div class="control-group">
            <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
            <button type="submit" class="btn btn-primary" name="acc" value="actividad2">Guardar</button>  
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
                                <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                <th class="text-center" style="padding-right: 10px; color: #000; width:500px">Actividad</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Fecha realización</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Estado</th>
                                <th class="text-center" style="padding-right: 10px; color: #000; width:150px">Fecha limite</th>
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