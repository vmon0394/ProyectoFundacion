<form  method="POST" class="form-horizontal" id="frmPadrinos">     
    <div class="tab-pane">
        <input id="idPadrino"  name="idPadrino" type="hidden">

        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Documento *</label>
                <div class="controls input-group">
                    <input id="documento"  name="documento" type="text" placeholder="Ingrese el Documento del Padrino" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Nombres *</label>
                <div class="controls input-group">
                    <input id="nombre"  name="nombre" type="text" placeholder="Ingrese el Nombre del Padrino" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Apellidos *</label>
                <div class="controls input-group">
                    <input id="apellido"  name="apellido" type="text" placeholder="Ingrese los Apellidos del Padrino" class="input-xlarge">
                </div>
            </div>  
            <div class="control-group">
                <label class="control-label" for="textinput">Teléfono </label>
                <div class="controls input-group">
                    <input id="telefono"  name="telefono" type="text" placeholder="Ingrese el Teléfono del Padrino" class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Celular </label>
                <div class="controls input-group">
                    <input id="celular"  name="celular" type="text" placeholder="Ingrese el Celular del Padrino" class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">E-mail </label>
                <div class="controls input-group">
                    <input id="email"  name="email" type="text" placeholder="Ingrese el E-mail del Padrino" class="input-xlarge">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Compañía *</label>
                <div class="controls input-group">
                    <select id="compania"  name="compania" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboCompanias();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Sede </label>
                <div class="controls input-group">
                    <input id="sede"  name="sede" type="text" placeholder="Ingrese la Sede del Padrino" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Depar. Compañía *</label>
                <div class="controls input-group">
                    <select id="departamentoCompania" name="departamentoCompania" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoCompania').value, 'ciudadCompania');">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboDepartamentos();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Ciudad Compañía *</label>
                <div class="controls input-group">
                    <select id="ciudadCompania" name="ciudadCompania" class="input-xlarge">
                        <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Aporte Quincenal </label>
                <div class="controls input-group">
                    <input id="aporte"  name="aporte" type="text" placeholder="Ingrese el Aporte Quincenal" class="input-large">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Fecha Autorización </label>
                <div class="controls input-group">
                    <input id="fechaAutorizacion"  name="fechaAutorizacion" type="date" class="input-large">
                </div>
            </div>

        </div>

    </div>
</form>