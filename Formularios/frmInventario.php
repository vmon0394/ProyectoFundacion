<form  method="POST" class="form-horizontal" id="frmInventario">     
    <div class="tab-pane">
        <input id="idMaterial"  name="idMaterial" type="hidden">

        <div class="twoColumns">
          <div class="control-group">
                    <label class="control-label" for="textinput">Nombre *</label>
                    <div class="controls input-group">
                        <input id="nombreMaterial"  name="nombreMaterial" type="text" placeholder="Ingrese el Nombre del Material" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Código *</label>
                    <div class="controls input-group">
                        <input id="codigo"  name="codigo" type="text" placeholder="Ingrese el Código del material" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Descripción </label>
                        <div class="controls input-group">
                        <textarea id="descripcion" name="descripcion" class="input-xlarge" placeholder="Ingrese la descripción del material." rows="3"></textarea> 
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Autor </label>
                    <div class="controls input-group">
                        <input id="autor"  name="autor" type="text" placeholder="Ingrese el Nombre del Autor " class="input-xlarge">
                    </div>
                </div>
            <div class="control-group" id="fecha" name="fecha">
                    <label class="control-label" for="textinput">Fecha Registro</label>
                    <div class="controls input-group">
                        <input id="fechaRegistro"  name="fechaRegistro" type="date" placeholder="Ingrese la fecha actual" class="input-large">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Estado *</label>
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
                <label class="control-label" for="textinput">Zona *</label>
                <div class="controls">
                    <select id="idZona" name="idZona" class="input-large">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboZonas2();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form> 

