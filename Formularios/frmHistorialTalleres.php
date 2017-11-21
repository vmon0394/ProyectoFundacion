<div id="divFrmHistorial" style="display: none;">

    <form  method="POST" class="form-horizontal" id="frmHistorialTaller">     
        <div class="tab-pane">
            <!--<label class="alert alert-info">Los campos marcados con * son obligatorios </label>-->

            <div id="NavegacionP">
                <ul class="nav nav-tabs" id="myNav">
                    <li><a href=""  id="p1T" class="btn-success">Taller</a></li>
                    <li><a href=""  id="p2T">Planeación</a></li>
                    <h3 align="center" id="tituloTaller"></h3>
                </ul>
            </div>   

            <input id="idTaller"  name="idTaller" type="hidden">

            <!-- PASO1 -->
            <div id="paso1T" class="tab-pane active">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Semillero *</label>
                        <div class="controls input-group">
                            <input id="semilleroTaller"  name="semilleroTaller" type="text">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Tipo Taller *</label>
                        <div class="controls input-group">
                            <select id="tipoTaller"  name="tipoTaller" class="input-large">
                                <option value="0">SELECCIONE UN TIPO</option>
                                <option value="Talleres Formativos">Talleres Formativos</option>
                                <option value="Salidas Pedagógicas">Salidas Pedagógicas</option>
                                <option value="Vacaciones Recreativas">Vacaciones Recreativas</option>
                                <option value="Campamento">Campamento</option>
                                <option value="Taller Psicosocial">Taller Psicosocial</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Taller *</label>
                        <div class="controls input-group">
                            <input id="nombreTaller"  name="nombreTaller" type="text" placeholder="Ingrese el Nombre del Taller" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Fecha *</label>
                        <div class="controls input-group">
                            <input id="fechaTaller"  name="fechaTaller" type="date" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Habilidad *</label>
                        <div class="controls input-group">
                            <input id="idHabilidad"  name="idHabilidad" type="text" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Valor *</label>
                        <div class="controls input-group">
                            <select id="valorTaller"  name="valorTaller" class="input-large">
                                <option value="0">SELECCIONE UN VALOR</option>
                                <option value="Alegría">Alegría</option>
                                <option value="Amor">Amor</option>
                                <option value="Apoyo">Apoyo</option>
                                <option value="Aptitud">Aptitud</option>                            
                                <option value="Armonía Interior">Armonía Interior</option>
                                <option value="Asertividad">Asertividad</option>
                                <option value="Audacia">Audacia</option>
                                <option value="Autocontrol">Autocontrol</option>
                                <option value="Ayudar Sociedad">Ayudar Sociedad</option>
                                <option value="Bondad">Bondad</option>
                                <option value="Búsqueda de la verdad">Búsqueda de la verdad</option>
                                <option value="Calidad-Orientación">Calidad-Orientación</option>
                                <option value="Compasión">Compasión</option>
                                <option value="Competitividad">Competitividad</option>
                                <option value="Comprensión">Comprensión</option>
                                <option value="Compromiso">Compromiso</option>
                                <option value="Comunidad">Comunidad</option>
                                <option value="Confiabilidad">Confiabilidad</option>
                                <option value="Confianza">Confianza</option>
                                <option value="Confianza En Sí Mismo">Confianza En Sí Mismo</option>
                                <option value="Consideración">Consideración</option>
                                <option value="Consistencia">Consistencia</option>
                                <option value="Contribución">Contribución</option>    
                                <option value="Control">Control</option>
                                <option value="Cooperación">Cooperación</option>
                                <option value="Cortesía">Cortesía</option>
                                <option value="Creatividad">Creatividad</option>
                                <option value="Crecimiento">Crecimiento</option>
                                <option value="Cuidado">Cuidado</option>
                                <option value="Curiosidad">Curiosidad</option>
                                <option value="Democraticidad">Democraticidad</option>
                                <option value="Desafío">Desafío</option>
                                <option value="Desinterés">Desinterés</option>
                                <option value="Determinación">Determinación</option>
                                <option value="Devoción">Devoción</option>
                                <option value="Diligencia">Diligencia</option>
                                <option value="Dinamismo">Dinamismo</option>
                                <option value="Disciplina">Disciplina</option>
                                <option value="Discreción">Discreción</option>
                                <option value="Disfrute">Disfrute</option>
                                <option value="Diversidad">Diversidad</option>
                                <option value="Divertido">Divertido</option>
                                <option value="Duro Trabajo">Duro Trabajo</option>
                                <option value="Eficacia">Eficacia</option>
                                <option value="Eficiencia">Eficiencia</option>
                                <option value="Emoción">Emoción</option>
                                <option value="Empatía">Empatía</option>
                                <option value="Entusiasmo">Entusiasmo</option>
                                <option value="Equilibrio">Equilibrio</option>
                                <option value="Espontaneidad">Espontaneidad</option>
                                <option value="Estabilidad">Estabilidad</option>
                                <option value="Estratégico">Estratégico</option>
                                <option value="Estructura">Estructura</option>
                                <option value="Exactitud">Exactitud</option>
                                <option value="Excelencia">Excelencia</option>    
                                <option value="Éxito">Éxito</option>
                                <option value="Exploración">Exploración</option>
                                <option value="Expresividad">Expresividad</option>
                                <option value="Familia">Familia</option>
                                <option value="Fe">Fe</option>
                                <option value="Felicidad">Felicidad</option>
                                <option value="Fidelidad">Fidelidad</option>
                                <option value="Fluidez">Fluidez</option>
                                <option value="Foco">Foco</option>
                                <option value="Fuerza">Fuerza</option>
                                <option value="Generosidad">Generosidad</option>
                                <option value="Gracia">Gracia</option>
                                <option value="Gratitud">Gratitud</option>
                                <option value="Honestidad">Honestidad</option>
                                <option value="Honor">Honor</option>
                                <option value="Humildad">Humildad</option>
                                <option value="Igualdad">Igualdad</option>                            
                                <option value="Independencia">Independencia</option>
                                <option value="Ingenio">Ingenio</option>
                                <option value="Integridad">Integridad</option>
                                <option value="Intelectual ">Intelectual </option>
                                <option value="Inteligencia">Inteligencia</option>
                                <option value="Intuición">Intuición</option>
                                <option value="Inventiva">Inventiva</option>
                                <option value="Justicia">Justicia</option>
                                <option value="La Auto-Realización">La Auto-Realización</option>
                                <option value="La Positividad">La Positividad</option>
                                <option value="Lealtad">Lealtad</option>
                                <option value="Libertad">Libertad</option>
                                <option value="Liderazgo">Liderazgo</option>
                                <option value="Logro">Logro</option>
                                <option value="Obediencia">Obediencia</option>
                                <option value="Oportunidad">Oportunidad</option>
                                <option value="Orientación ">Orientación </option>
                                <option value="Resultados">Resultados</option>
                                <option value="Originalidad">Originalidad</option>    
                                <option value="Patriotismo">Patriotismo</option>
                                <option value="Perfección">Perfección</option>
                                <option value="Perspicacia">Perspicacia</option>
                                <option value="Piedad">Piedad</option>
                                <option value="Prudencia">Prudencia</option>
                                <option value="Rigor">Rigor</option>
                                <option value="Sagacidad">Sagacidad</option>
                                <option value="Salud">Salud</option>
                                <option value="Seguridad">Seguridad</option>
                                <option value="Sencillez">Sencillez</option>
                                <option value="Sensibilidad">Sensibilidad</option>
                                <option value="Sentido Práctico">Sentido Práctico</option>
                                <option value="Serenidad">Serenidad</option>
                                <option value="Servicio">Servicio</option>
                                <option value="Solvencia">Solvencia</option>
                                <option value="Templanza">Templanza</option>
                                <option value="Tolerancia">Tolerancia</option>
                                <option value="Trabajo En Equipo">Trabajo En Equipo</option>
                                <option value="Tradicionalismo">Tradicionalismo</option>
                                <option value="Unidad">Unidad</option>
                                <option value="Utilidad">Utilidad</option>
                                <option value="Visión">Visión</option>
                                <option value="Vitalidad">Vitalidad</option>                            
                            </select>
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="textinput">Técnica *</label>
                        <div class="controls input-group">
                            <input id="tecnicaTaller"  name="tecnicaTaller" type="text" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Tiempo *</label>
                        <div class="controls input-group">
                            <input id="tiempoTaller"  name="tiempoTaller" type="text" placeholder="Ingrese el Tiempo del Taller" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Estado *</label>
                        <div class="controls input-group">
                            <select id="estadoTaller"  name="estadoTaller" class="input-large">c
                                <option value="0">SELECCIONE UN ESTADO</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Realizado">Realizado</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>

                <div id="divObservaciones" style="display: none;">



                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Actividad Inicial: *</label>
                    <div class="controls input-group">
                        <textarea id="actividadInicial" name="actividadInicial" class="input-xxlarge" placeholder="Ingrese la descripción de la actividad inicial." rows="5"></textarea> 
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Actividad Central: *</label>
                    <div class="controls input-group">
                        <textarea id="actividadCentral" name="actividadCentral" class="input-xxlarge" placeholder="Ingrese la descripción de la actividad central." rows="5"></textarea> 
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Actividad Final: *</label>
                    <div class="controls input-group">
                        <textarea id="actividadFinal" name="actividadFinal" class="input-xxlarge" placeholder="Ingrese la descripción de la actividad final." rows="5"></textarea> 
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="textinput">Observación: </label>
                    <div class="controls input-group">
                        <textarea id="observacionCancelacion" name="observacionCancelacion" class="input-xxlarge" placeholder="Ingrese la observación y/o motivo en caso que el taller sea cancelado o aplazado." rows="5"></textarea> 
                    </div>
                </div>

                <div id="divFechaLimite" style="display: none;">

                    <div class="control-group">
                        <div class="controls">
                            <div class="control-group">
                                <label class="control-label" for="textinput">Fecha Límite *</label>
                                <div class="controls input-group">
                                    <input id="habilitarFechaLimiteTaller"  name="habilitarFechaLimiteTaller" type="date" class="input-large">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="modiDateTalleres" title="Buscar Consultoría">Habiilitar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- PASO2 -->
            <div id="paso2T" class="tab-pane" style="display: none;">

                <div class="control-group">
                    Objetivo:
                    <br>
                    <textarea id="objetivoTaller" name="objetivoTaller" class="input-block-level" placeholder="Ingrese la Objetivo del Taller" rows="5"></textarea> 
                </div>
                <div class="control-group">
                    Descripción de Actividades:
                    <br>
                    <textarea id="descripcionTaller" name="descripcionTaller" class="input-block-level" placeholder="Ingrese la Descripción del Taller" rows="5"></textarea> 
                </div>
                <div class="control-group">
                    Logros:
                    <br>
                    <textarea id="logrosTaller" name="logrosTaller" class="input-block-level" placeholder="Ingrese los Logros del Taller" rows="5"></textarea> 
                </div>
                <div class="control-group">
                    Dificultades:
                    <br>
                    <textarea id="dificultadesTaller" name="dificultadesTaller" class="input-block-level" placeholder="Ingrese las Dificultades del Taller" rows="5"></textarea> 
                </div>
                <div class="control-group">
                    Recomendaciones:
                    <br>
                    <textarea id="recomendacionesTaller" name="recomendacionesTaller" class="input-block-level" placeholder="Ingrese las Recomendaciones del Taller" rows="5"></textarea> 
                </div>            

            </div>

            <center>
                <div class="control-group">
                    <button type="button" class="btn btn-primary" id="returnTabla" data-dismiss="modal">Volver</button>
                </div>
            </center>

        </div>
    </form>

</div>

<div id="divTablaHistorial">

    <br>
    <div id="demo2" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

        <div class="table-responsive">                            
            <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolHistorialTalleres">
                <thead>
                    <tr>
                        <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>
                        <th class="text-center" style="padding-right: 10px; color: #000; width:170px">Semillero</th>                                        
                        <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Tipo</th>
                        <th class="text-center" style="padding-right: 10px; color: #000; width:170px">Nombre Taller</th>
                        <th class="text-center" style="padding-right: 10px; color: #000; width:80px">Fecha Taller</th>
                        <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Asistencia</th>
                        <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                    </tr>
                </thead>
                <tbody  id="index_ajax">

                </tbody>
            </table>
        </div>

    </div>

</div>