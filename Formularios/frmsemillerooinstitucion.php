<form  method="POST" class="form-horizontal" id="frmUsuariosLaboratorio" >     
    <div class="tab-pane">
        <input id="idUsuario"  name="idUsuario" type="hidden">

        <div class="twoColumns" id="formula">

            <div class="control-group">
                <label class="control-label" for="textinput">Tipo registro *</label>
                <div class="controls input-group">
                    <select  name="tipoRegistro" class="input-large">
                        <option value="0">SELECCIONE UN TIPO</option>
                        <option value="Institucion">INSTITUCION</option>
                        <option value="Semillero">SEMILLERO</option>
                    </select>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="textinput">Nit *</label>
                <div class="controls input-group">
                    <input id="documento"  name="documento" type="text" placeholder="Ingrese el NIT de Semillero o institucion" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Nombres *</label>
                <div class="controls input-group">
                    <input id="nombre"  name="nombre" type="text" placeholder="Nombre de Semillero o Institucion" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Teléfono* </label>
                <div class="controls input-group">
                    <input id="telefono"  name="telefono" type="text" placeholder="Ingrese el Teléfono " class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Celular* </label>
                <div class="controls input-group">
                    <input id="celular"  name="celular" type="text" placeholder="Ingrese el Celular " class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">E-mail* </label>
                <div class="controls input-group">
                    <input id="email"  name="email" type="text" placeholder="Ingrese el e-mail" class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Contacto*</label>
                <div class="controls input-group">
                    <input id="acudiente"  name="acudiente" type="text" placeholder="Ingrese nombre de acudiente" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Dirección*</label>
                <div class="controls input-group">
                    <input id="direccion"  name="direccion" type="text" placeholder="Ingrese direccion" class="input-xlarge">
                </div>
            </div>
         
            <!--<div class="twoColumns">-->
<!--                <div class="control-group">
                    
                    <label><input type="checkbox" id="1" name="1[]"> hora del juego</label>
                    <label><input type="checkbox" id="2" name="1[]"> hora del cuento</label>
                    <label><input type="checkbox" id="3" name="1[]"> hora del ponque</label>
                    
                </div>-->
            <!--</div>-->    
           
        </div>
    </div>
</form>