<form  method="POST" class="form-horizontal" id="frmAsesoriaParticipante">     
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

        <input id="idAsesoria"  name="idAsesoria" type="hidden">
        <input id="tipoRegistroAsesoria"  name="tipoRegistroAsesoria" type="hidden" value="Asesoría">

        <!-- PASO1 -->
        <div id="paso1" class="tab-pane active">
            <div class="twoColumns">
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha de Ingreso: </label>
                    <div class="controls input-group">
                        <input id="fechaIngreso"  name="fechaIngreso" type="date" class="input-xlarge">
                    </div>
                </div>     
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">No. Documento: </label>
                    <div class="controls input-group">
                        <input id="consecutivo"  name="consecutivo" type="text" class="input-large">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="buscarHistoria" title="Buscar Asesoría"><i class="icon-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>

            <h3><center>I. INFORMACIÓN GENERAL</center></h3><br>
            <legend></legend>

            <input id="idFicha"  name="idFicha" type="hidden">

            <div class="control-group">
                <label class="control-label" for="textinput">2.Documento: </label>
                <div class="controls input-group">
                    <input id="documento"  name="documento" type="text" disabled="true" class="input-xlarge">
<!--                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="buscarFicha" title="Buscar Ficha Socio Familiar"><i class="icon-search"></i></button>
                    </span>-->
                </div>
            </div>

            <div class="twoColumns">       

                <div class="control-group">
                    <label class="control-label" for="textinput">3.Nombres:</label>
                    <div class="controls input-group">
                        <input id="nombre"  name="nombre" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Apellidos:</label>
                    <div class="controls input-group">
                        <input id="apellido"  name="apellido" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>                                    
                <div class="control-group">
                    <label class="control-label" for="checkboxes">4.Sexo:</label>
                    <div class="controls input-group">
                        <label class="checkbox inline" for="sexo">
                            <input type="radio" disabled="true" name="sexo" id="sexo-0" value="MASCULINO">
                            Masculino
                        </label>
                        <label class="checkbox inline" for="sexo">
                            <input type="radio" disabled="true" name="sexo" id="sexo-1" value="FEMENINO">
                            Femenino
                        </label>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">5.Edad:</label>
                    <div class="controls input-group">
                        <input id="edad"  name="edad" type="text" disabled="true" class="input-mini">
                    </div>
                </div>

            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">6.Semillero:</label>
                <div class="controls input-group">
                    <input id="semillero"  name="semillero" type="text" disabled="true" class="input-xxlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">7.Institución:</label>
                <div class="controls input-group">
                    <input id="institucion"  name="institucion" type="text" disabled="true" class="input-xxlarge">
                </div>
            </div>
            <div class="twoColumns">
                <div class="control-group">
                    <label class="control-label" for="textinput">8.Lugar de Nacimiento:</label>
                    <div class="controls input-group">
                        <input id="municipioNacimiento"  name="municipioNacimiento" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>                                    
                <div class="control-group">
                    <label class="control-label" for="textinput">10.Dirección:</label>
                    <div class="controls input-group">
                        <input id="direccion"  name="direccion" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>        
                <div class="control-group">
                    <label class="control-label" for="textinput">12.Teléfono:</label>
                    <div class="controls input-group">
                        <input id="telefono"  name="telefono" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>  
                <div class="control-group">
                    <label class="control-label" for="textinput">9.Fecha Nacimiento:</label>
                    <div class="controls input-group">
                        <input id="fechaNacimiento"  name="fechaNacimiento" type="date" disabled="true" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">11.Barrio:</label>
                    <div class="controls input-group">
                        <input id="barrio"  name="barrio" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>                                    
                <div class="control-group">
                    <label class="control-label" for="textinput">13.Teléfono 2:</label>
                    <div class="controls input-group">
                        <input id="telefono2"  name="telefono2" type="text" class="input-xlarge">
                    </div>
                </div>  
            </div>
            <div class="control-group">
                <label class="control-label" for="checkboxes">14.Afiliación al SGSS:</label>
                <div class="controls input-group">
                    <label class="checkbox inline" for="seguridad">
                        <input type="checkbox" disabled="true" name="seguridad" id="seguridad-0" value="CONTRIBUTIVO (EPS)">
                        Contributivo (EPS)
                    </label>
                    <label class="checkbox inline" for="dias-1">
                        <input type="checkbox" disabled="true" name="seguridad" id="seguridad-1" value="SUBSIDIADO (SISBEN)">
                        Subsidiado (SISBEN)
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="checkboxes">Beneficiario:</label>
                <div class="controls input-group">
                    <label class="radio inline" for="beneficiarios-0">
                        <input type="radio" name="beneficiarios" id="beneficiarios-0" value="PARTICIPANTE">
                        Participante
                    </label>
                    <label class="radio inline" for="beneficiarios-1">
                        <input type="radio" name="beneficiarios" id="beneficiarios-1" value="FAMILIAR">
                        Familiar
                    </label>
                </div>
            </div>

            <div id="datosBeneficiario" style="display: none;">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Tipo Documento *</label>
                        <div class="controls input-group">
                            <select id="tipoDocumentoBeneficiario" name="tipoDocumentoBeneficiario" class="input-large">
                                <option value="0">SELECCIONE UN TIPO</option>
                                <option value="CC">Cédula de ciudadanía</option>
                                <option value="T.I">Tarjeta de identidad</option>
                                <option value="RC">Registro civil</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Documento *</label>
                        <div class="controls input-group">
                            <input id="documentoBeneficiario"  name="documentoBeneficiario" type="text" placeholder="Ingrese Documentos de Indentidad" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Nombres *</label>
                        <div class="controls input-group">
                            <input id="nombresBeneficiario"  name="nombresBeneficiario" type="text" placeholder="Ingrese Nombres Beneficiario" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Apellidos *</label>
                        <div class="controls input-group">
                            <input id="apellidosBeneficiario"  name="apellidosBeneficiario" type="text" placeholder="Ingrese Apellidos Beneficiario" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Parentesco *</label>
                        <div class="controls input-group">
                            <input id="parentezcoBeneficiario"  name="parentezcoBeneficiario" type="text" placeholder="Ingrese Parentezco con el Participante" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Ocupación *</label>
                        <div class="controls input-group">
                            <input id="ocupacionBeneficiario"  name="ocupacionBeneficiario" type="text" placeholder="Ingrese la Ocupación de la Persona" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Fecha Nacimiento *</label>
                        <div class="controls input-group">
                            <input id="fechaNacimientoBeneficiario"  name="fechaNacimientoBeneficiario" type="date" class="input-xlarge">
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Edad *</label>
                        <div class="controls input-group">
                            <input id="edadBeneficiario"  name="edadBeneficiario" type="text" placeholder="Ingrese la Edad" class="input-large">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Dirección *</label>
                        <div class="controls input-group">
                            <input id="direccionBeneficiario"  name="direccionBeneficiario" type="text" placeholder="Ingrese la Dirección de Residencia" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Barrio *</label>
                        <div class="controls input-group">
                            <input id="barrioBeneficiario"  name="barrioBeneficiario" type="text" placeholder="Ingrese el Barrio de Residencia" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Teléfono *</label>
                        <div class="controls input-group">
                            <input id="telefonoBeneficiario"  name="telefonoBeneficiario" type="text" placeholder="Ingrese el Telefono" class="input-xlarge">
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="textinput">Teléfono 2</label>
                        <div class="controls input-group">
                            <input id="telefono2Beneficiario"  name="telefono2Beneficiario" type="text" placeholder="Ingrese el Telefono" class="input-xlarge">
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="textinput">Tipo Seguridad *</label>
                        <div class="controls input-group">
                            <select id="tipoSeguridadBeneficiario"  name="tipoSeguridadBeneficiario" class="input-large">
                                <option value="0">SELECCIONE TIPO</option>
                                <option value="CONTRIBUTIVO (EPS)">CONTRIBUTIVO (EPS)</option>
                                <option value="SUBSIDIADO (SISBEN)">SUBSIDIADO (SISBEN)</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Entidad *</label>
                        <div class="controls input-group">
                            <input id="entidadBeneficiario"  name="entidadBeneficiario" type="text" placeholder="Ingrese la Entidad prestadora de Servicio" class="input-xlarge">
                        </div>
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

            <h3><center>II. MOTIVO DE CONSULTA</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="motivo" name="motivo" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>III. ANTECEDENTES FAMILIARES</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="antecedentes" name="antecedentes" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <center><p>CONFORMACIÓN FAMILIAR</p></center><br>
            <legend></legend>
            <center>
                <p>NOMBRE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    EDAD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    PARENTESCO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    OCUPACIÓN</p>
            </center>
            <div class="control-group">
                <center>
                    <textarea id="familiares" name="familiares" class="input-xxlarge" rows="10"></textarea>   
                </center>
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue2" data-dismiss="modal">Continuar</button>  
                </div>
            </center>
        </div>

        <!-- PASO3 -->
        <div id="paso3" class="tab-pane" style="display: none;">

            <h3><center>IV. FOCOS O CONFLICTOS NODALES</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="conflictos" name="conflictos" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>V. METAS TERAPÉUTICAS</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="metas" name="metas" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>VI. LOGROS</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="logros" name="logros" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>VII. PRUEBAS APLICADAS (Interpretación):</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="pruebas" name="pruebas" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue3" data-dismiss="modal">Continuar</button>  
                </div>
            </center>
        </div>

        <!-- PASO4 -->
        <div id="paso4" class="tab-pane active" style="display: none">

            <h3><center>VIII. REMISIONES A OTRAS INSTITUCIONES</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <label class="control-label" for="checkboxes">18. Remitido Por:</label>
                <div class="controls input-group">
                    <label class="checkbox inline" for="remision">
                        <input type="checkbox" name="remision[]" id="remision-0" value="Abuso sexual">
                        Abuso sexual
                    </label>
                    <label class="checkbox inline" for="remision-1">
                        <input type="checkbox" name="remision[]" id="remision-1" value="Depresión incluyendo ideación e intento suicida ">
                        Depresión incluyendo ideación e intento suicida 
                    </label>
                </div>
            </div> 
            <div class="controls input-group">
                <label class="checkbox inline" for="remision">
                    <input type="checkbox" name="remision[]" id="remision-2" value="Dif. Aprendizaje">
                    Dif. Aprendizaje
                </label>
                <label class="checkbox inline" for="remision-1">
                    <input type="checkbox" name="remision[]" id="remision-3" value="Farmacodependencia">
                    Farmacodependencia
                </label>
                <label class="checkbox inline" for="remision-1">
                    <input type="checkbox" name="remision[]" id="remision-4" value="Violencia intrafamiliar">
                    Violencia intrafamiliar. 
                </label>
                <label class="checkbox inline" for="remision-1">
                    <input type="checkbox" name="remision[]" id="remision-5" value="Otros Cuál?">
                    Otros Cuál?
                </label>
            </div>
            <br>
            <div class="control-group">
                <div class="controls input-group">
                    <textarea id="motivoRemisione" name="motivoRemisione" disabled="true" class="input-xxlarge" rows=""></textarea>     
                </div>
            </div> 

            <legend></legend>
            <h3><center>IX. FINALIZACIÓN DEL PROCESO</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <label class="control-label" for="checkboxes">19. El proceso finalizó:</label>
                <div class="controls input-group">
                    <label class="checkbox inline" for="finalizo">
                        <input type="checkbox" name="finalizo[]" id="finalizo-0" value="Culminación de la atención requerida">
                        Culminación de la atención requerida
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizo[]" id="finalizo-1" value="Desersión">
                        Desersión 
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizo[]" id="finalizo-2" value="Remisión otro programa">
                        Remisión otro programa 
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizo[]" id="finalizo-3" value="Cierre transitorio">
                        Cierre transitorio 
                    </label>
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="radio">20. Estado del Proceso:</label>
                <div class="controls input-group">
                    <label class="radio inline" for="estadoProceso">
                        <input type="radio" name="estadoProceso" id="estadoProceso-0" value="Activo">
                        Activo
                    </label>
                    <label class="radio inline" for="estadoProceso">
                        <input type="radio" name="estadoProceso" id="estadoProceso-1" value="Cerrado">
                        Cerrado
                    </label>
                </div>
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="saveAsesoria" data-dismiss="modal">Registrar Asesoría</button>
                    <button type="button" class="btn btn-primary" id="updateAsesoria" data-dismiss="modal" style="display: none">Actualizar Asesoría</button>
                </div>
            </center>
        </div>

        <!-- PASO5 -->
        <div id="paso5" class="tab-pane active" style="display: none">

            <h3><center>DETALLE DE LA INTERVENCIÓN REALIZADA</center></h3><br>
            <legend></legend>

            <!-- Campo oculto con el id del historial -->
            <input id="idSeguimiento"  name="idSeguimiento" type="hidden">            

            <div class="control-group">
                FECHA DE SEGUIMIENTO POR SESIÓN:
                <input id="fechaSeguimiento"  name="fechaSeguimiento" type="date" class="input-xlarge">                                    
            </div>
            <div class="control-group">
                OBSERVACIONES:
                <br>
                <textarea id="observacionSeguimiento" name="observacionSeguimiento" class="input-block-level" rows="5"></textarea> 
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="clearCampo" data-dismiss="modal">Nuevo</button>
                    <button type="button" class="btn btn-primary" id="saveSeguimiento" data-dismiss="modal">Guardar</button>  
                    <button type="button" class="btn btn-primary" id="updateSeguimiento" data-dismiss="modal" style="display: none">Actualizar</button>
                </div>
            </center>

            <div class="control-group">                                
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Seguimientos &nbsp;&nbsp;</button>
                <!-- tabs left -->
                <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                    <div class="tabbable tabs-left">

                        <div class="tab-content">

                            <div class="table-responsive">                            
                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolSeguimiento">
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

    </div>
