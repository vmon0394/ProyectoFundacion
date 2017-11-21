<form  method="POST" class="form-horizontal" id="frmPrestamoDevolucion">     
    <div class="tab-pane">
      
        
        <input id="idPrestamo"  name="idPrestamo" type="hidden">

        <div class="twoColumns">

              
            <div class="control-group">
                <label class="control-label" for="textinput">Documento *</label>
                <div class="controls input-group">
                    <input id="documento"  name="documento" type="text" placeholder="Ingrese el documento de quien presta" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Fecha prestamo *</label>
                <div class="controls input-group">
                    <input id="fechaPrestamo"  name="fechaPrestamo" type="date" class="input-large">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Fecha devolucion *</label>
                <div class="controls input-group">
                    <input id="fechaDevolucion"  name="fechaDevolucion" type="date" class="input-large">
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label" for="textinput">Codigo articulo *</label>
                <div class="controls input-group">
                    <input id="codigo"  name="codigo" type="text" class="input-large" placeholder="Ej: ABC-123">
                </div>
            </div>             
        </div>
    </div>  

    <br>        
    <center>
        <div class="control-group">
            <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Limpiar </button> &nbsp;&nbsp;
            <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Prestar </button>
        </div>
    </center>
</form>

