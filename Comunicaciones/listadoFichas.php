<?php
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Comunicaciones") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>
<div class="control-group">                                
    <br>
    <center><h2 id="selecSemillero"></h2></center>
    
    <div id="demo2" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#a" data-toggle="tab" class="">Fichas Socio Familiares</a></li>
                <li><a href="#b" data-toggle="tab" class="">Fichas Eliminadas</a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="a">

                    <br>
                    <h4>Fichas Socio Familiares Existentes</h4>
                    <br>
                    <br>
                    <div class="table-responsive">                            
                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol2">
                            <thead>
                                <tr>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:90px">Documento</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:120px">Nombres</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:120px">Apellidos</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Sexo</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:70px">Permanencia</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Semilleros</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody  id="index_ajax">

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="tab-pane" id="b">

                    <br>
                    <h4>Fichas Socio Familiares Eliminadas</h4>
                    <br>
                    <br>
                    <div class="table-responsive">                            
                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol3">
                            <thead>
                                <tr>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>                                        
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:90px">Documento</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:130px">Nombres</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:130px">Apellidos</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Sexo</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:70px">Permanencia</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Semilleros</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Consultar</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Habilitar</th>
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

<center>
    <div class="control-group">
        <button type="button" class="btn btn-primary" id="exporFichas" data-dismiss="modal">Exportar Fichas</button> &nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-primary" id="returnSemillero" data-dismiss="modal">Volver</button>
    </div>
</center>   