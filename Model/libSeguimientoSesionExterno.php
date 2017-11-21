<?php

class libSeguimientoSesionExterno {

    private $idSeguimientoExterno;
    private $fechaSeguimientoSesion;
    private $observaciones;
    private $idHistoriaExterno;
    private $isdelSeguimientoExterno;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idSeguimientoExterno = "";
        $this->fechaSeguimientoSesion = "";
        $this->observaciones = "";
        $this->idHistoriaExterno = "";
        $this->isdelSeguimientoExterno = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdSeguimientoExterno() {
        return $this->idSeguimientoExterno;
    }

    function getFechaSeguimientoSesion() {
        return $this->fechaSeguimientoSesion;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function getIdHistoriaExterno() {
        return $this->idHistoriaExterno;
    }

    function getIsdelSeguimientoExterno() {
        return $this->isdelSeguimientoExterno;
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

    function setIdSeguimientoExterno($idSeguimientoExterno) {
        $this->idSeguimientoExterno = $idSeguimientoExterno;
    }

    function setFechaSeguimientoSesion($fechaSeguimientoSesion) {
        $this->fechaSeguimientoSesion = $fechaSeguimientoSesion;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function setIdHistoriaExterno($idHistoriaExterno) {
        $this->idHistoriaExterno = $idHistoriaExterno;
    }

    function setIsdelSeguimientoExterno($isdelSeguimientoExterno) {
        $this->isdelSeguimientoExterno = $isdelSeguimientoExterno;
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

    //Esta función permite el registro de los seguimientos realizados a una asesoría o consultoría que se le ha iniciado a una persona externa.
    function registrarSeguimientoExterno() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_SEGUIMIENTO_EXTERNO('$this->fechaSeguimientoSesion', '$this->observaciones', '$this->idHistoriaExterno', '$this->isdelSeguimientoExterno');";
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
    function consultarSeguimientoExterno() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_SEGUIMIENTO_EXTERNO('$this->idSeguimientoExterno');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdSeguimientoExterno" => $aRow['idSeguimientoExterno'],
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
    function actualizarSeguimientoExterno() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_SEGUIMIENTO_EXTERNO('$this->idSeguimientoExterno', '$this->fechaSeguimientoSesion', '$this->observaciones');";
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
