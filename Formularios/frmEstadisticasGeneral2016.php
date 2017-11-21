<?php
include_once '../Model/db.conn.php';
include_once '../Model/libreporteGeneralPsicosociales.php';
?>
     <form  method="POST" class="form-horizontal" id="frmReporteGeneralSemillerosN">     
        <div class="tab-pane">
            <div class="twoColumns">
                <br>
                <?php
                $total          = psicosocialcontar::totalsumado2016();
                $totalgeneral   = psicosocialcontar::totaltalleres2016();
                $talleforma     = psicosocialcontar::talleresformativos2016();
                $tallepsico     = psicosocialcontar::tallerpsicosocial2016();
                $atencion       = psicosocialcontar::atencionespsico2016();
                $seguimiex      = psicosocialcontar::seguimientoexterno2016();
                $persoaten      = psicosocialcontar::personasatendidas2016();
                $salidas        = psicosocialcontar::salidasrecreativas2016();
                $proye          = psicosocialcontar::proyectos2016();
                $salidape       = psicosocialcontar::salidaspedagogicastotal2016();
                $vacaciones     = psicosocialcontar::vacacionesrecreativasto2016();
                $encupadres     = psicosocialcontar::encuentropadrestot2016();
                $campamento     = psicosocialcontar::Campamentotal2016();
                $muestra        = psicosocialcontar::Muestratotal2016();
                $cierre         = psicosocialcontar::Cierretotal2016();
                $actividades    = psicosocialcontar::Actividades_es2016();
                foreach ($total as $row) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Total General</label>
                        <div class='controls input-group'>
                        <input value='".$row["totalgene"]."' name='' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }

                /*foreach ($totalgeneral as $row0) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Total de Talleres</label>
                        <div class='controls input-group'>
                        <input value='".$row0["totalgeneral"]."' name='' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
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
                        <br>
                    ";
                }

                foreach ($tallepsico as $row2) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Talleres Psicosociales</label>
                        <div class='controls input-group'>
                        <input value='".$row2["tpsicosocial"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }

                foreach ($atencion as $row3) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Atenciones Psicosociales-Sesiones</label>
                        <div class='controls input-group'>
                        <input value='".$row3["idseguimiento"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                        <br>
                    ";
                }

                foreach ($seguimiex as $row4) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Seguimientos</label>
                        <div class='controls input-group'>
                        <input value='".$row4["idseguimientoex"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }

                foreach ($persoaten as $row5) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Personas Atendidas </label>
                        <div class='controls input-group'>
                        <input value='".$row5["idpersonatendi"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }

                foreach ($salidas as $row6) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Salidas Recreativas </label>
                        <div class='controls input-group'>
                        <input value='".$row6["salidasrecre"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }
                foreach ($proye as $row7) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>ProyectosCC Intervensiones</label>
                        <div class='controls input-group'>
                        <input value='".$row7["contarproyecto"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br><hr>
                    ";
                }
                foreach ($salidape as $row8) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Salidas Pedagógicas</label>
                        <div class='controls input-group'>
                        <input value='".$row8["salidaspe"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }
                foreach ($vacaciones as $row9) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Vacaciones recreativas</label>
                        <div class='controls input-group'>
                        <input value='".$row9["vacaciones"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }
                foreach ($encupadres as $row10) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Encuentro de Padres</label>
                        <div class='controls input-group'>
                        <input value='".$row10["padres"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }
                foreach ($campamento as $row11) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Salida a Campamentos</label>
                        <div class='controls input-group'>
                        <input value='".$row11["Campamento"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }
                foreach ($muestra as $row12) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Muestra</label>
                        <div class='controls input-group'>
                        <input value='".$row12["Muestra"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }
                foreach ($cierre as $row13) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Cierre</label>
                        <div class='controls input-group'>
                        <input value='".$row13["Cierre"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }
                foreach ($actividades as $row14) {
                    echo"
                        <div class='control-group'>
                        <label class='control-label' for='textinput'>Actividades Especiales</label>
                        <div class='controls input-group'>
                        <input value='".$row14["actiespe"]."' type='text' class='input-mini' disabled='true'>
                        </div>
                        <br>
                    ";
                }
                ?>
            </div>
        </div>
    </form>