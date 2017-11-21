<div class="control-group">                                
        
    
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demoN">Evidencia de las Actividades &nbsp;&nbsp;</button>
        <!-- tabs left -->
        <div id="demoN" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

            <br>
            <center>
                <h4>Favor nombrar la evidencia como se le indica a continuación: nombreActividad_CódigoFoto</h4>
                <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG.</h5>
            </center>
            <br>
            <form id="formUploadEvidencia" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                <div class="control-group">

                    <div class="controls">
                        <div class="controls">
                            ACTIVIDAD : &nbsp;&nbsp;                            
                            <select id="actividadEvidencia"  name="actividadEvidencia" class="input-xlarge">
                                <?php
                                include_once '../Model/libCombos.php';
                                $combo = new libCombos();
                                $combo->comboActividades();
                                echo $combo->getResult();
                                ?>   
                            </select>                                 
                        </div>
                    </div>
                    <br>
                    <div class="controls">
                        <div class="controls">
                            <input name="archivoEvidencia" id="archivoEvidencia" type="file" size="35" />
                        </div>
                    </div>

                </div>

                <center>
                    <div class="control-group">
                        <button name="enviarFoto" id="enviarFoto" type="button" class="btn btn-success">Cargar Evidencia</button>
                    </div>
                </center>
            </form>

        </div>
        <div class="table-responsive">                            
        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolEvidencias">
            <thead>
                <tr>
                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>       
                    <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Fecha Realizacion</th>                                 
                    <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Nombre Actividad</th>                               
                    <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Nombre Evidencia</th>  
                    <th class="text-center" style="padding-right: 10px; color: #000; width:40px">Ver</th>
                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Eliminar</th>
                </tr>
            </thead>
            <tbody  id="index_ajax">

            </tbody>
        </table>
    </div>
       
</div>

    