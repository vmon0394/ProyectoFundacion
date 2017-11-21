<form  method="POST" class="form-horizontal" id="frmSemilleros">     
    <div class="tab-pane">
        <input id="idSemillero"  name="idSemillero" type="hidden">

        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Proyecto *</label>
                <div class="controls">
                    <select id="proyecto" name="proyecto" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboProyectos();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Semillero *</label>
                <div class="controls">
                    <input id="semillero"  name="semillero" type="text" placeholder="Ingrese el Nombre del Semillero" class="input-xlarge">
                </div>
            </div>                                                                        
            <div class="control-group">
                <label class="control-label" for="textinput">Categoría *</label>
                <div class="controls">
                    <select id="categoria" name="categoria" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboCategorias();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Facilitador *</label>
                <div class="controls">
                    <select id="facilitador" name="facilitador" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboFacilitadores();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Psicólogo *</label>
                <div class="controls">
                    <select id="psicologo" name="psicologo" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboPsicologos();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Habilidad *</label>
                <div class="controls">
                    <select id="habilidad" name="habilidad" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboHabilidades();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>  
            <div class="control-group">
                <label class="control-label" for="textinput">1er Aliado *</label>
                <div class="controls">
                    <select id="aliado1" name="aliado1" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=8&idAliado=' + document.getElementById('aliado1').value, 'aliado2');">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboAliados();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">2do Aliado </label>
                <div class="controls">
                    <select id="aliado2" name="aliado2" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=9&idAliado=' + document.getElementById('aliado1').value + '&idAliado2=' + document.getElementById('aliado2').value, 'aliado3');">
                        <option value="0">SELECCIONE UN ALIADO</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">3er Aliado </label>
                <div class="controls">
                    <select id="aliado3" name="aliado3" class="input-xlarge">
                        <option value="0">SELECCIONE UN ALIADO</option>
                    </select>
                </div>
            </div>
            <!Se separa columna>

            <div class="control-group">
                <label class="control-label" for="textinput">Ubicación *</label>
                <div class="controls">
                    <select id="zona" name="zona" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboZonas();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Comuna</label>
                <div class="controls">
                    <select id="comuna" name="comuna" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboComunas();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Barrio</label>
                <div class="controls">
                    <input id="barrio"  name="barrio" type="text" placeholder="Ingrese el Barrio del Semillero" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Dirección</label>
                <div class="controls">
                    <input id="direccion"  name="direccion" type="text" placeholder="Ingrese la Dirección del Semillero" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Organización</label>
                <div class="controls">
                    <input id="organizacion"  name="organizacion" type="text" placeholder="Ingrese la Organización del Contacto" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Contacto *</label>
                <div class="controls">
                    <input id="contacto"  name="contacto" type="text" placeholder="Ingrese el Nombre de Contacto de la Organización" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">E-mail Contacto</label>
                <div class="controls">
                    <input id="emailContacto"  name="emailContacto" type="text" placeholder="Ingrese el E-mail de Contacto de la Organización" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Teléfono Contacto *</label>
                <div class="controls">
                    <input id="telefono"  name="telefono" type="text" placeholder="Ingrese el Teléfono de Contacto de la Organización" class="input-xlarge">
                </div>
            </div>
            <br>
            <br>
            <br>

        </div>                                                             

    </div>
</form>