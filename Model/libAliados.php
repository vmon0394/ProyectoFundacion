<?php

class libAliados {

    private $idAliado;
    private $nit;
    private $nombreAliados;
    private $idMunicipio;
    private $contacto;
    private $telefonoAliados;
    private $celularAliados;
    private $direccionAliados;
    private $correoAliados;
    private $idProyecto;
    private $isdelAliados;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idAliado = "";
        $this->nit = "";
        $this->nombreAliados = "";
        $this->idMunicipio = "";
        $this->contacto = "";
        $this->telefonoAliados = "";
        $this->celularAliados = "";
        $this->direccionAliados = "";
        $this->correoAliados = "";
        $this->idProyecto = "";
        $this->isdelAliados = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdAliado() {
        return $this->idAliado;
    }

    function getNit() {
        return $this->nit;
    }

    function getNombreAliados() {
        return $this->nombreAliados;
    }

    function getIdMunicipio() {
        return $this->idMunicipio;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getTelefonoAliados() {
        return $this->telefonoAliados;
    }

    function getCelularAliados() {
        return $this->celularAliados;
    }

    function getDireccionAliados() {
        return $this->direccionAliados;
    }

    function getCorreoAliados() {
        return $this->correoAliados;
    }

    function getIdProyecto() {
        return $this->idProyecto;
    }

    function getIsdelAliados() {
        return $this->isdelAliados;
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

    function setIdAliado($idAliado) {
        $this->idAliado = $idAliado;
    }

    function setNit($nit) {
        $this->nit = $nit;
    }

    function setNombreAliados($nombreAliados) {
        $this->nombreAliados = $nombreAliados;
    }

    function setIdMunicipio($idMunicipio) {
        $this->idMunicipio = $idMunicipio;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setTelefonoAliados($telefonoAliados) {
        $this->telefonoAliados = $telefonoAliados;
    }

    function setCelularAliados($celularAliados) {
        $this->celularAliados = $celularAliados;
    }

    function setDireccionAliados($direccionAliados) {
        $this->direccionAliados = $direccionAliados;
    }

    function setCorreoAliados($correoAliados) {
        $this->correoAliados = $correoAliados;
    }

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }

    function setIsdelAliados($isdelAliados) {
        $this->isdelAliados = $isdelAliados;
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

    //Esta función permite el registro de los aliados al proyecto, este valida con el nit del aliado que no se encuentre registrado, 
    //si no está registrado, el sistema crea el registro de este con éxito.
    function registrarAliado() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_aliados` WHERE nit = '$this->nit'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "El aliado que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_ALIADOS('$this->nit', '$this->nombreAliados', '$this->idMunicipio', '$this->contacto', '$this->telefonoAliados', '$this->celularAliados', '$this->direccionAliados', '$this->correoAliados', '$this->idProyecto', '$this->isdelAliados');";
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

    //Esta función permite traer todos los datos de un aliado es especifico retornándolo en un vector.
    function consultarAliado() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_ALIADOS('$this->idAliado');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdAliado" => $aRow['idAliado'],
                    "Nit" => $aRow['nit'],
                    "NombreAliados" => $aRow['nombreAliados'],
                    "IdDepartamento" => $aRow['idDepartamento'],
                    "IdMunicipio" => $aRow['idMunicipio'],
                    "Contacto" => $aRow['contacto'],
                    "TelefonoAliados" => $aRow['telefonoAliados'],
                    "CelularAliados" => $aRow['celularAliados'],
                    "DireccionAliados" => $aRow['direccionAliados'],
                    "CorreoAliados" => $aRow['correoAliados'],
                    "IdProyecto" => $aRow['idProyecto']
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
    
    //Esta función permite la modificación de todos los datos de un aliado consultado.
    function actualizarAliado() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_ALIADOS('$this->idAliado', '$this->nit', '$this->nombreAliados', '$this->idMunicipio', '$this->contacto', '$this->telefonoAliados', '$this->celularAliados', '$this->direccionAliados', '$this->correoAliados', '$this->idProyecto');";
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
    
    //Esta función permite deshabilitar los aliados, esta se hace modificando el estado de 1 a 0.
    function deshabilitarAliado() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_ALIADOS('$this->idAliado');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del aliado fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El aliado no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar los aliados, esta se hace modificando el estado de 0 a 1.
    function habilitarAliado() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_ALIADOS('$this->idAliado');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del aliado fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El aliado no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }
}
