<form  method="POST" class="form-horizontal" id="frmUsuariosLaboratorio" >     
    <div class="tab-pane">
        <input id="idUsuario"  name="idUsuario" type="hidden">

        <div class="twoColumns" id="formula">
            
            <div class="control-group">
                    <label class="control-label" for="textinput">Tipo registro *</label>
                    <div class="controls input-group">
                        <select id="tipoRegistro"  name="tipoRegistro" class="input-large">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="nino">NIÑO</option>
                            <option value="adulto">ADULTO</option>
                        </select>
                    </div>
                </div>
            
            <div class="control-group" id="a" name="a">
                <label class="control-label" for="textinput">Documento *</label>
                <div class="controls input-group">
                    <input id="documento"  name="documento" type="text" placeholder="Ingrese el Documento" class="input-xlarge">
                </div>
            </div>
            <div class="control-group" id="b" name="b">
                <label class="control-label" for="textinput">Nombres *</label>
                <div class="controls input-group">
                    <input id="nombre"  name="nombre" type="text" placeholder="Nombre de Persona, Semillero o Institucion" class="input-xlarge">
                </div>
            </div>
            <div class="control-group" id="c" name="c">
                <label class="control-label" for="textinput">Apellidos *</label>
                <div class="controls input-group">
                    <input id="apellido"  name="apellido" type="text" placeholder="Ingrese los Apellidos " class="input-xlarge">
                </div>
            </div>  
            <div class="control-group" id="ed" name="ed">
                <label class="control-label" for="textinput">Edad *</label>
                <div class="controls input-group">
                    <input id="edad"  name="edad" type="number" placeholder="Ingrese la edad" class="input-xlarge">
                </div>
            </div>  
            <div class="control-group" id="d" name="d">
                <label class="control-label" for="textinput">Teléfono </label>
                <div class="controls input-group">
                    <input id="telefono"  name="telefono" type="text" placeholder="Ingrese el Teléfono " class="input-xlarge">
                </div>
            </div> 
            <div class="control-group" id="e" name="e">
                <label class="control-label" for="textinput">Celular </label>
                <div class="controls input-group">
                    <input id="celular"  name="celular" type="text" placeholder="Ingrese el Celular " class="input-xlarge">
                </div>
            </div>
            <legend></legend> 
            <div class="control-group" id="f" name="f">
                <label class="control-label" for="textinput">E-mail </label>
                <div class="controls input-group">
                    <input id="email"  name="email" type="text" placeholder="Ingrese el e-mail del Padrino" class="input-xlarge">
                </div>
            </div> 
            <div class="control-group" id="g" name="g">
                <label class="control-label" for="textinput">Nombre Acudiente</label>
                <div class="controls input-group">
                    <input id="acudiente"  name="acudiente" type="text" placeholder="Ingrese nombre de acudiente" class="input-xlarge">
                </div>
            </div>
            <div class="control-group"  id="h" name="h">
                <label class="control-label" for="textinput">Dirección</label>
                <div class="controls input-group">
                    <input id="direccion"  name="direccion" type="text" placeholder="Ingrese direccion de residencia" class="input-xlarge">
                </div>
            </div>
            <div class="control-group" id="i" name="i">
                <label class="control-label" for="textinput">Institución Educativa</label>
                <div class="controls input-group">
                    <input id="institucion"  name="institucion" type="text" placeholder="Ingrese" class="input-xlarge">
                </div>
            </div>
            <!--<div class="twoColumns">-->
<!--                <div class="control-group">
                    
                    <label><input type="checkbox" id="1" name="1[]"> hora del juego</label>
                    <label><input type="checkbox" id="2" name="1[]"> hora del cuento</label>
                    <label><input type="checkbox" id="3" name="1[]"> hora del ponque</label>
                    
                </div>-->
            <!--</div>-->    
            <div class="control-group" id="j" name="j">
                <label class="control-label" for="textinput">Seleccione un Semillero </label>
                <div class="controls input-group">
                    <select id="semillero"  name="semillero" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboSemillerosNinos2();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div> 
           
            <div class="control-group" id="k" name="k">
                <label class="control-label" for="textinput">Seleccione los servicios a los que asiste actualmente *</label>
                <div class="controls input-group">
                    <select  id="servicios" name="servicios" class="input-xlarge">
                    <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos;
                        $combo->comboServicios();
                        echo $combo->getResult();
                    ?>
                </select>
            </div>
<!--                <div>
                    <input type="submit" >
                </div>-->
        </div>
            
        </div>
    </div>
</form>