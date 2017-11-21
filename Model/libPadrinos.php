<?php

class libPadrinos {

    private $id_Padrino;
    private $documento_padrino;
    private $nombres_padrino;
    private $apellidos_padrino;
    private $telefono_padrino;
    private $celular_padrino;
    private $email_padrino;
    private $idCompania;
    private $sede;
    private $idCiudadCompania;
    private $aporte_quincenal;
    private $fecha_autorizacion;
    private $isdel_padrino;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->id_Padrino = "";
        $this->documento_padrino = "";
        $this->nombres_padrino = "";
        $this->apellidos_padrino = "";
        $this->telefono_padrino = "";
        $this->celular_padrino = "";
        $this->email_padrino = "";
        $this->idCompania = "";
        $this->sede = "";
        $this->idCiudadCompania = "";
        $this->aporte_quincenal = "";
        $this->fecha_autorizacion = "";
        $this->isdel_padrino = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getId_Padrino() {
        return $this->id_Padrino;
    }

    function getDocumento_padrino() {
        return $this->documento_padrino;
    }

    function getNombres_padrino() {
        return $this->nombres_padrino;
    }

    function getApellidos_padrino() {
        return $this->apellidos_padrino;
    }

    function getTelefono_padrino() {
        return $this->telefono_padrino;
    }

    function getCelular_padrino() {
        return $this->celular_padrino;
    }

    function getEmail_padrino() {
        return $this->email_padrino;
    }

    function getIdCompania() {
        return $this->idCompania;
    }

    function getSede() {
        return $this->sede;
    }

    function getIdCiudadCompania() {
        return $this->idCiudadCompania;
    }

    function getAporte_quincenal() {
        return $this->aporte_quincenal;
    }

    function getFecha_autorizacion() {
        return $this->fecha_autorizacion;
    }

    function getIsdel_padrino() {
        return $this->isdel_padrino;
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

    function setId_Padrino($id_Padrino) {
        $this->id_Padrino = $id_Padrino;
    }

    function setDocumento_padrino($documento_padrino) {
        $this->documento_padrino = $documento_padrino;
    }

    function setNombres_padrino($nombres_padrino) {
        $this->nombres_padrino = $nombres_padrino;
    }

    function setApellidos_padrino($apellidos_padrino) {
        $this->apellidos_padrino = $apellidos_padrino;
    }

    function setTelefono_padrino($telefono_padrino) {
        $this->telefono_padrino = $telefono_padrino;
    }

    function setCelular_padrino($celular_padrino) {
        $this->celular_padrino = $celular_padrino;
    }

    function setEmail_padrino($email_padrino) {
        $this->email_padrino = $email_padrino;
    }

    function setIdCompania($idCompania) {
        $this->idCompania = $idCompania;
    }

    function setSede($sede) {
        $this->sede = $sede;
    }

    function setIdCiudadCompania($idCiudadCompania) {
        $this->idCiudadCompania = $idCiudadCompania;
    }

    function setAporte_quincenal($aporte_quincenal) {
        $this->aporte_quincenal = $aporte_quincenal;
    }

    function setFecha_autorizacion($fecha_autorizacion) {
        $this->fecha_autorizacion = $fecha_autorizacion;
    }

    function setIsdel_padrino($isdel_padrino) {
        $this->isdel_padrino = $isdel_padrino;
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

    //Esta función permite el registro de los padrinos, antes del registro se valida que no exista el padrino 
    //con el documento, si no existe se hace el registro del padrino y se retorna la confirmación de la 
    //ejecución de la sentencia.
    function registrarPadrino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_PADRINO('$this->documento_padrino', '$this->nombres_padrino', '$this->apellidos_padrino', '$this->telefono_padrino', "
                    . "'$this->celular_padrino', '$this->email_padrino', '$this->idCompania', '$this->sede', '$this->idCiudadCompania', '$this->aporte_quincenal', '$this->fecha_autorizacion');";
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
    function consultarPadrino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_PADRINO('$this->id_Padrino');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "Id_Padrino" => $aRow['id_Padrino'],
                    "Documento_padrino" => $aRow['documento_padrino'],
                    "Nombres_padrino" => $aRow['nombres_padrino'],
                    "Apellidos_padrino" => $aRow['apellidos_padrino'],
                    "Telefono_padrino" => $aRow['telefono_padrino'],
                    "Celular_padrino" => $aRow['celular_padrino'],
                    "Email_padrino" => $aRow['email_padrino'],
                    "IdCompania" => $aRow['idCompania'],
                    "Sede" => $aRow['sede'],
                    "IdDepartamento" => $aRow['idDepartamento'],
                    "IdCiudadCompania" => $aRow['idCiudadCompania'],
                    "Aporte_quincenal" => $aRow['aporte_quincenal'],
                    "Fecha_autorizacion" => $aRow['fecha_autorizacion']
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
    function actualizarPadrino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_PADRINO('$this->id_Padrino', '$this->documento_padrino', '$this->nombres_padrino', '$this->apellidos_padrino', '$this->telefono_padrino', '$this->celular_padrino', '$this->email_padrino', '$this->idCompania', '$this->sede', '$this->idCiudadCompania', '$this->aporte_quincenal', '$this->fecha_autorizacion');";
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

    //Esta función permite deshabilitar un registro en específico, se ejecuta la sentencia la cual modifica 
    //el estado del registro de 1 a 0.
    function deshabilitarPadrino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_PADRINO('$this->id_Padrino');";
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

    //Esta función permite habilitar un registro en específico, se ejecuta la sentencia la cual modifica 
    //el estado del registro de 0 a 1.
    function habilitarPadrino() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_PADRINO('$this->id_Padrino');";
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

    function contarpadrinos() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarpadrinos FROM `tbl_padrinos` WHERE isdel_padrino = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Padrinos Existentes: ".$numero['contarpadrinos']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

    function contarpadrinoseli() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarpadrinos FROM `tbl_padrinos` WHERE isdel_padrino = 0";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Padrinos Existentes: ".$numero['contarpadrinos']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

}

//$x = new libPadrinos();
//$x->setId_Padrino("1");
//$x->setDocumento_padrino("4455");
//$x->setNombres_padrino("hugo5");
//$x->setApellidos_padrino("londoño5");
//$x->setEmail_padrino("correo5");
//$x->setPais("colombia5");
//$x->setIdCompania("5");
//$x->setIdCiudadComnia("45");
//$x->setFecha_autorizacion("hhh5");
//$x->setMonto("433466");
//$x->habilitarPadrino();
//echo $x->getMensaje();
//print_r($x->getResult());
