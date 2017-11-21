<form  method="POST" class="form-horizontal" id="frmFichaSocioFamiliarAdultos">     
    <div class="tab-pane">
        <div id="NavegacionP">
            <ul class="nav nav-tabs" id="myNav">
                <li><a href=""  id="Ap1" class="btn-success">Paso 1</a></li>
                <li><a href=""  id="Ap2">Paso 2</a></li>
                <li><a href=""  id="Ap3">Paso 3</a></li>
                <li><a href=""  id="Ap4">Paso 4</a></li>
                <li><a href=""  id="Ap5">Paso 5</a></li>
            </ul>
        </div>         

        <input id="idFichaAdultos"  name="idFichaAdultos" type="hidden">

        <!-- PASO1 -->
        <div id="Apaso1" class="tab-pane active">

            <div class="control-group">
                <div class="controls">
                    <div class="control-group">
                        <label class="control-label" for="textinput">Semillero *</label>
                        <div class="controls input-group">
                            <select id="semilleroAdulto"  name="semilleroAdulto" class="input-xlarge">
                                <?php
                                include_once '../Model/libCombos.php';
                                $combo = new libCombos();
                                $combo->comboSemillerosAdultos($_SESSION["idEmpleado"]);
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
                        <input id="nombresAdulto"  name="nombresAdulto" type="text" placeholder="Ingrese el Nombre del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Apellidos *</label>
                    <div class="controls input-group">
                        <input id="apellidosAdulto"  name="apellidosAdulto" type="text" placeholder="Ingrese los Apellidos del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sexo">Sexo *</label>
                    <div class="controls input-group">
                        <label class="radio inline" for="sexoAdulto">
                            <input type="radio" name="sexoAdulto" id="sexoAdulto-1" value="MASCULINO">
                            MASCULINO
                        </label>
                        <label class="radio inline" for="sexoAdulto">
                            <input type="radio" name="sexoAdulto" id="sexoAdulto-2" value="FEMENINO">
                            FEMENINO
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Depar. Nacimiento *</label>
                    <div class="controls input-group">
                        <select id="departamentoNacimientoAdulto" name="departamentoNacimientoAdulto" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoNacimientoAdulto').value, 'ciudadNacimientoAdulto');">
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
                        <select id="ciudadNacimientoAdulto" name="ciudadNacimientoAdulto" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha Nacimiento *</label>
                    <div class="controls input-group">
                        <input id="fechaNacimientoAdulto"  name="fechaNacimientoAdulto" type="date" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Edad *</label>
                    <div class="controls input-group">
                        <input id="edadAdulto"  name="edadAdulto" type="text" disabled="true" placeholder="Ingrese la Edad" class="input-large">
                    </div>
                </div>
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Documento *</label>
                    <div class="controls input-group">
                        <select id="tipoDocumentoAdulto" name="tipoDocumentoAdulto" class="input-large">
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
                        <input id="documentoAdulto"  name="documentoAdulto" type="text" placeholder="Ingrese Documentos de Indentidad" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">RH *</label>
                    <div class="controls input-group">
                        <select id="rhAdulto" name="rhAdulto" class="input-large">
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
                        <select id="tipoSeguridadAdulto"  name="tipoSeguridadAdulto" class="input-large">
                            <option value="0">SELECCIONE TIPO</option>
                            <option value="CONTRIBUTIVO (EPS)">CONTRIBUTIVO (EPS)</option>
                            <option value="SUBSIDIADO (SISBEN)">SUBSIDIADO (SISBEN)</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Entidad </label>
                    <div class="controls input-group">
                        <input id="entidadAdulto"  name="entidadAdulto" type="text" placeholder="Ingrese la Entidad Prestadora de Servicio" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Teléfono Fijo </label>
                    <div class="controls input-group">
                        <input id="telefonoAdulto"  name="telefonoAdulto" type="text" placeholder="Ingrese el Teléfono del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Celular </label>
                    <div class="controls input-group">
                        <input id="celularAdulto"  name="celularAdulto" type="text" placeholder="Ingrese el Celular del Participante" class="input-xlarge">
                    </div>
                </div>

            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue1Adulto" data-dismiss="modal">Continuar</button>  
                </div>
            </center>

        </div>

        <!-- PASO2 -->
        <div id="Apaso2" class="tab-pane" style="display: none;">

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Ocupación </label>
                    <div class="controls input-group">
                        <input id="ocupacionAdulto"  name="ocupacionAdulto" type="text" placeholder="Ingrese la Ocupación del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Dirección </label>
                    <div class="controls input-group">
                        <input id="direccionAdulto"  name="direccionAdulto" type="text" placeholder="Ingrese la Dirección de Residencia" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Barrio o  Vereda *</label>
                    <div class="controls input-group">
                        <select id="barrioOveredaAdulto"  name="barrioOveredaAdulto" class="input-large">
                            <option value="0">SELECCIONE TIPO</option>
                            <option value="BARRIO">BARRIO</option>
                            <option value="VEREDA">VEREDA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nombre Barrio/Vereda</label>
                    <div class="controls input-group">
                        <input id="barrioAdulto"  name="barrioAdulto" type="text" placeholder="Ingrese el Barrio de Residencia" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">E-mail</label>
                    <div class="controls input-group">
                        <input id="emailAdulto"  name="emailAdulto" type="text" placeholder="Ingrese el E-mail del Participante" class="input-xlarge">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Depar. Residencia *</label>
                    <div class="controls input-group">
                        <select id="departamentoResidenciaAdulto" name="departamentoResidenciaAdulto" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoResidenciaAdulto').value, 'ciudadResidenciaAdulto');">
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
                        <select id="ciudadResidenciaAdulto" name="ciudadResidenciaAdulto" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nivel Escolaridad *</label>
                    <div class="controls input-group">
                        <select id="nivelEscolaridad"  name="nivelEscolaridad" class="input-large">
                            <option value="0">SELECCIONE NIVEL</option>
                            <option value="PRIMARIA">PRIMARIA</option>
                            <option value="SEGUNDARIA">SEGUNDARIA</option>
                            <option value="TÉCNICA">TÉCNICA</option>
                            <option value="TECNÓLOGIA">TECNÓLOGIA</option>
                            <option value="PROFESIONAL">PROFESIONAL</option>
                            <option value="ESPECIALIZACIÓN">ESPECIALIZACIÓN</option>
                            <option value="MAESTRIA">MAESTRIA</option>
                            <option value="DOCTORADO">DOCTORADO</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">Estado Escolaridad *</label>
                    <div class="controls input-group">                        
                        <select id="estadoEscolaridad"  name="estadoEscolaridad" class="input-xlarge">
                            <option value="0">SELECCIONE EL ESTADO</option>
                            <option value="COMPLETO">COMPLETO</option>
                            <option value="INCOMPLETO">INCOMPLETO</option>
                            <option value="EN CURSO">EN CURSO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Area Profesionalización</label>
                    <div class="controls input-group">
                        <input id="areaProfesionalizacion"  name="areaProfesionalizacion" type="text" placeholder="Area de Profesionalización" class="input-xlarge" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha de Ingreso *</label>
                    <div class="controls input-group">
                        <input id="anoIngresoAdulto"  name="anoIngresoAdulto" type="date" placeholder="Ingrese el Año 0000" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Años de Permanencia *</label>
                    <div class="controls input-group">
                        <input id="anoPermanenciaAdulto"  name="anoPermanenciaAdulto" type="text" disabled="true" placeholder="Años de Permanencia" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nombre Niño</label>
                    <div class="controls input-group">
                        <input id="nombresNino"  name="nombresNino" type="text" placeholder="Ingrese el Nombre del Niño en Semillero" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Parentesco Niño</label>
                    <div class="controls input-group">
                        <input id="parentezcoNino"  name="parentezcoNino" type="text" placeholder="Ingrese el parentesco con el Niño" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Programa</label>
                    <div class="controls input-group">
                        <input id="programaNino"  name="programaNino" type="text" placeholder="Ingrese el Nombre del Programa" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipología Familiar *</label>
                    <div class="controls input-group">
                        <select id="tipologiaAdulto"  name="tipologiaAdulto" class="input-xlarge">
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

            </div>
            <br>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue2Adulto" data-dismiss="modal">Continuar</button>  
                </div>
            </center>

        </div>

        <!-- PASO3 -->
        <div id="Apaso3" class="tab-pane" style="display: none;">

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Desplazado *</label>
                    <div class="controls input-group">
                        <select id="desplazadoAdulto"  name="desplazadoAdulto" class="input-large">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>                
                <div class="control-group">
                    <label class="control-label" for="textinput">Registro Desplazado</label>
                    <div class="controls input-group">
                        <select id="registroAdulto"  name="registroAdulto" class="input-large" disabled="true">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Víctima </label>
                    <div class="controls input-group">
                        <select id="victimaAdulto"  name="victimaAdulto" class="input-large" disabled="true">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Registro Víctima </label>
                    <div class="controls input-group">
                        <select id="registroVictimaAdulto"  name="registroVictimaAdulto" class="input-large" disabled="true">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Discapacidad *</label>
                    <div class="controls input-group">
                        <select id="discapacidadAdulto"  name="discapacidadAdulto" class="input-large">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Discapacidad</label>
                    <div class="controls input-group">                        
                        <select id="observacionDiscapaAdulto"  name="observacionDiscapaAdulto" class="input-large" disabled="true">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="COGNITIVA">COGNITIVA</option>
                            <option value="FÍSICA">FÍSICA</option>
                            <option value="SENSORIAL">SENSORIAL</option>
                            <option value="PSÍQUICA">PSÍQUICA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Etnia *</label>
                    <div class="controls input-group">
                        <select id="etniaAdulto"  name="etniaAdulto" class="input-large">
                            <option value="0">SELECCIONE UNA ETNIA</option>
                            <option value="AFRODESCENDIENTE">AFRODESCENDIENTE</option>
                            <option value="MESTIZO">MESTIZO</option>
                            <option value="INDÍGENA">INDÍGENA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Miembros Familia *</label>
                    <div class="controls input-group">
                        <input id="numeroMiembrosAdulto"  name="numeroMiembrosAdulto" type="text" placeholder="Ingrese el Numero de Miembros en la Familia" class="input-xlarge">
                    </div>
                </div>     
                <div class="control-group">
                    <label class="control-label" for="textinput">Nro. Empleo Formal </label>
                    <div class="controls input-group">
                        <input id="empleoFormalAdulto"  name="empleoFormalAdulto" type="text" placeholder="Numero de Personas con Empleo Formal" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nro. Empleo Informal </label>
                    <div class="controls input-group">
                        <input id="empleoInformalAdulto"  name="empleoInformalAdulto" type="text" placeholder="Numero de Personas con Empleo Informal" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Flia. en la Empresa *</label>
                    <div class="controls input-group">
                        <select id="familiarEmpresaAdulto"  name="familiarEmpresaAdulto" class="input-large">
                            <option value="0">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Compañía</label>
                    <div class="controls input-group">
                        <select id="companiaAdulto"  name="companiaAdulto" class="input-xlarge" disabled="true">
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
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Vinculación</label>
                    <div class="controls input-group">
                        <select id="tipoVinculacionAdulto"  name="tipoVinculacionAdulto" class="input-xlarge" disabled="true">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="CONTRATISTA">CONTRATISTA</option>
                            <option value="DIRECTA">DIRECTA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nombre y Parentesco </label>
                    <div class="controls input-group">
                        <input id="nombresFamiliarEmpresaAdulto"  name="nombresFamiliarEmpresaAdulto" type="text" disabled="true" placeholder="Nombre del Familiar en la Empresa" class="input-xlarge">
                    </div>
                </div>

            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="saveAdulto" data-dismiss="modal">Guardar</button>  
                    <button type="button" class="btn btn-primary" id="updateAdulto" data-dismiss="modal" style="display: none">Actualizar</button>
                </div>
            </center>

        </div>

    </div>
