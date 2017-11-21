<form  method="POST" class="form-horizontal" action="Controller/ctrlActividadcomuni.php" >     
    <div class="tab-pane">

        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Informacion Comunitaria *</label>
                <div class="controls input-group">
                    <select  name="informacion_actividad" class="input-large">
                        <option value="0">SELECCIONE UN TIPO</option>
                        <option value="Institucion">INSTITUCION</option>
                        <option value="Semillero">SEMILLERO</option>
                    </select>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="textinput">Actividad comunitaria *</label>
                <div class="controls input-group">
                    <input   name="actividad_comunitaria" type="text" placeholder="Nombre de Semillero o Institucion" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Acompañamiento* </label>
                <div class="controls input-group">
                    <input   name="acompanamiento" type="text" placeholder="Ingrese el Teléfono " class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Visita Institucion* </label>
                <div class="controls input-group">
                    <input   name="visita_institucion" type="text" placeholder="Ingrese el Celular " class="input-xlarge">
                </div>
            </div> 
        </div>
    </div>
    <button  type="submit" name="acc" value="c"> Guardar Cita</button>
</form>