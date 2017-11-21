<?php

class libUsuariosLaboratorio {

    private $idUsuario;
    private $tipoRegistro;
    private $documento;
    private $nombre;
    private $apellido;
    private $edad;
    private $telefono;
    private $celular;
    private $email;
    private $acudiente;
    private $direccion;
    private $institucion;
    private $idSemillero;
    private $idServicio;
    private $isdelUsuario;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idUsuario = "";
        $this->tipoRegistro = "";
        $this->documento = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->edad = "";
        $this->telefono = "";
        $this->celular = "";
        $this->email = "";
        $this->acudiente = "";
        $this->direccion = "";
        $this->institucion = "";
        $this->idSemillero = "";
        $this->idServicio = "";
        $this->isdelUsuario = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }
    
    function getTipoRegistro() {
        return $this->tipoRegistro;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEdad(){
        return $this->edad;
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

    function getAcudiente() {
        return $this->Acudiente;
    }
    
    function getDireccion() {
        return $this->direccion;
    }

    function getInstitucion() {
        return $this->institucion;
    }
    
    function getIdSemillero() {
        return $this->idSemillero;
    }
    
    function getIdServicio(){
        return $this->idServicio;
    }
    
    function getIsdelUsuario() {
        return $this->isdelUsuario;
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
    
    function setTipoRegistro($tipoRegistro) {
        $this->tipoRegistro = $tipoRegistro;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setEdad($edad){
        $this->edad = $edad;
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

    function setAcudiente($acudiente) {
        $this->acudiente = $acudiente;
    }
    
    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setInstitucion($institucion) {
        $this->institucion = $institucion;
    }
    
    function setIdSemillero($idSemillero) {
        $this->idSemillero = $idSemillero;
    }
    
    function setIdServicio($servicios) {
        $this->idServicio = $servicios;
    }
    
    function setIsdelUsuario($isdelUsuario) {
        $this->isdelUsuario = $isdelUsuario;
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

    function registrarUsuarioLaboratorio() {
    
        $resp;
        $conexion = $this->link->conectar();
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_REGISTRAR_USUARIO_LABORATORIO('$this->tipoRegistro', '$this->documento', '$this->nombre', '$this->apellido','$this->edad','$this->telefono', '$this->celular', '$this->email', '$this->acudiente', '$this->direccion', '$this->institucion', '$this->idSemillero', '$this->idServicio');";
            $rs = $conexion->query($sql);
            
            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El usuario se registro con exito";
                $resp = TRUE;
            } else { 
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                $resp = TRUE;  
            } 
            $this->link->desconectar();
        }  
    }
     
    //La función consultar recibe el parámetro enviado desde el controlador ejecutado así la sentencia, esta permite traer toda 
    //la información requerida desde la base de datos y retornarla al controlador en un vector.
    function consultarUsuarioLaboratorio() {

        $resp;
            $conexion = $this->link->conectar();
            if (!$conexion) {
                $this->respuesta = "fail";
                $this->mensaje = $this->link->getError();
                $resp = FALSE;
            } else {
                
                $sql = "CALL SP_CONSULTAR_USUARIO_LABORATORIO('$this->idUsuario');";
                $rs = $conexion->query($sql);
                
                if ($rs->num_rows > 0) {
                    $aRow = $rs->fetch_array();
                    $row = array(
                        "IdUsuario" => $aRow['idUsuario'],
                        "TipoRegistro" => $aRow['tipoRegistro'],
                        "Documento" => $aRow['documento'],
                        "Nombre" => $aRow['nombre'],
                        "Apellido" => $aRow['apellido'],
                        "Edad" => $aRow['edad'],
                        "Telefono" => $aRow['telefono'],
                        "Celular" => $aRow['celular'],
                        "Email" => $aRow['email'],
                        "Acudiente" => $aRow['acudiente'],
                        "Direccion" => $aRow['direccion'],
                        "Institucion" => $aRow['institucion'],
                        "IdSemillero" => $aRow['idSemillero'],
                        "IdServicio" => $aRow['idServicio']
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
    function actualizarUsuarioLaboratorio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        
                } else {

                    $sql = "CALL SP_MODIFICAR_USUARIO_LABORATORIO('$this->idUsuario', '$this->tipoRegistro', '$this->documento', '$this->nombre', '$this->apellido', '$this->edad', '$this->telefono', '$this->celular', '$this->email', '$this->acudiente', '$this->direccion', '$this->institucion', '$this->idSemillero', '$this->idServicio');";
                    $rs = $conexion->query($sql);
                    
                    if ($rs > 0) {
                        $this->respuesta = "all";
                        $this->mensaje = "El Usuario se actualizo con éxito.";
                        $resp = TRUE;
                        
                    } else {
                        $this->respuesta = "fail";
                        $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                        $resp = TRUE;
                    }
                $this->link->desconectar();
            }
        }

    //La función deshabilitar usuario recibe el id del registro que se desea deshabilitar desde el controlador, este ejecuta 
    //la sentencia con el procedimiento almacenado, este procedimiento deshabilita tanto el registro del empleado como el usuario.
    //Este procedimiento modifica el estado del registro en ambas tablas.
    function deshabilitarUsuarioLaboratorio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_USUARIO_LABORATORIO('$this->idUsuario');";
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
    function habilitarUsuarioLaboratorio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_USUARIO_LABORATORIO('$this->idUsuario');";
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

    function contarUsuariosLaboratorio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarusuarioslaboratorio FROM `tbl_usuario_laboratorio` WHERE isdelUsuario = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Usuarios Existentes: ".$numero['contarusuarioslaboratorio']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

    function contarUsuariosLaboratorioEliminado() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarusuarioslaboratorio FROM `tbl_usuario_laboratorio` WHERE isdelUsuario = 0";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Usuarios Eliminados: ".$numero['contarusuarioslaboratorio']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

}

//$x = new libUsuarios();
//$x->setIdEmpleado("1");
//$x->consultarUsuario();
//print_r( $x->getResult());