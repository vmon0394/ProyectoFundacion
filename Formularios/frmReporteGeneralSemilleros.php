<!--<?php //$per2005 = semillerosgeneral::contarpersonasporano(); ?>-->
<div class="tab-content"> 

    <ul class="nav nav-tabs" id="myNav">
        <li><a href=""  id="p1" class="btn-success">Reporte Niños</a></li>
        <li><a href=""  id="p2">Reporte Adultos</a></li>
        <h3 id="titulo_ninos" align="center">Reporte General Fichas Socio Familiares Niños</h3>
        <h3 id="titulo_adultos" align="center" style="display: none;">Reporte General Fichas Socio Familiares Adultos</h3>
    </ul>
</div>   

<!-- PASO1 -->
<div id="paso1" class="tab-pane active">

    <form  method="POST" class="form-horizontal" id="frmReporteGeneralSemillerosN">     
        <div class="tab-pane">

            <br>
            <div class="control-group">
                <div class="controls">
                    <div class="control-group">
                        <label class="control-label" for="textinput">Semillero *</label>
                        <div class="controls input-group">
                            <select id="semillero"  name="semillero[]" class="input-xlarge">
                                <?php
                                include_once '../Model/libCombos.php';
                                $combo = new libCombos();
                                $combo->comboSemillerosNinos2();
                                echo $combo->getResult();
                                ?>
                            </select>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="consult" title="Consultar"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <legend></legend>
            <center>
                <h3>Datos Generales</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Historico de Participantes </label>
                    <div class="controls input-group">
                        <input id="totalParticipantes"  name="totalParticipantes" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Activos 2017</label>
                    <div class="controls input-group">
                        <input id="activos"  name="activos" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <!--<div class="control-group">
                    <label class="control-label" for="textinput">Inactivos </label>
                    <div class="controls input-group">
                        <input id="inactivos"  name="inactivos" type="text" class="input-mini" disabled="true">
                    </div>
                </div>-->
                <br>

                <div class="control-group">
                    <label class="control-label" for="textinput">Hombres </label>
                    <div class="controls input-group">
                        <input id="hombres"  name="hombres" type="text" class="input-mini" disabled="true">
                    </div>
                </div>  
                <div class="control-group">
                    <label class="control-label" for="textinput">Mujeres </label>
                    <div class="controls input-group">
                        <input id="mujeres"  name="mujeres" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Total registros <div id="ano"></div> </label>
                    <div class="controls input-group">
                        <input id="total"  name="total" type="text"class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Rangos de Edades</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div id="rangoEdades">

                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Rangos de Grados Escolares</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div id="rangoGrados">

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Aceleración </label>
                    <div class="controls input-group">
                        <input id="aceleracion"  name="aceleracion" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">No Estudia </label>
                    <div class="controls input-group">
                        <input id="noEstudia"  name="noEstudia" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Rango de Años en el semillero</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div id="rangoAnosPermanencia">

                </div>

            </div>

        
             <legend></legend>
            <center>
                <h3>Personas Participantes por años</h3>
            </center>
            <br>
            <div class="twoColumns">
                 <?php
                include_once '../Model/db.conn.php';
                include_once '../Model/libSemillerosGeneral.php';
                $i = 2008;
                $per2005 = semillerosgeneral::contarpersonasporano();
                foreach ($per2005 as $row) {
                echo"
                <div class='control-group'>
                    <label class='control-label' for='textinput '> Año $i </label>
                    <div class='controls input-group'>
                        <input value=".$row["cuentaper"]." type='text' class='input-mini' disabled='true'>
                    </div>
                </div>
                ";
                 $i++;
                }
                ?>
                
            </div>

            <legend></legend>
            <center>
                <h3>Tipologías</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Ampliada </label>
                    <div class="controls input-group">
                        <input id="ampliada"  name="ampliada" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Extensa </label>
                    <div class="controls input-group">
                        <input id="extensa"  name="extensa" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Extensa con Ausencia del Padre </label>
                    <div class="controls input-group">
                        <input id="extensaSinPadre"  name="extensaSinPadre" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Extensa con Ausencia de la Madre </label>
                    <div class="controls input-group">
                        <input id="extensaSinMadre"  name="extensaSinMadre" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Extensa con Ausencia de los Padres </label>
                    <div class="controls input-group">
                        <input id="extensaSinPadres"  name="extensaSinPadres" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Monoparental Madre </label>
                    <div class="controls input-group">
                        <input id="monoparentalMadre"  name="monoparentalMadre" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Monoparental Padre </label>
                    <div class="controls input-group">
                        <input id="monoparentalPadre"  name="monoparentalPadre" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nuclear </label>
                    <div class="controls input-group">
                        <input id="nuclear"  name="nuclear" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nuclear con Madrastra </label>
                    <div class="controls input-group">
                        <input id="nuclearMadrastra"  name="nuclearMadrastra" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nuclear con Padrastro </label>
                    <div class="controls input-group">
                        <input id="nuclearPadrastro"  name="nuclearPadrastro" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Simultanea </label>
                    <div class="controls input-group">
                        <input id="simultanea"  name="simultanea" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Participantes Desplazados</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Desplazados </label>
                        <div class="controls input-group">
                            <input id="desplazados"  name="desplazados" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Con Registro </label>
                        <div class="controls input-group">
                            <input id="conRegistro"  name="conRegistro" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Sin Registro </label>
                    <div class="controls input-group">
                        <input id="sinRegistro"  name="sinRegistro" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Víctimas </label>
                        <div class="controls input-group">
                            <input id="victimas"  name="victimas" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Con Registro </label>
                        <div class="controls input-group">
                            <input id="victimasConRegistro"  name="victimasConRegistro" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Sin Registro </label>
                    <div class="controls input-group">
                        <input id="victimasSinRegistro"  name="victimasSinRegistro" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Pertenencias Etnicas</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Afrodescendiente </label>
                        <div class="controls input-group">
                            <input id="afrodescendiente"  name="afrodescendiente" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Mestizo </label>
                        <div class="controls input-group">
                            <input id="mestizos"  name="mestizos" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Indígena </label>
                    <div class="controls input-group">
                        <input id="indigena"  name="indigena" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Participantes Discapacitados</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Discapacitados </label>
                        <div class="controls input-group">
                            <input id="discapacitados"  name="discapacitados" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Cognitiva </label>
                        <div class="controls input-group">
                            <input id="cognitiva"  name="cognitiva" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Fisíca </label>
                        <div class="controls input-group">
                            <input id="fisica"  name="fisica" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Sensorial </label>
                    <div class="controls input-group">
                        <input id="sensorial"  name="sensorial" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Psíquica </label>
                    <div class="controls input-group">
                        <input id="psiquica"  name="psiquica" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Familiares en la Empresa</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Familiares Empresa </label>
                        <div class="controls input-group">
                            <input id="familiaresEmpresa"  name="familiaresEmpresa" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Contratistas </label>
                        <div class="controls input-group">
                            <input id="contratista"  name="contratista" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Directos </label>
                    <div class="controls input-group">
                        <input id="directa"  name="directa" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Por Compañias</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">INDUSTRIAL CONCONCRETO </label>
                    <div class="controls input-group">
                        <input id="icc"  name="icc" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">CONSTRUCTORA CONCONCRETO </label>
                    <div class="controls input-group">
                        <input id="cc"  name="cc" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>    

            <legend></legend>
            <center>
                <h3>Participantes en otros Servicios</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Semilleros </label>
                    <div class="controls input-group">
                        <input id="otrosSemilleros"  name="otrosSemilleros" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Servicios </label>
                    <div class="controls input-group">
                        <input id="otrosServicios"  name="otrosServicios" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>  

        </div>
    </form>

