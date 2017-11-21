<?php

class libObservaciones {

    private $idObservaion;
    private $fechaObservacion;
    private $tipoObservacion;
    private $observacion;
    private $idEmpleado;
    private $idFicha;
    private $isdelObservacion;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {
        $this->idObservaion = "";
        $this->fechaObservacion = "";
        $this->tipoObservacion = "";
        $this->observacion = "";
        $this->idEmpleado = "";
        $this->idFicha = "";
        $this->isdelObservacion = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdObservaion() {
        return $this->idObservaion;
    }

    function getFechaObservacion() {
        return $this->fechaObservacion;
    }

    function getTipoObservacion() {
        return $this->tipoObservacion;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function getIdFicha() {
        return $this->idFicha;
    }

    function getIsdelObservacion() {
        return $this->isdelObservacion;
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

    function setIdObservaion($idObservaion) {
        $this->idObservaion = $idObservaion;
    }

    function setFechaObservacion($fechaObservacion) {
        $this->fechaObservacion = $fechaObservacion;
    }

    function setTipoObservacion($tipoObservacion) {
        $this->tipoObservacion = $tipoObservacion;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    function setIdFicha($idFicha) {
        $this->idFicha = $idFicha;
    }

    function setIsdelObservacion($isdelObservacion) {
        $this->isdelObservacion = $isdelObservacion;
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

    //Esta función permite el registro de las observaciones realizadas a un participante.
    function registrarObservacion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_OBSERVACION('$this->fechaObservacion', '$this->tipoObservacion', '$this->observacion', '$this->idEmpleado', '$this->idFicha', '$this->isdelObservacion');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la observación se realizó con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite la consulta de una observación es específico, ejecutando la sentencias 
    //y trayendo toda la información del registro, esta se almacena en un vector y se retorna.
    function consultarObservacion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_OBSERVACION('$this->idObservaion');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdObservaion" => $aRow['idObservaion'],
                    "FechaObservacion" => $aRow['fechaObservacion'],
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

    //Esta función permite la modificación de los datos del registro consultado, 2ste permite modificar la fecha, 
    //la observación descrita y la persona que la realizo.
    function actualizarObservacion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_OBSERVACION('$this->idObservaion', '$this->fechaObservacion', '$this->observacion', '$this->idEmpleado');";
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
