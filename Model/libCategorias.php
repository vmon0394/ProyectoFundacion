<?php

class libCategorias {

    private $idCategoria;
    private $nombreCategoria;
    private $isdelCategoria;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idCategoria = "";
        $this->nombreCategoria = "";
        $this->isdelCategoria = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    function getIsdelCategoria() {
        return $this->isdelCategoria;
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

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setNombreCategoria($nombreCategoria) {
        $this->nombreCategoria = $nombreCategoria;
    }

    function setIsdelCategoria($isdelCategoria) {
        $this->isdelCategoria = $isdelCategoria;
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

    //Esta función permite el registro de las categorías, esta se valida que no haya una categoría con el mismo nombre, 
    //si no existe un categoría similar se registra la categoría con éxito.
    function registrarCategoria() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_categorias` WHERE nombreCategoria LIKE '%$this->nombreCategoria%'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "La categoría que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_CATEGORIA('$this->nombreCategoria', '$this->isdelCategoria');";
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

    //Esta función permite traer todos los datos de la categoría seleccionada, estos datos se retornan en un vector.
    function consultarCategoria() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_CATEGORIA('$this->idCategoria');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdCategoria" => $aRow['idCategoria'],
                    "NombreCategoria" => $aRow['nombreCategoria']
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

    //Esta función permite la modificación del nombre de la categoría consultada.
    function actualizarCategoria() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_CATEGORIA('$this->idCategoria', '$this->nombreCategoria');";
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

    //Esta función permite deshabilitar las categorías, esta se hace modificando el estado de 1 a 0.
    function deshabilitarCategoria() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_CATEGORIA('$this->idCategoria');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la categoría fue deshabilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La categoría no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar las categorías, esta se hace modificando el estado de 0 a 1.
    function habilitarCategoria() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_CATEGORIA('$this->idCategoria');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la categoría fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La categoría no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

}
