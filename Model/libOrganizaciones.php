<?php

class libOrganizaciones {

    private $idOrganizacion;
    private $nombreOrganizacion;
    private $direccion;
    private $contacto;
    private $cargo;
    private $telefono;
    private $celular;
    private $email;
    private $contacto2;
    private $cargo2;
    private $telefono2;
    private $celular2;
    private $email2;
    private $isdelOrganizacion;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idOrganizacion = "";
        $this->nombreOrganizacion = "";
        $this->direccion = "";
        $this->contacto = "";
        $this->cargo = "";
        $this->telefono = "";
        $this->celular = "";
        $this->email = "";
        $this->contacto2 = "";
        $this->cargo2 = "";
        $this->telefono2 = "";
        $this->celular2 = "";
        $this->email2 = "";
        $this->isdelOrganizacion = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdOrganizacion() {
        return $this->idOrganizacion;
    }

    function getNombreOrganizacion() {
        return $this->nombreOrganizacion;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEmail() {
        return $this->email;
    }

    function getContacto2() {
        return $this->contacto2;
    }

    function getCargo2() {
        return $this->cargo2;
    }

    function getTelefono2() {
        return $this->telefono2;
    }

    function getCelular2() {
        return $this->celular2;
    }

    function getEmail2() {
        return $this->email2;
    }

    function getIsdelOrganizacion() {
        return $this->isdelOrganizacion;
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

    function setIdOrganizacion($idOrganizacion) {
        $this->idOrganizacion = $idOrganizacion;
    }

    function setNombreOrganizacion($nombreOrganizacion) {
        $this->nombreOrganizacion = $nombreOrganizacion;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContacto2($contacto2) {
        $this->contacto2 = $contacto2;
    }

    function setCargo2($cargo2) {
        $this->cargo2 = $cargo2;
    }

    function setTelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    function setCelular2($celular2) {
        $this->celular2 = $celular2;
    }

    function setEmail2($email2) {
        $this->email2 = $email2;
    }


    function setIsdel($isdelOrganizacion) {
        $this->isdelOrganizacion = $isdelOrganizacion;
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

    function registrarOrganizacion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_REGISTRAR_ORGANIZACION('$this->nombreOrganizacion', '$this->direccion', '$this->contacto', '$this->cargo', '$this->telefono', '$this->celular', '$this->email', '$this->contacto2', '$this->cargo2', '$this->telefono2', '$this->celular2', '$this->email2', '$this->isdelOrganizacion');";
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

    //Esta función permite traer todos los datos de una organización es especifico retornándolo en un vector.
    function consultarOrganizacion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_ORGANIZACION('$this->idOrganizacion');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdOrganizacion" => $aRow['idOrganizacion'],
                    "NombreOrganizacion" => $aRow['nombreOrganizacion'],
                    "Direccion" => $aRow['direccion'],
                    "Contacto" => $aRow['contacto'],
                    "Cargo" => $aRow['cargo'],
                    "Telefono" => $aRow['telefono'],
                    "Celular" => $aRow['celular'],
                    "Email" => $aRow['email'],
                    "Contacto2" => $aRow['contacto2'],
                    "Cargo2" => $aRow['cargo2'],
                    "Telefono2" => $aRow['telefono2'],
                    "Celular2" => $aRow['celular2'],
                    "Email2" => $aRow['email2']
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
    
    //Esta función permite la modificación de todos los datos de una organización consultado.
    function actualizarOrganizacion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_ORGANIZACION('$this->idOrganizacion', '$this->nombreOrganizacion', '$this->direccion', '$this->contacto', '$this->cargo', '$this->telefono', '$this->celular', '$this->email', '$this->contacto2', '$this->cargo2', '$this->telefono2', '$this->celular2', '$this->email2');";
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
    
    //Esta función permite deshabilitar la organización, esta se hace modificando el estado de 1 a 0.
    function deshabilitarOrganizacion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_ORGANIZACION('$this->idOrganizacion');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la organización fue deshabilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La organización no se pudo deshabilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar la organización, esta se hace modificando el estado de 0 a 1.
    function habilitarOrganizacion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_ORGANIZACION('$this->idOrganizacion');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la organización fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La organización no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }
}