</form>

<!-- PASO6 -->
<div id="paso6" class="tab-pane active" style="display: none">

    <form  method="POST" class="form-horizontal" id="frmArchivosAsesoria">     
        <div class="tab-pane">
            <h3><center>DOCUMENTOS DE REMISIONES</center></h3><br>
            <legend></legend>        

            <br>
            <center>
                <h4>Favor nombrar el Documento como se le indica a continuación: Documento_NombrePersona_Fecha</h4>
                <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG y PDF con un tamaño máximo de 2MG.</h5>
            </center>
            <br>

            <div class="control-group">
                <div class="controls">
                    <div class="controls">
                        <input name="archivoAsesoria" id="archivoAsesoria" type="file" size="35" />
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <div class="control-group">
                        <label class="control-label" for="textinput"> Descripción: </label>
                        <div class="controls input-group">
                            <textarea id="descripcion"  name="descripcion" class="input-xlarge" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <center>
                <div class="control-group">
                    <button name="enviarArchivoAsesoria" id="enviarArchivoAsesoria" type="button" class="btn btn-success">Cargar Archivo</button>
                </div>
            </center>

        </div>
    </form>

    <div class="control-group">                                
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Archivos &nbsp;&nbsp;</button>
        <!-- tabs left -->
        <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

            <div class="tabbable tabs-left">

                <div class="tab-content">

                    <div class="table-responsive">                            
                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolArchivosAsesorias">
                            <thead>
                                <tr>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Fecha</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:500px">Observación</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Eliminar</th>
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