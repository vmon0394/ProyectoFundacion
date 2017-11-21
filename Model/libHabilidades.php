<?php

class libHabilidades {

    private $idHabilidades;
    private $codigoHabilidad;
    private $nombreHabilidad;
    private $isdelHabilidad;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idHabilidades = "";
        $this->codigoHabilidad = "";
        $this->nombreHabilidad = "";
        $this->isdelHabilidad = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdHabilidades() {
        return $this->idHabilidades;
    }

    function getCodigoHabilidad() {
        return $this->codigoHabilidad;
    }

    function getNombreHabilidad() {
        return $this->nombreHabilidad;
    }

    function getIsdelHabilidad() {
        return $this->isdelHabilidad;
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

    function setIdHabilidades($idHabilidades) {
        $this->idHabilidades = $idHabilidades;
    }

    function setCodigoHabilidad($codigoHabilidad) {
        $this->codigoHabilidad = $codigoHabilidad;
    }

    function setNombreHabilidad($nombreHabilidad) {
        $this->nombreHabilidad = $nombreHabilidad;
    }

    function setIsdelHabilidad($isdelHabilidad) {
        $this->isdelHabilidad = $isdelHabilidad;
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

    //Esta función permite el registro de nuevas habilidades al sistema, antes de este registro se valida que no haya una habilidad igual, 
    //si no existe se realiza el registro con éxito.
    function registrarHabilidad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_habilidades` WHERE nombreHabilidad LIKE '%$this->nombreHabilidad%' OR codigoHabilidad = '$this->codigoHabilidad' ";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "La habilidad o el código de la habilidad que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_HABILIDAD('$this->codigoHabilidad', '$this->nombreHabilidad', '$this->isdelHabilidad');";
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
    
    //Esta función permite la consulta de todos los datos de una habilidad en específico retornando estos datos en un vector.
    function consultarHabilidad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_HABILIDAD('$this->idHabilidades');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdHabilidades" => $aRow['idHabilidades'],
                    "CodigoHabilidad" => $aRow['codigoHabilidad'],
                    "NombreHabilidad" => $aRow['nombreHabilidad']
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
    
    //Esta función permite la modificación de los datos de una habilidad consultado.
    function actualizarHabilidad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_HABILIDAD('$this->idHabilidades', '$this->codigoHabilidad', '$this->nombreHabilidad');";
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
    
    //Esta función permite deshabilitar las habilidades, esto se hace modificando el estado de la habilidad de 1 a 0.
    function deshabilitarHabilidad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_HABILIDAD('$this->idHabilidades');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la habilidad fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La habilidad no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite deshabilitar las habilidades, esto se hace modificando el estado de la habilidad de 0 a 1.
    function habilitarHabilidad() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_HABILIDAD('$this->idHabilidades');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la habilidad fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La habilidad no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }
}
