<form  method="POST" class="form-horizontal" id="frmUsuarios">     
    <div class="tab-pane">
        
        <input id="idUsuario"  name="idUsuario" type="hidden">

        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Documento *</label>
                <div class="controls input-group">
                    <input id="documento"  name="documento" type="text" placeholder="Ingrese el Documento del Usuario" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Nombres *</label>
                <div class="controls input-group">
                    <input id="nombre"  name="nombre" type="text" placeholder="Ingrese el Nombre del Usuario" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Apellidos *</label>
                <div class="controls input-group">
                    <input id="apellido"  name="apellido" type="text" placeholder="Ingrese los Apellidos del Usuario" class="input-xlarge">
                </div>
            </div>  
            <div class="control-group">
                <label class="control-label" for="textinput">Celular *</label>
                <div class="controls input-group">
                    <input id="celular"  name="celular" type="text" placeholder="Ingrese el Celular del Usuario" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">E-mail *</label>
                <div class="controls input-group">
                    <input id="email"  name="email" type="text" placeholder="Ingrese el E-mail del Usuario" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Cargo *</label>
                <div class="controls input-group">
                    <select id="cargo" name="cargo" class="input-xlarge">
                        <option value="0">SELECCIONE El CARGO</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Comunicaciones">Comunicaciones</option>
                        <option value="Facilitador">Facilitador</option>
                        <option value="Psicólogo">Psicólogo</option>
                        <option value="Ajedrez">Facilitador ajedrez</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Tarjeta Profesional </label>
                <div class="controls input-group">
                    <input id="tarjeta"  name="tarjeta" type="text" placeholder="Ingrese la Tarjeta Profesional" class="input-xlarge" disabled="true">
                </div>
            </div>
        </div>
    </div>
</form>