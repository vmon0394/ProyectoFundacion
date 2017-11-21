<form  method="POST" class="form-horizontal" id="frmFichaVoluntariosEgresados">     
    <div class="tab-pane">
        <div id="NavegacionP">
            <ul class="nav nav-tabs" id="myNav">
                <li><a href=""  id="VEp1" class="btn-success">Paso 1</a></li>
                <li><a href=""  id="VEp2">Paso 2</a></li>
                <li><a href=""  id="VEp3">Paso 3</a></li>
                <li><a href=""  id="VEp4">Paso 4</a></li>
            </ul>
        </div>         

        <input id="idFichaVolunEgres"  name="idFichaVolunEgres" type="hidden">

        <!-- PASO1 -->
        <div id="VEpaso1" class="tab-pane active">

            <div class="control-group">
                <div class="controls">
                    <div class="control-group">
                        <label class="control-label" for="textinput">Semillero *</label>
                        <div class="controls input-group">
                            <select id="semilleroVolunEgres"  name="semilleroVolunEgres" class="input-xlarge">
                                <?php
                                include_once '../Model/libCombos.php';
                                $combo = new libCombos();
                                $combo->comboSemillerosAdultos2();
                                echo $combo->getResult();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Documento *</label>
                    <div class="controls input-group">
                        <select id="tipoDocumentoVolunEgres" name="tipoDocumentoVolunEgres" class="input-large">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="CE">Cédula Extranjería</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Documento *</label>
                    <div class="controls input-group">
                        <input id="documentoVolunEgres"  name="documentoVolunEgres" type="text" placeholder="Ingrese Documentos de Indentidad" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nombres *</label>
                    <div class="controls input-group">
                        <input id="nombresVolunEgres"  name="nombresVolunEgres" type="text" placeholder="Ingrese el Nombre del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Apellidos *</label>
                    <div class="controls input-group">
                        <input id="apellidosVolunEgres"  name="apellidosVolunEgres" type="text" placeholder="Ingrese los Apellidos del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sexo">Sexo *</label>
                    <div class="controls input-group">
                        <label class="radio inline" for="sexoVolunEgres">
                            <input type="radio" name="sexoVolunEgres" id="sexoVolunEgres-1" value="MASCULINO">
                            MASCULINO
                        </label>
                        <label class="radio inline" for="sexoVolunEgres">
                            <input type="radio" name="sexoVolunEgres" id="sexoVolunEgres-2" value="FEMENINO">
                            FEMENINO
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Depar. Nacimiento *</label>
                    <div class="controls input-group">
                        <select id="departamentoNacimientoVolunEgres" name="departamentoNacimientoVolunEgres" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoNacimientoVolunEgres').value, 'ciudadNacimientoVolunEgres');">
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
                        <select id="ciudadNacimientoVolunEgres" name="ciudadNacimientoVolunEgres" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha Nacimiento *</label>
                    <div class="controls input-group">
                        <input id="fechaNacimientoVolunEgres"  name="fechaNacimientoVolunEgres" type="date" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Edad *</label>
                    <div class="controls input-group">
                        <input id="edadVolunEgres"  name="edadVolunEgres" type="text" disabled="true" placeholder="Ingrese la Edad" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Estado Civil </label>
                    <div class="controls input-group">
                        <select id="estadoCivilVolunEgres"  name="estadoCivilVolunEgres" class="input-large">
                            <option value="0">SELECCIONE ESTADO</option>
                            <option value="SOLTERO">SOLTERO</option>
                            <option value="CASADO">CASADO</option>
                            <option value="UNIÓN LIBRE">UNIÓN LIBRE</option>
                            <option value="DIVORCIADO">DIVORCIADO</option>
                            <option value="VIUDO">VIUDO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Número de Hijos </label>
                    <div class="controls input-group">
                        <input id="numeroHijosVolunEgres"  name="numeroHijosVolunEgres" type="text" placeholder="Ingrese el Número de Hijos" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Promoción </label>
                    <div class="controls input-group">
                        <select id="promocionVolunEgres"  name="promocionVolunEgres" class="input-large">
                            <option value="0">SELECCIONE PROMOCIÓN</option>
                            <option value="1997 - MULTIPLICADORES I">1997 - Multiplicadores I</option>
                            <option value="1998 - MULTIPLICADORES II">1998  - Multiplicadores II</option>
                            <option value="2001 - MULTIPLICADORES III">2001 - Multiplicadores III</option>
                            <option value="2013 - MULTIPLICADORES IV">2013 - Multiplicadores IV</option>
                            <option value="MULTIPLICADORES V">Multiplicadores V</option>
                            <option value="MULTIPLICADORES VI">Multiplicadores VI</option>
                            <option value="MULTIPLICADORES VII">Multiplicadores VII</option>
                            <option value="MULTIPLICADORES VIII">Multiplicadores VIII</option>
                            <option value="MULTIPLICADORES IX">Multiplicadores IX</option>
                            <option value="MULTIPLICADORES X">Multiplicadores X</option>
                            <option value="NO CULMINO PROCESO">NO CULMINO PROCESO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha de Ingreso *</label>
                    <div class="controls input-group">
                        <input id="anoIngresoVolunEgres"  name="anoIngresoVolunEgres" type="date" placeholder="Ingrese el Año 0000" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Años de Permanencia *</label>
                    <div class="controls input-group">
                        <input id="anoPermanenciaVolunEgres"  name="anoPermanenciaVolunEgres" type="text" disabled="true" placeholder="Años de Permanencia" class="input-large">
                    </div>
                </div>

            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue1VolunEgres" data-dismiss="modal">Continuar</button>  
                </div>
            </center>

        </div>

        <!-- PASO2 -->
        <div id="VEpaso2" class="tab-pane" style="display: none;">

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Depar. Residencia *</label>
                    <div class="controls input-group">
                        <select id="departamentoResidenciaVolunEgres" name="departamentoResidenciaVolunEgres" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoResidenciaVolunEgres').value, 'ciudadResidenciaVolunEgres');">
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
                        <select id="ciudadResidenciaVolunEgres" name="ciudadResidenciaVolunEgres" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Barrio o  Vereda </label>
                    <div class="controls input-group">
                        <select id="barrioOveredaVolunEgres"  name="barrioOveredaVolunEgres" class="input-large">
                            <option value="0">SELECCIONE TIPO</option>
                            <option value="BARRIO">BARRIO</option>
                            <option value="VEREDA">VEREDA</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nombre Barrio/Vereda </label>
                    <div class="controls input-group">
                        <input id="barrioVolunEgres"  name="barrioVolunEgres" type="text" placeholder="Ingrese el Barrio de Residencia" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Dirección </label>
                    <div class="controls input-group">
                        <input id="direccionVolunEgres"  name="direccionVolunEgres" type="text" placeholder="Ingrese la Dirección de Residencia" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Teléfono Fijo </label>
                    <div class="controls input-group">
                        <input id="telefonoVolunEgres"  name="telefonoVolunEgres" type="text" placeholder="Ingrese el Teléfono del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Celular </label>
                    <div class="controls input-group">
                        <input id="celularVolunEgres"  name="celularVolunEgres" type="text" placeholder="Ingrese el Celular del Participante" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">E-mail</label>
                    <div class="controls input-group">
                        <input id="emailVolunEgres"  name="emailVolunEgres" type="text" placeholder="Ingrese el E-mail del Participante" class="input-xlarge">
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nivel Escolaridad </label>
                    <div class="controls input-group">
                        <select id="nivelEscolaridadVolunEgres"  name="nivelEscolaridadVolunEgres" class="input-large">
                            <option value="">SELECCIONE NIVEL</option>
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
                <div class="control-group">
                    <label class="control-label" for="textinput">Estado Escolaridad </label>
                    <div class="controls input-group">                        
                        <select id="estadoEscolaridadVolunEgres"  name="estadoEscolaridadVolunEgres" class="input-large">
                            <option value="">SELECCIONE EL ESTADO</option>
                            <option value="COMPLETO">COMPLETO</option>
                            <option value="INCOMPLETO">INCOMPLETO</option>
                            <option value="EN CURSO">EN CURSO</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Semestre</label>
                    <div class="controls input-group">
                        <input id="semestreVolunEgres"  name="semestreVolunEgres" type="text" placeholder="Semestre de la Formación" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Area de Formación</label>
                    <div class="controls input-group">
                        <input id="areaProfesionalizacionVolunEgres"  name="areaProfesionalizacionVolunEgres" type="text" placeholder="Area de Formación" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Lugar de Formación</label>
                    <div class="controls input-group">
                        <input id="lugarFormacionVolunEgres"  name="lugarFormacionVolunEgres" type="text" placeholder="Lugar de Formación" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Trabaja Actualmente </label>
                    <div class="controls input-group">
                        <select id="trabajaActualmenteVolunEgres"  name="trabajaActualmenteVolunEgres" class="input-large">
                            <option value="">SELECCIONE UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>  
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo Trabajo </label>
                    <div class="controls input-group">
                        <select id="tipoTrabajoVolunEgres"  name="tipoTrabajoVolunEgres" class="input-large" disabled="true">
                            <option value="">SELECCIONE UNA OPCIÓN</option>
                            <option value="EMPLEADO">EMPLEADO</option>
                            <option value="INDEPENDIENTE">INDEPENDIENTE</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nombre Empresa </label>
                    <div class="controls input-group">
                        <input id="nombreEmpresaVolunEgres"  name="nombreEmpresaVolunEgres" type="text" placeholder="Nombre de la Empresa en la que Trabaja" class="input-xlarge" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo de Contrato </label>
                    <div class="controls input-group">
                        <select id="tipoContratoVolunEgres"  name="tipoContratoVolunEgres" class="input-large" disabled="true">
                            <option value="">SELECCIONE UN TIPO</option>
                            <option value="FIJO">FIJO</option>
                            <option value="INDEFINIDO">INDEFINIDO</option>
                            <option value="PRESTACIÓN DE SERVICIOS">PRESTACIÓN DE SERVICIOS</option>
                        </select>
                    </div>
                </div>      

            </div>
            <br>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="saveVolunEgres" data-dismiss="modal">Guardar</button>  
                    <button type="button" class="btn btn-primary" id="updateVolunEgres" data-dismiss="modal" style="display: none">Actualizar</button>
                </div>
            </center>

        </div>

    </div>
