<form  method="POST" class="form-horizontal" id="frmFichaSocioFamiliarNinos">     
    <div class="tab-pane">
        <div id="NavegacionP">
            <ul class="nav nav-tabs" id="myNav">
                <li><a href=""  id="p1" class="btn-success">Paso 1</a></li>
                <li><a href=""  id="p2">Paso 2</a></li>
                <li><a href=""  id="p3">Paso 3</a></li>
                <li><a href=""  id="p4">Paso 4</a></li>
                <li><a href=""  id="p5">Paso 5</a></li>
                <li><a href=""  id="p6">Paso 6</a></li>
            </ul>
        </div>                       

        <input id="idFichaNinos"  name="idFichaNinos" type="hidden">

        <!-- PASO1 -->
        <div id="paso1" class="tab-pane active">

            <div class="control-group">
                <div class="twoColumns">
                    <div class="control-group" >
                        <center id="recibirImagen">
                        </center>
                    </div>
                    <br><br>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Semillero *</label>
                        <div class="controls input-group">
                            <select id="semilleroN"  name="semilleroN" class="input-xlarge">
                                <?php
                                include_once '../Model/libCombos.php';
                                $combo = new libCombos();
                                $combo->comboSemillerosNinos($_SESSION["idEmpleado"]);
                                echo $combo->getResult();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
           

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Nombres *</label>
                    <div class="controls input-group">
                        <input id="nombres"  name="nombres" type="text" placeholder="Ingrese el Nombre del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Apellidos *</label>
                    <div class="controls input-group">
                        <input id="apellidos"  name="apellidos" type="text" placeholder="Ingrese los Apellidos del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sexo">Sexo *</label>
                    <div class="controls input-group">
                        <label class="radio inline" for="sexo">
                            <input type="radio" name="sexo" id="sexo-1" value="MASCULINO">
                            MASCULINO
                        </label>
                        <label class="radio inline" for="sexo">
                            <input type="radio" name="sexo" id="sexo-2" value="FEMENINO">
                            FEMENINO
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Depar. Nacimiento *</label>
                    <div class="controls input-group">
                        <select id="departamentoNacimiento" name="departamentoNacimiento" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoNacimiento').value, 'ciudadNacimiento');">
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
                    <label class="control-label" for="textinput">Ciudad Nacimiento *</label>
                    <div class="controls input-group">
                        <select id="ciudadNacimiento" name="ciudadNacimiento" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha Nacimiento *</label>
                    <div class="controls input-group">
                        <input id="fechaNacimiento"  name="fechaNacimiento" type="date" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Edad *</label>
                    <div class="controls input-group">
                        <input id="edad"  name="edad" type="text" disabled="true" placeholder="Ingrese la Edad" class="input-large">
                    </div>
                </div>
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Documento *</label>
                    <div class="controls input-group">
                        <select id="tipoDocumento" name="tipoDocumento" class="input-large">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="T.I">Tarjeta de Identidad</option>
                            <option value="RC">Registro Civil</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Documento *</label>
                    <div class="controls input-group">
                        <input id="documento"  name="documento" type="text" placeholder="Ingrese Documentos de Indentidad" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">RH *</label>
                    <div class="controls input-group">
                        <select id="rh" name="rh" class="input-large">
                            <option value="0">SELECCIONE RH</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Seguridad *</label>
                    <div class="controls input-group">
                        <select id="tipoSeguridad"  name="tipoSeguridad" class="input-large">
                            <option value="0">SELECCIONE TIPO</option>
                            <option value="CONTRIBUTIVO (EPS)">CONTRIBUTIVO (EPS)</option>
                            <option value="SUBSIDIADO (SISBEN)">SUBSIDIADO (SISBEN)</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Entidad </label>
                    <div class="controls input-group">
                        <input id="entidad"  name="entidad" type="text" placeholder="Ingrese la Entidad Prestadora de Servicio" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Teléfono Fijo </label>
                    <div class="controls input-group">
                        <input id="telefonoN"  name="telefonoN" type="text" placeholder="Ingrese el Teléfono del Participante" class="input-xlarge">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Celular</label>
                    <div class="controls input-group">
                        <input id="celular"  name="celular" type="text" placeholder="Ingrese el Celular del Participante" class="input-xlarge">
                    </div>
                </div>

            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue1" data-dismiss="modal">Continuar</button>  
                </div>
            </center>

        </div>

        <!-- PASO2 -->
        <div id="paso2" class="tab-pane" style="display: none;">

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Ocupación </label>
                    <div class="controls input-group">
                        <input id="ocupacion"  name="ocupacion" type="text" placeholder="Ingrese la Ocupación del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Dirección </label>
                    <div class="controls input-group">
                        <input id="direccionN"  name="direccionN" type="text" placeholder="Ingrese la Dirección de Residencia" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Barrio o  Vereda *</label>
                    <div class="controls input-group">
                        <select id="barrioOvereda"  name="barrioOvereda" class="input-large">
                            <option value="0">SELECCIONE TIPO</option>
                            <option value="BARRIO">BARRIO</option>
                            <option value="VEREDA">VEREDA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nombre Barrio/Vereda</label>
                    <div class="controls input-group">
                        <input id="barrioN"  name="barrioN" type="text" placeholder="Ingrese el Barrio de Residencia" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">E-mail</label>
                    <div class="controls input-group">
                        <input id="email"  name="email" type="text" placeholder="Ingrese el E-mail del Participante" class="input-xlarge">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Depar. Residencia *</label>
                    <div class="controls input-group">
                        <select id="departamentoResidencia" name="departamentoResidencia" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoResidencia').value, 'ciudadResidencia');">
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
                    <label class="control-label" for="textinput">Ciudad Residencia *</label>
                    <div class="controls input-group">
                        <select id="ciudadResidencia" name="ciudadResidencia" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">Institución *</label>
                    <div class="controls input-group">
                        <input id="institucion"  name="institucion" type="text" placeholder="Ingrese la Institución Educativa" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Grado *</label>
                    <div class="controls input-group">                        
                        <select id="grado" name="grado" class="input-large">
                            <option value="">SELECCIONE EL GRADO</option>
                            <?php for ($i = 1; $i <= 11; $i++) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?>°</option>   
                            <?php } ?>
                            <option value="ACELERACIÓN">ACELERACIÓN</option>
                            <option value="NO ESTUDIA">NO ESTUDIA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Repitencia *</label>
                    <div class="controls input-group">
                        <select id="repitencia"  name="repitencia" class="input-large">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Cuántos</label>
                    <div class="controls input-group">
                        <input id="cuantos"  name="cuantos" type="text" disabled="true" placeholder="Ingrese Numero de Años Repetidos" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Cuáles</label>
                    <div class="controls input-group">
                        <input id="cualesRepite"  name="cualesRepite" type="text" disabled="true" placeholder="Ingrese Cuáles Grados a Repetido" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha de Ingreso *</label>
                    <div class="controls input-group">
                        <input id="anoIngreso"  name="anoIngreso" type="date" placeholder="Ingrese el Año 0000" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Años de Permanencia *</label>
                    <div class="controls input-group">
                        <input id="anoPermanencia"  name="anoPermanencia" type="text" disabled="true" placeholder="Años de Permanencia" class="input-large">
                    </div>
                </div>

            </div>
            <br>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue2" data-dismiss="modal">Continuar</button>  
                </div>
            </center>

        </div>

        <!-- PASO3 -->
        <div id="paso3" class="tab-pane" style="display: none;">

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Nombre Padres *</label>
                    <div class="controls input-group">
                        <input id="nombresPadre"  name="nombresPadre" type="text" placeholder="Ingrese Nombres del Papá o de la Mamá" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Teléfono Padres </label>
                    <div class="controls input-group">
                        <input id="telefonoPadre"  name="telefonoPadre" type="text" placeholder="Ingrese Teléfono del Papá o de la Mamá" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Celular Padres</label>
                    <div class="controls input-group">
                        <input id="celularPadre"  name="celularPadre" type="text" placeholder="Ingrese Celular del Papá o de la Mamá" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nombres Cuidador </label>
                    <div class="controls input-group">
                        <input id="nombresCuidador"  name="nombresCuidador" type="text" placeholder="Ingrese el Nombre del Cuidador" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Parentezco Cuidador </label>
                    <div class="controls input-group">
                        <input id="parentezcoCuidador"  name="parentezcoCuidador" type="text" placeholder="Ingrese el Parentezco del Cuidador" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Teléfono Cuidador </label>
                    <div class="controls input-group">
                        <input id="telefonoCuidador"  name="telefonoCuidador" type="text" placeholder="Ingrese el Teléfono del Cuidador" class="input-xlarge">
                    </div>
                </div>
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">Celular Cuidador</label>
                    <div class="controls input-group">
                        <input id="celularCuidador"  name="celularCuidador" type="text" placeholder="Ingrese el Celular del Cuidador" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipología Familiar *</label>
                    <div class="controls input-group">
                        <select id="tipologia"  name="tipologia" class="input-xlarge">
                            <option value="0">SELECCIONE UNA TIPOLOGÍA</option>
                            <option value="AMPLIADA">AMPLIADA</option>
                            <option value="EXTENSA">EXTENSA</option>
                            <option value="EXTENSA CON AUSENCIA DEL PADRE">EXTENSA CON AUSENCIA DEL PADRE</option>
                            <option value="EXTENSA CON AUSENCIA DE LA MADRE">EXTENSA CON AUSENCIA DE LA MADRE</option>
                            <option value="EXTENSA CON AUSENCIA DE LOS PADRES">EXTENSA CON AUSENCIA DE LOS PADRES</option>
                            <option value="MONOPARENTAL-MADRE">MONOPARENTAL-MADRE</option>
                            <option value="MONOPARENTAL-PADRE">MONOPARENTAL-PADRE</option>
                            <option value="NUCLEAR">NUCLEAR</option>
                            <option value="NUCLEAR CON MADRASTRA">NUCLEAR CON MADRASTRA</option>
                            <option value="NUCLEAR CON PADRASTRO">NUCLEAR CON PADRASTRO</option>
                            <option value="SIMULTANEA">SIMULTANEA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nro. Miembros Familia *</label>
                    <div class="controls input-group">
                        <input id="numeroMiembros"  name="numeroMiembros" type="text" placeholder="Ingrese el Numero de Miembros en la Familia" class="input-xlarge">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Nro. Empleo Formal </label>
                    <div class="controls input-group">
                        <input id="empleoFormal"  name="empleoFormal" type="text" placeholder="Numero de Personas con Empleo Formal" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nro. Empleo Informal </label>
                    <div class="controls input-group">
                        <input id="empleoInformal"  name="empleoInformal" type="text" placeholder="Numero de Personas con Empleo Informal" class="input-xlarge">
                    </div>
                </div>   
                <div class="control-group">
                    <label class="control-label" for="textinput">Etnia *</label>
                    <div class="controls input-group">
                        <select id="etnia"  name="etnia" class="input-large">
                            <option value="0">SELECCIONE UNA ETNIA</option>
                            <option value="AFRODESCENDIENTE">AFRODESCENDIENTE</option>
                            <option value="MESTIZO">MESTIZO</option>
                            <option value="INDÍGENA">INDÍGENA</option>
                        </select>
                    </div>
                </div>                                    

            </div>
            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue3" data-dismiss="modal">Continuar</button>  
                </div>
            </center>

        </div>

        <!-- PASO4 -->
        <div id="paso4" class="tab-pane active" style="display: none">

            <div class="twoColumns">


                <div class="control-group">
                    <label class="control-label" for="textinput">Desplazado *</label>
                    <div class="controls input-group">
                        <select id="desplazado"  name="desplazado" class="input-large">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Registro Desplazado </label>
                    <div class="controls input-group">
                        <select id="registro"  name="registro" class="input-large" disabled="true">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Víctima </label>
                    <div class="controls input-group">
                        <select id="victima"  name="victima" class="input-large" disabled="true">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Registro Víctima </label>
                    <div class="controls input-group">
                        <select id="registroVictima"  name="registroVictima" class="input-large" disabled="true">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Discapacidad *</label>
                    <div class="controls input-group">
                        <select id="discapacidad"  name="discapacidad" class="input-large">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Discapacidad</label>
                    <div class="controls input-group">                        
                        <select id="observacionDiscapa"  name="observacionDiscapa" class="input-large"  disabled="true">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="COGNITIVA">COGNITIVA</option>
                            <option value="FÍSICA">FÍSICA</option>
                            <option value="SENSORIAL">SENSORIAL</option>
                            <option value="PSÍQUICA">PSÍQUICA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Flia. en la Empresa *</label>
                    <div class="controls input-group">
                        <select id="familiarEmpresa"  name="familiarEmpresa" class="input-large">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Compañía</label>
                    <div class="controls input-group">
                        <select id="compania"  name="compania" class="input-xlarge" disabled="true">
                            <option value="0">SELECCIONE UNA COMPAÑIA</option>
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboCompaniasNombres();
                            echo $combo->getResult();
                            ?>
                        </select>
                    </div>
                </div>    
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Vinculación</label>
                    <div class="controls input-group">
                        <select id="tipoVinculacion"  name="tipoVinculacion" class="input-xlarge" disabled="true">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="CONTRATISTA">CONTRATISTA</option>
                            <option value="DIRECTA">DIRECTA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nombre y Parentesco</label>
                    <div class="controls input-group">
                        <input id="nombresFamiliarEmpresa"  name="nombresFamiliarEmpresa" type="text" disabled="true" placeholder="Nombre del Familiar en la Empresa" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Otro Semillero *</label>
                    <div class="controls input-group">
                        <select id="participaOtroSemillero"  name="participaOtroSemillero" class="input-large">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Cual Semillero</label>
                    <div class="controls input-group">
                        <textarea id="otroSemilleros"  name="otroSemilleros" type="text" disabled="true" placeholder="Nombre de los otros semilleros que participa" rows="3" class="input-xlarge"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Otro Servicios *</label>
                    <div class="controls input-group">
                        <select id="participaServicios"  name="participaServicios" class="input-large">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Qué Servicios</label>
                    <div class="controls input-group">
                        <textarea id="queSemilleros"  name="queSemilleros" type="text" disabled="true" placeholder="Nombre de los servicios que participa" rows="3" class="input-xlarge"></textarea>
                    </div>
                </div>

            </div>
            <br>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-primary" id="updateNino" data-dismiss="modal" style="display: none">Actualizar</button>
                </div>
            </center>

        </div>

    </div>
