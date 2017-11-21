<div id="NavegacionP">
    <ul class="nav nav-tabs" id="myNav">
        <li><a href=""  id="Sp1" class="btn-success">Informaciòn</a></li>
        <li><a href=""  id="Sp2">Testimonios</a></li>
        <li><a href=""  id="Sp3">Evidencias</a></li>
        <li><a href=""  id="Sp3">Inasistencias</a></li>
        <center>
            <div class="control-group">
                <button type="button" class="btn btn-primary" id="return" data-dismiss="modal" style="display: none">Volver</button>
            </div>
        </center>  
    </ul>
</div>

<!-- PASO1 -->
<div id="Spaso1" class="tab-pane active">

    <?php include_once '../Formularios/frmSemilleros.php'; ?>



</div>

<!-- PASO2 -->
<div id="Spaso2" class="tab-pane active" style="display: none;">

    <form  method="POST" class="form-horizontal" id="frmTestimonioSemillero">     
        <div class="tab-pane">

            <h3><center>TESTIMONIOS</center></h3><br>
            <legend></legend>

            <!-- Campo oculto con el id del historial -->
            <input id="idSemilleroTestimonio"  name="idSemilleroTestimonio" type="hidden"> 
            <input id="idTestimonio"  name="idTestimonio" type="hidden"> 

            <div class="control-group">
                TALLER : &nbsp;&nbsp;  
                <select id="tallerTestimonio"  name="tallerTestimonio" class="input-xlarge">

                </select>
            </div>
            <div class="control-group">
                TESTIMONIO:
                <br>
                <textarea id="Testimonio" name="Testimonio" class="input-block-level" placeholder="Ingrese el testimonio del Semillero" rows="5"></textarea> 
            </div>

        </div>
    </form>

    <center>
        <div class="control-group">
            <button type="button" class="btn btn-primary" id="returnTestimonio" data-dismiss="modal">Nuevo</button> &nbsp;&nbsp;
            <button type="button" class="btn btn-primary" id="saveTestimonio" data-dismiss="modal">Guardar</button>  
            <button type="button" class="btn btn-primary" id="updateTestimonio" data-dismiss="modal" style="display: none">Actualizar</button>
        </div>
    </center>

    <div class="control-group">                                
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo2">Testimonios &nbsp;&nbsp;</button>
        <!-- tabs left -->
        <div id="demo2" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

            <div class="tabbable tabs-left">

                <div class="tab-content">

                    <br>
                    <div class="table-responsive">                            
                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolTestimonios">
                            <thead>
                                <tr>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                       
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Fecha</th>                                   
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Taller</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:400px">Testimonio</th>    
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
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

<!-- PASO3 -->
<div id="Spaso3" class="tab-pane active" style="display: none;">

    <div class="control-group">                                
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demoN">Evidencia de los Semilleros &nbsp;&nbsp;</button>
        <!-- tabs left -->
        <div id="demoN" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

            <br>
            <center>
                <h4>Favor nombrar la Foto como se le indica a continuación: Semillero_CódigoFoto</h4>
                <h5>Formatos permitidos JPG y PNG con un tamaño máximo de 1MG.</h5>
            </center>
            <br>
            <form id="formUploadEvidencia" class="form-horizontal"  method="post" id="usrform0" enctype="multipart/form-data">
                <div class="control-group">

                    <div class="controls">
                        <div class="controls">
                            TALLER : &nbsp;&nbsp;                            
                            <select id="tallerEvidencia"  name="tallerEvidencia" class="input-xlarge">

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
    </div>

    <div class="table-responsive">                            
        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRolEvidencias">
            <thead>
                <tr>
                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>       
                    <th class="text-center" style="padding-right: 10px; color: #000; width:100px">Fecha</th>                                 
                    <th class="text-center" style="padding-right: 10px; color: #000; width:250px">Taller</th>                               
                    <th class="text-center" style="padding-right: 10px; color: #000; width:350px">Nombre Evidencia</th>  
                    <th class="text-center" style="padding-right: 10px; color: #000; width:30px">Ver</th>
                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Eliminar</th>
                </tr>
            </thead>
            <tbody  id="index_ajax">

            </tbody>
        </table>
    </div>

</div>