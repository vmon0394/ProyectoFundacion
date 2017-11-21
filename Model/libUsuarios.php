<?php

class libUsuarios {

    private $idEmpleado;
    private $documento;
    private $nombres;
    private $apellidos;
    private $tarjetaProfecional;
    private $celularEmpleado;
    private $correoEmpleado;
    private $cargo;
    private $fechaDeIngreso;
    private $isdelEmpleado;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idEmpleado = "";
        $this->documento = "";
        $this->nombres = "";
        $this->apellidos = "";
        $this->tarjetaProfecional = "";
        $this->celularEmpleado = "";
        $this->correoEmpleado = "";
        $this->cargo = "";
        $this->fechaDeIngreso = "";
        $this->isdelEmpleado = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getTarjetaProfecional() {
        return $this->tarjetaProfecional;
    }

    function getCelularEmpleado() {
        return $this->celularEmpleado;
    }

    function getCorreoEmpleado() {
        return $this->correoEmpleado;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getFechaDeIngreso() {
        return $this->fechaDeIngreso;
    }

    function getIsdelEmpleado() {
        return $this->isdelEmpleado;
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

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setTarjetaProfecional($tarjetaProfecional) {
        $this->tarjetaProfecional = $tarjetaProfecional;
    }

    function setCelularEmpleado($celularEmpleado) {
        $this->celularEmpleado = $celularEmpleado;
    }

    function setCorreoEmpleado($correoEmpleado) {
        $this->correoEmpleado = $correoEmpleado;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setFechaDeIngreso($fechaDeIngreso) {
        $this->fechaDeIngreso = $fechaDeIngreso;
    }

    function setIsdelEmpleado($isdelEmpleado) {
        $this->isdelEmpleado = $isdelEmpleado;
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

    //Esta función permite el registro de los usuarios al sistema, esta función recibe todos los datos enviados desde el controlador,
    //inicialmente hace una validación con el documento verificando que no haya un registro existente con este documento, si el 
    //documento no esta registrado procede ha ejecutar el procedimiento almacenado para el registro.
    //Este procedimiento registra toda la información del usuario y a su vez le crea un usuario para poder acceder al sistema, 
    //una vez ejecutada todas este sentencia y el registro sea exitoso se envía un correo de texto a la dirección ingresada.
    function registrarUsuario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_personal_empleados` WHERE documentoEmp = '$this->documento'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "El usuario que intenta registrar ya existe, por favor verifique la información o consulte los usuarios existentes en el sistema.";
                $resp = FALSE;
            } else {

                $usuario = "";
                $email = "";
                $email = explode("@", $this->correoEmpleado);
                $usuario = $email[0]; // Imprime "usuario"

                $sql = "CALL SP_REGISTRAR_USUARIO('$this->documento', '$this->nombres', '$this->apellidos', '$this->tarjetaProfecional', '$this->celularEmpleado', "
                        . "'$this->correoEmpleado', '$this->cargo', '$this->fechaDeIngreso', '$usuario');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El registro del usuario $this->nombres $this->apellidos como $this->cargo se realizó con éxito.";
                    $resp = TRUE;

                    //Propiedad que se utiiliza para capturar el tiempo del sistema.
                    date_default_timezone_set('America/Bogota');

                    $email_from = "contacto@fundacionconconcreto.org";
                    $email_to = $this->correoEmpleado;
                    $email_subject = "Usuario Sistema Fundación Conconcreto";

                    $email_message = '<html><body>';
                    $email_message .= '<P><img src="http://sistema.fundacionconconcreto.org/img/fundacion_logo.png" alt="Header" /></P>';

                    $email_message .= "<h3 >Bienvenido al Sistema de la Fundación Conconcreto.</h3>";
                    $email_message .= "<h3 >Con este usuario podrá acceder al sistema y realizar las funciones como $this->cargo.</h3>";

                    $email_message .= "<h3>Su usuario y contraseña son: </h3>";
                    $email_message .= "<h3>Usuario: $usuario</h3>";
                    $email_message .= "<h3>Contraseña: fundacion$this->documento</h3>";

                    $email_message .= "<h3>Soporte.</h3>";
                    $email_message .= "<h3>Correo Electronico: contacto@fundacionconconcreto.org</h3>";
                    $email_message .= "<h3>Atentamente, Administración Fundación Conconcreto</h3>";

                    $email_message .= "</body></html>";

                    $headers = "From: " . $email_from . "\r\n" .
                            "To: " . $this->correoEmpleado . "\r\n" .
                            "CC: " . $email_from . "\r\n" .
                            "BCC: " . $email_from . "\r\n" .
                            "Reply-To: " . $email_from . "\r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-Type: text/html; charset=UTF-8\r\n" .
                            "Date: " . date("r") . "\r\n" .
                            "X-MSMail-Priority: Normal\n" .
                            "X-Mailer: php\n";

                    mail($email_to, $email_subject, $email_message, $headers);

//                    if (mail($email_to, $email_subject, $email_message, $headers)) {
//                        $this->mensaje .= " Al correo ingresado se enviara el usuario y contraseña para ingresar al sistema";
//                    } else {
//                        $this->mensaje .= "El mensaje no pudo ser enviado por un error en el servidor..";
//                    }
                } else {

                    $this->respuesta = "fail";
                    $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                    $resp = TRUE;
                }

                $this->link->desconectar();
            }
        }
    }

    //La función consultar recibe el parámetro enviado desde el controlador ejecutado así la sentencia, esta permite traer toda 
    //la información requerida desde la base de datos y retornarla al controlador en un vector.
    function consultarUsuario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_USUARIO('$this->idEmpleado');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdEmpleado" => $aRow['idEmpleado'],
                    "Documento" => $aRow['documentoEmp'],
                    "Nombres" => $aRow['nombresEmp'],
                    "Apellidos" => $aRow['apellidosEmp'],
                    "TarjetaProfecional" => $aRow['tarjetaProfecional'],
                    "CelularEmpleado" => $aRow['celularEmpleado'],
                    "CorreoEmpleado" => $aRow['correoEmpleado'],
                    "Cargo" => $aRow['cargo'],
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

    //La función actualizar, recibe toda la información envida desde el controlador y se ejecuta la sentencia la cual permite 
    //modificar el registro de la base de datos, antes de actualizar el registro se valida si el perfil del usuario no fue 
    //modificado, en caso de que el perfil haya sido modificado se modifica el usuario con sus permisos, se le envía un nuevo 
    //correo notificando la modificación en el usuario y por ultimo se procede actualizar la información del registro, si el 
    //perfil no fue modificado solo se hace la actualización del registro.
    function actualizarUsuario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $perfil = "";

            $sql1 = "SELECT cargo FROM `tbl_personal_empleados` WHERE idEmpleado = '$this->idEmpleado'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $perfil = $aRow['cargo'];

                if ($perfil == $this->cargo) {

                    $sql = "CALL SP_MODIFICAR_USUARIO('$this->idEmpleado', '$this->documento', '$this->nombres', '$this->apellidos', '$this->tarjetaProfecional', '$this->celularEmpleado', "
                            . "'$this->correoEmpleado', '$this->cargo');";
                    $rs = $conexion->query($sql);

                    if ($rs > 0) {
                        $this->respuesta = "all";
                        $this->mensaje = "El registro se actualizo con éxito.";
                        $resp = TRUE;
                    } else {
                        $this->respuesta = "fail";
                        $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                        $resp = FALSE;
                    }
                } else {

                    $sql = "CALL SP_MODIFICAR_USUARIO('$this->idEmpleado', '$this->documento', '$this->nombres', '$this->apellidos', '$this->tarjetaProfecional', '$this->celularEmpleado', "
                            . "'$this->correoEmpleado', '$this->cargo');";
                    $rs = $conexion->query($sql);

                    if ($rs > 0) {

                        $sql2 = "UPDATE `tbl_usuario` SET `tipoPerfil`='$this->cargo' WHERE `id_Empleado`='$this->idEmpleado'";
                        $rs2 = $conexion->query($sql2);

                        if ($rs2 > 0) {
                            $this->respuesta = "all";
                            $this->mensaje = "El registro se actualizo con éxito.";
                            $resp = TRUE;

                            //Propiedad que se utiiliza para capturar el tiempo del sistema.
                            date_default_timezone_set('America/Bogota');

                            $email_from = "contacto@fundacionconconcreto.org";
                            $email_to = $this->correoEmpleado;
                            $email_subject = "Usuario Sistema Fundación Conconcreto";

                            $email_message = '<html><body>';
                            $email_message .= '<P><img src="http://sistema.fundacionconconcreto.org/img/fundacion_logo.png" alt="Header" /></P>';

                            $email_message .= "<h3 >Aviso del Sistema de la Fundación Conconcreto.</h3>";
                            $email_message .= "<h3 >Su cargo ha sido cambiado, por lo tanto ha sido modificado su perfil de usuario, en el momento de ingresar al sistema solo podrá realizar las funciones del nuevo perfil.</h3>";

                            $email_message .= "<h3>Soporte.</h3>";
                            $email_message .= "<h3>Correo Electronico: contacto@fundacionconconcreto.org</h3>";
                            $email_message .= "<h3>Atentamente, Administración Fundación Conconcreto</h3>";

                            $email_message .= "</body></html>";

                            $headers = "From: " . $email_from . "\r\n" .
                                    "To: " . $this->correoEmpleado . "\r\n" .
                                    "CC: " . $email_from . "\r\n" .
                                    "BCC: " . $email_from . "\r\n" .
                                    "Reply-To: " . $email_from . "\r\n" .
                                    "MIME-Version: 1.0\r\n" .
                                    "Content-Type: text/html; charset=UTF-8\r\n" .
                                    "Date: " . date("r") . "\r\n" .
                                    "X-MSMail-Priority: Normal\n" .
                                    "X-Mailer: php\n";

                            mail($email_to, $email_subject, $email_message, $headers);
                        } else {
                            $this->respuesta = "fail";
                            $this->mensaje = "El perfin del usuario no se pudo actualizar.";
                            $resp = FALSE;
                        }
                    } else {
                        $this->respuesta = "fail";
                        $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                        $resp = FALSE;
                    }
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta de validación no se pudo ejecutar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //La función deshabilitar usuario recibe el id del registro que se desea deshabilitar desde el controlador, este ejecuta 
    //la sentencia con el procedimiento almacenado, este procedimiento deshabilita tanto el registro del empleado como el usuario.
    //Este procedimiento modifica el estado del registro en ambas tablas.
    function deshabilitarUsuario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_USUARIO('$this->idEmpleado');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del usuario fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //La función habilitar usuario recibe el id del registro que se desea habilitar desde el controlador, este ejecuta 
    //la sentencia con el procedimiento almacenado, este procedimiento habilita tanto el registro del empleado como el usuario.
    //Este procedimiento modifica el estado del registro en ambas tablas.
    function habilitarUsuario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_USUARIO('$this->idEmpleado');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del usuario fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    function contarUsuarios() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarusuarios FROM `tbl_personal_empleados` WHERE isdelEmpleado = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Administradores Activos: ".$numero['contarusuarios']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }


     function contarUsuarioseliminados() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarusuarios FROM `tbl_personal_empleados` WHERE isdelEmpleado = 0";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Administradores Inactivos: ".$numero['contarusuarios']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }
    

    //La función restablecer usuario recibe como parámetro el id del registro enviado del controlador, con esta se ejecuta 
    //la sentencia restableciendo el usuario del empleado para su logueo.
    function restablecerUsuario() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $documento = "";
            $correo = "";

            $sql1 = "SELECT documentoEmp,correoEmpleado FROM `tbl_personal_empleados` WHERE idEmpleado = '$this->idEmpleado'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $documento = $aRow['documentoEmp'];
                $correo = $aRow['correoEmpleado'];

                $usuario = "";
                $email = "";
                $email = explode("@", $aRow['correoEmpleado']);
                $usuario = $email[0]; // Imprime "usuario"

                $sql = "CALL SP_RESTABLECER_USUARIO('$this->idEmpleado', '$documento', '$usuario');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "La cuenta del usuario fue restablecida con éxito.";
                    $resp = TRUE;

                    //Propiedad que se utiiliza para capturar el tiempo del sistema.
                    date_default_timezone_set('America/Bogota');

                    $email_from = "contacto@fundacionconconcreto.org";
                    $email_to = $correo;
                    $email_subject = "Usuario Sistema Fundación Conconcreto";

                    $email_message = '<html><body>';
                    $email_message .= '<P><img src="http://sistema.fundacionconconcreto.org/img/fundacion_logo.png" alt="Header" /></P>';

                    $email_message .= "<h3 >Bienvenido al Sistema de la Fundación Conconcreto.</h3>";
                    $email_message .= "<h3 >Con este usuario podrá acceder al sistema y realizar las funciones como $this->cargo.</h3>";


                    $email_message .= "<h3>Su usuario y contraseña son: </h3>";
                    $email_message .= "<h3>Usuario: $usuario</h3>";
                    $email_message .= "<h3>Contraseña: fundacion$documento</h3>";

                    $email_message .= "<h3>Soporte.</h3>";
                    $email_message .= "<h3>Correo Electronico: contacto@fundacionconconcreto.org</h3>";
                    $email_message .= "<h3>Atentamente, Administración Fundación Conconcreto</h3>";

                    $email_message .= "</body></html>";

                    $headers = "From: " . $email_from . "\r\n" .
                            "To: " . $correo . "\r\n" .
                            "CC: " . $email_from . "\r\n" .
                            "BCC: " . $email_from . "\r\n" .
                            "Reply-To: " . $email_from . "\r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-Type: text/html; charset=UTF-8\r\n" .
                            "Date: " . date("r") . "\r\n" .
                            "X-MSMail-Priority: Normal\n" .
                            "X-Mailer: php\n";

                    mail($email_to, $email_subject, $email_message, $headers);

//                    if (mail($email_to, $email_subject, $email_message, $headers)) {
//                        $this->mensaje .= " Al correo se enviara el usuario y contraseña para ingresar al sistema";
//                    } else {
//                        $this->mensaje .= "El mensaje no pudo ser enviado por un error en el servidor..";
//                    }
                } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "La cuenta del usuario no fue restablecida por una falla en la solicitud.";
                    $resp = FALSE;
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta de validación no se pudo ejecutar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

}

//$x = new libUsuarios();
//$x->setIdEmpleado("1");
//$x->consultarUsuario();
//print_r( $x->getResult());