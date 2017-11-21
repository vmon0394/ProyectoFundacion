<form  method="POST" class="form-horizontal" id="frmComunitarias">     
    <div class="tab-pane">
        <input id="idComunitaria"  name="Comunitaria" type="hidden">

        <div class="twoColumns">
            <div class="control-group">
                <label class="control-label" for="textinput">Nombre  *</label>
                <div class="controls input-group">
                    <input id="nombre"  name="nombre" type="text" placeholder="Ingrese el Nombre de la actividad" class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Fecha  *</label>
                <div class="controls input-group">
                    <input id="fechaActividad"  name="fechaActividad" type="date" class="input-large">
                </div>
            </div>
              <div class="columns">
                <label class="control-label" for="textinput">Descripcion </label>
                <div class="controls input-group">
                    <textarea id="descripcion" name="descripcion" placeholder="Ingrese el objetivo de la salida" rows="4" class="input-xlarge"></textarea>
                </div>
                <br>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Asistentes *</label>
                <div class="controls input-group">
                    <input id="numParticipantes"  name="numParticipantes" type="number" placeholder="1234..." class="input-mini">
                </div>
            </div> 
        </div>
    </div>
</form> 