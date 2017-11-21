<?php

class libValores {

    private $id_valor;
    private $nombre_valor;
    private $isdel_valor;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->id_valor = "";
        $this->nombre_valor = "";
        $this->isdel_valor = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getId_valor() {
        return $this->id_valor;
    }

    function getNombre_valor() {
        return $this->nombre_valor;
    }

    function getIsdel_valor() {
        return $this->isdel_valor;
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

    function setId_valor($id_valor) {
        $this->id_valor = $id_valor;
    }

    function setNombre_valor($nombre_valor) {
        $this->nombre_valor = $nombre_valor;
    }

    function setIsdel_valor($isdel_valor) {
        $this->isdel_valor = $isdel_valor;
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

    //Esta función permite el registro de los valores, esta se valida que no haya un valor con el mismo nombre, 
    //si no existe un valor similar se registra la valor con éxito.
    function registrarValor() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_VALORES('$this->nombre_valor', '$this->isdel_valor');";
            $rs = $conexion->query($sql);

            if ($rs != "") {
                $dato = $rs->fetch_object();

                $this->respuesta = $dato->respuesta;
                $this->mensaje = $dato->mensaje;
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite traer todos los datos del valor seleccionada, estos datos se retornan en un vector.
    function consultarValor() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_VALOR('$this->id_valor');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "Id_valor" => $aRow['id_valor'],
                    "Nombre_valor" => $aRow['nombre_valor']
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

    //Esta función permite la modificación del nombre del valor consultada.
    function actualizarValor() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_VALOR('$this->id_valor', '$this->nombre_valor');";
            $rs = $conexion->query($sql);

            if ($rs != "") {
                $dato = $rs->fetch_object();

                $this->respuesta = $dato->respuesta;
                $this->mensaje = $dato->mensaje;
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo actualizar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite deshabilitar el valor, esta se hace modificando el estado de 1 a 0.
    function deshabilitarValor() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_VALOR('$this->id_valor');";
            $rs = $conexion->query($sql);

            if ($rs != "") {
                $dato = $rs->fetch_object();

                $this->respuesta = $dato->respuesta;
                $this->mensaje = $dato->mensaje;
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El padrino no se pudo eliminar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar el valor, esta se hace modificando el estado de 0 a 1.
    function habilitarValor() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_VALOR('$this->id_valor');";
            $rs = $conexion->query($sql);

            if ($rs != "") {
                $dato = $rs->fetch_object();

                $this->respuesta = $dato->respuesta;
                $this->mensaje = $dato->mensaje;
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El padrino no se pudo habilitar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    function contarValores() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarvalores FROM `tbl_valores` WHERE isdel_valor = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Valores Existentes: ".$numero['contarvalores']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

    function contarValoresEliminados() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarvalores FROM `tbl_valores` WHERE isdel_valor = 0";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Valores Eliminados: ".$numero['contarvalores']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

}
