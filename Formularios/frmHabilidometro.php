
<form  method="POST" class="form-horizontal" id="frmUploadHabilidometro" enctype="multipart/form-data">     
    <div class="tab-pane">
        <label class="alert alert-info">Los campos marcados con * son obligatorios </label>
        <br> 
        <input id="idHabilidometro"  name="idHabilidometro" type="hidden">

        <div class="twoColumns">

            <div class="control-group">
                <label class="control-label" for="textinput">Semillero *</label>
                <div class="controls input-group">
                    <select id="idSemillero"  name="idSemillero" class="input-xlarge">
                        <?php
                        include_once '../Model/libCombos.php';
                        $combo = new libCombos();
                        $combo->comboSemilleros2();
                        echo $combo->getResult();
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="textinput">fecha *</label>
                <div class="controls input-group">
                    <input id="fecha"  name="fecha" type="date" placeholder="Ingrese Habilidometro" class="input-large">
                </div>
            </div>

        </div>

        <legend></legend>
        <center>
            <h4>Favor nombrar el archivo como se le indica a continuación: habilidometro_semillero_año.xlsx</h4>
            <h5>Formatos permitidos XLS y XLSX; Tamaño máximo 2MG. </h5>
        </center>
        <br>
        <div class="control-group">
            <div class="controls">
                <div class="controls">
                    <input name="archivoHabilidometro" id="archivoHabilidometro" type="file" size="35" />
                </div>
            </div>
        </div>

        <center>
            <div class="control-group">
                <button type="button" class="btn btn-primary" id="return" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
                <button id="enviarArchivo" type="button" class="btn btn-primary">Cargar Archivo</button>
                <button type="button" class="btn btn-primary" id="modiArchivo" style="display: none">Modificar</button>
                <button type="button" class="btn btn-primary" id="updateArchivo" style="display: none">Actualizar</button>
            </div>
        </center>
        <legend></legend>
    </div>
</form>