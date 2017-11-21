<?php

class libTalleres {

    private $idTaller;
    private $idSemillero;
    private $tipoTaller;
    private $nombreTaller;
    private $fechaTaller;
    private $idHabilidad;
    private $valorNuclear;
    private $actividadInicial;
    private $actividadCentral;
    private $actividadfinal;
    private $cadenaIdNinosTaller;
    private $asistenciaTaller;
    private $idTecnica;
    private $tipoActividad;
    private $estadoTaller;
    private $fechaLimite;
    private $objetivo;
    private $descripcionDeActividades;
    private $logros;
    private $dificultades;
    private $recomendaciones;
    private $observacion;
    private $isdelTaller;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idTaller = "";
        $this->idSemillero = "";
        $this->tipoTaller = "";
        $this->nombreTaller = "";
        $this->fechaTaller = "";
        $this->idHabilidad = "";
        $this->valorNuclear = "";
        $this->actividadInicial = "";
        $this->actividadCentral = "";
        $this->actividadfinal = "";
        $this->cadenaIdNinosTaller = "";
        $this->asistenciaTaller = "";
        $this->idTecnica = "";
        $this->tipoActividad = "";
        $this->estadoTaller = "";
        $this->fechaLimite = "";
        $this->objetivo = "";
        $this->descripcionDeActividades = "";
        $this->logros = "";
        $this->dificultades = "";
        $this->recomendaciones = "";
        $this->observacion = "";
        $this->isdelTaller = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdTaller() {
        return $this->idTaller;
    }

