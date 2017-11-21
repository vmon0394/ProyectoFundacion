<form  method="POST" class="form-horizontal" id="frmAsesoriaExterno">     
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

        <input id="idAsesoriaExterno"  name="idAsesoriaExterno" type="hidden">
        <input id="tipoRegistroAsesoriaEx"  name="tipoRegistroAsesoriaEx" type="hidden" value="Asesoría">

        <!-- PASO1 -->
        <div id="paso1" class="tab-pane active">
            <div class="twoColumns">
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha de Ingreso: </label>
                    <div class="controls input-group">
                        <input id="fechaIngresoEx"  name="fechaIngresoEx" type="date" class="input-xlarge">
                    </div>
                </div>     
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">No. Documento: </label>
                    <div class="controls input-group">
                        <input id="consecutivoEx"  name="consecutivoEx" type="text" class="input-large">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="buscarHistoria" title="Buscar Asesoría"><i class="icon-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>

            <h3><center>I. INFORMACIÓN GENERAL</center></h3><br>
            <legend></legend>

            <div class="twoColumns">   

                <div class="control-group">
                    <label class="control-label" for="textinput">1.Tipo Documento:</label>
                    <div class="controls input-group">
                        <select id="tipoDocumentoEx" name="tipoDocumentoEx" class="input-large">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="T.I">Tarjeta de Identidad</option>
                            <option value="RC">Registro Civil</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">2.Documento: </label>
                    <div class="controls input-group">
                        <input id="documentoEx"  name="documentoEx" type="text" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">3.Nombres:</label>
                    <div class="controls input-group">
                        <input id="nombreEx"  name="nombreEx" type="text" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">4.Apellidos:</label>
                    <div class="controls input-group">
                        <input id="apellidoEx"  name="apellidoEx" type="text" class="input-xlarge">
                    </div>
                </div>  
                <div class="control-group">
                    <label class="control-label" for="textinput">5.Depar. Nacimiento:</label>
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
                    <label class="control-label" for="textinput">6.Ciudad Nacimiento:</label>
                    <div class="controls input-group">
                        <select id="ciudadNacimiento" name="ciudadNacimiento" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">7.Fecha Nacimiento:</label>
                    <div class="controls input-group">
                        <input id="fechaNacimientoEx"  name="fechaNacimientoEx" type="date" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">8.Edad:</label>
                    <div class="controls input-group">
                        <input id="edadEx" name="edadEx" type="text" disabled="true" class="input-mini">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="checkboxes">9.Sexo:</label>
                    <div class="controls input-group">
                        <label class="checkbox inline" for="sexoEx">
                            <input type="radio" name="sexoEx" id="sexoEx-0" value="MASCULINO">
                            MASCULINO
                        </label>
                        <label class="checkbox inline" for="sexo">
                            <input type="radio" name="sexoEx" id="sexoEx-1" value="FEMENINO">
                            FEMENINO
                        </label>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">10.Relación Fundación:</label>
                    <div class="controls input-group">
                        <input id="relacionFundacion"  name="relacionFundacion" type="text" class="input-xlarge">
                    </div>
                </div> 
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">11.Ocupación o Inst.:</label>
                    <div class="controls input-group">
                        <input id="ocupacioInstitucion"  name="ocupacioInstitucion" type="text" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">12.Grado Escolar:</label>
                    <div class="controls input-group">
                        <input id="gradoEx"  name="gradoEx" type="text" class="input-xlarge">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">13.Depar. Residencia:</label>
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
                    <label class="control-label" for="textinput">14.Ciudad Residencia:</label>
                    <div class="controls input-group">
                        <select id="ciudadResidencia" name="ciudadResidencia" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div>                                    
                <div class="control-group">
                    <label class="control-label" for="textinput">15.Dirección:</label>
                    <div class="controls input-group">
                        <input id="direccionEx"  name="direccionEx" type="text" class="input-xlarge">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">16.Barrio:</label>
                    <div class="controls input-group">
                        <input id="barrioEx"  name="barrioEx" type="text" class="input-xlarge">
                    </div>
                </div>         
                <div class="control-group">
                    <label class="control-label" for="textinput">17.Teléfono:</label>
                    <div class="controls input-group">
                        <input id="telefonoEx"  name="telefonoEx" type="text" class="input-xlarge">
                    </div>
                </div>                                   
                <div class="control-group">
                    <label class="control-label" for="textinput">18.Teléfono 2:</label>
                    <div class="controls input-group">
                        <input id="telefono2Ex"  name="telefono2Ex" type="text" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="checkboxes">19.Afiliación al SGSS:</label>
                    <div class="controls input-group">
                        <label class="radio inline" for="seguridadEx-0">
                            <input type="radio" name="seguridadEx" id="seguridadEx-0" value="CONTRIBUTIVO (EPS)">
                            Contributivo (EPS)
                        </label>
                        <label class="checkbox inline" for="seguridadEx-1">
                            <input type="radio" name="seguridadEx" id="seguridadEx-1" value="SUBSIDIADO (SISBEN)">
                            Subsidiado (SISBEN)
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">20.Entidad:</label>
                    <div class="controls input-group">
                        <input id="entidadEx"  name="entidadEx" type="text" placeholder="Ingrese la Entidad prestadora de Servicio" class="input-xlarge">
                    </div>
                </div> 

            </div>

            <div class="control-group">
                <label class="control-label" for="checkboxes">21.Beneficiario:</label>
                <div class="controls input-group">
                    <label class="radio inline" for="beneficiarioEx-0">
                        <input type="radio" name="beneficiarioEx" id="beneficiarioEx-0" value="ADULTO">
                        ADULTO
                    </label>
                    <label class="radio inline" for="beneficiarioEx-1">
                        <input type="radio" name="beneficiarioEx" id="beneficiarioEx-1" value="NIÑO">
                        NIÑO
                    </label>
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
                <textarea id="motivoEx" name="motivoEx" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>III. ANTECEDENTES FAMILIARES</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="antecedentesEx" name="antecedentesEx" class="input-block-level" rows="10"></textarea>                                    
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
                    <textarea id="familiaresEx" name="familiaresEx" class="input-xxlarge" rows="10"></textarea>   
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
                <textarea id="conflictosEx" name="conflictosEx" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>V. METAS TERAPÉUTICAS</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="metasEx" name="metasEx" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>VI. LOGROS</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="logrosEx" name="logrosEx" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>VII. PRUEBAS APLICADAS (Interpretación):</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="pruebasEx" name="pruebasEx" class="input-block-level" rows="10"></textarea>                                    
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
                    <label class="checkbox inline" for="remisionEx">
                        <input type="checkbox" name="remisionEx[]" id="remisionEx-0" value="Abuso sexual">
                        Abuso sexual
                    </label>
                    <label class="checkbox inline" for="remisionEx-1">
                        <input type="checkbox" name="remisionEx[]" id="remisionEx-1" value="Depresión incluyendo ideación e intento suicida">
                        Depresión incluyendo ideación e intento suicida 
                    </label>
                </div>
            </div> 
            <div class="controls input-group">
                <label class="checkbox inline" for="remisionEx">
                    <input type="checkbox" name="remisionEx[]" id="remisionEx-2" value="Dif. Aprendizaje">
                    Dif. Aprendizaje
                </label>
                <label class="checkbox inline" for="remisionEx-1">
                    <input type="checkbox" name="remisionEx[]" id="remisionEx-3" value="Farmacodependencia">
                    Farmacodependencia
                </label>
                <label class="checkbox inline" for="remisionEx-1">
                    <input type="checkbox" name="remisionEx[]" id="remisionEx-4" value="Violencia intrafamiliar">
                    Violencia intrafamiliar. 
                </label>
                <label class="checkbox inline" for="remisionEx-1">
                    <input type="checkbox" name="remisionEx[]" id="remisionEx-5" value="Otros Cuál?">
                    Otros Cuál?
                </label>
            </div>
            <br>
            <div class="control-group">
                <div class="controls input-group">
                    <textarea id="motivoRemisioneEx" name="motivoRemisioneEx" disabled="true" class="input-xxlarge" rows=""></textarea>     
                </div>
            </div> 

            <legend></legend>
            <h3><center>IX. FINALIZACIÓN DEL PROCESO</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <label class="control-label" for="checkboxes">19. El proceso finalizó:</label>
                <div class="controls input-group">
                    <label class="checkbox inline" for="finalizo">
                        <input type="checkbox" name="finalizoEx[]" id="finalizoEx-0" value="Culminación de la atención requerida">
                        Culminación de la atención requerida
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizoEx[]" id="finalizoEx-1" value="Desersión">
                        Desersión 
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizoEx[]" id="finalizoEx-2" value="Remisión otro programa">
                        Remisión otro programa 
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizoEx[]" id="finalizoEx-3" value="Cierre transitorio">
                        Cierre transitorio 
                    </label>
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="radio">20. Estado del Proceso:</label>
                <div class="controls input-group">
                    <label class="radio inline" for="estadoProceso">
                        <input type="radio" name="estadoProcesoEx" id="estadoProcesoEx-0" value="Activo">
                        Activo
                    </label>
                    <label class="radio inline" for="estadoProceso">
                        <input type="radio" name="estadoProcesoEx" id="estadoProcesoEx-1" value="Cerrado">
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
            <input id="idSeguimientoEx"  name="idSeguimientoEx" type="hidden">            

            <div class="control-group">
                FECHA DE SEGUIMIENTO POR SESIÓN:
                <input id="fechaSeguimientoEx"  name="fechaSeguimientoEx" type="date" class="input-xlarge">                                    
            </div>
            <div class="control-group">
                OBSERVACIONES:
                <br>
                <textarea id="observacionSeguimientoEx" name="observacionSeguimientoEx" class="input-block-level" rows="5"></textarea> 
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

    <form  method="POST" class="form-horizontal" id="frmArchivosAsesoriaEx">     
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
                        <input name="archivoAsesoriaEx" id="archivoAsesoriaEx" type="file" size="35" />
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <div class="control-group">
                        <label class="control-label" for="textinput"> Descripción: </label>
                        <div class="controls input-group">
                            <textarea id="descripcionEx"  name="descripcionEx" class="input-xlarge" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <center>
                <div class="control-group">
                    <button name="enviarArchivoAsesoriaEx" id="enviarArchivoAsesoriaEx" type="button" class="btn btn-success">Cargar Archivo</button>
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