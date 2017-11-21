<form  method="POST" class="form-horizontal" id="frmUploadServicios" enctype="multipart/form-data">
    <div class="tab-pane">
        <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
        <br>
        <input id="idServicio"  name="idServicio" type="hidden">
        <legend></legend>
        <div class="two-rows">
            <div class="control-group">
                <div class="controls">
                    
                    <div class="control-group">
                        <label align="center" class="control-label" for="textinput">Nombre servicio *</label>
                        <div class="controls input-group">
                            <input id="nombreServicio"  name="nombreServicio" type="text" placeholder="Ingrese el Nombre del servicio" class="input-xlarge">
                        </div>
                    </div>
                </div>
            </div>
            
            <center>
            <h4>Favor nombrar el servicio como se le indica a continuación: nombreServicio_Fecha.pdf</h4>
            <h5>Formatos permitidos PDF; Tamaño máximo 2MG.</h5>
            </center>
            <br>
            <div class="control-group">
                <div class="controls">
                    <div class="controls">
                        <input name="archivoServicio" id="archivoServicio" type="file" size="35" />
                    </div>
                </div>
            </div>
            <br>
            <div class="control-group">
                <label align="center" class="control-label" for="textinput">Descripcion *</label>
                <div class="controls">
                    <textarea class="input-xlarge" name="descripcion" rows="3" placeholder="Descripcion del servicio"></textarea>
                </div>
            </div>
        </div>
        <center>
        <div class="control-group">
            <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
            <button id="enviarServicio" type="button" class="btn btn-primary">Cargar Servicio</button>
            <button type="button" class="btn btn-primary" id="updateServicio" style="display: none">Actualizar</button>
        </div>
        </center>
        <legend></legend>
    </div>
</form>