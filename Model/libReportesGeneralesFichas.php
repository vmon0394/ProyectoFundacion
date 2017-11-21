<?php

class libReportesGeneralesFichas {

    private $idSemillero;
    private $anoRegistro;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idSemillero = "";
        $this->anoRegistro = "";

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdSemillero() {
        return $this->idSemillero;
    }

    function getAnoRegistro() {
        return $this->anoRegistro;
    }

    function getRespuesta() {
        return $this->respuesta;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getResult() {
        return $this->result;
    }

    function getLink() {
        return $this->link;
    }

    function setIdSemillero($idSemillero) {
        $this->idSemillero = $idSemillero;
    }

    function setAnoRegistro($anoRegistro) {
        $this->anoRegistro = $anoRegistro;
    }

    function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setResult($result) {
        $this->result = $result;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function reporteGeneralSemillerosNino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            //General
            $participantes = 0;
            $ninos_activos = 0;
            $ninos_inativos = 0;
            $ninos_hombres = 0;
            $ninos_mujeres = 0;
            $ninos_registroAno = 0;

            //Edad de los participantes
            $contEdades = array();
            $rangoEdades = "";

            $j = 0;
            $i = 6;
            while ($i <= 18) {
                $contEdades[$j] = 0;
                $j++;
                $i++;
            }

            //Rangos de grados escolares de los participantes
            $contGrados = array();
            $rangoGrados = "";

            $g = 0;
            $z = 1;
            while ($z <= 11) {
                $contGrados[$g] = 0;
                $g++;
                $z++;
            }

            $aceleracion = 0;
            $noEstudia = 0;

            //Tiempo de permanencia
            $fechasDeshabilitados = "";
            $fechasReingresos = "";
            $anosDeshabilitados = 0;
            $anosRealSemillero = 0;
            $contAnosPermanencia = array();
            $contMas10AnosPermanencia = 0;
            $rangoAnosPermanencia = "";

            $jp = 0;
            $ip = 0;
            while ($ip <= 10) {
                $contAnosPermanencia[$jp] = 0;
                $jp++;
                $ip++;
            }

            //Tipologías
            $ampliada = 0;
            $extensa = 0;
            $extensaAusenciaPadre = 0;
            $extensaAusenciaMadre = 0;
            $extensaSinPadres = 0;
            $monoparentalMadre = 0;
            $monoparentalPadre = 0;
            $nuclear = 0;
            $nuclearMadrastra = 0;
            $nuclearPadrastro = 0;
            $simultanea = 0;

            //Desplazados
            $numeroDesplazados = 0;
            $desplazadosConRegistro = 0;
            $desplazadosSinRegistro = 0;

            //Víctimas
            $numeroVictimas = 0;
            $victimasConRegistro = 0;
            $victimasSinRegistro = 0;

            //Etnias
            $afrodescendiente = 0;
            $mestizos = 0;
            $indigena = 0;

            //Discapacidad
            $numeroConDiscapacidad = 0;
            $cognitiva = 0;
            $fisica = 0;
            $sensorial = 0;
            $psiquica = 0;

            //Familiares empresa
            $familiaresEmpresa = 0;
            $contratista = 0;
            $directa = 0;

            //Compañia
            $industrialCC = 0;
            $constructoraCC = 0;

            //Participa en otros servicios
            $otrosSemilleros = 0;
            $otrosServicios = 0;

            //Consulta general de los datos de los niños.
            $sql = "SELECT f.isdel, f.sexo, f.anoRegistro, f.edad, f.grado, f.fechaReingreso, f.fechaDeshabilitado, f.anosDePermanencia, f.tipologiaFamiliar, 
                    f.desplazado, f.registro, f.etnia, f.discapacidad, f.observacionDiscapacidad, f.familiaresEmpresa, f.compania, f.tipoVinculacion, 
                    f.victima, f.registro_victima, f.participa_otro_semillero, f.participa_servicios 
                    FROM tbl_ficha_sociofamiliar f INNER JOIN tbl_semilleros s ON s.idSemillero = f.idSemillero WHERE s.idCategoria < '10' AND anoDeIngreso ";
            $rs = $conexion->query($sql);
            $participantes = $rs->num_rows;

            while ($aRow = $rs->fetch_array()) {

                //General
                if ($aRow['isdel'] == "1") {
                    $ninos_activos++;
                } else if ($aRow['isdel'] == "0") {
                    $ninos_inativos++;
                }

                if ($aRow['sexo'] == "MASCULINO" && $aRow['isdel'] == "1") {
                    $ninos_hombres++;
                } else if ($aRow['sexo'] == "FEMENINO" && $aRow['isdel'] == "1") {
                    $ninos_mujeres++;
                }

                if ($aRow['anoRegistro'] == $this->anoRegistro) {
                    $ninos_registroAno++;
                }

                //Edades participantes
                $j = 0;
                $i = 6;
                while ($i <= 19) {
                    if ($aRow['edad'] == "$i" && $aRow['isdel'] == "1") {
                        $contEdades[$j] ++;
                    }
                    $j++;
                    $i++;
                }

                //Rango de grados
                $g = 0;
                $z = 1;
                while ($z <= 11) {
                    if ($aRow['grado'] == "$z" && $aRow['isdel'] == "1") {
                        $contGrados[$g] ++;
                    }
                    $g++;
                    $z++;
                }

                if ($aRow['grado'] == "ACELERACIÓN") {
                    $aceleracion++;
                } else if ($aRow['grado'] == "NO ESTUDIA") {
                    $noEstudia++;
                }

                //Años permanencia
                $anosDeshabilitados = 0;
                $fechasDeshabilitados = "";
                $fechasReingresos = "";

                if ($aRow['fechaReingreso'] != "" && $aRow['isdel'] == "1") {

                    $fechasDeshabilitados = split(";", $aRow['fechaDeshabilitado']);
                    $fechasReingresos = split(";", $aRow['fechaReingreso']);

                    for ($i = 0; $i < sizeof($fechasDeshabilitados); $i++) {

                        if ($fechasDeshabilitados[$i] != "" && $fechasReingresos[$i] != "") {

                            $anosDeshabilitados += $fechasReingresos[$i] - $fechasDeshabilitados[$i];
                        }
                    }

                    $anosRealSemillero = $aRow['anosDePermanencia'] - $anosDeshabilitados;

                    $jp = 0;
                    $ip = 0;
                    while ($ip <= 10) {
                        if ($anosRealSemillero == $ip) {
                            $contAnosPermanencia[$jp] ++;
                        }
                        $jp++;
                        $ip++;
                    }

                    if ($anosRealSemillero > 10) {
                        $contMas10AnosPermanencia++;
                    }
                } else {

                    if ($aRow['anosDePermanencia'] != "" && $aRow['isdel'] == "1") {

                        $jp = 0;
                        $ip = 0;
                        while ($ip <= 10) {
                            if ($aRow['anosDePermanencia'] == $ip) {
                                $contAnosPermanencia[$jp] ++;
                            }
                            $jp++;
                            $ip++;
                        }

                        if ($aRow['anosDePermanencia'] > 10) {
                            $contMas10AnosPermanencia++;
                        }
                    }
                }

                //Tipologías
                if ($aRow['tipologiaFamiliar'] == "AMPLIADA" && $aRow['isdel'] == "1") {
                    $ampliada++;
                } else if ($aRow['tipologiaFamiliar'] == "EXTENSA" && $aRow['isdel'] == "1") {
                    $extensa++;
                } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DEL PADRE" && $aRow['isdel'] == "1") {
                    $extensaAusenciaPadre++;
                } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DE LA MADRE" && $aRow['isdel'] == "1") {
                    $extensaAusenciaMadre++;
                } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DE LOS PADRES" && $aRow['isdel'] == "1") {
                    $extensaSinPadres++;
                } else if ($aRow['tipologiaFamiliar'] == "MONOPARENTAL-MADRE" && $aRow['isdel'] == "1") {
                    $monoparentalMadre++;
                } else if ($aRow['tipologiaFamiliar'] == "MONOPARENTAL-PADRE" && $aRow['isdel'] == "1") {
                    $monoparentalPadre++;
                } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR" && $aRow['isdel'] == "1") {
                    $nuclear++;
                } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR CON MADRASTRA" && $aRow['isdel'] == "1") {
                    $nuclearMadrastra++;
                } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR CON PADRASTRO" && $aRow['isdel'] == "1") {
                    $nuclearPadrastro++;
                } else if ($aRow['tipologiaFamiliar'] == "SIMULTANEA" && $aRow['isdel'] == "1") {
                    $simultanea++;
                }

                //Desplazados
                if ($aRow['desplazado'] == "SI" && $aRow['isdel'] == "1") {
                    $numeroDesplazados++;

                    if ($aRow['registro'] == "SI" && $aRow['isdel'] == "1") {
                        $desplazadosConRegistro++;
                    } else if ($aRow['registro'] == "NO" && $aRow['isdel'] == "1") {
                        $desplazadosSinRegistro++;
                    }
                }

                //Víctimas
                if ($aRow['victima'] == "SI" && $aRow['isdel'] == "1") {
                    $numeroVictimas++;

                    if ($aRow['registro_victima'] == "SI" && $aRow['isdel'] == "1") {
                        $victimasConRegistro++;
                    } else if ($aRow['registro_victima'] == "NO" && $aRow['isdel'] == "1") {
                        $victimasSinRegistro++;
                    }
                }

                //Etnia
                if ($aRow['etnia'] == "AFRODESCENDIENTE" && $aRow['isdel'] == "1") {
                    $afrodescendiente++;
                } else if ($aRow['etnia'] == "MESTIZO" && $aRow['isdel'] == "1") {
                    $mestizos++;
                } else if ($aRow['etnia'] == "INDÍGENA" && $aRow['isdel'] == "1") {
                    $indigena++;
                }

                //Discapacidad                
                if ($aRow['discapacidad'] == "SI" && $aRow['isdel'] == "1") {
                    $numeroConDiscapacidad++;

                    if ($aRow['observacionDiscapacidad'] == "COGNITIVA" && $aRow['isdel'] == "1") {
                        $cognitiva++;
                    } else if ($aRow['observacionDiscapacidad'] == "FÍSICA" && $aRow['isdel'] == "1") {
                        $fisica++;
                    } else if ($aRow['observacionDiscapacidad'] == "SENSORIAL" && $aRow['isdel'] == "1") {
                        $sensorial++;
                    } else if ($aRow['observacionDiscapacidad'] == "PSÍQUICA" && $aRow['isdel'] == "1") {
                        $psiquica++;
                    }
                }

                //Familiares empresa
                if ($aRow['familiaresEmpresa'] == "SI" && $aRow['isdel'] == "1") {
                    $familiaresEmpresa++;

                    if ($aRow['compania'] == "INDUSTRIAL CONCONCRETO" && $aRow['isdel'] == "1") {
                        $industrialCC++;
                    } else if ($aRow['compania'] == "CONSTRUCTORA CONCONCRETO" && $aRow['isdel'] == "1") {
                        $constructoraCC++;
                    }

                    if ($aRow['tipoVinculacion'] == "CONTRATISTA" && $aRow['isdel'] == "1") {
                        $contratista++;
                    } else if ($aRow['tipoVinculacion'] == "DIRECTA" && $aRow['isdel'] == "1") {
                        $directa++;
                    }
                }

                //Otros servicios
                if ($aRow['participa_otro_semillero'] == "SI" && $aRow['isdel'] == "1") {
                    $otrosSemilleros++;
                }

                if ($aRow['participa_servicios'] == "SI" && $aRow['isdel'] == "1") {
                    $otrosServicios++;
                }
            }

            //Edades participantes
            $j = 0;
            $i = 6;
            while ($i <= 19) {

                if ($contEdades[$j] != 0) {
                    $rangoEdades .= "<div class='control-group'>"
                            . "<label class='control-label' for='textinput'>De $i Años</label>"
                            . "<div class='controls input-group'>"
                            . "<input id='edades$j'  name='edades$j' type='text' class='input-mini' disabled='true' value='$contEdades[$j]'>"
                            . "</div>"
                            . "</div>";
                }
                $j++;
                $i++;
            }

            //Grados de los participantes
            $g = 0;
            $z = 1;
            while ($z <= 11) {

                if ($contGrados[$g] != 0) {
                    $rangoGrados .= "<div class='control-group'>"
                            . "<label class='control-label' for='textinput'> $z" . "° Grado</label>"
                            . "<div class='controls input-group'>"
                            . "<input id='grado$g'  name='grado$g' type='text' class='input-mini' disabled='true' value='$contGrados[$g]'>"
                            . "</div>"
                            . "</div>";
                }
                $g++;
                $z++;
            }

            //Años permanencia
            $jp = 0;
            $ip = 1;
            while ($ip <= 10) {

                if ($contAnosPermanencia[$jp] != 0) {
                    $rangoAnosPermanencia .= "<div class='control-group'>"
                            . "<label class='control-label' for='textinput'>De $ip Años</label>"
                            . "<div class='controls input-group'>"
                            . "<input id='anosPermanenia$jp'  name='anosPermanenia$jp' type='text' class='input-mini' disabled='true' value='$contAnosPermanencia[$jp]'>"
                            . "</div>"
                            . "</div>";
                }
                $jp++;
                $ip++;
            }

            if ($contMas10AnosPermanencia != 0) {
                //Se concatenas los que llevan mas de 10 años en los semilleros
                $rangoAnosPermanencia .= "<div class='control-group'>"
                        . "<label class='control-label' for='textinput'>Más de 10 Años</label>"
                        . "<div class='controls input-group'>"
                        . "<input id='anosPermanenia$jp'  name='anosPermanenia$jp' type='text' class='input-mini' disabled='true' value='$contMas10AnosPermanencia'>"
                        . "</div>"
                        . "</div>";
            }

            $row = array(
                "Participantes" => $participantes,
                "NinosActivos" => $ninos_activos,
                "NinosInactivos" => $ninos_inativos,
                "NinosHombres" => $ninos_hombres,
                "NinosMujeres" => $ninos_mujeres,
                "NinosRegistrosDelAno" => $ninos_registroAno,
                "RangoEdades" => $rangoEdades,
                "RangoGrados" => $rangoGrados,
                "GradoAceleracion" => $aceleracion,
                "NoEstudia" => $noEstudia,
                "RangoAnosPermanencia" => $rangoAnosPermanencia,
                "Ampliada" => $ampliada,
                "Extensa" => $extensa,
                "ExtensaAusenciaPadre" => $extensaAusenciaPadre,
                "ExtensaAusenciaMadre" => $extensaAusenciaMadre,
                "ExtensaSinPadres" => $extensaSinPadres,
                "MonoparentalMadre" => $monoparentalMadre,
                "MonoparentalPadre" => $monoparentalPadre,
                "Nuclear" => $nuclear,
                "Simultanea" => $simultanea,
                "NuclearMadrastra" => $nuclearMadrastra,
                "NuclearPadrastro" => $nuclearPadrastro,
                "Desplazados" => $numeroDesplazados,
                "DesplazadosConRegistro" => $desplazadosConRegistro,
                "DesplazadosSinRegistro" => $desplazadosSinRegistro,
                "Victimas" => $numeroVictimas,
                "VictimasConRegistro" => $victimasConRegistro,
                "VictimasSinRegistro" => $victimasSinRegistro,
                "Afrodescendiente" => $afrodescendiente,
                "Mestizo" => $mestizos,
                "Indigena" => $indigena,
                "NumeroConDiscapacidad" => $numeroConDiscapacidad,
                "Cognitiva" => $cognitiva,
                "Fisica" => $fisica,
                "Sensorial" => $sensorial,
                "Psiquica" => $psiquica,
                "FamiliaresEmpresa" => $familiaresEmpresa,
                "Contratista" => $contratista,
                "Directa" => $directa,
                "IndustrialCC" => $industrialCC,
                "ConstructoraCC" => $constructoraCC,
                "OtrosSemilleros" => $otrosSemilleros,
                "OtrosServicios" => $otrosServicios,
            );

            $this->link->desconectar();
            $this->result = $row;
            $this->respuesta = "all";
        }
    }

    function reporteGeneralPorSemillerosNino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            //General
            $participantes = 0;
            $ninos_activos = 0;
            $ninos_inativos = 0;
            $ninos_hombres = 0;
            $ninos_mujeres = 0;
            $ninos_registroAno = 0;

            //Edad de los participantes
            $contEdades = array();
            $rangoEdades = "";

            $j = 0;
            $i = 6;
            while ($i <= 18) {
                $contEdades[$j] = 0;
                $j++;
                $i++;
            }

            //Rangos de grados escolares de los participantes
            $contGrados = array();
            $rangoGrados = "";

            $g = 0;
            $z = 1;
            while ($z <= 11) {
                $contGrados[$g] = 0;
                $g++;
                $z++;
            }

            $aceleracion = 0;
            $noEstudia = 0;

            //Tiempo de permanencia
            $fechasDeshabilitados = "";
            $fechasReingresos = "";
            $anosDeshabilitados = 0;
            $anosRealSemillero = 0;
            $contAnosPermanencia = array();
            $contMas10AnosPermanencia = 0;
            $rangoAnosPermanencia = "";

            $jp = 0;
            $ip = 0;
            while ($ip <= 10) {
                $contAnosPermanencia[$jp] = 0;
                $jp++;
                $ip++;
            }

            //Tipologías
            $ampliada = 0;
            $extensa = 0;
            $extensaAusenciaPadre = 0;
            $extensaAusenciaMadre = 0;
            $extensaSinPadres = 0;
            $monoparentalMadre = 0;
            $monoparentalPadre = 0;
            $nuclear = 0;
            $nuclearMadrastra = 0;
            $nuclearPadrastro = 0;
            $simultanea = 0;

            //Desplazados
            $numeroDesplazados = 0;
            $desplazadosConRegistro = 0;
            $desplazadosSinRegistro = 0;

            //Víctimas
            $numeroVictimas = 0;
            $victimasConRegistro = 0;
            $victimasSinRegistro = 0;

            //Etnias
            $afrodescendiente = 0;
            $mestizos = 0;
            $indigena = 0;

            //Discapacidad
            $numeroConDiscapacidad = 0;
            $cognitiva = 0;
            $fisica = 0;
            $sensorial = 0;
            $psiquica = 0;

            //Familiares empresa
            $familiaresEmpresa = 0;
            $contratista = 0;
            $directa = 0;

            //Compañia
            $industrialCC = 0;
            $constructoraCC = 0;

            //Participa en otros servicios
            $otrosSemilleros = 0;
            $otrosServicios = 0;

            //Consulta general de los datos de los niños.
            $sql = "SELECT f.isdel, f.sexo, f.anoRegistro, f.edad, f.grado, f.fechaReingreso, f.fechaDeshabilitado, f.anosDePermanencia, "
                    . "f.tipologiaFamiliar, f.desplazado, f.registro, f.etnia, f.discapacidad, f.observacionDiscapacidad, f.familiaresEmpresa, "
                    . "f.compania, f.tipoVinculacion, f.victima, f.registro_victima, f.participa_otro_semillero, f.participa_servicios "
                    . "FROM tbl_ficha_sociofamiliar f INNER JOIN tbl_semilleros s ON s.idSemillero = f.idSemillero "
                    . "WHERE s.idCategoria < '10' $this->idSemillero AND anoDeIngreso ";
            $rs = $conexion->query($sql);
            $participantes = $rs->num_rows;

            if ($participantes > 0) {

                while ($aRow = $rs->fetch_array()) {

                    //General
                    if ($aRow['isdel'] == "1") {
                        $ninos_activos++;
                    } else if ($aRow['isdel'] == "0") {
                        $ninos_inativos++;
                    }

                    if ($aRow['sexo'] == "MASCULINO" && $aRow['isdel'] == "1") {
                        $ninos_hombres++;
                    } else if ($aRow['sexo'] == "FEMENINO" && $aRow['isdel'] == "1") {
                        $ninos_mujeres++;
                    }

                    //Edades participantes
                    if ($aRow['anoRegistro'] == "$this->anoRegistro") {
                        $ninos_registroAno++;
                    }

                    $j = 0;
                    $i = 6;
                    while ($i <= 18) {
                        if ($aRow['edad'] == "$i" && $aRow['isdel'] == "1") {
                            $contEdades[$j] ++;
                        }
                        $j++;
                        $i++;
                    }

                    //Rango de grados
                    $g = 0;
                    $z = 1;
                    while ($z <= 11) {
                        if ($aRow['grado'] == "$z" && $aRow['isdel'] == "1") {
                            $contGrados[$g] ++;
                        }
                        $g++;
                        $z++;
                    }

                    if ($aRow['grado'] == "ACELERACIÓN") {
                        $aceleracion++;
                    } else if ($aRow['grado'] == "NO ESTUDIA") {
                        $noEstudia++;
                    }

                    //Años permanencia
                    $anosDeshabilitados = 0;
                    $fechasDeshabilitados = "";
                    $fechasReingresos = "";

                    if ($aRow['fechaReingreso'] != "" && $aRow['isdel'] == "1") {

                        $fechasDeshabilitados = split(";", $aRow['fechaDeshabilitado']);
                        $fechasReingresos = split(";", $aRow['fechaReingreso']);

                        for ($i = 0; $i < sizeof($fechasDeshabilitados); $i++) {

                            if ($fechasDeshabilitados[$i] != "" && $fechasReingresos[$i] != "") {

                                $anosDeshabilitados += $fechasReingresos[$i] - $fechasDeshabilitados[$i];
                            }
                        }

                        $anosRealSemillero = $aRow['anosDePermanencia'] - $anosDeshabilitados;

                        $jp = 0;
                        $ip = 0;
                        while ($ip <= 10) {
                            if ($anosRealSemillero == $ip) {
                                $contAnosPermanencia[$jp] ++;
                            }
                            $jp++;
                            $ip++;
                        }
                        if ($anosRealSemillero > 10) {
                            $contMas10AnosPermanencia++;
                        }
                    } else {

                        if ($aRow['anosDePermanencia'] != "" && $aRow['isdel'] == "1") {

                            $jp = 0;
                            $ip = 0;
                            while ($ip <= 10) {
                                if ($aRow['anosDePermanencia'] == $ip) {
                                    $contAnosPermanencia[$jp] ++;
                                }
                                $jp++;
                                $ip++;
                            }
                            if ($aRow['anosDePermanencia'] > 10) {
                                $contMas10AnosPermanencia++;
                            }
                        }
                    }

                    //Tipologías
                    if ($aRow['tipologiaFamiliar'] == "AMPLIADA" && $aRow['isdel'] == "1") {
                        $ampliada++;
                    } else if ($aRow['tipologiaFamiliar'] == "EXTENSA" && $aRow['isdel'] == "1") {
                        $extensa++;
                    } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DEL PADRE" && $aRow['isdel'] == "1") {
                        $extensaAusenciaPadre++;
                    } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DE LA MADRE" && $aRow['isdel'] == "1") {
                        $extensaAusenciaMadre++;
                    } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DE LOS PADRES" && $aRow['isdel'] == "1") {
                        $extensaSinPadres++;
                    } else if ($aRow['tipologiaFamiliar'] == "MONOPARENTAL-MADRE" && $aRow['isdel'] == "1") {
                        $monoparentalMadre++;
                    } else if ($aRow['tipologiaFamiliar'] == "MONOPARENTAL-PADRE" && $aRow['isdel'] == "1") {
                        $monoparentalPadre++;
                    } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR" && $aRow['isdel'] == "1") {
                        $nuclear++;
                    } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR CON MADRASTRA" && $aRow['isdel'] == "1") {
                        $nuclearMadrastra++;
                    } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR CON PADRASTRO" && $aRow['isdel'] == "1") {
                        $nuclearPadrastro++;
                    } else if ($aRow['tipologiaFamiliar'] == "SIMULTANEA" && $aRow['isdel'] == "1") {
                        $simultanea++;
                    }

                    //Desplazados
                    if ($aRow['desplazado'] == "SI" && $aRow['isdel'] == "1") {
                        $numeroDesplazados++;

                        if ($aRow['registro'] == "SI" && $aRow['isdel'] == "1") {
                            $desplazadosConRegistro++;
                        } else if ($aRow['registro'] == "NO" && $aRow['isdel'] == "1") {
                            $desplazadosSinRegistro++;
                        }
                    }

                    //Víctimas
                    if ($aRow['victima'] == "SI" && $aRow['isdel'] == "1") {
                        $numeroVictimas++;

                        if ($aRow['registro_victima'] == "SI" && $aRow['isdel'] == "1") {
                            $victimasConRegistro++;
                        } else if ($aRow['registro_victima'] == "NO" && $aRow['isdel'] == "1") {
                            $victimasSinRegistro++;
                        }
                    }

                    //Etnia
                    if ($aRow['etnia'] == "AFRODESCENDIENTE" && $aRow['isdel'] == "1") {
                        $afrodescendiente++;
                    } else if ($aRow['etnia'] == "MESTIZO" && $aRow['isdel'] == "1") {
                        $mestizos++;
                    } else if ($aRow['etnia'] == "INDÍGENA" && $aRow['isdel'] == "1") {
                        $indigena++;
                    }

                    //Discapacidad                
                    if ($aRow['discapacidad'] == "SI" && $aRow['isdel'] == "1") {
                        $numeroConDiscapacidad++;

                        if ($aRow['observacionDiscapacidad'] == "COGNITIVA" && $aRow['isdel'] == "1") {
                            $cognitiva++;
                        } else if ($aRow['observacionDiscapacidad'] == "FÍSICA" && $aRow['isdel'] == "1") {
                            $fisica++;
                        } else if ($aRow['observacionDiscapacidad'] == "SENSORIAL" && $aRow['isdel'] == "1") {
                            $sensorial++;
                        } else if ($aRow['observacionDiscapacidad'] == "PSÍQUICA" && $aRow['isdel'] == "1") {
                            $psiquica++;
                        }
                    }

                    //Familiares empresa
                    if ($aRow['familiaresEmpresa'] == "SI" && $aRow['isdel'] == "1") {
                        $familiaresEmpresa++;

                        if ($aRow['compania'] == "INDUSTRIAL CONCONCRETO" && $aRow['isdel'] == "1") {
                            $industrialCC++;
                        } else if ($aRow['compania'] == "CONSTRUCTORA CONCONCRETO" && $aRow['isdel'] == "1") {
                            $constructoraCC++;
                        }

                        if ($aRow['tipoVinculacion'] == "CONTRATISTA" && $aRow['isdel'] == "1") {
                            $contratista++;
                        } else if ($aRow['tipoVinculacion'] == "DIRECTA" && $aRow['isdel'] == "1") {
                            $directa++;
                        }
                    }

                    //Otros servicios
                    if ($aRow['participa_otro_semillero'] == "SI" && $aRow['isdel'] == "1") {
                        $otrosSemilleros++;
                    }

                    if ($aRow['participa_servicios'] == "SI" && $aRow['isdel'] == "1") {
                        $otrosServicios++;
                    }
                }

                //Edades participantes
                $j = 0;
                $i = 6;
                while ($i <= 18) {

                    if ($contEdades[$j] != 0) {
                        $rangoEdades .= "<div class='control-group'>"
                                . "<label class='control-label' for='textinput'>De $i Años</label>"
                                . "<div class='controls input-group'>"
                                . "<input id='edades$j'  name='edades$j' type='text' class='input-mini' disabled='true' value='$contEdades[$j]'>"
                                . "</div>"
                                . "</div>";
                    }
                    $j++;
                    $i++;
                }

                //Grados de los participantes
                $g = 0;
                $z = 1;
                while ($z <= 11) {

                    if ($contGrados[$g] != 0) {
                        $rangoGrados .= "<div class='control-group'>"
                                . "<label class='control-label' for='textinput'> $z" . "° Grado</label>"
                                . "<div class='controls input-group'>"
                                . "<input id='grado$g'  name='grado$g' type='text' class='input-mini' disabled='true' value='$contGrados[$g]'>"
                                . "</div>"
                                . "</div>";
                    }
                    $g++;
                    $z++;
                }

                //Años permanencia
                $jp = 0;
                $ip = 0;
                while ($ip <= 10) {

                    if ($contAnosPermanencia[$jp] != 0) {
                        $rangoAnosPermanencia .= "<div class='control-group'>"
                                . "<label class='control-label' for='textinput'>De $ip Años</label>"
                                . "<div class='controls input-group'>"
                                . "<input id='anosPermanenia$jp'  name='anosPermanenia$jp' type='text' class='input-mini' disabled='true' value='$contAnosPermanencia[$jp]'>"
                                . "</div>"
                                . "</div>";
                    }
                    $jp++;
                    $ip++;
                }

                if ($contMas10AnosPermanencia != 0) {
                    //Se concatenas los que llevan mas de 10 años en los semilleros
                    $rangoAnosPermanencia .= "<div class='control-group'>"
                            . "<label class='control-label' for='textinput'>Más de 10 Años</label>"
                            . "<div class='controls input-group'>"
                            . "<input id='anosPermanenia$jp'  name='anosPermanenia$jp' type='text' class='input-mini' disabled='true' value='$contMas10AnosPermanencia'>"
                            . "</div>"
                            . "</div>";
                }

                 //Años registro
                $jp = 0;
                $ip = 0;
                while ($ip <= 10) {

                    if ($contAnosPermanencia[$jp] != 0) {
                        $rangoAnosPermanencia .= "<div class='control-group'>"
                                . "<label class='control-label' for='textinput'>De $ip Años</label>"
                                . "<div class='controls input-group'>"
                                . "<input id='anosPermanenia$jp'  name='anosPermanenia$jp' type='text' class='input-mini' disabled='true' value='$contAnosPermanencia[$jp]'>"
                                . "</div>"
                                . "</div>";
                    }
                    $jp++;
                    $ip++;
                }

                $row = array(
                    "Participantes" => $participantes,
                    "NinosActivos" => $ninos_activos,
                    "NinosInactivos" => $ninos_inativos,
                    "NinosHombres" => $ninos_hombres,
                    "NinosMujeres" => $ninos_mujeres,
                    "NinosRegistrosDelAno" => $ninos_registroAno,
                    "RangoEdades" => $rangoEdades,
                    "RangoGrados" => $rangoGrados,
                    "GradoAceleracion" => $aceleracion,
                    "NoEstudia" => $noEstudia,
                    "RangoAnosPermanencia" => $rangoAnosPermanencia,
                    "Ampliada" => $ampliada,
                    "Extensa" => $extensa,
                    "ExtensaAusenciaPadre" => $extensaAusenciaPadre,
                    "ExtensaAusenciaMadre" => $extensaAusenciaMadre,
                    "ExtensaSinPadres" => $extensaSinPadres,
                    "MonoparentalMadre" => $monoparentalMadre,
                    "MonoparentalPadre" => $monoparentalPadre,
                    "Nuclear" => $nuclear,
                    "Simultanea" => $simultanea,
                    "NuclearMadrastra" => $nuclearMadrastra,
                    "NuclearPadrastro" => $nuclearPadrastro,
                    "Desplazados" => $numeroDesplazados,
                    "DesplazadosConRegistro" => $desplazadosConRegistro,
                    "DesplazadosSinRegistro" => $desplazadosSinRegistro,
                    "Victimas" => $numeroVictimas,
                    "VictimasConRegistro" => $victimasConRegistro,
                    "VictimasSinRegistro" => $victimasSinRegistro,
                    "Afrodescendiente" => $afrodescendiente,
                    "Mestizo" => $mestizos,
                    "Indigena" => $indigena,
                    "NumeroConDiscapacidad" => $numeroConDiscapacidad,
                    "Cognitiva" => $cognitiva,
                    "Fisica" => $fisica,
                    "Sensorial" => $sensorial,
                    "Psiquica" => $psiquica,
                    "FamiliaresEmpresa" => $familiaresEmpresa,
                    "Contratista" => $contratista,
                    "Directa" => $directa,
                    "IndustrialCC" => $industrialCC,
                    "ConstructoraCC" => $constructoraCC,
                    "OtrosSemilleros" => $otrosSemilleros,
                    "OtrosServicios" => $otrosServicios
                );

                $this->link->desconectar();
                $this->result = $row;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El semillero no registra fichas socio familiares.";
                $resp = FALSE;
            }
        }
    }

    function reporteGeneralSemillerosAdulto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            //General
            $participantes = 0;
            $ninos_activos = 0;
            $ninos_inativos = 0;
            $ninos_hombres = 0;
            $ninos_mujeres = 0;
            $ninos_registroAno = 0;

            //Edad de los participantes
            $contEdades = array();
            $rangoEdades = "";

            $j = 0;
            $i = 19;
            while ($i <= 60) {
                $contEdades[$j] = 0;
                $j++;
                $i++;
            }

            //Tiempo de permanencia
            $fechasDeshabilitados = "";
            $fechasReingresos = "";
            $anosDeshabilitados = 0;
            $anosRealSemillero = 0;
            $contAnosPermanencia = array();
            $contMas10AnosPermanencia = 0;
            $rangoAnosPermanencia = "";

            $jp = 0;
            $ip = 0;
            while ($ip <= 10) {
                $contAnosPermanencia[$jp] = 0;
                $jp++;
                $ip++;
            }

            //Tipologías
            $ampliada = 0;
            $extensa = 0;
            $extensaAusenciaPadre = 0;
            $extensaAusenciaMadre = 0;
            $extensaSinPadres = 0;
            $monoparentalMadre = 0;
            $monoparentalPadre = 0;
            $nuclear = 0;
            $nuclearMadrastra = 0;
            $nuclearPadrastro = 0;
            $simultanea = 0;

            //Desplazados
            $numeroDesplazados = 0;
            $desplazadosConRegistro = 0;
            $desplazadosSinRegistro = 0;

            //Víctimas
            $numeroVictimas = 0;
            $victimasConRegistro = 0;
            $victimasSinRegistro = 0;

            //Etnias
            $afrodescendiente = 0;
            $mestizos = 0;
            $indigena = 0;

            //Discapacidad
            $numeroConDiscapacidad = 0;
            $cognitiva = 0;
            $fisica = 0;
            $sensorial = 0;
            $psiquica = 0;

            //Familiares empresa
            $familiaresEmpresa = 0;
            $contratista = 0;
            $directa = 0;

            //Compañia
            $industrialCC = 0;
            $constructoraCC = 0;

            //Consulta general de los datos de los niños.
            $sql = "SELECT f.isdel, f.sexo, f.anoRegistro, f.edad, f.grado, f.fechaReingreso, f.fechaDeshabilitado, f.anosDePermanencia, "
                    . "f.tipologiaFamiliar, f.desplazado, f.registro, f.etnia, f.discapacidad, f.observacionDiscapacidad, f.familiaresEmpresa, "
                    . "f.compania, f.tipoVinculacion, f.victima, f.registro_victima FROM tbl_ficha_sociofamiliar f INNER JOIN tbl_semilleros s ON s.idSemillero = f.idSemillero "
                    . "WHERE s.idCategoria >= '10' AND anoDeIngreso ";
            $rs = $conexion->query($sql);
            $participantes = $rs->num_rows;

            while ($aRow = $rs->fetch_array()) {

                //General
                if ($aRow['isdel'] == "1") {
                    $ninos_activos++;
                } else if ($aRow['isdel'] == "0") {
                    $ninos_inativos++;
                }

                if ($aRow['sexo'] == "MASCULINO" && $aRow['isdel'] == "1") {
                    $ninos_hombres++;
                } else if ($aRow['sexo'] == "FEMENINO" && $aRow['isdel'] == "1") {
                    $ninos_mujeres++;
                }

                //Edades participantes
                if ($aRow['anoRegistro'] == "$this->anoRegistro") {
                    $ninos_registroAno++;
                }

                $j = 0;
                $i = 19;
                while ($i <= 60) {
                    if ($aRow['edad'] == "$i" && $aRow['isdel'] == "1") {
                        $contEdades[$j] ++;
                    }
                    $j++;
                    $i++;
                }

                //Años permanencia
                $anosDeshabilitados = 0;
                $fechasDeshabilitados = "";
                $fechasReingresos = "";

                if ($aRow['fechaReingreso'] != "" && $aRow['isdel'] == "1") {

                    $fechasDeshabilitados = split(";", $aRow['fechaDeshabilitado']);
                    $fechasReingresos = split(";", $aRow['fechaReingreso']);

                    for ($i = 0; $i < sizeof($fechasDeshabilitados); $i++) {

                        if ($fechasDeshabilitados[$i] != "" && $fechasReingresos[$i] != "") {

                            $anosDeshabilitados += $fechasReingresos[$i] - $fechasDeshabilitados[$i];
                        }
                    }

                    $anosRealSemillero = $aRow['anosDePermanencia'] - $anosDeshabilitados;

                    $jp = 0;
                    $ip = 0;
                    while ($ip <= 10) {
                        if ($anosRealSemillero == $ip) {
                            $contAnosPermanencia[$jp] ++;
                        }
                        $jp++;
                        $ip++;
                    }
                    if ($anosRealSemillero > 10) {
                        $contMas10AnosPermanencia++;
                    }
                } else {

                    if ($aRow['anosDePermanencia'] != "" && $aRow['isdel'] == "1") {

                        $jp = 0;
                        $ip = 0;
                        while ($ip <= 10) {
                            if ($aRow['anosDePermanencia'] == $ip) {
                                $contAnosPermanencia[$jp] ++;
                            }
                            $jp++;
                            $ip++;
                        }
                        if ($aRow['anosDePermanencia'] > 10) {
                            $contMas10AnosPermanencia++;
                        }
                    }
                }

                //Tipologías
                if ($aRow['tipologiaFamiliar'] == "AMPLIADA" && $aRow['isdel'] == "1") {
                    $ampliada++;
                } else if ($aRow['tipologiaFamiliar'] == "EXTENSA" && $aRow['isdel'] == "1") {
                    $extensa++;
                } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DEL PADRE" && $aRow['isdel'] == "1") {
                    $extensaAusenciaPadre++;
                } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DE LA MADRE" && $aRow['isdel'] == "1") {
                    $extensaAusenciaMadre++;
                } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DE LOS PADRES" && $aRow['isdel'] == "1") {
                    $extensaSinPadres++;
                } else if ($aRow['tipologiaFamiliar'] == "MONOPARENTAL-MADRE" && $aRow['isdel'] == "1") {
                    $monoparentalMadre++;
                } else if ($aRow['tipologiaFamiliar'] == "MONOPARENTAL-PADRE" && $aRow['isdel'] == "1") {
                    $monoparentalPadre++;
                } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR" && $aRow['isdel'] == "1") {
                    $nuclear++;
                } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR CON MADRASTRA" && $aRow['isdel'] == "1") {
                    $nuclearMadrastra++;
                } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR CON PADRASTRO" && $aRow['isdel'] == "1") {
                    $nuclearPadrastro++;
                } else if ($aRow['tipologiaFamiliar'] == "SIMULTANEA" && $aRow['isdel'] == "1") {
                    $simultanea++;
                }

                //Desplazados
                if ($aRow['desplazado'] == "SI" && $aRow['isdel'] == "1") {
                    $numeroDesplazados++;

                    if ($aRow['registro'] == "SI" && $aRow['isdel'] == "1") {
                        $desplazadosConRegistro++;
                    } else if ($aRow['registro'] == "NO" && $aRow['isdel'] == "1") {
                        $desplazadosSinRegistro++;
                    }
                }

                //Víctimas
                if ($aRow['victima'] == "SI" && $aRow['isdel'] == "1") {
                    $numeroVictimas++;

                    if ($aRow['registro_victima'] == "SI" && $aRow['isdel'] == "1") {
                        $victimasConRegistro++;
                    } else if ($aRow['registro_victima'] == "NO" && $aRow['isdel'] == "1") {
                        $victimasSinRegistro++;
                    }
                }

                //Etnia
                if ($aRow['etnia'] == "AFRODESCENDIENTE" && $aRow['isdel'] == "1") {
                    $afrodescendiente++;
                } else if ($aRow['etnia'] == "MESTIZO" && $aRow['isdel'] == "1") {
                    $mestizos++;
                } else if ($aRow['etnia'] == "INDÍGENA" && $aRow['isdel'] == "1") {
                    $indigena++;
                }

                //Discapacidad                
                if ($aRow['discapacidad'] == "SI" && $aRow['isdel'] == "1") {
                    $numeroConDiscapacidad++;

                    if ($aRow['observacionDiscapacidad'] == "COGNITIVA" && $aRow['isdel'] == "1") {
                        $cognitiva++;
                    } else if ($aRow['observacionDiscapacidad'] == "FÍSICA" && $aRow['isdel'] == "1") {
                        $fisica++;
                    } else if ($aRow['observacionDiscapacidad'] == "SENSORIAL" && $aRow['isdel'] == "1") {
                        $sensorial++;
                    } else if ($aRow['observacionDiscapacidad'] == "PSÍQUICA" && $aRow['isdel'] == "1") {
                        $psiquica++;
                    }
                }

                //Familiares empresa
                if ($aRow['familiaresEmpresa'] == "SI" && $aRow['isdel'] == "1") {
                    $familiaresEmpresa++;

                    if ($aRow['compania'] == "INDUSTRIAL CONCONCRETO" && $aRow['isdel'] == "1") {
                        $industrialCC++;
                    } else if ($aRow['compania'] == "CONSTRUCTORA CONCONCRETO" && $aRow['isdel'] == "1") {
                        $constructoraCC++;
                    }

                    if ($aRow['tipoVinculacion'] == "CONTRATISTA" && $aRow['isdel'] == "1") {
                        $contratista++;
                    } else if ($aRow['tipoVinculacion'] == "DIRECTA" && $aRow['isdel'] == "1") {
                        $directa++;
                    }
                }
            }

            //Edades participantes
            $j = 0;
            $i = 19;
            while ($i <= 60) {

                if ($contEdades[$j] != 0) {
                    $rangoEdades .= "<div class='control-group'>"
                            . "<label class='control-label' for='textinput'>De $i Años</label>"
                            . "<div class='controls input-group'>"
                            . "<input id='edades$j'  name='edades$j' type='text' class='input-mini' disabled='true' value='$contEdades[$j]'>"
                            . "</div>"
                            . "</div>";
                }
                $j++;
                $i++;
            }

            //Años permanencia
            $jp = 0;
            $ip = 0;
            while ($ip <= 10) {

                if ($contAnosPermanencia[$jp] != 0) {
                    $rangoAnosPermanencia .= "<div class='control-group'>"
                            . "<label class='control-label' for='textinput'>De $ip Años</label>"
                            . "<div class='controls input-group'>"
                            . "<input id='anosPermanenia$jp'  name='anosPermanenia$jp' type='text' class='input-mini' disabled='true' value='$contAnosPermanencia[$jp]'>"
                            . "</div>"
                            . "</div>";
                }
                $jp++;
                $ip++;
            }

            if ($contMas10AnosPermanencia != 0) {
                //Se concatenas los que llevan mas de 10 años en los semilleros
                $rangoAnosPermanencia .= "<div class='control-group'>"
                        . "<label class='control-label' for='textinput'>Más de 10 Años</label>"
                        . "<div class='controls input-group'>"
                        . "<input id='anosPermanenia$jp'  name='anosPermanenia$jp' type='text' class='input-mini' disabled='true' value='$contMas10AnosPermanencia'>"
                        . "</div>"
                        . "</div>";
            }

            $row = array(
                "Participantes" => $participantes,
                "NinosActivos" => $ninos_activos,
                "NinosInactivos" => $ninos_inativos,
                "NinosHombres" => $ninos_hombres,
                "NinosMujeres" => $ninos_mujeres,
                "NinosRegistrosDelAno" => $ninos_registroAno,
                "RangoEdades" => $rangoEdades,
                "RangoAnosPermanencia" => $rangoAnosPermanencia,
                "Ampliada" => $ampliada,
                "Extensa" => $extensa,
                "ExtensaAusenciaPadre" => $extensaAusenciaPadre,
                "ExtensaAusenciaMadre" => $extensaAusenciaMadre,
                "ExtensaSinPadres" => $extensaSinPadres,
                "MonoparentalMadre" => $monoparentalMadre,
                "MonoparentalPadre" => $monoparentalPadre,
                "Nuclear" => $nuclear,
                "Simultanea" => $simultanea,
                "NuclearMadrastra" => $nuclearMadrastra,
                "NuclearPadrastro" => $nuclearPadrastro,
                "Desplazados" => $numeroDesplazados,
                "DesplazadosConRegistro" => $desplazadosConRegistro,
                "DesplazadosSinRegistro" => $desplazadosSinRegistro,
                "Victimas" => $numeroVictimas,
                "VictimasConRegistro" => $victimasConRegistro,
                "VictimasSinRegistro" => $victimasSinRegistro,
                "Afrodescendiente" => $afrodescendiente,
                "Mestizo" => $mestizos,
                "Indigena" => $indigena,
                "NumeroConDiscapacidad" => $numeroConDiscapacidad,
                "Cognitiva" => $cognitiva,
                "Fisica" => $fisica,
                "Sensorial" => $sensorial,
                "Psiquica" => $psiquica,
                "FamiliaresEmpresa" => $familiaresEmpresa,
                "Contratista" => $contratista,
                "Directa" => $directa,
                "IndustrialCC" => $industrialCC,
                "ConstructoraCC" => $constructoraCC
            );

            $this->link->desconectar();
            $this->result = $row;
            $this->respuesta = "all";
        }
    }

    function reporteGeneralPorSemillerosAdulto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            //General
            $participantes = 0;
            $ninos_activos = 0;
            $ninos_inativos = 0;
            $ninos_hombres = 0;
            $ninos_mujeres = 0;
            $ninos_registroAno = 0;

            //Edad de los participantes
            $contEdades = array();
            $rangoEdades = "";

            $j = 0;
            $i = 19;
            while ($i <= 60) {
                $contEdades[$j] = 0;
                $j++;
                $i++;
            }

            //Tiempo de permanencia
            $fechasDeshabilitados = "";
            $fechasReingresos = "";
            $anosDeshabilitados = 0;
            $anosRealSemillero = 0;
            $contAnosPermanencia = array();
            $contMas10AnosPermanencia = 0;
            $rangoAnosPermanencia = "";

            $jp = 0;
            $ip = 0;
            while ($ip <= 10) {
                $contAnosPermanencia[$jp] = 0;
                $jp++;
                $ip++;
            }

            //Tipologías
            $ampliada = 0;
            $extensa = 0;
            $extensaAusenciaPadre = 0;
            $extensaAusenciaMadre = 0;
            $extensaSinPadres = 0;
            $monoparentalMadre = 0;
            $monoparentalPadre = 0;
            $nuclear = 0;
            $nuclearMadrastra = 0;
            $nuclearPadrastro = 0;
            $simultanea = 0;

            //Desplazados
            $numeroDesplazados = 0;
            $desplazadosConRegistro = 0;
            $desplazadosSinRegistro = 0;

            //Víctimas
            $numeroVictimas = 0;
            $victimasConRegistro = 0;
            $victimasSinRegistro = 0;

            //Etnias
            $afrodescendiente = 0;
            $mestizos = 0;
            $indigena = 0;

            //Discapacidad
            $numeroConDiscapacidad = 0;
            $cognitiva = 0;
            $fisica = 0;
            $sensorial = 0;
            $psiquica = 0;

            //Familiares empresa
            $familiaresEmpresa = 0;
            $contratista = 0;
            $directa = 0;

            //Compañia
            $industrialCC = 0;
            $constructoraCC = 0;

            //Consulta general de los datos de los niños.
            $sql = "SELECT f.isdel, f.sexo, f.anoRegistro, f.edad, f.grado, f.fechaReingreso, f.fechaDeshabilitado, f.anosDePermanencia, "
                    . "f.tipologiaFamiliar, f.desplazado, f.registro, f.etnia, f.discapacidad, f.observacionDiscapacidad, f.familiaresEmpresa, "
                    . "f.compania, f.tipoVinculacion, f.victima, f.registro_victima FROM tbl_ficha_sociofamiliar f INNER JOIN tbl_semilleros s ON s.idSemillero = f.idSemillero "
                    . "WHERE s.idCategoria >= '10' $this->idSemillero AND anoDeIngreso ";
            $rs = $conexion->query($sql);
            $participantes = $rs->num_rows;

            if ($participantes > 0) {

                while ($aRow = $rs->fetch_array()) {

                    //General
                    if ($aRow['isdel'] == "1") {
                        $ninos_activos++;
                    } else if ($aRow['isdel'] == "0") {
                        $ninos_inativos++;
                    }

                    if ($aRow['sexo'] == "MASCULINO" && $aRow['isdel'] == "1") {
                        $ninos_hombres++;
                    } else if ($aRow['sexo'] == "FEMENINO" && $aRow['isdel'] == "1") {
                        $ninos_mujeres++;
                    }

                    //Edades participantes
                    if ($aRow['anoRegistro'] == "$this->anoRegistro") {
                        $ninos_registroAno++;
                    }

                    $j = 0;
                    $i = 19;
                    while ($i <= 60) {
                        if ($aRow['edad'] == "$i" && $aRow['isdel'] == "1") {
                            $contEdades[$j] ++;
                        }
                        $j++;
                        $i++;
                    }

                    //Años permanencia
                    $anosDeshabilitados = 0;
                    $fechasDeshabilitados = "";
                    $fechasReingresos = "";

                    if ($aRow['fechaReingreso'] != "" && $aRow['isdel'] == "1") {

                        $fechasDeshabilitados = split(";", $aRow['fechaDeshabilitado']);
                        $fechasReingresos = split(";", $aRow['fechaReingreso']);

                        for ($i = 0; $i < sizeof($fechasDeshabilitados); $i++) {

                            if ($fechasDeshabilitados[$i] != "" && $fechasReingresos[$i] != "") {

                                $anosDeshabilitados += $fechasReingresos[$i] - $fechasDeshabilitados[$i];
                            }
                        }

                        $anosRealSemillero = $aRow['anosDePermanencia'] - $anosDeshabilitados;

                        $jp = 0;
                        $ip = 0;
                        while ($ip <= 10) {
                            if ($anosRealSemillero == $ip) {
                                $contAnosPermanencia[$jp] ++;
                            }
                            $jp++;
                            $ip++;
                        }
                        if ($anosRealSemillero > 10) {
                            $contMas10AnosPermanencia++;
                        }
                    } else {

                        if ($aRow['anosDePermanencia'] != "" && $aRow['isdel'] == "1") {

                            $jp = 0;
                            $ip = 0;
                            while ($ip <= 10) {
                                if ($aRow['anosDePermanencia'] == $ip) {
                                    $contAnosPermanencia[$jp] ++;
                                }
                                $jp++;
                                $ip++;
                            }
                            if ($aRow['anosDePermanencia'] > 10) {
                                $contMas10AnosPermanencia++;
                            }
                        }
                    }

                    //Tipologías
                    if ($aRow['tipologiaFamiliar'] == "AMPLIADA" && $aRow['isdel'] == "1") {
                        $ampliada++;
                    } else if ($aRow['tipologiaFamiliar'] == "EXTENSA" && $aRow['isdel'] == "1") {
                        $extensa++;
                    } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DEL PADRE" && $aRow['isdel'] == "1") {
                        $extensaAusenciaPadre++;
                    } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DE LA MADRE" && $aRow['isdel'] == "1") {
                        $extensaAusenciaMadre++;
                    } else if ($aRow['tipologiaFamiliar'] == "EXTENSA CON AUSENCIA DE LOS PADRES" && $aRow['isdel'] == "1") {
                        $extensaSinPadres++;
                    } else if ($aRow['tipologiaFamiliar'] == "MONOPARENTAL-MADRE" && $aRow['isdel'] == "1") {
                        $monoparentalMadre++;
                    } else if ($aRow['tipologiaFamiliar'] == "MONOPARENTAL-PADRE" && $aRow['isdel'] == "1") {
                        $monoparentalPadre++;
                    } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR" && $aRow['isdel'] == "1") {
                        $nuclear++;
                    } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR CON MADRASTRA" && $aRow['isdel'] == "1") {
                        $nuclearMadrastra++;
                    } else if ($aRow['tipologiaFamiliar'] == "NUCLEAR CON PADRASTRO" && $aRow['isdel'] == "1") {
                        $nuclearPadrastro++;
                    } else if ($aRow['tipologiaFamiliar'] == "SIMULTANEA" && $aRow['isdel'] == "1") {
                        $simultanea++;
                    }

                    //Desplazados
                    if ($aRow['desplazado'] == "SI" && $aRow['isdel'] == "1") {
                        $numeroDesplazados++;

                        if ($aRow['registro'] == "SI" && $aRow['isdel'] == "1") {
                            $desplazadosConRegistro++;
                        } else if ($aRow['registro'] == "NO" && $aRow['isdel'] == "1") {
                            $desplazadosSinRegistro++;
                        }
                    }

                    //Víctimas
                    if ($aRow['victima'] == "SI" && $aRow['isdel'] == "1") {
                        $numeroVictimas++;

                        if ($aRow['registro_victima'] == "SI" && $aRow['isdel'] == "1") {
                            $victimasConRegistro++;
                        } else if ($aRow['registro_victima'] == "NO" && $aRow['isdel'] == "1") {
                            $victimasSinRegistro++;
                        }
                    }

                    //Etnia
                    if ($aRow['etnia'] == "AFRODESCENDIENTE" && $aRow['isdel'] == "1") {
                        $afrodescendiente++;
                    } else if ($aRow['etnia'] == "MESTIZO" && $aRow['isdel'] == "1") {
                        $mestizos++;
                    } else if ($aRow['etnia'] == "INDÍGENA" && $aRow['isdel'] == "1") {
                        $indigena++;
                    }

                    //Discapacidad                
                    if ($aRow['discapacidad'] == "SI" && $aRow['isdel'] == "1") {
                        $numeroConDiscapacidad++;

                        if ($aRow['observacionDiscapacidad'] == "COGNITIVA" && $aRow['isdel'] == "1") {
                            $cognitiva++;
                        } else if ($aRow['observacionDiscapacidad'] == "FÍSICA" && $aRow['isdel'] == "1") {
                            $fisica++;
                        } else if ($aRow['observacionDiscapacidad'] == "SENSORIAL" && $aRow['isdel'] == "1") {
                            $sensorial++;
                        } else if ($aRow['observacionDiscapacidad'] == "PSÍQUICA" && $aRow['isdel'] == "1") {
                            $psiquica++;
                        }
                    }

                    //Familiares empresa
                    if ($aRow['familiaresEmpresa'] == "SI" && $aRow['isdel'] == "1") {
                        $familiaresEmpresa++;

                        if ($aRow['compania'] == "INDUSTRIAL CONCONCRETO" && $aRow['isdel'] == "1") {
                            $industrialCC++;
                        } else if ($aRow['compania'] == "CONSTRUCTORA CONCONCRETO" && $aRow['isdel'] == "1") {
                            $constructoraCC++;
                        }

                        if ($aRow['tipoVinculacion'] == "CONTRATISTA" && $aRow['isdel'] == "1") {
                            $contratista++;
                        } else if ($aRow['tipoVinculacion'] == "DIRECTA" && $aRow['isdel'] == "1") {
                            $directa++;
                        }
                    }
                }

                //Edades participantes
                $j = 0;
                $i = 19;
                while ($i <= 60) {

                    if ($contEdades[$j] != 0) {
                        $rangoEdades .= "<div class='control-group'>"
                                . "<label class='control-label' for='textinput'>De $i Años</label>"
                                . "<div class='controls input-group'>"
                                . "<input id='edades$j'  name='edades$j' type='text' class='input-mini' disabled='true' value='$contEdades[$j]'>"
                                . "</div>"
                                . "</div>";
                    }
                    $j++;
                    $i++;
                }

                //Años permanencia
                $jp = 0;
                $ip = 0;
                while ($ip <= 10) {

                    if ($contAnosPermanencia[$jp] != 0) {
                        $rangoAnosPermanencia .= "<div class='control-group'>"
                                . "<label class='control-label' for='textinput'>De $ip Años</label>"
                                . "<div class='controls input-group'>"
                                . "<input id='anosPermanenia$jp'  name='anosPermanenia$jp' type='text' class='input-mini' disabled='true' value='$contAnosPermanencia[$jp]'>"
                                . "</div>"
                                . "</div>";
                    }
                    $jp++;
                    $ip++;
                }

                if ($contMas10AnosPermanencia != "0") {
                    //Se concatenas los que llevan mas de 10 años en los semilleros
                    $rangoAnosPermanencia .= "<div class='control-group'>"
                            . "<label class='control-label' for='textinput'>Más de 10 Años</label>"
                            . "<div class='controls input-group'>"
                            . "<input id='anosPermanenia$jp'  name='anosPermanenia$jp' type='text' class='input-mini' disabled='true' value='$contMas10AnosPermanencia'>"
                            . "</div>"
                            . "</div>";
                }

                $row = array(
                    "Participantes" => $participantes,
                    "NinosActivos" => $ninos_activos,
                    "NinosInactivos" => $ninos_inativos,
                    "NinosHombres" => $ninos_hombres,
                    "NinosMujeres" => $ninos_mujeres,
                    "NinosRegistrosDelAno" => $ninos_registroAno,
                    "RangoEdades" => $rangoEdades,
                    "RangoAnosPermanencia" => $rangoAnosPermanencia,
                    "Ampliada" => $ampliada,
                    "Extensa" => $extensa,
                    "ExtensaAusenciaPadre" => $extensaAusenciaPadre,
                    "ExtensaAusenciaMadre" => $extensaAusenciaMadre,
                    "ExtensaSinPadres" => $extensaSinPadres,
                    "MonoparentalMadre" => $monoparentalMadre,
                    "MonoparentalPadre" => $monoparentalPadre,
                    "Nuclear" => $nuclear,
                    "Simultanea" => $simultanea,
                    "NuclearMadrastra" => $nuclearMadrastra,
                    "NuclearPadrastro" => $nuclearPadrastro,
                    "Desplazados" => $numeroDesplazados,
                    "DesplazadosConRegistro" => $desplazadosConRegistro,
                    "DesplazadosSinRegistro" => $desplazadosSinRegistro,
                    "Victimas" => $numeroVictimas,
                    "VictimasConRegistro" => $victimasConRegistro,
                    "VictimasSinRegistro" => $victimasSinRegistro,
                    "Afrodescendiente" => $afrodescendiente,
                    "Mestizo" => $mestizos,
                    "Indigena" => $indigena,
                    "NumeroConDiscapacidad" => $numeroConDiscapacidad,
                    "Cognitiva" => $cognitiva,
                    "Fisica" => $fisica,
                    "Sensorial" => $sensorial,
                    "Psiquica" => $psiquica,
                    "FamiliaresEmpresa" => $familiaresEmpresa,
                    "Contratista" => $contratista,
                    "Directa" => $directa,
                    "IndustrialCC" => $industrialCC,
                    "ConstructoraCC" => $constructoraCC
                );

                $this->link->desconectar();
                $this->result = $row;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El semillero no registra fichas socio familiares.";
                $resp = FALSE;
            }
        }
    }

}

//$x = new libReportesGeneralesFichas();
//$x->setAnoRegistro('2016');
//$x->setIdSemillero('9');
//$x->reporteGeneralPorSemillerosNino();
//print_r($x->getResult());
