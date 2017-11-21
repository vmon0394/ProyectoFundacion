<?php

class libActividades {

    private $idActividad;
    private $idServicio;
    private $nombreActividad;
    private $fecha;
    private $idValor;
    private $cadenaIdNinosActividad;
    private $asistenciaActividad;
    private $fechaLimite;
    private $hora;
    private $estado;
    private $descripcion;
    private $objetivo;
    private $logros;
    private $dificultades;
    private $recomendaciones;
    private $testimonios;
    private $alertas;
    private $isdelActividad;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idActividad = "";
        $this->idServicio = "";
        $this->nombreActividad = "";
        $this->fecha = "";
        $this->idValor = "";
        $this->cadenaIdNinosActividad = "";
        $this->asistenciaActividad = "";
        $this->fechaLimite = "";
        $this->hora = "";
        $this->estado = "";
        $this->objetivo = "";
        $this->descripcion = "";
        $this->logros = "";
        $this->dificultades = "";
        $this->recomendaciones = "";
        $this->testimonios = "";
        $this->alertas = "";
        $this->isdelActividad = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdActividad() {
        return $this->idActividad;
    }

    function getIdServicio() {
        return $this->idServicio;
    }

    function getNombreActividad() {
        return $this->nombreActividad;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdValor() {
        return $this->idValor;
    }

    function getCadenaIdNinosActividad() {
        return $this->cadenaIdNinosActividad;
    }

    function getAsistenciaActividad() {
        return $this->asistenciaActividad;
    }
    
    function getFechaLimite() {
        return $this->fechaLimite;
    }

    function getHora() {
        return $this->hora;
    }

    function getEstado() {
        return $this->estado;
    }
    
    function getDescripcion() {
        return $this->descripcion;
    }

    function getObjetivo() {
        return $this->objetivo;
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
     function getTestimonios() {
        return $this->testimonios;
    }

    function getAlertas() {
        return $this->alertas;
    }

    function getIsdelActividad() {
        return $this->isdelActividad;
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

    function setIdActividad($idActividad) {
        $this->idActividad = $idActividad;
    }

    function setIdServicio($idServicio) {
        $this->idServicio = $idServicio;
    }

    function setNombreActividad($nombreActividad) {
        $this->nombreActividad = $nombreActividad;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdValor($idValor) {
        $this->idValor = $idValor;
    }

    function setCadenaIdNinosActividad($cadenaIdNinosActividad) {
        $this->cadenaIdNinosActividad = $cadenaIdNinosActividad;
    }

    function setAsistenciaActividad($asistenciaActividad) {
        $this->asistenciaActividad = $asistenciaActividad;
    }
    
    function setFechaLimite($fechaLimite) {
        $this->fechaLimite = $fechaLimite;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
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
    function setTestimonios($testimonios) {
        $this->testimonios = $testimonios;
    }

    function setAlertas($alertas) {
        $this->alertas = $alertas;
    }

    function setIsdelActividad($isdelActividad) {
        $this->isdelactividad = $isdelActividad;
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
    function registrarActividad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

                $sql = "CALL SP_REGISTRAR_ACTIVIDAD('$this->idServicio', '$this->nombreActividad', '$this->fecha', '$this->idValor', '$this->hora', "
                . "'$this->estado', '$this->descripcion', '$this->asistenciaActividad','$this->objetivo', '$this->logros', '$this->dificultades', '$this->recomendaciones', '$this->testimonios', '$this->alertas');";
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
    


    //La función consultar recibe el parámetro enviado desde el controlador ejecutado así la sentencia, esta permite traer toda 
    //la información requerida del registro desde la base de datos y retornarla al controlador en un vector.
    function consultarActividad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_CONSULTAR_ACTIVIDAD('$this->idActividad');";
            $rs = $conexion->query($sql);
            
            if ($rs->num_rows > 0) {
            $aRow = $rs->fetch_array();
            $row = array(               
                "IdActividad" => $aRow['idActividad'],
                "IdServicio" => $aRow['idServicio'],
                "NombreActividad" => $aRow['nombreActividad'],
                "Fecha" => $aRow['fecha'],
                "IdValor" => $aRow['idValor'],
                "Hora" => $aRow['hora'],
                "Descripcion" => $aRow['descripcion'],
                "Estado" => $aRow['estado'],
                "Asistencia" => $aRow['asistenciaActividad'],
                "Objetivo" => $aRow['objetivo'],
                "Logros" => $aRow['logros'],
                "Dificultades" => $aRow['dificultades'],
                "Recomendaciones" => $aRow['recomendaciones'],
                "Testimonios" => $aRow['testimonios'],
                "Alertas" => $aRow['alertas']   
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
    function deshabilitarActividad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_ACTIVIDAD('$this->idActividad');";
            $rs = $conexion->query($sql);

            if ($rs != "") {
                
                $this->respuesta = "all";
                $this->mensaje = "Registro deshabilitado éxitosamente";
                $resp = TRUE;
                
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "Actividad no se pudo eliminar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite el actualizar el regisstro del taller, esta función recibe todos los datos enviados desde el controlador,
    //ejecutando la sentencia y actualizando la base de datos con las modificaciones realizadas al registro.
    function actualizarActividad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_ACTIVIDAD('$this->idActividad', '$this->idServicio', '$this->nombreActividad', '$this->fecha', '$this->idValor', '$this->hora', '$this->estado', '$this->descripcion', '$this->asistenciaActividad', '$this->objetivo', '$this->logros', '$this->dificultades', '$this->recomendaciones', '$this->testimonios', '$this->alertas');";     
            $rs = $conexion->query($sql);

           if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro se actualizo con éxito.";
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo actualizar por una falla en la sentencia.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }
    
//    Esta función le permite al administrador habilitar al facilitador modificar y tomar la asistencia del taller una 
    //vez la fecha límite del taller ha pasado a la fecha actual del sistema.
    function habilitarFechaLimiteActividad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "UPDATE `tbl_actividades_laboratorio` SET `fechaLimite`= '$this->fechaLimite' WHERE `idActividad` = '$this->idActividad' ";
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

}

//$x = new libTalleres();
//$x->setIdTaller("1");
//$x->consultarAsistencia();
//print_r( $x->getResult());