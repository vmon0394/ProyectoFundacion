<?php

class libIndicadores {

    private $idIndicador;
    private $codigoIndicadores;
    private $nombreIndicadores;
    private $idHabilidad;
    private $isdelIndicadores;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idIndicador = "";
        $this->codigoIndicadores = "";
        $this->nombreIndicadores = "";
        $this->idHabilidad = "";
        $this->isdelIndicadores = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdIndicador() {
        return $this->idIndicador;
    }

    function getCodigoIndicadores() {
        return $this->codigoIndicadores;
    }

    function getNombreIndicadores() {
        return $this->nombreIndicadores;
    }

    function getIdHabilidad() {
        return $this->idHabilidad;
    }

    function getIsdelIndicadores() {
        return $this->isdelIndicadores;
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

    function setIdIndicador($idIndicador) {
        $this->idIndicador = $idIndicador;
    }

    function setCodigoIndicadores($codigoIndicadores) {
        $this->codigoIndicadores = $codigoIndicadores;
    }

    function setNombreIndicadores($nombreIndicadores) {
        $this->nombreIndicadores = $nombreIndicadores;
    }

    function setIdHabilidad($idHabilidad) {
        $this->idHabilidad = $idHabilidad;
    }

    function setIsdelIndicadores($isdelIndicadores) {
        $this->isdelIndicadores = $isdelIndicadores;
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

    //Esta función permite el registro de nuevos indicadores al sistema, antes de este registro se valida que no haya un indicador igual, 
    //si no existe se realiza el registro con éxito.
    function registrarIndicador() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_indicadores` WHERE nombreIndicadores LIKE '%$this->nombreIndicadores%' OR codigoIndicadores = '$this->codigoIndicadores' ";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "El indicador o el código del indicador que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_INDICADOR('$this->codigoIndicadores', '$this->nombreIndicadores', '$this->idHabilidad', '$this->isdelIndicadores');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El registro se realizó con éxito.";
                    $resp = TRUE;
                } else {

                    $this->respuesta = "fail";
                    $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                    $resp = TRUE;
                }
                $this->link->desconectar();
            }
        }
    }

    //Esta función permite la consulta de todos los datos de un indicador en específico retornando estos datos en un vector.
    function consultarIndicador() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_INDICADOR('$this->idIndicador');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdIndicador" => $aRow['idIndicador'],
                    "CodigoIndicadores" => $aRow['codigoIndicadores'],
                    "NombreIndicadores" => $aRow['nombreIndicadores'],
                    "IdHabilidad" => $aRow['idHabilidad']
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

    //Esta función permite la modificación de los datos de un indicador consultado.
    function actualizarIndicador() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_INDICADOR('$this->idIndicador', '$this->codigoIndicadores', '$this->nombreIndicadores', '$this->idHabilidad');";
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

    //Esta función permite deshabilitar los indicadores, esto se hace modificando el estado del indicador de 1 a 0.
    function deshabilitarIndicador() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_INDICADOR('$this->idIndicador');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del indicador fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El indicador no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar los indicadores que ya han sido deshabilitados, esto se hace modificando el estado del indicador de 0 a 1.
    function habilitarIndicador() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_INDICADOR('$this->idIndicador');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del indicador fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El indicador no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

}
