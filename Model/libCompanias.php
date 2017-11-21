<?php

class libCompanias {
    
    private $id_compania;
    private $nombre_compania;
    private $isdel;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {
        
        $this->id_compania = "";
        $this->nombre_compania = "";
        $this->isdel = 1;
        
        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";
        
        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getId_compania() {
        return $this->id_compania;
    }

    function getNombre_compania() {
        return $this->nombre_compania;
    }

    function getIsdel() {
        return $this->isdel;
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

    function setId_compania($id_compania) {
        $this->id_compania = $id_compania;
    }

    function setNombre_compania($nombre_compania) {
        $this->nombre_compania = $nombre_compania;
    }

    function setIsdel($isdel) {
        $this->isdel = $isdel;
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

    //Esta función permite el registro de las compañias, antes del registro se valida que no exista una compañia 
    //con un nombre igual, si no existe se hace el registro de la compañia y se retorna la confirmación de la 
    //ejecución de la sentencia.
    function registrarCompania() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_compania_relacionadas` WHERE nombre_compania LIKE '%$this->nombre_compania%'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "La compañia que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "INSERT INTO `tbl_compania_relacionadas`(`nombre_compania`, `isdelCompania`) "
                        . "VALUES ('$this->nombre_compania', '$this->isdel')";
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
    
    //Esta función permite la consulta de un registro en específico trayendo todos los datos del registro, 
    //almacenándolos en un vector y retornando el mismo.
    function consultarCompania() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT * FROM `tbl_compania_relacionadas` WHERE id_compania = '$this->id_compania' ";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "Id_compania" => $aRow['id_compania'],
                    "Nombre_compania" => $aRow['nombre_compania']
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
    function actualizarCompania() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "UPDATE `tbl_compania_relacionadas` SET `nombre_compania`='$this->nombre_compania' WHERE `id_compania`='$this->id_compania'";
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
    function deshabilitarCompania() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "UPDATE `tbl_compania_relacionadas` SET `isdelCompania`='0' WHERE `id_compania`='$this->id_compania' ";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del proyecto fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El proyecto no se pudo eliminar por una falla en la solicitud.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar un registro en específico, se ejecuta la sentencia la cual modifica 
    //el estado del registro de 0 a 1.
    function habilitarCompania() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "UPDATE `tbl_compania_relacionadas` SET `isdelCompania`='1' WHERE `id_compania`='$this->id_compania' ";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del proyecto fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El proyecto no se pudo habilitar por una falla en la solicitud.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }
}
