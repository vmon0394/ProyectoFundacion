<?php
include_once '../Model/db.conn.php';
include_once '../Model/libreporteGeneralPsicosociales.php';
?>
     <form  method="POST" class="form-horizontal" id="frmReporteGeneralSemillerosN">     
        <div class="tab-pane">
            <div class="twoColumns">
                <br>
                <?php
                $participantes  = psicosocialcontar::personaspart();
                $total        = psicosocialcontar::totalsumado();
                $totalgeneral   = psicosocialcontar::totaltalleres();
                $talleforma     = psicosocialcontar::talleresformativos();
                $tallepsico     = psicosocialcontar::tallerpsicosocial();
                $atencion       = psicosocialcontar::atencionespsico();
                $seguimiex      = psicosocialcontar::seguimientoexterno();
                $persoaten      = psicosocialcontar::personasatendidas();
                $proye          = psicosocialcontar::proyectos();
                $salidape       = psicosocialcontar::salidaspedagogicastotal();
                $vacaciones     = psicosocialcontar::vacacionesrecreativasto();
                $encupadres     = psicosocialcontar::encuentropadrestot();
                $campamento     = psicosocialcontar::Campamentotal();
                $muestra        = psicosocialcontar::Muestratotal();
                $cierre         = psicosocialcontar::Cierretotal();
                $actividades    = psicosocialcontar::Actividades_es();
                $comunitarias   = psicosocialcontar::Comunitarias();

                  foreach ($participantes as $row) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Personas Participantes</label>
                            <div class='controls input-group'>
                                <input value='".$row["participantes"]."' name='' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                    ";
                }
                
                foreach ($total as $row) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Total General</label>
                            <div class='controls input-group'>
                                <input value='".$row["totalgene"]."' name='' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                    ";
                }

                /*foreach ($totalgeneral as $row0) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Total de Talleres</label>
                        <div class='controls input-group'>
                        <input value='".$row0["totalgeneral"]."' name='' type='text' class='input-mini' disabled='true'>
                        </div>
                        <hr>
                    ";
                }*/

                foreach ($talleforma as $row1) {
                    echo"
                        <div class='control-group'>
                            <label class='control-label' for='textinput'>Talleres Formativos </label>
                                <div class='controls input-group'>
                                <input value='".$row1["tformativos"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                    ";
                }

                foreach ($tallepsico as $row2) {
                    echo"
                        <div class='control-group'>
                            <label class='control-label' for='textinput'>Talleres Psicosociales</label>
                                <div class='controls input-group'>
                                <input value='".$row2["tpsicosocial"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                    ";
                }

                foreach ($atencion as $row3) {
                    echo"
                        <div class='control-group'>
                            <label class='control-label' for='textinput'>Atenciones Psicosociales-Sesiones</label>
                            <div class='controls input-group'>
                                <input value='".$row3["idseguimiento"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                    ";
                }

                foreach ($seguimiex as $row4) {
                    echo"
                        <div class='control-group'>
                            <label class='control-label' for='textinput'>Seguimientos</label>
                            <div class='controls input-group'>
                                <input value='".$row4["idseguimientoex"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                    ";
                }

                foreach ($persoaten as $row5) {
                    echo"
                        <div class='control-group'>
                            <label class='control-label' for='textinput'>Personas Atendidas </label>
                            <div class='controls input-group'>
                                <input value='".$row5["idpersonatendi"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                        
                    ";
                }

                foreach ($proye as $row7) {
                    echo"
                        <div class='control-group'>
                            <a href='proyectosCC.php'><label class='control-label' for='textinput'>ProyectosCC Intervensiones</label></a>
                            <div class='controls input-group'>
                                <input value='".$row7["contarproyecto"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                        
                    ";
                }
                foreach ($salidape as $row8) {
                    echo"
                        <div class='control-group'>
                            <a href='salidasped.php'><label class='control-label' for='textinput'>Salidas Pedagógicas</label></a>
                            <div class='controls input-group'>
                                <input value='".$row8["salidaspe"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                        
                    ";
                }
                foreach ($vacaciones as $row9) {
                    echo"
                        <div class='control-group'>
                            <label class='control-label' for='textinput'>Vacaciones recreativas</label>
                            <div class='controls input-group'>
                                <input value='".$row9["vacaciones"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                        
                    ";
                }
                foreach ($encupadres as $row10) {
                    echo"
                        <div class='control-group'>
                            <a href='encuentros.php'><label class='control-label' for='textinput'>Encuentro de Padres</label></a>
                            <div class='controls input-group'>
                                <input value='".$row10["padres"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                        
                    ";
                }
                foreach ($campamento as $row11) {
                    echo"
                        <div class='control-group'>
                            <a href='salidas.php'><label class='control-label' for='textinput'>Salida a Campamentos</label></a>
                            <div class='controls input-group'>
                                <input value='".$row11["Campamento"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                        
                    ";
                }
                foreach ($muestra as $row12) {
                    echo"
                        <div class='control-group'>
                            <label class='control-label' for='textinput'>Muestra</label>
                            <div class='controls input-group'>
                                <input value='".$row12["Muestra"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                        
                    ";
                }
                foreach ($cierre as $row13) {
                    echo"
                        <div class='control-group'>
                            <label class='control-label' for='textinput'>Cierre</label>
                            <div class='controls input-group'>
                                <input value='".$row13["Cierre"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                        
                    ";
                }
                foreach ($actividades as $row14) {
                    echo"
                        <div class='control-group'>
                            <a href='actividadespe.php'><label class='control-label' for='textinput'>Actividades Especiales</label></a>
                            <div class='controls input-group'>
                                <input value='".$row14["actiespe"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                    ";
                }
                foreach ($comunitarias as $row15) {
                    echo"
                        <div class='control-group'>
                            <a href='comunitarias.php'><label class='control-label' for='textinput'>Actividades Comunitarias</label></a>
                            <div class='controls input-group'>
                                <input value='".$row15["comunitarias"]."' type='text' class='input-mini' disabled='true'>
                            </div>
                        </div>
                    ";
                }
                ?>
                <!--<?php
                    /*
                    include_once '../Model/libReportesGeneralesFichas.php';
                    $taller = new libReportesGeneralesFichas();
                    $taller->contarTalleres();
                    echo  $taller->getResult();
                ?>
                <?php
                    include_once '../Model/libReportesGeneralesFichas.php';
                    $taller = new libReportesGeneralesFichas();
                    $taller->contarTalleresformativos();
                    echo  $taller->getResult();
                ?>
                <?php
                    include_once '../Model/libReportesGeneralesFichas.php';
                    $taller = new libReportesGeneralesFichas();
                    $taller->contarTallerespsicosocial();
                    echo  $taller->getResult();
                ?>
                <?php
                    include_once '../Model/libReportesGeneralesFichas.php';
                    $taller = new libReportesGeneralesFichas();
                    $taller->contarTalleresatencionespsico();
                    echo  $taller->getResult();
                ?>
                <?php
                    include_once '../Model/libReportesGeneralesFichas.php';
                    $taller = new libReportesGeneralesFichas();
                    $taller->contarpersonasatendidas();
                    echo  $taller->getResult();
                ?>
                <?php
                    include_once '../Model/libReportesGeneralesFichas.php';
                    $taller = new libReportesGeneralesFichas();
                    $taller->contarSalidasPedagogicas();
                    echo  $taller->getResult();
                ?>
                <?php
                    include_once '../Model/libReportesGeneralesFichas.php';
                    $taller = new libReportesGeneralesFichas();
                    $taller->contarVacacionesrecreativa();
                    echo  $taller->getResult();
                ?>
                <?php
                    include_once '../Model/libReportesGeneralesFichas.php';
                    $taller = new libReportesGeneralesFichas();
                    $taller->contarCampamento();
                    echo  $taller->getResult();
                    */
                ?>-->
            </div>
        </div>
    </form>