</form>

<!-- PASO5 -->
<div id="paso5" class="tab-pane" style="display: none">

    <div class="control-group">                                
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demoN">Archivos Necesarios en la Ficha Socio Familiar &nbsp;&nbsp;</button>
        <!-- tabs left -->
        <div id="demoN" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#aN" data-toggle="tab" class="">Documento de Identidad</a></li>
                    <li><a href="#bN" data-toggle="tab" class="">Foto</a></li> 
                    <li><a href="#fP" data-toggle="tab" class="">Foto perfil</a></li> 
                    <li><a href="#cN" data-toggle="tab" class="">Declaración de Voluntad</a></li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="aN">

                        <br>
                        <center>
                            <h4>Favor nombrar el Documento como se le indica a continuación: Documento_NombrePersona_Año</h4>
                            <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG y PDF con un tamaño máximo de 2MG.</h5>
                        </center>
                        <br>
                        <form id="formUploadDocumento" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoDocumento" id="archivoDocumento" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarDocumento" id="enviarDocumento" type="button" class="btn btn-success">Cargar Documento</button>
                                </div>
                            </center>
                        </form>

                    </div>

                    <div class="tab-pane" id="bN">

                        <br>
                        <center>
                            <h4>Favor nombrar la Foto como se le indica a continuación: Documento_Año</h4>
                            <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG.</h5>
                        </center>
                        <br>
                        <form id="formUploadFoto" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoFoto" id="archivoFoto" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarFotoN" id="enviarFotoN" type="button" class="btn btn-success">Cargar Foto</button>
                                </div>
                            </center>
                        </form>

                    </div>
                    <div class="tab-pane" id="fP" name="fP">

                        <br>
                        <center>
                            <h4>Favor nombrar la imagen de esta manera: nombreNiño_año_día </h4>
                            <h5>Formatos permitidos: JPG y PNG</h5>
                        </center>
                        <br>
                        <form id="formUploadFotoPerfil" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                            <div class="control-group">
                                <center>
                                    <div class="control-group" id="imagenPerfil">
                                    </div>
                                </center>
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoFotoPerfil" id="archivoFotoPerfil" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarFotoPerfil" id="enviarFotoPerfil" type="button" class="btn btn-success">Cargar Foto</button>
                                </div>
                            </center>
                        </form>
                        
                    </div>

                    <div class="tab-pane" id="cN">

                        <br>
                        <center>
                            <h4>Favor nombrar la Declaración de Voluntad como se le indica a continuación: Documento_NombrePersona_Año</h4>
                            <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG y PDF con un tamaño máximo de 2MG.</h5>
                        </center>
                        <br>
                        <form id="formUploadVoluntad" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoVoluntad" id="archivoVoluntad" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarVoluntad" id="enviarVoluntad" type="button" class="btn btn-success">Cargar Declaración</button>
                                </div>
                            </center>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">                            
        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolArchivosNinos">
            <thead>
                <tr>
                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                    <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Tipo Archivo</th>
                    <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Nombre Archivo</th>
                    <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Fecha</th>
                    <th class="text-center" style="padding-right: 10px; color: #000; width:30px">Ver</th>
                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Eliminar</th>
                </tr>
            </thead>
            <tbody  id="index_ajax">

            </tbody>
        </table>
    </div>