</form>

<!-- PASO4 -->
<div id="Apaso4" class="tab-pane" style="display: none">

    <div class="control-group">                                
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demoA">Archivos Necesarios en la Ficha Socio Familiar &nbsp;&nbsp;</button>
        <!-- tabs left -->
        <div id="demoA" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#aA" data-toggle="tab" class="">Documento de Identidad</a></li>
                    <li><a href="#bA" data-toggle="tab" class="">Foto</a></li> 
                    <li><a href="#lA" data-toggle="tab" class="">Foto perfíl</a></li> 
                    <li><a href="#cA" data-toggle="tab" class="">Declaración de Voluntad</a></li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="aA">

                        <br>
                        <center>
                            <h4>Favor nombrar el Documento como se le indica a continuación: Documento_NombrePersona_Año</h4>
                            <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG y PDF con un tamaño máximo de 2MG.</h5>
                        </center>
                        <br>
                        <form id="formUploadDocumentoAdultos" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoDocumentoAdultos" id="archivoDocumentoAdultos" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarDocumentoAdultos" id="enviarDocumentoAdultos" type="button" class="btn btn-success">Cargar Documento</button>
                                </div>
                            </center>
                        </form>

                    </div>

                    <div class="tab-pane" id="bA">

                        <br>
                        <center>
                            <h4>Favor nombrar la Foto como se le indica a continuación: Documento_Año</h4>
                            <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG. </h5>
                        </center>
                        <br>
                        <form id="formUploadFotoAdultos" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoFotoAdultos" id="archivoFotoAdultos" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarFotoAdultos" id="enviarFotoAdultos" type="button" class="btn btn-success">Cargar Foto</button>
                                </div>
                            </center>
                        </form>

                    </div>
                    
                    <div class="tab-pane" id="lA">

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

                    <div class="tab-pane" id="cA">

                        <br>
                        <center>
                            <h4>Favor nombrar la Declaración de Voluntad como se le indica a continuación: Documento_NombrePersona_Año</h4>
                            <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG y PDF con un tamaño máximo de 2MG.</h5>
                        </center>
                        <br>
                        <form id="formUploadVoluntadAdultos" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoVoluntadAdultos" id="archivoVoluntadAdultos" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarVoluntadAdultos" id="enviarVoluntadAdultos" type="button" class="btn btn-success">Cargar Declaración</button>
                                </div>
                            </center>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">                            
        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolArchivosAdultos">
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

    <center>
        <div class="control-group">
            <button type="button" class="btn btn-primary" id="limpiarAdulto" data-dismiss="modal">Limpiar</button>  
        </div>
    </center>

