<?php

class libTestimonios {

    private $id_testimonio;
    private $idTaller;
    private $testimonio;
    private $idEmpleado;
    private $isdel_testimonio;
    private $anoRegistro;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->id_testimonio = "";
        $this->idTaller = "";
        $this->testimonio = "";
        $this->idEmpleado = "";
        $this->isdel_testimonio = 1;
        $this->anoRegistro = "";

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getId_testimonio() {
        return $this->id_testimonio;
    }

    function getIdTaller() {
        return $this->idTaller;
    }

    function getTestimonio() {
        return $this->testimonio;
    }

    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function getIsdel_testimonio() {
        return $this->isdel_testimonio;
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

    function setId_testimonio($id_testimonio) {
        $this->id_testimonio = $id_testimonio;
    }

    function setIdTaller($idTaller) {
        $this->idTaller = $idTaller;
    }

    function setTestimonio($testimonio) {
        $this->testimonio = $testimonio;
    }

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    function setIsdel_testimonio($isdel_testimonio) {
        $this->isdel_testimonio = $isdel_testimonio;
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

    //Esta función permite el registro de los testimonios realizadas a un semillero.
    function registrarTestimonio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql2 = "SELECT idSemillero, fechaTaller, nombreTaller FROM `tbl_talleres` WHERE idTaller = '$this->idTaller' ";
            $rs2 = $conexion->query($sql2);

            $aRow = $rs2->fetch_array();
            $idSemillero = $aRow['idSemillero'];
            $fechaTaller = $aRow['fechaTaller'];
            $nombreTaller = $aRow['nombreTaller'];

            $sql = "CALL SP_REGISTRAR_TESTIMONIOS('$this->idTaller', '$fechaTaller', '$nombreTaller', '$this->testimonio', '$idSemillero', '$this->isdel_testimonio', '$this->anoRegistro');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del testimonio se realizó con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite la consulta de un testimonio es específico, ejecutando la sentencias 
    //y trayendo toda la información del registro, esta se almacena en un vector y se retorna.
    function consultarTestimonio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_TESTIMONIOS('$this->id_testimonio');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "Id_testimonio" => $aRow['id_testimonio'],
                    "IdTaller" => $aRow['idTaller'],
                    "Testimonio" => $aRow['testimonio']
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

    //Esta función permite la modificación de los datos del registro consultado, este permite modificar 
    //el testimonio descrito y la persona que la realizo.
    function actualizarTestimonio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            
            $sql2 = "SELECT idSemillero, fechaTaller, nombreTaller FROM `tbl_talleres` WHERE idTaller = '$this->idTaller' ";
            $rs2 = $conexion->query($sql2);

            $aRow = $rs2->fetch_array();
            $idSemillero = $aRow['idSemillero'];
            $fechaTaller = $aRow['fechaTaller'];
            $nombreTaller = $aRow['nombreTaller'];

            $sql = "CALL SP_MODIFICAR_TESTIMONIOS('$this->id_testimonio', '$this->idTaller', '$fechaTaller', '$nombreTaller', '$this->testimonio');";
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
