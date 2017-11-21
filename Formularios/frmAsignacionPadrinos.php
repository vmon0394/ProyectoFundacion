<form  method="POST" class="form-horizontal" id="frmAsignarPadrino">     
    <div class="tab-pane">
        <input id="idMovPadrinoFicha"  name="idMovPadrinoFicha" type="hidden">

        <div class="twoColumns">            

            <div class="control-group">
                <label class="control-label" for="textinput">Compañía *</label>
                <div class="controls input-group">
                    <select id="compania"  name="compania" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=4&idCompania=' + document.getElementById('compania').value, 'padrinos');">
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
                <label class="control-label" for="textinput">Padrinos *</label>
                <div class="controls input-group">
                    <select id="padrinos" name="padrinos" class="input-xlarge">
                        <option value="0">SELECCIONE UN PADRINO</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Semillero *</label>
                <div class="controls input-group">
                    <select id="semillero"  name="semillero" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=5&idSemillero=' + document.getElementById('semillero').value, 'participante');">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboSemillerosNinos2();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Participante *</label>
                <div class="controls input-group">
                    <select id="participante" name="participante" class="input-xlarge">
                        <option value="0">SELECCIONE UN PARTICIPANTE</option>
                    </select>
                </div>
            </div>

        </div>

    </div>
</form>