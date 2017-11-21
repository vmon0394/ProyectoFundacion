<form  method="POST" class="form-horizontal" id="frmConsultoriaExterno">     
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

        <input id="idConsultoriaExterno"  name="idConsultoriaExterno" type="hidden">
        <input id="tipoRegistroConsultoriaEx"  name="tipoRegistroConsultoriaEx" type="hidden" value="Consultoría">

        <!-- PASO1 -->
        <div id="paso1C" class="tab-pane active">

            <div class="twoColumns">
                <div class="control-group">
                    <label class="control-label" for="textinput">Fecha de Ingreso: </label>
                    <div class="controls input-group">
                        <input id="fechaIngresoCEx"  name="fechaIngresoCEx" type="date" class="input-xlarge">
                    </div>
                </div>       
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">No. Documento: </label>
                    <div class="controls input-group">
                        <input id="consecutivoCEx"  name="consecutivoCEx" type="text" class="input-large">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="buscarHistoriaCEx" title="Buscar Consultoría"><i class="icon-search"></i></button>
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
                        <select id="tipoDocumentoCEx" name="tipoDocumentoCEx" class="input-large">
                            <option value="0">SELECCIONE UN TIPO</option>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="T.I">Tarjeta de identidad</option>
                            <option value="RC">Registro civil</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">2.Documento: </label>
                    <div class="controls input-group">
                        <input id="documentoCEx"  name="documentoCEx" type="text" class="input-large">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">3.Nombres:</label>
                    <div class="controls input-group">
                        <input id="nombreCEx"  name="nombreCEx" type="text" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">4.Apellidos:</label>
                    <div class="controls input-group">
                        <input id="apellidoCEx"  name="apellidoCEx" type="text" class="input-xlarge">
                    </div>
                </div>  
                <div class="control-group">
                    <label class="control-label" for="textinput">5.Depar. Nacimiento:</label>
                    <div class="controls input-group">
                        <select id="departamentoNacimientoCEx" name="departamentoNacimientoCEx" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoNacimientoCEx').value, 'ciudadNacimientoCEx');">
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
                        <select id="ciudadNacimientoCEx" name="ciudadNacimientoCEx" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">7.Fecha Nacimiento:</label>
                    <div class="controls input-group">
                        <input id="fechaNacimientoCEx"  name="fechaNacimientoCEx" type="date" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">8.Edad:</label>
                    <div class="controls input-group">
                        <input id="edadCEx" name="edadCEx" type="text" disabled="true" class="input-mini">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="checkboxes">9.Sexo:</label>
                    <div class="controls input-group">
                        <label class="checkbox inline" for="sexoEx">
                            <input type="radio" name="sexoCEx" id="sexoCEx-0" value="MASCULINO">
                            MASCULINO
                        </label>
                        <label class="checkbox inline" for="sexo">
                            <input type="radio" name="sexoCEx" id="sexoCEx-1" value="FEMENINO">
                            FEMENINO
                        </label>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">10.Relación Fundación:</label>
                    <div class="controls input-group">
                        <input id="relacionFundacionCEx"  name="relacionFundacionCEx" type="text" class="input-xlarge">
                    </div>
                </div> 
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">11.Ocupación o Inst.:</label>
                    <div class="controls input-group">
                        <input id="ocupacioInstitucionCEx"  name="ocupacioInstitucionCEx" type="text" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">12.Grado Escolar:</label>
                    <div class="controls input-group">
                        <input id="gradoCEx"  name="gradoCEx" type="text" class="input-xlarge">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">13.Depar. Residencia:</label>
                    <div class="controls input-group">
                        <select id="departamentoResidenciaCEx" name="departamentoResidenciaCEx" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoResidenciaCEx').value, 'ciudadResidenciaCEx');">
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
                        <select id="ciudadResidenciaCEx" name="ciudadResidenciaCEx" class="input-xlarge">
                            <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                        </select>
                    </div>
                </div>                                    
                <div class="control-group">
                    <label class="control-label" for="textinput">15.Dirección:</label>
                    <div class="controls input-group">
                        <input id="direccionCEx"  name="direccionCEx" type="text" class="input-xlarge">
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">16.Barrio:</label>
                    <div class="controls input-group">
                        <input id="barrioCEx"  name="barrioCEx" type="text" class="input-xlarge">
                    </div>
                </div>         
                <div class="control-group">
                    <label class="control-label" for="textinput">17.Teléfono:</label>
                    <div class="controls input-group">
                        <input id="telefonoCEx"  name="telefonoCEx" type="text" class="input-xlarge">
                    </div>
                </div>                                   
                <div class="control-group">
                    <label class="control-label" for="textinput">18.Teléfono 2:</label>
                    <div class="controls input-group">
                        <input id="telefono2CEx"  name="telefono2CEx" type="text" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="checkboxes">19.Afiliación al SGSS:</label>
                    <div class="controls input-group">
                        <label class="radio inline" for="seguridadEx-0">
                            <input type="radio" name="seguridadCEx" id="seguridadCEx-0" value="CONTRIBUTIVO (EPS)">
                            Contributivo (EPS)
                        </label>
                        <label class="checkbox inline" for="seguridadEx-1">
                            <input type="radio" name="seguridadCEx" id="seguridadCEx-1" value="SUBSIDIADO (SISBEN)">
                            Subsidiado (SISBEN)
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">20.Entidad:</label>
                    <div class="controls input-group">
                        <input id="entidadCEx"  name="entidadCEx" type="text" placeholder="Ingrese la Entidad prestadora de Servicio" class="input-xlarge">
                    </div>
                </div> 

            </div>

            <div class="control-group">
                <label class="control-label" for="checkboxes">Beneficiario:</label>
                <div class="controls input-group">
                    <label class="radio inline" for="beneficiarioC-0">
                        <input type="radio" name="beneficiarioCEx" id="beneficiarioCEx-0" value="ADULTO">
                        ADULTO
                    </label>
                    <label class="radio inline" for="beneficiarioC-1">
                        <input type="radio" name="beneficiarioCEx" id="beneficiarioCEx-1" value="NIÑO">
                        NIÑO
                    </label>
                </div>
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue1CEx" data-dismiss="modal">Continuar</button>  
                </div>
            </center>
        </div>

        <!-- PASO2 -->
        <div id="paso2C" class="tab-pane" style="display: none;">

            <h3><center>II. MOTIVO DE CONSULTA</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="motivoCEx" name="motivoCEx" class="input-block-level" rows="10"></textarea>                                    
            </div> 

            <legend></legend>
            <h3><center>III. ANTECEDENTES FAMILIARES</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <textarea id="antecedentesCEx" name="antecedentesCEx" class="input-block-level" rows="10"></textarea>                                    
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
                    <textarea id="familiaresCEx" name="familiaresCEx" class="input-xxlarge" rows="10"></textarea>   
                </center>
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="continue2CEx" data-dismiss="modal">Continuar</button>  
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
                        <input type="checkbox" name="remisionCEx[]" id="remisionCEx-0" value="Abuso sexual">
                        Abuso sexual
                    </label>
                    <label class="checkbox inline" for="remision-1">
                        <input type="checkbox" name="remisionCEx[]" id="remisionCEx-1" value="Depresión incluyendo ideación e intento suicida ">
                        Depresión incluyendo ideación e intento suicida 
                    </label>
                </div>
            </div> 
            <div class="controls input-group">
                <label class="checkbox inline" for="remision">
                    <input type="checkbox" name="remisionCEx[]" id="remisionCEx-2" value="Dif. Aprendizaje">
                    Dif. Aprendizaje
                </label>
                <label class="checkbox inline" for="remision-1">
                    <input type="checkbox" name="remisionCEx[]" id="remisionCEx-3" value="Farmacodependencia">
                    Farmacodependencia
                </label>
                <label class="checkbox inline" for="remision-1">
                    <input type="checkbox" name="remisionCEx[]" id="remisionCEx-4" value="Violencia intrafamiliar. ">
                    Violencia intrafamiliar. 
                </label>
                <label class="checkbox inline" for="remision-1">
                    <input type="checkbox" name="remisionCEx[]" id="remisionCEx-5" value="Otros Cuál?">
                    Otros Cuál?
                </label>
            </div>
            <br>
            <div class="control-group">
                <div class="controls input-group">
                    <textarea id="motivoRemisioneCEx" name="motivoRemisioneCEx" disabled="true" class="input-xxlarge" rows=""></textarea>     
                </div>
            </div> 

            <legend></legend>
            <h3><center>IX. FINALIZACIÓN DEL PROCESO</center></h3><br>
            <legend></legend>
            <div class="control-group">
                <label class="control-label" for="checkboxes">19. El proceso finalizó:</label>
                <div class="controls input-group">
                    <label class="checkbox inline" for="finalizo">
                        <input type="checkbox" name="finalizoCEx[]" id="finalizoCEx-0" value="Culminación de la atención requerida">
                        Culminación de la atención requerida
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizoCEx[]" id="finalizoCEx-1" value="Desersión">
                        Desersión 
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizoCEx[]" id="finalizoCEx-2" value="Remisión otro programa">
                        Remisión otro programa 
                    </label>
                    <label class="checkbox inline" for="finalizo-1">
                        <input type="checkbox" name="finalizoCEx[]" id="finalizoCEx-3" value="Cierre transitorio">
                        Cierre transitorio 
                    </label>
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="radio">20. Estado del Proceso:</label>
                <div class="controls input-group">
                    <label class="radio inline" for="estadoProceso">
                        <input type="radio" name="estadoProcesoCEx" id="estadoProcesoCEx-0" value="Activo">
                        Activo
                    </label>
                    <label class="radio inline" for="estadoProceso">
                        <input type="radio" name="estadoProcesoCEx" id="estadoProcesoCEx-1" value="Cerrado">
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

            <input id="idSeguimientoCEx"  name="idSeguimientoCEx" type="hidden">

            <div class="control-group">
                FECHA DE SEGUIMIENTO POR SESIÓN:
                <input id="fechaConsultoriaEx"  name="fechaConsultoriaEx" type="date" class="input-xlarge">                                    
            </div>
            <div class="control-group">
                OBSERVACIONES:
                <br>
                <textarea id="observacionConsultoriaEx" name="observacionConsultoriaEx" class="input-block-level" rows="5"></textarea> 
            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="clearCampoCEx" data-dismiss="modal">Nuevo</button>
                    <button type="button" class="btn btn-primary" id="saveSeguimientoCEx" data-dismiss="modal">Guardar</button>  
                    <button type="button" class="btn btn-primary" id="updateSeguimientoCEx" data-dismiss="modal" style="display: none">Actualizar</button>
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

    <form  method="POST" class="form-horizontal" id="frmArchivosConsultoriaEx">     
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
                        <input name="archivoConsultoriaEx" id="archivoConsultoriaEx" type="file" size="35" />
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <div class="control-group">
                        <label class="control-label" for="textinput"> Descripción: </label>
                        <div class="controls input-group">
                            <textarea id="descripcionConsultoriaEx"  name="descripcionConsultoriaEx" class="input-xlarge" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <center>
                <div class="control-group">
                    <button name="enviarArchivoConsultoriaEx" id="enviarArchivoConsultoriaEx" type="button" class="btn btn-success">Cargar Archivo</button>
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