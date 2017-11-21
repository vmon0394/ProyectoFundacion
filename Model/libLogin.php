<?php

class libLogin {

    private $usuario;
    private $contrasena;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {
        $this->usuario = "";
        $this->contrasena = "";

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasena() {
        return $this->contrasena;
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

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
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

    //Esta función permite el logue de los usuarios al sistema, este pasa el usuario y contraseña ingresado por una función para validar 
    //los caracteres ingresado y además para hacerla un poco más segura, luego se ejecuta la sentencia para validar que el usuario si 
    //exista en el sistema y la contraseñan si coincida, si cumple con todo estos paso, se trae la información básica de la persona 
    //logueada y según el tipo de perfil se le brindan los permisos.
    public function login() {

        $resp;
        if ($this->validarUsuario()) {

            $conexion = $this->link->conectar();

            if (!$conexion) {
                $this->respuesta = "fail";
                $this->mensaje = $this->link->getError();
                $resp = false;
            } else {

                $sql1 = "SELECT * FROM `tbl_usuario` WHERE usuario = '$this->usuario' AND contrasena = '$this->contrasena'";
                $rs1 = $conexion->query($sql1);

                if ($rs1->num_rows > 0) {

                    $conexion = $this->link->conectar();

                    $sql = "CALL SP_LOGIN('$this->usuario','$this->contrasena');";
                    $rs = $conexion->query($sql);

                    if ($rs->num_rows > 0) {

                        $datos = $rs->fetch_assoc();

                        $_SESSION["idUsuario"] = $datos["idUsuario"];
                        $_SESSION["usuario"] = $datos["usuario"];
                        $_SESSION["contrasena"] = $datos["contrasena"];
                        $_SESSION["perfil"] = $datos["tipoPerfil"];
                        $_SESSION["idEmpleado"] = $datos["idEmpleado"];
                        $_SESSION["documento"] = $datos["documentoEmp"];
                        $_SESSION["nombres"] = $datos["nombresEmp"] . " " . $datos["apellidosEmp"];

                        $this->respuesta = "all";
                        $this->mensaje = $datos["tipoPerfil"];
                        $rs->close();
                        $this->link->desconectar();
                        $resp = true;
                    } else {
                        $this->respuesta = "fail";
                        $this->mensaje = "El usuario con el que intenta ingresar al sistema ha sido deshabilitado.";
                        $resp = false;
                    }
                } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "El usuario y/o contraseña son incorrectos.";
                    $resp = false;
                }
            }
        } else {
            $this->respuesta = "fail";
            $this->mensaje = "El usuario y/o contraseña son incorrectos.";
            $resp = false;
        }
    }
    
    function registrarUltimoIngreso($usuario, $fecha) {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "UPDATE `tbl_usuario` SET ultimoIngreso = '$fecha', logoutIngreso = NULL WHERE idUsuario = '$usuario'";
            $rs = $conexion->query($sql);

            $this->link->desconectar();
        }
    }

    public function validarUsuario() {
        $this->documento = $this->Hacer_Segura($this->usuario);
        $this->password = $this->Hacer_Segura($this->contrasena);
        return true;
    }

    private function Hacer_Segura($variable) {
        $variable = htmlspecialchars(stripslashes($variable));
        $variable = str_ireplace("script", "blocked", $variable);
        $variable = htmlspecialchars(stripslashes($variable));
        return $variable;
    }

}

//$x = new libLogin();
//$x->setUsuario("pistolo-hl@hotmail.com");
//$x->setContrasena("fundacion1033651232");
//$x->login();
//echo $x->getMensaje();