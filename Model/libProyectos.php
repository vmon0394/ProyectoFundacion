<?php

class libProyectos {

    private $idProyecto;
    private $nombreProyecto;
    private $isdelProyecto;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idProyecto = "";
        $this->nombreProyecto = "";
        $this->isdelProyecto = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdProyecto() {
        return $this->idProyecto;
    }

    function getNombreProyecto() {
        return $this->nombreProyecto;
    }

    function getIsdelProyecto() {
        return $this->isdelProyecto;
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

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }

    function setNombreProyecto($nombreProyecto) {
        $this->nombreProyecto = $nombreProyecto;
    }

    function setIsdelProyecto($isdelProyecto) {
        $this->isdelProyecto = $isdelProyecto;
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

    //Esta función permite el registro de los proyecto	, antes del registro se valida que no exista un proyecto 
    //con un nombre igual, si no existe se hace el registro del proyecto y se retorna la confirmación de la 
    //ejecución de la sentencia.
    function registrarProyecto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_proyectos` WHERE nombreProyecto LIKE '%$this->nombreProyecto%'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "El proyecto que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_PROYECTO('$this->nombreProyecto', '$this->isdelProyecto');";
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

    //Esta función permite la consulta de un registro en específico trayendo todos los datos del registro, 
    //almacenándolos en un vector y retornando el mismo.
    function consultarProyecto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_PROYECTO('$this->idProyecto');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdProyecto" => $aRow['idProyecto'],
                    "NombreProyecto" => $aRow['nombreProyecto']
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

    //Esta función permite la modificación del registro consultado, esta ejecuta la sentencia el cual modifica 
    //el registro en la base de datos.
    function actualizarProyecto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_PROYECTO('$this->idProyecto', '$this->nombreProyecto');";
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

    //Esta función permite deshabilitar un registro en específico, se ejecuta la sentencia la cual modifica 
    //el estado del registro de 1 a 0.
    function deshabilitarProyecto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_PROYECTO('$this->idProyecto');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del proyecto fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El proyecto no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar un registro en específico, se ejecuta la sentencia la cual modifica 
    //el estado del registro de 0 a 1.
    function habilitarProyecto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_PROYECTO('$this->idProyecto');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del proyecto fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El proyecto no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

}