    function getIdSemillero() {
        return $this->idSemillero;
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

    function getIdHabilidad() {
        return $this->idHabilidad;
    }

    function getValorNuclear() {
        return $this->valorNuclear;
    }

    function getActividadInicial() {
        return $this->actividadInicial;
    }

    function getActividadCentral() {
        return $this->actividadCentral;
    }

    function getActividadfinal() {
        return $this->actividadfinal;
    }

    function getCadenaIdNinosTaller() {
        return $this->cadenaIdNinosTaller;
    }

    function getAsistenciaTaller() {
        return $this->asistenciaTaller;
    }

    function getIdTecnica() {
        return $this->idTecnica;
    }

    function getTipoActividad() {
        return $this->tipoActividad;
    }

    function getEstadoTaller() {
        return $this->estadoTaller;
    }

    function getFechaLimite() {
        return $this->fechaLimite;
    }

    function getObjetivo() {
        return $this->objetivo;
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

    function getObservacion() {
        return $this->observacion;
    }

    function getIsdelTaller() {
        return $this->isdelTaller;
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

    function setIdTaller($idTaller) {
        $this->idTaller = $idTaller;
    }

    function setIdSemillero($idSemillero) {
        $this->idSemillero = $idSemillero;
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

    function setIdHabilidad($idHabilidad) {
        $this->idHabilidad = $idHabilidad;
    }

    function setValorNuclear($valorNuclear) {
        $this->valorNuclear = $valorNuclear;
    }

    function setActividadInicial($actividadInicial) {
        $this->actividadInicial = $actividadInicial;
    }

    function setActividadCentral($actividadCentral) {
        $this->actividadCentral = $actividadCentral;
    }

    function setActividadfinal($actividadfinal) {
        $this->actividadfinal = $actividadfinal;
    }

    function setCadenaIdNinosTaller($cadenaIdNinosTaller) {
        $this->cadenaIdNinosTaller = $cadenaIdNinosTaller;
    }

    function setAsistenciaTaller($asistenciaTaller) {
        $this->asistenciaTaller = $asistenciaTaller;
    }

    function setIdTecnica($idTecnica) {
        $this->idTecnica = $idTecnica;
    }

    function setTipoActividad($tipoActividad) {
        $this->tipoActividad = $tipoActividad;
    }

    function setEstadoTaller($estadoTaller) {
        $this->estadoTaller = $estadoTaller;
    }

    function setFechaLimite($fechaLimite) {
        $this->fechaLimite = $fechaLimite;
    }

    function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
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

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setIsdelTaller($isdelTaller) {
        $this->isdelTaller = $isdelTaller;
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

    //Esta función recibe la información enviada desde el controlador ejecutando la sentencia para registrar el taller, antes de ser 
    //registrado el taller se valida que no haya un taller registrado con fechas iguales y en el mismo rango de horario, una vez 
    //validado este y no hay coincidencias se crea el registro del taller.
    function registrarTaller() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_talleres` WHERE idSemillero = '$this->idSemillero' AND fechaTaller = '$this->fechaTaller' AND estadoTaller = 'Pendiente' ";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "<div style='color: red'> El semillero ya tiene taller asignado el $this->fechaTaller. </div>";
                $resp = FALSE;
            } else {

                $cadenaIdficha = "";

                //Esta sentencia me trae todos los id de los participantes del semillero al que se le está registrando el taller, 
                //estos id son almacenado en una cadena de texto separando por puntos y comas para optimizar espacio.
                $sql2 = "SELECT idFicha FROM `tbl_ficha_sociofamiliar` WHERE idSemillero = '$this->idSemillero' AND isdel = '1' ORDER BY apellidos ";
                $rs2 = $conexion->query($sql2);

                while ($datosFicha = $rs2->fetch_object()) {
                    $cadenaIdficha .= $datosFicha->idFicha . ";";
                }

                $sql = "CALL SP_REGISTRAR_TALLER('$this->idSemillero', '$this->tipoTaller', '$this->nombreTaller', '$this->fechaTaller', '$this->idHabilidad', "
                        . "'$this->valorNuclear', '$this->actividadInicial', '$this->actividadCentral', '$this->actividadfinal', '$cadenaIdficha', '$this->idTecnica', "
                        . "'$this->tipoActividad', '$this->estadoTaller', '$this->fechaLimite', '$this->objetivo', '$this->descripcionDeActividades', '$this->logros', "
                        . "'$this->dificultades', '$this->recomendaciones', '$this->observacion', '$this->isdelTaller');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El registro se realizó con éxito.";
                    $resp = TRUE;
                } else {

                    $this->respuesta = "fail";
                    $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                    $resp = FALSE;
                }
                $this->link->desconectar();
            }
        }
    }

    //La función consultar recibe el parámetro enviado desde el controlador ejecutado así la sentencia, esta permite traer toda 
    //la información requerida del registro desde la base de datos y retornarla al controlador en un vector.
    function consultarTaller() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_TALLER('$this->idTaller');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdTaller" => $aRow['idTaller'],
                    "IdSemillero" => $aRow['idSemillero'],
                    "TipoTaller" => $aRow['tipoTaller'],
                    "NombreTaller" => $aRow['nombreTaller'],
                    "FechaTaller" => $aRow['fechaTaller'],
                    "IdHabilidad" => $aRow['idHabilidad'],
                    "ValorNuclear" => $aRow['valorNuclear'],
                    "ActividadInicial" => $aRow['actividadInicial'],
                    "ActividadCentral" => $aRow['actividadCentral'],
                    "Actividadfinal" => $aRow['actividadfinal'],
                    "IdTecnica" => $aRow['idTecnica'],
                    "TipoActividad" => $aRow['tipoActividad'],
                    "EstadoTaller" => $aRow['estadoTaller'],
                    "FechaLimite" => $aRow['fechaLimite'],
                    "Objetivo" => $aRow['objetivo'],
                    "DescripcionDeActividades" => $aRow['descripcionDeActividades'],
                    "Logros" => $aRow['logros'],
                    "Dificultades" => $aRow['dificultades'],
                    "Recomendaciones" => $aRow['recomendaciones'],
                    "Observacion" => $aRow['observacion']
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

    //Esta función permite el actualizar el regisstro del taller, esta función recibe todos los datos enviados desde el controlador,
    //ejecutando la sentencia y actualizando la base de datos con las modificaciones realizadas al registro.
    function actualizarTaller() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sqlv = "SELECT * FROM `tbl_talleres` WHERE idSemillero = '$this->idSemillero' AND fechaTaller = '$this->fechaTaller' AND estadoTaller = 'Pendiente' AND idTaller <> '$this->idTaller' ";
            $rsv = $conexion->query($sqlv);

            if ($rsv->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "<div style='color: red'> El semillero ya tiene taller asignado el $this->fechaTaller. </div>";
                $resp = FALSE;
            } else {

                $asistencia = "";
                $fechaTallerConsult = "";
                $fechaLimiteConsult = "";

                $sql1 = "SELECT * FROM `tbl_talleres` WHERE idTaller = '$this->idTaller' ";
                $rs1 = $conexion->query($sql1);

                if ($datos = $rs1->fetch_object()) {
                    $asistencia = $datos->asistenciaTaller;
                    $fechaTallerConsult = $datos->fechaTaller;
                    $fechaLimiteConsult = $datos->fechaLimite;
                }

                $fechaLimite = "";

                if ($this->fechaTaller != $fechaTallerConsult) {

                    //Esta línea captura la fecha ingresada por el usuario del día que se realiza el taller, y al día de la fecha se le suman 8 días más 
                    //para asignar la fecha límite para la actualización del registro.
                    $fechaLimite = date('Y-m-d', strtotime("$this->fechaTaller + 8 day"));
                } else {
                    $fechaLimite = $fechaLimiteConsult;
                }

                if ($asistencia == "") {

                    $cadenaIdficha = "";

                    //Esta sentencia me trae todos los id de los participantes del semillero al que se le está registrando el taller, 
                    //estos id son almacenado en una cadena de texto separando por puntos y comas para optimizar espacio.
                    $sql2 = "SELECT idFicha FROM `tbl_ficha_sociofamiliar` WHERE idSemillero = '$this->idSemillero' AND isdel = '1' ORDER BY apellidos ";
                    $rs2 = $conexion->query($sql2);

                    while ($datosFicha = $rs2->fetch_object()) {
                        $cadenaIdficha .= $datosFicha->idFicha . ";";
                    }

                    $sql = "CALL SP_MODIFICAR_TALLER('$this->idTaller', '$this->idSemillero', '$this->tipoTaller', '$this->nombreTaller', '$this->fechaTaller', '$this->idHabilidad', "
                            . "'$this->valorNuclear', '$this->actividadInicial', '$this->actividadCentral', '$this->actividadfinal', '$cadenaIdficha', '$this->idTecnica', "
                            . "'$this->tipoActividad', '$this->estadoTaller', '$fechaLimite', '$this->objetivo', '$this->descripcionDeActividades', '$this->logros', "
                            . "'$this->dificultades', '$this->recomendaciones', '$this->observacion');";
                    $rs = $conexion->query($sql);

                    if ($rs > 0) {
                        $this->respuesta = "all";
                        $this->mensaje = "El registro se actualizo con éxito.";
                        $resp = TRUE;
                    } else {

                        $this->respuesta = "fail";
                        $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                        $resp = FALSE;
                    }
                } else {

                    $sql = "CALL SP_MODIFICAR_TALLER_SIN_NINOS('$this->idTaller', '$this->idSemillero', '$this->tipoTaller', '$this->nombreTaller', '$this->fechaTaller', '$this->idHabilidad', "
                            . "'$this->valorNuclear', '$this->actividadInicial', '$this->actividadCentral', '$this->actividadfinal', '$this->idTecnica', "
                            . "'$this->tipoActividad', '$this->estadoTaller', '$fechaLimite', '$this->objetivo', '$this->descripcionDeActividades', '$this->logros', "
                            . "'$this->dificultades', '$this->recomendaciones', '$this->observacion');";
                    $rs = $conexion->query($sql);

                    if ($rs > 0) {
                        $this->respuesta = "all";
                        $this->mensaje = "El registro se actualizo con éxito.";
                        $resp = TRUE;
                    } else {

                        $this->respuesta = "fail";
                        $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                        $resp = FALSE;
                    }
                }
            }
            $this->link->desconectar();
        }
    }

    //Esta función recibe el id del taller mandado del contralor, con este se ejecuta la sentencia para traer la cadena de 
    //id de los participantes y otros datos básico.
    //Una vez se obtiene la cadena de texto se le hace un explit y tener en un vector cada uno de estos id.
    //Toda la consulta de retorna al controlador en un vector.
    function consultarAsistencia() {

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

            $sql = "SELECT t.nombreTaller, t.cadenaIdNinosTaller, t.asistenciaTaller, t.fechaLimite, s.nombreSemillero FROM `tbl_talleres` t INNER JOIN tbl_semilleros s "
                    . "ON s.idSemillero = t.idSemillero WHERE t.idTaller = '$this->idTaller' ";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                //Se le hace un Split a la cadena de texto convirtiéndola en un vector.
                $cadenaIds = split(";", $aRow['cadenaIdNinosTaller']);
                $semilleto = $aRow['nombreSemillero'];
                $nombreTaller = $aRow['nombreTaller'];
                $asistencia = $aRow['asistenciaTaller'];
                $fechaLimite = $aRow['fechaLimite'];

                $cont = 0;
                $tm = 0;

                $tabla .= "<tr>"
                        . "<th style='padding-right: 10px; color: #000; width:20px; text-align:center;'>N°</th>"
                        . "<th style='padding-right: 10px; color: #000; width:100px; text-align:center;'>Documeno</th>"
                        . "<th style='padding-right: 10px; color: #000; width:200px; text-align:center;'>Nombres</th>"
                        . "<th style='padding-right: 10px; color: #000; width:200px; text-align:center;'>Apellidos</th>"
                        . "<th style='padding-right: 10px; color: #000; width:70px; text-align:center;'>Asistio</th>"
                        . "<th style='padding-right: 10px; color: #000; width:70px; text-align:center;'>No Asistio</th>"
                        . "<th style='padding-right: 10px; color: #000; width:70px; text-align:center;'>N.I</th>"
                        . "<th style='padding-right: 10px; color: #000; width:70px; text-align:center;'>Excusa</th>"
                        . "</tr>";

                //Una vez se tiene el vector con los id se ejecuta una nueva sentencia para traer los nombres de los participantes, 
                //estos se van almacenando en una variable la cual va contener la estructura de una tabla para ser enviada a la 
                //vista y mostrar el listado de asistencia en una taba.
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
                                . "<td style='text-align:center;'><input type='radio' name='asistencia$i' id='asistencia3-$i' value='N.I'></td>"
                                . "<td style='text-align:center;'><input type='radio' name='asistencia$i' id='asistencia4-$i' value='Ex'></td>"
                                . "</tr>";
                    }
                }

                $row = array(
                    "IdTabla" => $this->idTaller,
                    "Taller" => $nombreTaller,
                    "Tabla" => $tabla,
                    "Semillero" => $semilleto,
                    "Tamano" => $tm,
                    "Asistieron" => $asistencia,
                    "FechaLimite" => $fechaLimite
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

    //Esta función recibe la información del controlador, entre ellas una nueva cadena de texto separada por punto y coma 
    //que serían la toma de asistencia de los participantes al taller, por último se ejecuta la sentencia modificando el 
    //campo asistencia del taller seleccionado.
    function tomaAsistencia() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "UPDATE `tbl_talleres` SET `asistenciaTaller`= '$this->asistenciaTaller' WHERE `idTaller` = '$this->idTaller' ";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la asistencia del taller se ralizo con éxito.";
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función le permite al administrador habilitar al facilitador modificar y tomar la asistencia del taller una 
    //vez la fecha límite del taller ha pasado a la fecha actual del sistema.
    function habilitarFechaLimite() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "UPDATE `tbl_talleres` SET `fechaLimite`= '$this->fechaLimite' WHERE `idTaller` = '$this->idTaller' ";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "La fecha límite de modificación se habilito hasta el " . date("d-m-Y", strtotime($this->fechaLimite)) . " con éxito.";
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "La fecha límite no se pudo modificar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    function contarTalleres() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contartalleres FROM `tbl_talleres` WHERE isdelTaller = 1 AND idSemillero = $idSemillero";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Total Talleres: ".$numero['contartalleres']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }
}

//$x = new libTalleres();
//$x->setIdTaller("1");
//$x->consultarAsistencia();
//print_r( $x->getResult());