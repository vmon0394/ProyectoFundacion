<?php

class libHistorialTalleres {

    private $fecha_sistema;
    private $idUsuario;
    private $contrasena;
    private $idTaller;
    private $tipoTaller;
    private $nombreTaller;
    private $fechaTaller;
    private $horaInicioTaller;
    private $horaFinTaller;
    private $idSemillero;
    private $cadenaIdNinosTaller;
    private $asistenciaTaller;
    private $tecnica;
    private $estadoTaller;
    private $fechaLimite;
    private $valorNuclear;
    private $ejeTematico;
    private $temaEspecifico;
    private $objetivo;
    private $tiempo;
    private $descripcionDeActividades;
    private $logros;
    private $dificultades;
    private $recomendaciones;
    private $ano;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->fecha_sistema = "";
        $this->idUsuario = "";
        $this->contrasena = "";
        $this->idTaller = "";
        $this->tipoTaller = "";
        $this->nombreTaller = "";
        $this->fechaTaller = "";
        $this->horaInicioTaller = "";
        $this->horaFinTaller = "";
        $this->idSemillero = "";
        $this->cadenaIdNinosTaller = "";
        $this->asistenciaTaller = "";
        $this->tecnica = "";
        $this->estadoTaller = "";
        $this->fechaLimite = "";
        $this->valorNuclear = "";
        $this->ejeTematico = "";
        $this->temaEspecifico = "";
        $this->objetivo = "";
        $this->tiempo = "";
        $this->descripcionDeActividades = "";
        $this->logros = "";
        $this->dificultades = "";
        $this->recomendaciones = "";
        $this->ano = "";

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getFecha_sistema() {
        return $this->fecha_sistema;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getIdTaller() {
        return $this->idTaller;
    }

    function getTipoTaller() {
        return $this->tipoTaller;
    }

    function getNombreTaller() {
        return $this->nombreTaller;
    }

    function getFechaTaller() {
        return $this->fechaTaller;
    }

    function getHoraInicioTaller() {
        return $this->horaInicioTaller;
    }

    function getHoraFinTaller() {
        return $this->horaFinTaller;
    }

    function getIdSemillero() {
        return $this->idSemillero;
    }

    function getCadenaIdNinosTaller() {
        return $this->cadenaIdNinosTaller;
    }

    function getAsistenciaTaller() {
        return $this->asistenciaTaller;
    }

    function getTecnica() {
        return $this->tecnica;
    }

    function getEstadoTaller() {
        return $this->estadoTaller;
    }

    function getFechaLimite() {
        return $this->fechaLimite;
    }

    function getValorNuclear() {
        return $this->valorNuclear;
    }

    function getEjeTematico() {
        return $this->ejeTematico;
    }

    function getTemaEspecifico() {
        return $this->temaEspecifico;
    }

    function getObjetivo() {
        return $this->objetivo;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function getDescripcionDeActividades() {
        return $this->descripcionDeActividades;
    }

    function getLogros() {
        return $this->logros;
    }

    function getDificultades() {
        return $this->dificultades;
    }

    function getRecomendaciones() {
        return $this->recomendaciones;
    }

    function getAno() {
        return $this->ano;
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

    function setFecha_sistema($fecha_sistema) {
        $this->fecha_sistema = $fecha_sistema;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setIdTaller($idTaller) {
        $this->idTaller = $idTaller;
    }

    function setTipoTaller($tipoTaller) {
        $this->tipoTaller = $tipoTaller;
    }

    function setNombreTaller($nombreTaller) {
        $this->nombreTaller = $nombreTaller;
    }

    function setFechaTaller($fechaTaller) {
        $this->fechaTaller = $fechaTaller;
    }

    function setHoraInicioTaller($horaInicioTaller) {
        $this->horaInicioTaller = $horaInicioTaller;
    }

    function setHoraFinTaller($horaFinTaller) {
        $this->horaFinTaller = $horaFinTaller;
    }

    function setIdSemillero($idSemillero) {
        $this->idSemillero = $idSemillero;
    }

    function setCadenaIdNinosTaller($cadenaIdNinosTaller) {
        $this->cadenaIdNinosTaller = $cadenaIdNinosTaller;
    }

    function setAsistenciaTaller($asistenciaTaller) {
        $this->asistenciaTaller = $asistenciaTaller;
    }

    function setTecnica($tecnica) {
        $this->tecnica = $tecnica;
    }

    function setEstadoTaller($estadoTaller) {
        $this->estadoTaller = $estadoTaller;
    }

    function setFechaLimite($fechaLimite) {
        $this->fechaLimite = $fechaLimite;
    }

    function setValorNuclear($valorNuclear) {
        $this->valorNuclear = $valorNuclear;
    }

    function setEjeTematico($ejeTematico) {
        $this->ejeTematico = $ejeTematico;
    }

    function setTemaEspecifico($temaEspecifico) {
        $this->temaEspecifico = $temaEspecifico;
    }

    function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }

    function setTiempo($tiempo) {
        $this->tiempo = $tiempo;
    }

    function setDescripcionDeActividades($descripcionDeActividades) {
        $this->descripcionDeActividades = $descripcionDeActividades;
    }

    function setLogros($logros) {
        $this->logros = $logros;
    }

    function setDificultades($dificultades) {
        $this->dificultades = $dificultades;
    }

    function setRecomendaciones($recomendaciones) {
        $this->recomendaciones = $recomendaciones;
    }

    function setAno($ano) {
        $this->ano = $ano;
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

    //Esta función trae todos los talleres realizado a los semilleros y los guarda en otra tabla de historial, luego de que esta información 
    //es almacenada en la tabla historial, los registros se eliminan de la tabla original.
    function registrarHistorialTaller() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_usuario` WHERE `idUsuario` = '$this->idUsuario' AND `contrasena` = '$this->contrasena' ";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $sql2 = "SELECT t.idTaller, s.nombreSemillero, t.idSemillero, t.tipoTaller, t.nombreTaller, t.fechaTaller, h.nombreHabilidad, t.valorNuclear, t.actividadInicial, t.actividadCentral, t.actividadfinal, "
                        . "t.cadenaIdNinosTaller, t.asistenciaTaller, tc.nombreTecnica, t.tiempo, t.estadoTaller, t.objetivo, t.descripcionDeActividades, t.logros, t.dificultades, t.recomendaciones, t.observacion FROM tbl_talleres t "
                        . "INNER JOIN tbl_semilleros s ON s.idSemillero = t.idSemillero INNER JOIN tbl_habilidades h ON h.idHabilidades = t.idHabilidad INNER JOIN tbl_tecnicas tc ON tc.idTecnica = t.idTecnica";
                $rs2 = $conexion->query($sql2);

                while ($datos = $rs2->fetch_object()) {

                    $rs = 0;
                    $bandera = 0;

                    while ($bandera == 0) {
                        //Se guarda talleres en la tabla historial talleres
                        $sql = "CALL SP_REGISTRAR_HISTORIAL_TALLER('$datos->tipoTaller', '$datos->nombreTaller', '$datos->nombreSemillero', '$datos->idSemillero', '$datos->fechaTaller', "
                                . "'$datos->nombreHabilidad', '$datos->valorNuclear', '$datos->actividadInicial', '$datos->actividadCentral', '$datos->actividadfinal', '$datos->cadenaIdNinosTaller', '$datos->asistenciaTaller', "
                                . "'$datos->nombreTecnica', '$datos->tiempo', '$datos->estadoTaller', '$datos->objetivo', '$datos->descripcionDeActividades', '$datos->logros', "
                                . "'$datos->dificultades', '$datos->recomendaciones', '$datos->observacion', '$this->ano');";
                        $rs = $conexion->query($sql);

                        //Se eliminar registro de la tabla talleres
                        $sql3 = "DELETE FROM `tbl_talleres` WHERE idTaller = '$datos->idTaller' ";
                        $rs3 = $conexion->query($sql3);

                        if ($rs3 > 0) {
                            $bandera = 1;
                        } else {
                            $bandera = 2;
                        }
//                        $bandera = 1;
                    }
                }

                if ($rs > 0 && $bandera == 1) {
                    $this->respuesta = "all";
                    $this->mensaje = "Se ha realizado el historial y  vaciado los talleres con éxito.";
                    $resp = TRUE;
                } else {

                    $this->respuesta = "fail";
                    $this->mensaje = "El historial no se pudo realizar por una falla en la solicitud.";
                    $resp = TRUE;
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La contraseña del usuario es incorrecta.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite visualizar toda la información de uno de los talleres que se encentra en el historial.
    function consultarHistorialTaller() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_HISTORIAL_TALLER('$this->idTaller');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdTaller" => $aRow['idTaller'],
                    "IdSemillero" => $aRow['nombreSemillero'],
                    "TipoTaller" => $aRow['tipoTaller'],
                    "NombreTaller" => $aRow['nombreTaller'],
                    "FechaTaller" => $aRow['fechaTaller'],
                    "IdHabilidad" => $aRow['habilidad'],
                    "ValorNuclear" => $aRow['valorNuclear'],
                    "ActividadInicial" => $aRow['actividadInicial'],
                    "ActividadCentral" => $aRow['actividadCentral'],
                    "Actividadfinal" => $aRow['actividadfinal'],
                    "IdTecnica" => $aRow['tecnica'],
                    "Tiempo" => $aRow['tiempo'],
                    "EstadoTaller" => $aRow['estadoTaller'],
                    "Objetivo" => $aRow['objetivo'],
                    "DescripcionDeActividades" => $aRow['descripcionDeActividades'],
                    "Logros" => $aRow['logros'],
                    "Dificultades" => $aRow['dificultades'],
                    "Recomendaciones" => $aRow['recomendaciones'],
                    "Observacion" => $aRow['observacionCancelado']
                );
                $this->link->desconectar();
                $this->result = $row;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $this->link->desconectar();
            }
        }
    }

    //Esta función permite visualizar la asistencia de los talleres que se encuentran en el historial.
    function consultarHistorialAsistencia() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $semilleto = "";
            $nombreTaller = "";
            $asistencia = "";
            $fechaLimite = "";

            $sql = "SELECT nombreTaller, cadenaIdNinosTaller, asistenciaTaller, nombreSemillero FROM `tbl_historial_talleres` WHERE idTaller = '$this->idTaller' ";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $cadenaIds = split(";", $aRow['cadenaIdNinosTaller']);
                $semilleto = $aRow['nombreSemillero'];
                $nombreTaller = $aRow['nombreTaller'];
                $asistencia = $aRow['asistenciaTaller'];

                $cont = 0;
                $tm = 0;

                $tabla .= "<tr>"
                        . "<th style='padding-right: 10px; color: #000; width:20px; text-align:center;'>N°</th>"
                        . "<th style='padding-right: 10px; color: #000; width:100px; text-align:center;'>Documeno</th>"
                        . "<th style='padding-right: 10px; color: #000; width:300px; text-align:center;'>Nombres</th>"
                        . "<th style='padding-right: 10px; color: #000; width:300px; text-align:center;'>Apellidos</th>"
                        . "<th style='padding-right: 10px; color: #000; width:100px; text-align:center;'>Asistio</th>"
                        . "<th style='padding-right: 10px; color: #000; width:100px; text-align:center;'>No Asistio</th>"
                        . "</tr>";

                for ($i = 0; $i < sizeof($cadenaIds); $i++) {

                    if ($cadenaIds[$i] != "") {

                        $tm++;

                        $cont = $i + 1;

                        $sql2 = "SELECT documento, nombres, apellidos FROM `tbl_ficha_sociofamiliar` WHERE idFicha = '$cadenaIds[$i]' ";
                        $rs2 = $conexion->query($sql2);

                        $aRow2 = $rs2->fetch_array();

                        $tabla .= "<tr>"
                                . "<td>" . $cont . "</td>"
                                . "<td>" . $aRow2['documento'] . "</td>"
                                . "<td>" . $aRow2['nombres'] . "</td>"
                                . "<td>" . $aRow2['apellidos'] . "</td>"
                                . "<td style='text-align:center;'><input type='radio' name='asistencia$i' id='asistencia-$i' value='1'></td>"
                                . "<td style='text-align:center;'><input type='radio' name='asistencia$i' id='asistencia2-$i' value='0'></td>"
                                . "</tr>";
                    }
                }

                $row = array(
                    "IdTabla" => $this->idTaller,
                    "Taller" => $nombreTaller,
                    "Tabla" => $tabla,
                    "Semillero" => $semilleto,
                    "Tamano" => $tm,
                    "Asistieron" => $asistencia
                );

                $this->link->desconectar();
                $this->result = $row;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $this->link->desconectar();
            }
        }
    }

    function actualizaEdadPermanencia() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_ficha_sociofamiliar`";
            $rs1 = $conexion->query($sql1);

            while ($datos = $rs1->fetch_object()) {

                $anoDeIngreso = $datos->anoDeIngreso;
                $anosDePermanencia = $this->fecha_sistema - $anoDeIngreso;

                $anoDeNacimiento = $datos->fechaNacimiento;
                $edad = $this->fecha_sistema - $anoDeNacimiento;

                //Tiempo de permanencia
                $anosRealSemillero = 0;

                //Años permanencia
                $anosDeshabilitados = 0;
                $fechasDeshabilitados = "";
                $fechasReingresos = "";
                $annoR = "";
                $annoD = "";

                if ($datos->fechaReingreso != "" && $datos->isdel == "1") {

                    $fechasDeshabilitados = split(";", $datos->fechaDeshabilitado);
                    $fechasReingresos = split(";", $datos->fechaReingreso);

                    for ($i = 0; $i < sizeof($fechasDeshabilitados); $i++) {

                        $annoR = "";
                        $annoD = "";

                        if ($fechasDeshabilitados[$i] != "" && $fechasReingresos[$i] != "") {

                            $annoR = split("-", $fechasReingresos[$i]);
                            $annoD = split("-", $fechasDeshabilitados[$i]);

                            $anosDeshabilitados += $annoR[2] - $annoD[2];
                        }
                    }

                    $anosRealSemillero = $anosDePermanencia - $anosDeshabilitados;
                } else {

                    $anosRealSemillero = $anosDePermanencia;
                }

                //Se actualisa la edad de cafa participante segun la fecha de necimiento y los años de permanencia en el semillero
                //segun el año de ingreso al semillero
                $sql = "CALL SP_ACTUALIZAR_EDAD_PERMANENCIA('$datos->idFicha', '$edad', '$anosRealSemillero');";
                $rs = $conexion->query($sql);
            }

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "Se ha realizado el historial y  vaciado los talleres con éxito.";
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El historial no se pudo realizar por una falla en la solicitud.";
                $resp = TRUE;
//            }
                $this->link->desconectar();
            }
        }
    }

}

//$x = new libHistorialTalleres();
//$x->setIdUsuario("2");
//$x->setContrasena("1033");
//$x->actualizaEdadPermanencia();
//echo $x->getMensaje();
