<?php

class libSeguimientoSesion {

    private $tipoRegistro;
    private $idSeguimiento;
    private $fechaSeguimientoSesion;
    private $observaciones;
    private $idHistoria;
    private $isdelSeguimiento;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->tipoRegistro = "";
        $this->idSeguimiento = "";
        $this->fechaSeguimientoSesion = "";
        $this->observaciones = "";
        $this->idHistoria = "";
        $this->isdelSeguimiento = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getTipoRegistro() {
        return $this->tipoRegistro;
    }

    function getIdSeguimiento() {
        return $this->idSeguimiento;
    }

    function getFechaSeguimientoSesion() {
        return $this->fechaSeguimientoSesion;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function getIdHistoria() {
        return $this->idHistoria;
    }

    function getIsdelSeguimiento() {
        return $this->isdelSeguimiento;
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

    function setTipoRegistro($tipoRegistro) {
        $this->tipoRegistro = $tipoRegistro;
    }

    function setIdSeguimiento($idSeguimiento) {
        $this->idSeguimiento = $idSeguimiento;
    }

    function setFechaSeguimientoSesion($fechaSeguimientoSesion) {
        $this->fechaSeguimientoSesion = $fechaSeguimientoSesion;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function setIdHistoria($idHistoria) {
        $this->idHistoria = $idHistoria;
    }

    function setIsdelSeguimiento($isdelSeguimiento) {
        $this->isdelSeguimiento = $isdelSeguimiento;
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

    //Esta función permite el registro de los seguimientos realizados a una asesoría o consultoría que se le ha iniciado a un participante.
    function registrarSeguimiento() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_SEGUIMIENTO_PARTICIPANTE('$this->fechaSeguimientoSesion', '$this->observaciones', '$this->idHistoria', '$this->isdelSeguimiento');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del seguimiento con fecha $this->fechaSeguimientoSesion se realizó con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                $resp = TRUE;
            }
            
            $this->link->desconectar();
        }
    }

    //Esta función permite la consulta de un registro en específico, ejecutando la sentencia y trayendo toda la información del registro 
    //almacenándola en un vector, este vector es retornado al controlador.
    function consultarSeguimiento() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_SEGUIMIENTO_PARTICIPANTE('$this->idSeguimiento');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdSeguimiento" => $aRow['idSeguimiento'],
                    "FechaSeguimientoSesion" => $aRow['fechaSeguimientoSesion'],
                    "Observaciones" => $aRow['observaciones']
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

    //Esta función permite la modificación del seguimiento consultado, ese solo permite modificar la observación descrita y la fecha 
    //que se realizó el seguimiento.
    function actualizarSeguimiento() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_SEGUIMIENTO_PARTICIPANTE('$this->idSeguimiento', '$this->fechaSeguimientoSesion', '$this->observaciones');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro se actualizo con éxito.";
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

}
