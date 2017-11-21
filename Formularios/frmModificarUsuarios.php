<!-- Modificar Usuario -->
<!--<div class="control-group">                                
    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo"><div id="nameUser">Modificar Usuario | <?php echo $_SESSION["usuario"] ?> </div> </button>
     tabs left 
    <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

        <form  method="POST" class="form-horizontal" id="frmCambiarUsuario">     
            <div class="tab-pane">
                <br> 
                <div class="control-group">
                    <div class="controls">

                        <div class="control-group">
                            <label class="control-label" for="textinput">Nuevo Usuario *</label>
                            <div class="controls input-group">
                                <input id="usuario"  name="usuario" type="text" placeholder="Ingrese el Usuario" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="textinput">Contraseña *</label>
                            <div class="controls input-group">
                                <input id="contrasena"  name="contrasena" type="password" placeholder="Ingrese su Contraseña" class="input-xlarge">
                            </div>
                        </div>

                    </div>
                </div>

                <center>
                    <div class="control-group">
                        <button type="button" class="btn btn-primary" id="modiUsuario" data-dismiss="modal">Modificar</button> 
                    </div>
                </center>

            </div>
        </form>

    </div>
</div>-->

<!-- Modificar Contraseña -->
<div class="control-group">                                
    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo2">Modificar Contraseña &nbsp;&nbsp;</button>
    <!-- tabs left -->
    <div id="demo2" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

        <form  method="POST" class="form-horizontal" id="frmCambiarContrasena">     
            <div class="tab-pane">
                <br> 
                <div class="control-group">
                    <div class="controls">

                        <div class="control-group">
                            <label class="control-label" for="textinput">Contraseña Actual *</label>
                            <div class="controls input-group">
                                <input id="contrasena2"  name="contrasena2" type="password" placeholder="Ingrese la Contraseña Actual" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="textinput">Nueva Contraseña *</label>
                            <div class="controls input-group">
                                <input id="nuevaContrasena"  name="nuevaContrasena" type="password" placeholder="Ingrese la Nueva Contraseña" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="textinput">Repita Contraseña *</label>
                            <div class="controls input-group">
                                <input id="repitaContrasena"  name="repitaContrasena" type="password" placeholder="Repita la Nueva Contraseña" class="input-xlarge">
                            </div>
                        </div>

                    </div>
                </div>

                <center>
                    <div class="control-group">
                        <button type="button" class="btn btn-primary" id="modiContrasena" data-dismiss="modal">Modificar</button> 
                    </div>
                </center>

            </div>
        </form>

    </div>
</div>