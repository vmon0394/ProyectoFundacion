 <form method="POST" class="form-horizontal" id="frmReportePrestamos">
    <div class="tab-pane">
        <div class="control-group">  
            <div class="controls">
                <div class="control-group">
                    <label class="control-label" for="textinput">Tipo:</label>
                    <div class="controls input-group">
                        <select id="tipo" name="tipo" class="input-xlarge">
                            <option value="0">SELECCIONE UNA OPCION</option>
                            <option value="1">REPORTE PRESTAMOS</option>
                            <option value="2">REPORTE USUARIOS</option>
                            <option value="3">REPORTE GENERAL</option>
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="consultar" title="consultar"><i class="icon-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <legend></legend>
        <center>
            <h2>Reporte participantes</h2>
        </center>
        <br>
        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Total participantes:</label>
                <div class="controls input-group">
                    <input id="totalParticipantes" name="totalParticipantes" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Activos:</label>
                <div class="controls input-group">
                    <input id="participantesActivos" name="participantesActivos" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Inactivos:</label>
                <div class="controls input-group">
                    <input id="participantesInactivos" name="participantesInactivos" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">En semilleros:</label>
                <div class="controls input-group">
                    <input id="otrosSemilleros" name="otrosSemilleros" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Menores de edad:</label>
                <div class="controls input-group">
                    <input id="menores" name="menores" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Mayores de edad:</label>
                <div class="controls input-group">
                    <input id="mayores" name="mayores" class="input-mini">
                </div>
            </div>
        </div>
        
        <br>
        <legend></legend>
        <center>
            <h2>Reporte servicios</h2>
        </center>

        <div class="twoColumns">       
            <div class="control-group">
                <label class="control-label" for="textinput">Servicios totales:</label>
                <div class="controls input-group">
                    <input id="totalServicios" name="totalServicios" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Activos:</label>
                <div class="controls input-group">
                    <input id="activosServicios" name="activosServicios" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Inactivos:</label>
                <div class="controls input-group">
                    <input id="inactivosServicios" name="inactivosServicios" class="input-mini">
                </div>
            </div>
        </div>
        <legend></legend>
        <center>
            <h2>Reporte asistencia por servicio</h2>
        </center>

        <div id="servis">       
<!--            <div class="control-group">
                <label class="control-label" for="textinput">Hora del juego:</label>
                <div class="controls input-group">
                    <input id="totalAsistenciaS" name="totalAsistenciaS" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Hora del cuento:</label>
                <div class="controls input-group">
                    <input id="asistencia1" name="asistencia1" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Hora creativa:</label>
                <div class="controls input-group">
                    <input id="asistencia2" name="asistencia2" class="input-mini">
                </div>
            </div>-->
        </div>
        <br>
        <legend></legend>
        <center>
            <h2>Reporte inventario</h2>
        </center>

        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Materiales en lista:</label>
                <div class="controls input-group">
                    <input id="total" name="total" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Disponibles:</label>
                <div class="controls input-group">
                    <input id="a" name="a" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">No disponibles:</label>
                <div class="controls input-group">
                    <input id="b" name="b" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">En buen estado:</label>
                <div class="controls input-group">
                    <input id="c" name="c" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Regulares:</label>
                <div class="controls input-group">
                    <input id="d" name="d" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Incompletos:</label>
                <div class="controls input-group">
                    <input id="e" name="e" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Obsoletos:</label>
                <div class="controls input-group">
                    <input id="f" name="f" class="input-mini">
                </div>
            </div>
        </div>
        
        <br>
        <legend></legend>
        <center>
            <h2>Reporte prestamos</h2>
        </center>

        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Total realizados:</label>
                <div class="controls input-group">
                    <input id="g" name="g" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Activos:</label>
                <div class="controls input-group">
                    <input id="h" name="h" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Devoluciones:</label>
                <div class="controls input-group">
                    <input id="i" name="i" class="input-mini">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Material mas prestado:</label>
                <div class="controls input-group">
                    <input id="j" name="j" class="input-large">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Usuario que mas presta:</label>
                <div class="controls input-group">
                    <input id="k" name="k" class="input-xlarge">
                </div>
            </div> 
        </div>
        <br>
        <legend></legend>
    </div>
</form>