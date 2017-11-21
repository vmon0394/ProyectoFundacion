<?php

class libMovPadrinosFichas {

    private $id_mov_padrino_ficha;
    private $idPadrino;
    private $idFicha;
    private $isdel_mov_padrino_ficha;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->id_mov_padrino_ficha = "";
        $this->idPadrino = "";
        $this->idFicha = "";
        $this->isdel_mov_padrino_ficha = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getId_mov_padrino_ficha() {
        return $this->id_mov_padrino_ficha;
    }

    function getIdPadrino() {
        return $this->idPadrino;
    }

    function getIdFicha() {
        return $this->idFicha;
    }

    function getIsdel_mov_padrino_ficha() {
        return $this->isdel_mov_padrino_ficha;
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

    function setId_mov_padrino_ficha($id_mov_padrino_ficha) {
        $this->id_mov_padrino_ficha = $id_mov_padrino_ficha;
    }

    function setIdPadrino($idPadrino) {
        $this->idPadrino = $idPadrino;
    }

    function setIdFicha($idFicha) {
        $this->idFicha = $idFicha;
    }

    function setIsdel_mov_padrino_ficha($isdel_mov_padrino_ficha) {
        $this->isdel_mov_padrino_ficha = $isdel_mov_padrino_ficha;
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

    //Esta función permite el registro de la asignación de padrinos, antes del registro se valida que no exista una asignación 
    //igual, si no existe se hace el registro del padrino y se retorna la confirmación de la ejecución de la sentencia.
    function registrarAsignacionPadrino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_ASIGNACION_PADRINO('$this->idPadrino', '$this->idFicha');";
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

    //Esta función permite la consulta de un registro en específico trayendo todos los datos del registro, 
    //almacenándolos en un vector y retornando el mismo.
    function consultarAsignacionPadrino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_ASIGNACION_PADRINO('$this->id_mov_padrino_ficha');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "Id_mov_padrino_ficha" => $aRow['id_mov_padrino_ficha'],
                    "IdPadrino" => $aRow['idPadrino'],
                    "IdCompania" => $aRow['idCompania'],
                    "IdFicha" => $aRow['idFicha'],
                    "IdSemillero" => $aRow['idSemillero']
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
    function actualizarAsignacionPadrino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_ASIGNACION_PADRINO('$this->id_mov_padrino_ficha','$this->idPadrino', $this->idFicha);";
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
}
