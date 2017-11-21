<?php

class libInventario {

    private $idMaterial;
    private $nombreMaterial;
    private $codigo;
    private $descripcion;
    private $autor;
    private $fechaRegistro;
    private $estado;
    private $idZona;
    private $isdelMaterial;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idMaterial = "";
        $this->nombreMaterial = "";
        $this->codigo = "";
        $this->descripcion = "";
        $this->autor = "";
        $this->fechaRegistro = "";
        $this->estado = "";
        $this->idZona = "";
        $this->isdelMaterial = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdMaterial() {
        return $this->idMaterial;
    }

    function getNombreMaterial() {
        return $this->nombreMaterial;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getAutor() {
        return $this->autor;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getEstado() {
        return $this->estado;
    }

    function getIdZona() {
        return $this->idZona;
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

    function setIdMaterial($idMaterial) {
        $this->idMaterial = $idMaterial;
    }

    function setNombreMaterial($nombreMaterial) {
        $this->nombreMaterial = $nombreMaterial;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion= $descripcion;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIdZona($idZona) {
        $this->idZona = $idZona;
    }

    function setIsdelMaterial($isdelMaterial) {
        $this->isdelMaterial = $isdelMaterial;
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
    function registrarInventario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_INVENTARIO('$this->nombreMaterial', '$this->codigo', '$this->descripcion', '$this->autor', "
                    . "'$this->fechaRegistro', '$this->estado', '$this->idZona');";
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
    function consultarInventario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_INVENTARIO('$this->idMaterial');";
            $rs = $conexion->query($sql);
            if ($rs->num_rows > 0) {
                $aRow = $rs->fetch_array();
                $row = array(
                    "IdMaterial" => $aRow['idMaterial'],
                    "NombreMaterial" => $aRow['nombreMaterial'],
                    "Codigo" => $aRow['codigo'],
                    "Descripcion" => $aRow['descripcion'],
                    "Autor" => $aRow['autor'],
                    "FechaRegistro" => $aRow['fechaRegistro'],
                    "Estado" => $aRow['estado'],
                    "IdZona" => $aRow['idZona'],
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
    function actualizarInventario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_INVENTARIO('$this->idMaterial', '$this->nombreMaterial', '$this->codigo', '$this->descripcion', '$this->autor', '$this->fechaRegistro', '$this->estado', '$this->idZona');";     
            $rs = $conexion->query($sql);

           if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro se actualizo con éxito.";
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo actualizar por una falla en la sentencia.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite deshabilitar un registro en específico, se ejecuta la sentencia la cual modifica 
    //el estado del registro de 1 a 0.
    function deshabilitarInventario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_INVENTARIO('$this->idMaterial');";
            $rs = $conexion->query($sql);

            if ($rs != "") {
                $dato = $rs->fetch_object();

                $this->respuesta = $dato->respuesta;
                $this->mensaje = $dato->mensaje;
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El material no se pudo eliminar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar un registro en específico, se ejecuta la sentencia la cual modifica 
    //el estado del registro de 0 a 1.
    function habilitarInventario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_INVENTARIO('$this->idMaterial');";
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

    function contarInventarios() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarinventario FROM `tbl_inventario` WHERE isdelMaterial = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Inventarios Existentes: ".$numero['contarinventario']."</h4>";
                
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
