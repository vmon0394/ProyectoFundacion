<?php
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Psicólogo") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>
<div class="control-group">                                
    <button type="button" class="btn btn-primary">Listado de Atención y Consultoría &nbsp;&nbsp;</button>
    <!-- tabs left -->
    <div id="" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#a" data-toggle="tab" class="">Asesorías</a></li>
                <li><a href="#b" data-toggle="tab" class="">Consultorías</a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="a">

                    <br>
                    <h4>Atención y Seguimiento Psicológico</h4>
                    <br>
                    <br>
                    <div class="table-responsive">                            
                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol1">
                            <thead>
                                <tr>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>  
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Ingreso</th>    
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:80px">Documento</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Nombres</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Apellidos</th>                                    
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:90px">Semillero</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Beneficiario</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Proceso</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Psicólogo</th>
                                </tr>
                            </thead>
                            <tbody  id="index_ajax">

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="tab-pane" id="b">

                    <br>
                    <h4>Consultoría</h4>
                    <br>
                    <br>
                    <div class="table-responsive">                            
                        <table class="table table-striped table-hover table-bordered table-condensed" id="tblRol2">
                            <thead>
                                <tr>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:20px">N°</th>  
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Ingreso</th>    
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:80px">Documento</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Nombres</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Apellidos</th>                                    
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:90px">Semillero</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:60px">Beneficiario</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:50px">Proceso</th>
                                    <th class="text-center" style="padding-right: 10px; color: #000; width:110px">Psicólogo</th>
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

<!--<center>
    <div class="control-group">
        <button type="button" class="btn btn-primary" id="returnSemillero" data-dismiss="modal">Volver</button>
    </div>
</center>   -->