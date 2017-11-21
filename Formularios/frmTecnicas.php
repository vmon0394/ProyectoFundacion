<form  method="POST" class="form-horizontal" id="frmUploadTecnicas" enctype="multipart/form-data">     
    <div class="tab-pane">
        <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
        <br> 
        <input id="idTecnica"  name="idTecnica" type="hidden">

        <div class="control-group">
            <div class="controls"> 

                <div class="control-group">
                    <label class="control-label" for="textinput">Nombre Técnica *</label>
                    <div class="controls input-group">
                        <input id="tecnica"  name="tecnica" type="text" placeholder="Ingrese el Nombre de la Técnica" class="input-xlarge">
                    </div>
                </div>

            </div>
        </div>

        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Habilidad *</label>
                <div class="controls input-group">
                    <select id="habilidad" name="habilidad" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboHabilidades();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Valor *</label>
                <div class="controls input-group">
                    <select id="valor"  name="valor" class="input-large">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboValores();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>                                

        </div>

        <legend></legend>
        <center>
            <h4>Favor nombrar la Técnica como se le indica a continuación: nombreTécnica_Fecha.pdf</h4>
            <h5>Formatos permitidos PDF; Tamaño máximo 2MG.</h5>
        </center>
        <br>
        <div class="control-group">
            <div class="controls">
                <div class="controls">
                    <input name="archivoTecnica" id="archivoTecnica" type="file" size="35" />
                </div>
            </div>
        </div>

        <center>
            <div class="control-group">
                <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                <button id="enviarTecnica" type="button" class="btn btn-primary">Cargar Técnica</button>
                <button type="button" class="btn btn-primary" id="updateTecnica" style="display: none">Actualizar</button>
            </div>
        </center>
        <legend></legend>
    </div>
</form>