</form>

<!-- PASO3 -->
<div id="VEpaso3" class="tab-pane" style="display: none">

    <div class="control-group">                                
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demoA">Archivos Necesarios en la Ficha Socio Familiar &nbsp;&nbsp;</button>
        <!-- tabs left -->
        <div id="demoA" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#VE" data-toggle="tab" class="">Documento de Identidad</a></li>
                    <li><a href="#bVE" data-toggle="tab" class="">Foto</a></li> 
                    <li><a href="#cVE" data-toggle="tab" class="">Declaración de Voluntad</a></li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="VE">

                        <br>
                        <center>
                            <h4>Favor nombrar el Documento como se le indica a continuación: Documento_NombrePersona_Año</h4>
                            <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG y PDF con un tamaño máximo de 2MG.</h5>
                        </center>
                        <br>
                        <form id="formUploadDocumentoVolunEgress" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoDocumentoVolunEgres" id="archivoDocumentoVolunEgres" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarDocumentoVolunEgres" id="enviarDocumentoVolunEgres" type="button" class="btn btn-success">Cargar Documento</button>
                                </div>
                            </center>
                        </form>

                    </div>

                    <div class="tab-pane" id="bVE">

                        <br>
                        <center>
                            <h4>Favor nombrar la Foto como se le indica a continuación: Documento_Año</h4>
                            <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG. </h5>
                        </center>
                        <br>
                        <form id="formUploadFotoVolunEgress" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoFotoVolunEgres" id="archivoFotoVolunEgres" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarFotoVolunEgres" id="enviarFotoVolunEgres" type="button" class="btn btn-success">Cargar Foto</button>
                                </div>
                            </center>
                        </form>

                    </div>

                    <div class="tab-pane" id="cVE">

                        <br>
                        <center>
                            <h4>Favor nombrar la Declaración de Voluntad como se le indica a continuación: Documento_NombrePersona_Año</h4>
                            <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG y PDF con un tamaño máximo de 2MG.</h5>
                        </center>
                        <br>
                        <form id="formUploadVoluntadVolunEgress" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="controls">
                                        <input name="archivoVoluntadVolunEgres" id="archivoVoluntadVolunEgres" type="file" size="35" />
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class="control-group">
                                    <button name="enviarVoluntadVolunEgres" id="enviarVoluntadVolunEgres" type="button" class="btn btn-success">Cargar Declaración</button>
                                </div>
                            </center>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">                            
        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolArchivosVolunEgres">
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

