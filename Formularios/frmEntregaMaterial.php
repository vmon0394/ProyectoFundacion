<form class="form-control" method="POST" action="../SuperAdministrador/interfaz.php" id="frmEntrega">
    <input class="hidden" id="idPrestamo2" name="idPrestamo2">
        <div class="form-group">
            <label id="modal-message" >New message</label>
        </div>
    
    <div class="twoColumns">
        <div class="control-group">
            <label class="control-label" for="textinput"></label>
            <div class="controls input-group">
                <select id="estado"  name="estado" class="input-large">
                    <option value="0">SELECCIONE UN ESTADO</option>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Incompleto">Incompleto</option>
                    <option value="Obsoleto">Obsoleto</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="textinput">Nombre</label>
            <div class="controls input-group">
                <textarea id="observacion" name="observacion" class="input-large" placeholder="Observaciones"></textarea>
            </div>
        </div>
    </div> 
    
    <div class="twoColumns">    
        <div class="control-group">
            <label class="control-label" for="textinput">Nombre material:</label>
            <div class="controls input-group">
                <input id="nombre" name="nombre" class="input-large">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="textinput"> El estado actual del material es:</label>
            <div class="controls input-group">
                <select id="estadoActual"  name="estadoActual" class="input-large">
                <option value="0">aaaaa</option>
                <option value="Bueno">Bueno</option>
                <option value="Regular">Regular</option>
                <option value="Incompleto">Incompleto</option>
                <option value="Obsoleto">Obsoleto</option>
            </select>
            </div>
        </div>
    </div>                 
</form>
