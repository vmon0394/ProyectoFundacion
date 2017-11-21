<?php

class libModificarUsuario {

    private $idUsuario;
    private $usuario;
    private $contrasena;
    private $nuevaContrasena;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idUsuario = "";
        $this->usuario = "";
        $this->contrasena = "";
        $this->nuevaContrasena = "";

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getNuevaContrasena() {
        return $this->nuevaContrasena;
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

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setNuevaContrasena($nuevaContrasena) {
        $this->nuevaContrasena = $nuevaContrasena;
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

    //Esta función permite la modificación del nombre del usuario de la persona logueada, esta valida que la persona que intenta 
    //modificar el nombre de usuario si sea la dueña de la cuenta pidiendo la contraseña y validando esta en la base de datos, 
    //si la contraseña es correcta modifica el usuario por el nuevo ingresado de lo contrario la sentencia no se ejecuta.
    function modificarUsuario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_usuario` WHERE idUsuario = '$this->idUsuario' AND contrasena = '$this->contrasena'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $sql2 = "SELECT * FROM `tbl_usuario` WHERE usuario LIKE '%$this->usuario%'";
                $rs2 = $conexion->query($sql2);

                if ($rs2->num_rows > 0) {

                    $this->respuesta = "fail";
                    $this->mensaje = "El usuario $this->usuario no se encuentra disponible, intente nuevamente con un usuario diferente.";
                    $resp = FALSE;
                } else {

                    $sql = "UPDATE `tbl_usuario` SET usuario = '$this->usuario' WHERE idUsuario = '$this->idUsuario' ";
                    $rs = $conexion->query($sql);

                    if ($rs > 0) {
                        $_SESSION["usuario"] = $this->usuario;

                        $this->respuesta = "all";
                        $this->mensaje = "El usuario fue modificado por $this->usuario exitosamente.";
                        $resp = TRUE;
                    } else {
                        $this->respuesta = "fail";
                        $this->mensaje = "El usuario no se pudo modificar por una falla en la solicitud.";
                        $resp = FALSE;
                    }
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La contraseña ingresada es incorrectos";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite la modificación de la contraseña de la persona logueada, esta valida que la persona que intenta modificar 
    //la contraseña si sea la dueña de la cuenta, pidiendo la contraseña actual y validando esta en la base de datos, si la contraseña 
    //es correcta modifica la contraseña por la nueva ingresado de lo contrario la sentencia no se ejecuta.
    function modificarContrasena() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_usuario` WHERE idUsuario = '$this->idUsuario' AND contrasena = '$this->contrasena'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $sql = "UPDATE `tbl_usuario` SET contrasena = '$this->nuevaContrasena' WHERE idUsuario = '$this->idUsuario' ";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "La contraseña fue modificada exitosamente.";
                    $resp = TRUE;
                } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "La contraseña no se pudo modificar por una falla en la solicitud.";
                    $resp = FALSE;
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La contraseña ingresada es incorrectos";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

}