<!-- PASO4 -->
<div id="VEpaso4" class="tab-pane active" style="display: none">

    <form  method="POST" class="form-horizontal" id="frmObservacionVolunEgres">     
        <div class="tab-pane">

            <h3><center>OBSERVACIONES</center></h3><br>
            <legend></legend>

            <!-- Campo oculto con el id del historial -->
            <input id="idFichaObservaVolunEgres"  name="idFichaObservaVolunEgres" type="hidden"> 
            <input id="idObservaionVolunEgres"  name="idObservaionVolunEgres" type="hidden">   
            <input id="tipoObservaionVolunEgres"  name="tipoObservaionVolunEgres" type="hidden" value="Facilitador">

            <div class="control-group">
                FECHA OBSERVACIÓN: &nbsp;&nbsp;
                <input id="fechaObservacionVolunEgres"  name="fechaObservacionVolunEgres" type="date" class="input-xlarge">                                    
            </div>
            <div class="control-group">
                OBSERVACIÓN:
                <br>
                <textarea id="observacionVolunEgres" name="observacionVolunEgres" class="input-block-level" placeholder="Ingrese la Observación del Participante" rows="5"></textarea> 
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="returnObservacionVolunEgres" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                    <button type="button" class="btn btn-primary" id="saveObservacionVolunEgres" data-dismiss="modal">Guardar</button>  
                    <button type="button" class="btn btn-primary" id="updateObservacionVolunEgres" data-dismiss="modal" style="display: none">Actualizar</button>
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
                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolObservacionVolunEgres">
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