</div>

<!-- PASO6 -->
<div id="paso6" class="tab-pane active" style="display: none">

    <form  method="POST" class="form-horizontal" id="frmObservacionNino">     
        <div class="tab-pane">

            <h3><center>OBSERVACIONES</center></h3><br>
            <legend></legend>

            <!-- Campo oculto con el id del historial -->
            <input id="idFichaObserva"  name="idFichaObserva" type="hidden"> 
            <input id="idObservaion"  name="idObservaion" type="hidden">  
            <input id="tipoObservaion"  name="tipoObservaion" type="hidden" value="Facilitador">

            <div class="control-group">
                FECHA OBSERVACIÓN: &nbsp;&nbsp;
                <input id="fechaObservacion"  name="fechaObservacion" type="date" class="input-xlarge">                                    
            </div>
            <div class="control-group">
                OBSERVACIÓN:
                <br>
                <textarea id="observacion" name="observacion" class="input-block-level" placeholder="Ingrese la Observación del Participante" rows="5"></textarea> 
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="returnObservacionNinos" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                    <button type="button" class="btn btn-primary" id="saveObservacion" data-dismiss="modal">Guardar</button>  
                    <button type="button" class="btn btn-primary" id="updateObservacion" data-dismiss="modal" style="display: none">Actualizar</button>
                </div>
            </center>

            <div class="control-group">                                
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Observaciones &nbsp;&nbsp;</button>
                <!-- tabs left -->
                <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                    <div class="tabbable tabs-left">

                        <div class="tab-content">

                            <br>
                            <div class="table-responsive">                            
                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolObservacion">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Fecha</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Tipo</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:600px">Observación</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                                        </tr>
                                    </thead>
                                    <tbody  id="index_ajax">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </form>

</div>