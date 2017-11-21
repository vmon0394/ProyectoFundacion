<form  method="POST" class="form-horizontal" id="frmConsultoriaParticipante">     
    <div class="tab-pane">
        <div id="NavegacionP">
            <ul class="nav nav-tabs" id="myNav">
                <li><a href=""  id="p1C" class="btn-success">Paso 1</a></li>
                <li><a href=""  id="p2C">Paso 2</a></li>
                <li><a href=""  id="p3C">Paso 3</a></li>
                <li><a href=""  id="p4C">Paso 4</a></li>
                <li><a href=""  id="p5C">Paso 5</a></li>
            </ul>
        </div>

        <input id="idConsultoria"  name="idConsultoria" type="hidden">
        <input id="tipoRegistroConsultoria"  name="tipoRegistroConsultoria" type="hidden" value="Consultoría">

        <!-- PASO1 -->
        <div id="paso1C" class="tab-pane active">

            <div class="twoColumns">
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha de Ingreso: </label>
                    <div class="controls input-group">
                        <input id="fechaIngresoC"  name="fechaIngresoC" type="date" class="input-xlarge">
                    </div>
                </div>       
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">No. Documento: </label>
                    <div class="controls input-group">
                        <input id="consecutivoC"  name="consecutivoC" type="text" class="input-large">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="buscarHistoriaC" title="Buscar Consultoría"><i class="icon-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>

            <h3><center>I. INFORMACIÓN GENERAL</center></h3><br>
            <legend></legend>

            <input id="idFichaC"  name="idFichaC" type="hidden">

            <div class="control-group">
                <label class="control-label" for="textinput">2.Documento: </label>
                <div class="controls input-group">
                    <input id="documentoC"  name="documentoC" type="text" disabled="true" class="input-xlarge">
                </div>
            </div>

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">3.Nombres:</label>
                    <div class="controls input-group">
                        <input id="nombreC"  name="nombreC" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Apellidos:</label>
                    <div class="controls input-group">
                        <input id="apellidoC"  name="apellidoC" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>                                    
                <div class="control-group">
                    <label class="control-label" for="checkboxes">4.Sexo:</label>
                    <div class="controls input-group">
                        <label class="checkbox inline" for="sexoC">
                            <input type="radio" disabled="true" name="sexoC" id="sexoC-0" value="MASCULINO">
                            Masculino
                        </label>
                        <label class="checkbox inline" for="sexoC">
                            <input type="radio" disabled="true" name="sexoC" id="sexoC-1" value="FEMENINO">
                            Femenino
                        </label>
                    </div>     
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">5.Edad:</label>
                    <div class="controls input-group">
                        <input id="edadC"  name="edadC" type="text" disabled="true" class="input-mini">
                    </div>
                </div>

            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">6.Semillero:</label>
                <div class="controls input-group">
                    <input id="semilleroC"  name="semilleroC" type="text" disabled="true" class="input-xxlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">7.Institución:</label>
                <div class="controls input-group">
                    <input id="institucionC"  name="institucionC" type="text" disabled="true" class="input-xxlarge">
                </div>
            </div>

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">8.Lugar de Nacimiento:</label>
                    <div class="controls input-group">
                        <input id="municipioNacimientoC"  name="municipioNacimientoC" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>                                    
                <div class="control-group">
                    <label class="control-label" for="textinput">10.Dirección:</label>
                    <div class="controls input-group">
                        <input id="direccionC"  name="direccionC" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>        
                <div class="control-group">
                    <label class="control-label" for="textinput">12.Teléfono:</label>
                    <div class="controls input-group">
                        <input id="telefonoC"  name="telefonoC" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>  
                <div class="control-group">
                    <label class="control-label" for="textinput">9.Fecha Nacimiento:</label>
                    <div class="controls input-group">
                        <input id="fechaNacimientoC"  name="fechaNacimientoC" disabled="true" type="date" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">11.Barrio:</label>
                    <div class="controls input-group">
                        <input id="barrioC"  name="barrioC" type="text" disabled="true" class="input-xlarge">
                    </div>
                </div>                                    
                <div class="control-group">
                    <label class="control-label" for="textinput">13.Teléfono 2:</label>
                    <div class="controls input-group">
                        <input id="telefono2C"  name="telefono2C" type="text" class="input-xlarge">
                    </div>
                </div>  

            </div>

            <div class="control-group">
                <label class="control-label" for="checkboxes">14.Afiliación al SGSS:</label>
                <div class="controls input-group">
                    <label class="checkbox inline" for="seguridad">
                        <input type="checkbox" disabled="true" name="seguridadC" id="seguridadC-0" value="CONTRIBUTIVO (EPS)">
                        Contributivo (EPS)
                    </label>
                    <label class="checkbox inline" for="dias-1">
                        <input type="checkbox" disabled="true" name="seguridadC" id="seguridadC-1" value="SUBSIDIADO (SISBEN)">
                        Subsidiado (SISBEN)
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="checkboxes">Beneficiario:</label>
                <div class="controls input-group">
                    <label class="radio inline" for="beneficiarioC-0">
                        <input type="radio" name="beneficiarioC" id="beneficiarioC-0" value="PARTICIPANTE">
                        Participante
                    </label>
                    <label class="radio inline" for="beneficiarioC-1">
                        <input type="radio" name="beneficiarioC" id="beneficiarioC-1" value="FAMILIAR">
                        Familiar
                    </label>
                </div>
            </div>

            <div id="datosBeneficiarioC" style="display: none;">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Tipo Documento *</label>
                        <div class="controls input-group">
                            <select id="tipoDocumentoBeneficiarioC" name="tipoDocumentoBeneficiarioC" class="input-large">
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
                            <input id="documentoBeneficiarioC"  name="documentoBeneficiarioC" type="text" placeholder="Ingrese Documentos de Indentidad" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Nombres *</label>
                        <div class="controls input-group">
                            <input id="nombresBeneficiarioC"  name="nombresBeneficiarioC" type="text" placeholder="Ingrese Nombres Beneficiario" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Apellidos *</label>
                        <div class="controls input-group">
                            <input id="apellidosBeneficiarioC"  name="apellidosBeneficiarioC" type="text" placeholder="Ingrese Apellidos Beneficiario" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Parentesco *</label>
                        <div class="controls input-group">
                            <input id="parentezcoBeneficiarioC"  name="parentezcoBeneficiarioC" type="text" placeholder="Ingrese Parentezco con el Participante" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Ocupación *</label>
                        <div class="controls input-group">
                            <input id="ocupacionBeneficiarioC"  name="ocupacionBeneficiarioC" type="text" placeholder="Ingrese la Ocupación de la Persona" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Fecha Nacimiento *</label>
                        <div class="controls input-group">
                            <input id="fechaNacimientoBeneficiarioC"  name="fechaNacimientoBeneficiarioC" type="date" class="input-xlarge">
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Edad *</label>
                        <div class="controls input-group">
                            <input id="edadBeneficiarioC"  name="edadBeneficiarioC" type="text" placeholder="Ingrese la Edad" class="input-large">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Dirección *</label>
                        <div class="controls input-group">
                            <input id="direccionBeneficiarioC"  name="direccionBeneficiarioC" type="text" placeholder="Ingrese la Dirección de Residencia" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Barrio *</label>
                        <div class="controls input-group">
                            <input id="barrioBeneficiarioC"  name="barrioBeneficiarioC" type="text" placeholder="Ingrese el Barrio de Residencia" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Teléfono *</label>
                        <div class="controls input-group">
                            <input id="telefonoBeneficiarioC"  name="telefonoBeneficiarioC" type="text" placeholder="Ingrese el Telefono" class="input-xlarge">
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="textinput">Teléfono 2</label>
                        <div class="controls input-group">
                            <input id="telefono2BeneficiarioC"  name="telefono2BeneficiarioC" type="text" placeholder="Ingrese el Telefono" class="input-xlarge">
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="textinput">Tipo Seguridad *</label>
                        <div class="controls input-group">
                            <select id="tipoSeguridadBeneficiarioC"  name="tipoSeguridadBeneficiarioC" class="input-large">
                                <option value="0">SELECCIONE TIPO</option>
                                <option value="CONTRIBUTIVO (EPS)">CONTRIBUTIVO (EPS)</option>
                                <option value="SUBSIDIADO (SISBEN)">SUBSIDIADO (SISBEN)</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Entidad *</label>
                        <div class="controls input-group">
                            <input id="entidadBeneficiarioC"  name="entidadBeneficiarioC" type="text" placeholder="Ingrese la Entidad prestadora de Servicio" class="input-xlarge">
                        </div>
                    </div>

                </div>

            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue1C" data-dismiss="modal">Continuar</button>  
                </div>
            </center>
        </div>

        <!-- PASO2 -->
        <div id="paso2C" class="tab-pane" style="display: none;">

            <h3><center>II. MOTIVO DE CONSULTA</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="motivoC" name="motivoC" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>III. ANTECEDENTES FAMILIARES</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="antecedentesC" name="antecedentesC" class="input-block-level" rows="10"></textarea>                                    
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
                    <textarea id="familiaresC" name="familiaresC" class="input-xxlarge" rows="10"></textarea>   
                </center>
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue2C" data-dismiss="modal">Continuar</button>  
                </div>
            </center>
        </div>

        <!-- PASO3 -->
        <div id="paso3C" class="tab-pane" style="display: none;">

            <h3><center>VIII. REMISIONES A OTRAS INSTITUCIONES</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <label class="control-label" for="checkboxes">18. Remitido Por:</label>
                <div class="controls input-group">
                    <label class="checkbox inline" for="remision">
                        <input type="checkbox" name="remisionC[]" id="remisionC-0" value="Abuso sexual">
                        Abuso sexual
                    </label>
                    <label class="checkbox inline" for="remision-1">
                        <input type="checkbox" name="remisionC[]" id="remisionC-1" value="Depresión incluyendo ideación e intento suicida ">
                        Depresión incluyendo ideación e intento suicida 
                    </label>
                </div>
            </div> 
            <div class="controls input-group">
                <label class="checkbox inline" for="remision">
                    <input type="checkbox" name="remisionC[]" id="remisionC-2" value="Dif. Aprendizaje">
                    Dif. Aprendizaje
                </label>
                <label class="checkbox inline" for="remision-1">
                    <input type="checkbox" name="remisionC[]" id="remisionC-3" value="Farmacodependencia">
                    Farmacodependencia
                </label>
                <label class="checkbox inline" for="remision-1">
                    <input type="checkbox" name="remisionC[]" id="remisionC-4" value="Violencia intrafamiliar. ">
                    Violencia intrafamiliar. 
                </label>
                <label class="checkbox inline" for="remision-1">
                    <input type="checkbox" name="remisionC[]" id="remisionC-5" value="Otros Cuál?">
                    Otros Cuál?
                </label>
            </div>
            <br>
            <div class="control-group">
                <div class="controls input-group">
                    <textarea id="motivoRemisioneC" name="motivoRemisioneC" disabled="true" class="input-xxlarge" rows=""></textarea>     
                </div>
            </div> 

            <legend></legend>
            <h3><center>IX. FINALIZACIÓN DEL PROCESO</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <label class="control-label" for="checkboxes">19. El proceso finalizó:</label>
                <div class="controls input-group">
                    <label class="checkbox inline" for="finalizo">
                        <input type="checkbox" name="finalizoC[]" id="finalizoC-0" value="Culminación de la atención requerida">
                        Culminación de la atención requerida
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizoC[]" id="finalizoC-1" value="Desersión">
                        Desersión 
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizoC[]" id="finalizoC-2" value="Remisión otro programa">
                        Remisión otro programa 
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizoC[]" id="finalizoC-3" value="Cierre transitorio">
                        Cierre transitorio 
                    </label>
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="radio">20. Estado del Proceso:</label>
                <div class="controls input-group">
                    <label class="radio inline" for="estadoProceso">
                        <input type="radio" name="estadoProcesoC" id="estadoProcesoC-0" value="Activo">
                        Activo
                    </label>
                    <label class="radio inline" for="estadoProceso">
                        <input type="radio" name="estadoProcesoC" id="estadoProcesoC-1" value="Cerrado">
                        Cerrado
                    </label>
                </div>
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="saveConsultoria" data-dismiss="modal">Registrar Consultoría</button>  
                    <button type="button" class="btn btn-primary" id="updateConsultoria" data-dismiss="modal" style="display: none">Actualizar Consultoría</button>
                </div>
            </center>

        </div>

        <!-- PASO4 -->
        <div id="paso4C" class="tab-pane active" style="display: none">

            <h3><center>DETALLE DE LA INTERVENCIÓN REALIZADA</center></h3><br>
            <legend></legend>  

            <input id="idSeguimientoC"  name="idSeguimientoC" type="hidden">

            <div class="control-group">
                FECHA DE SEGUIMIENTO POR SESIÓN:
                <input id="fechaConsultoria"  name="fechaConsultoria" type="date" class="input-xlarge">                                    
            </div>
            <div class="control-group">
                OBSERVACIONES:
                <br>
                <textarea id="observacionConsultoria" name="observacionConsultoria" class="input-block-level" rows="5"></textarea> 
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="clearCampoC" data-dismiss="modal">Nuevo</button>
                    <button type="button" class="btn btn-primary" id="saveSeguimientoC" data-dismiss="modal">Guardar</button>  
                    <button type="button" class="btn btn-primary" id="updateSeguimientoC" data-dismiss="modal" style="display: none">Actualizar</button>
                </div>
            </center>

            <div class="control-group">                                
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Seguimientos &nbsp;&nbsp;</button>
                <!-- tabs left -->
                <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                    <div class="tabbable tabs-left">

                        <div class="tab-content">

                            <div class="table-responsive">                            
                                <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolSeguimientoC">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:300px">Fecha</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:500px">Observación</th>
                                            <th class="text-center" style="padding-right: 10px; color: #000; width:40px">Consultar</th>
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

<!-- PASO5 -->
<div id="paso5C" class="tab-pane active" style="display: none">

    <form  method="POST" class="form-horizontal" id="frmArchivosConsultoria">     
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
                        <input name="archivoConsultoria" id="archivoConsultoria" type="file" size="35" />
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <div class="control-group">
                        <label class="control-label" for="textinput"> Descripción: </label>
                        <div class="controls input-group">
                            <textarea id="descripcionConsultoria"  name="descripcionConsultoria" class="input-xlarge" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <center>
                <div class="control-group">
                    <button name="enviarArchivoConsultoria" id="enviarArchivoConsultoria" type="button" class="btn btn-success">Cargar Archivo</button>
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
                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolArchivosConsultoria">
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