<form  method="POST" class="form-horizontal" id="frmIntervenciones">     
    <div class="tab-pane">
        <input id="idIntervecion"  name="Intervecion" type="hidden">

        <div class="twoColumns">
            <div class="control-group">
                <label class="control-label" for="textinput">Nombre  *</label>
                <div class="controls input-group">
                    <input id="nombre"  name="nombre" type="text" placeholder="Ingrese el Nombre de la intervencion" class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Fecha  *</label>
                <div class="controls input-group">
                    <input id="fechaIntervecion"  name="fechaIntervecion" type="date" class="input-large">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Numero Participantes *</label>
                <div class="controls input-group">
                    <input id="numParticipantes"  name="numParticipantes" type="number" placeholder="1234..." class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Descripcion </label>
                <div class="controls input-group">
                    <textarea id="descripcion" name="descripcion" placeholder="Ingrese el objetivo de la salida" rows="4" class="input-xlarge"></textarea>
                </div>
            </div>
        </div>
    </div>
</form> 