</div>

<!-- PASO5 -->
<div id="Apaso5" class="tab-pane active" style="display: none">

    <form  method="POST" class="form-horizontal" id="frmObservacionAdulto">     
        <div class="tab-pane">

            <h3><center>OBSERVACIONES</center></h3><br>
            <legend></legend>

            <!-- Campo oculto con el id del historial -->
            <input id="idFichaObservaAdulto"  name="idFichaObservaAdulto" type="hidden"> 
            <input id="idObservaionAdulto"  name="idObservaionAdulto" type="hidden">   
            <input id="tipoObservaionAdulto"  name="tipoObservaionAdulto" type="hidden" value="Facilitador">

            <div class="control-group">
                FECHA OBSERVACIÓN: &nbsp;&nbsp;
                <input id="fechaObservacionAdulto"  name="fechaObservacionAdulto" type="date" class="input-xlarge">                                    
            </div>
            <div class="control-group">
                OBSERVACIÓN:
                <br>
                <textarea id="observacionAdulto" name="observacionAdulto" class="input-block-level" placeholder="Ingrese la Observación del Participante" rows="5"></textarea> 
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="returnObservacionAdulto" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                    <button type="button" class="btn btn-primary" id="saveObservacionAdulto" data-dismiss="modal">Guardar</button>  
                    <button type="button" class="btn btn-primary" id="updateObservacionAdulto" data-dismiss="modal" style="display: none">Actualizar</button>
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
                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolObservacionAdulto">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Fecha</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:500px">Observación</th>
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