<form  method="POST" class="form-horizontal" id="frmSalidas">     
    <div class="tab-pane">
        <input id="idSalida"  name="idSalida" type="hidden">

        <div class="twoColumns">
            <div class="control-group">
                <label class="control-label" for="textinput">Nombre Campamento *</label>
                <div class="controls input-group">
                    <input id="salida"  name="salida" type="text" placeholder="Ingrese el Nombre de la salida" class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Fecha Campamento *</label>
                <div class="controls input-group">
                    <input id="fechaSalida"  name="fechaSalida" type="text" class="input-large">
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
                    <textarea id="descripcion" name="descripcion" placeholder="Ingrese el Objetivo de la salida" rows="4" class="input-xlarge"></textarea>
                </div>
            </div>
        </div>
    </div>
</form> 