</div>

<!-- PASO2 -->
<div id="paso2" class="tab-pane" style="display: none;">

    <form  method="POST" class="form-horizontal" id="frmReporteGeneralSemillerosA">     
        <div class="tab-pane">

            <br>
            <div class="control-group">
                <div class="controls">
                    <div class="control-group">
                        <label class="control-label" for="textinput">Semillero *</label>
                        <div class="controls input-group">
                            <select id="semilleroA"  name="semilleroA[]" class="input-xlarge" multiple="multiple">
                                <?php
                                include_once '../Model/libCombos.php';
                                $combo = new libCombos();
                                $combo->comboSemillerosAdultos2();
                                echo $combo->getResult();
                                ?>
                            </select>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="consultA" title="Consultar"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <legend></legend>   
            <center>
                <h3>Datos Generales</h3>
            </center>
            <br>

            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Total Participantes </label>
                    <div class="controls input-group">
                        <input id="totalParticipantesA"  name="totalParticipantesA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Activos </label>
                    <div class="controls input-group">
                        <input id="activosA"  name="activosA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <!-- class="control-group">
                    <label class="control-label" for="textinput">Inactivos </label>
                    <div class="controls input-group">
                        <input id="inactivosA"  name="inactivosA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>-->
                <br>
                <br>
                <div class="control-group">
                    <label class="control-label" for="textinput">Hombres </label>
                    <div class="controls input-group">
                        <input id="hombresA"  name="hombresA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>  
                <div class="control-group">
                    <label class="control-label" for="textinput">Mujeres </label>
                    <div class="controls input-group">
                        <input id="mujeresA"  name="mujeresA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Total registros <div id="anoA"></div> </label>
                    <div class="controls input-group">
                        <input id="totalA"  name="totalA" type="text"class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Rangos de Edades</h3>
            </center>
            <br>                                    
            <div class="twoColumns">

                <div id="rangoEdadesA">

                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Rango de Años en el semillero</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div id="rangoAnosPermanenciaA">

                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Tipologías</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">Ampliada </label>
                    <div class="controls input-group">
                        <input id="ampliadaA"  name="ampliadaA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Extensa </label>
                    <div class="controls input-group">
                        <input id="extensaA"  name="extensaA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Extensa con Ausencia del Padre </label>
                    <div class="controls input-group">
                        <input id="extensaSinPadreA"  name="extensaSinPadreA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Extensa con Ausencia de la Madre </label>
                    <div class="controls input-group">
                        <input id="extensaSinMadreA"  name="extensaSinMadreA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Extensa con Ausencia de los Padres </label>
                    <div class="controls input-group">
                        <input id="extensaSinPadresA"  name="extensaSinPadresA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Monoparental Madre </label>
                    <div class="controls input-group">
                        <input id="monoparentalMadreA"  name="monoparentalMadreA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Monoparental Padre </label>
                    <div class="controls input-group">
                        <input id="monoparentalPadreA"  name="monoparentalPadreA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nuclear </label>
                    <div class="controls input-group">
                        <input id="nuclearA"  name="nuclearA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nuclear con Madrastra </label>
                    <div class="controls input-group">
                        <input id="nuclearMadrastraA"  name="nuclearMadrastraA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Nuclear con Padrastro </label>
                    <div class="controls input-group">
                        <input id="nuclearPadrastroA"  name="nuclearPadrastroA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Simultanea </label>
                    <div class="controls input-group">
                        <input id="simultaneaA"  name="simultaneaA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Participantes Desplazados</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Desplazados </label>
                        <div class="controls input-group">
                            <input id="desplazadosA"  name="desplazadosA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Con Registro </label>
                        <div class="controls input-group">
                            <input id="conRegistroA"  name="conRegistroA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Sin Registro </label>
                    <div class="controls input-group">
                        <input id="sinRegistroA"  name="sinRegistroA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Víctimas </label>
                        <div class="controls input-group">
                            <input id="victimasA"  name="victimasA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Con Registro </label>
                        <div class="controls input-group">
                            <input id="victimasConRegistroA"  name="victimasConRegistroA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Sin Registro </label>
                    <div class="controls input-group">
                        <input id="victimasSinRegistroA"  name="victimasSinRegistroA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Pertenencias Etnicas</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Afrodescendiente </label>
                        <div class="controls input-group">
                            <input id="afrodescendienteA"  name="afrodescendienteA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Mestizo </label>
                        <div class="controls input-group">
                            <input id="mestizosA"  name="mestizosA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Indígena </label>
                    <div class="controls input-group">
                        <input id="indigenaA"  name="indigenaA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Participantes Discapacitados</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Discapacitados </label>
                        <div class="controls input-group">
                            <input id="discapacitadosA"  name="discapacitadosA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Cognitiva </label>
                        <div class="controls input-group">
                            <input id="cognitivaA"  name="cognitivaA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Fisíca </label>
                        <div class="controls input-group">
                            <input id="fisicaA"  name="fisicaA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Sensorial </label>
                    <div class="controls input-group">
                        <input id="sensorialA"  name="sensorialA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">Psíquica </label>
                    <div class="controls input-group">
                        <input id="psiquicaA"  name="psiquicaA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Familiares en la Empresa</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="twoColumns">

                    <div class="control-group">
                        <label class="control-label" for="textinput">Familiares Empresa </label>
                        <div class="controls input-group">
                            <input id="familiaresEmpresaA"  name="familiaresEmpresaA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textinput">Contratistas </label>
                        <div class="controls input-group">
                            <input id="contratistaA"  name="contratistaA" type="text" class="input-mini" disabled="true">
                        </div>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="textinput">Directos </label>
                    <div class="controls input-group">
                        <input id="directaA"  name="directaA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

            <legend></legend>
            <center>
                <h3>Por Compañias</h3>
            </center>
            <br>
            <div class="twoColumns">

                <div class="control-group">
                    <label class="control-label" for="textinput">INDUSTRIAL CONCONCRETO </label>
                    <div class="controls input-group">
                        <input id="iccA"  name="iccA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textinput">CONSTRUCTORA CONCONCRETO </label>
                    <div class="controls input-group">
                        <input id="ccA"  name="ccA" type="text" class="input-mini" disabled="true">
                    </div>
                </div>

            </div>

        </div> 
    </form>                               

</div>