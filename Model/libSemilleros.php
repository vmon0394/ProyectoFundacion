<?php

class libSemilleros {

    private $idSemillero;
    private $nombreSemillero;
    private $idProfesor;
    private $idPsicologo;
    private $idCategoria;
    private $idZona;
    private $idProyecto;
    private $comuna;
    private $barrio;
    private $direccion;
    private $organizacion;
    private $contacto;
    private $emailContacto;
    private $telefono;
    private $idHabilidad;
    private $aliado1;
    private $aliado2;
    private $aliado3;
    private $ano;
    private $isdelSemillero;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idSemillero = "";
        $this->nombreSemillero = "";
        $this->idProfesor = "";
        $this->idPsicologo = "";
        $this->idCategoria = "";
        $this->idZona = "";
        $this->idProyecto = "";
        $this->comuna = "";
        $this->barrio = "";
        $this->direccion = "";
        $this->organizacion = "";
        $this->contacto = "";
        $this->emailContacto = "";
        $this->telefono = "";
        $this->idHabilidad = "";
        $this->aliado1 = "";
        $this->aliado2 = "";
        $this->aliado2 = "";
        $this->ano = "";
        $this->isdelSemillero = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdSemillero() {
        return $this->idSemillero;
    }

    function getNombreSemillero() {
        return $this->nombreSemillero;
    }

    function getIdProfesor() {
        return $this->idProfesor;
    }

    function getIdPsicologo() {
        return $this->idPsicologo;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getIdZona() {
        return $this->idZona;
    }

    function getIdProyecto() {
        return $this->idProyecto;
    }

    function getComuna() {
        return $this->comuna;
    }

    function getBarrio() {
        return $this->barrio;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getOrganizacion() {
        return $this->organizacion;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getEmailContacto() {
        return $this->emailContacto;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getIdHabilidad() {
        return $this->idHabilidad;
    }

    function getAliado1() {
        return $this->aliado1;
    }

    function getAliado2() {
        return $this->aliado2;
    }

    function getAliado3() {
        return $this->aliado3;
    }

    function getAno() {
        return $this->ano;
    }

    function getIsdelSemillero() {
        return $this->isdelSemillero;
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

    function setIdSemillero($idSemillero) {
        $this->idSemillero = $idSemillero;
    }

    function setNombreSemillero($nombreSemillero) {
        $this->nombreSemillero = $nombreSemillero;
    }

    function setIdProfesor($idProfesor) {
        $this->idProfesor = $idProfesor;
    }

    function setIdPsicologo($idPsicologo) {
        $this->idPsicologo = $idPsicologo;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setIdZona($idZona) {
        $this->idZona = $idZona;
    }

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }

    function setComuna($comuna) {
        $this->comuna = $comuna;
    }

    function setBarrio($barrio) {
        $this->barrio = $barrio;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setOrganizacion($organizacion) {
        $this->organizacion = $organizacion;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setEmailContacto($emailContacto) {
        $this->emailContacto = $emailContacto;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setIdHabilidad($idHabilidad) {
        $this->idHabilidad = $idHabilidad;
    }

    function setAliado1($aliado1) {
        $this->aliado1 = $aliado1;
    }

    function setAliado2($aliado2) {
        $this->aliado2 = $aliado2;
    }

    function setAliado3($aliado3) {
        $this->aliado3 = $aliado3;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setIsdelSemillero($isdelSemillero) {
        $this->isdelSemillero = $isdelSemillero;
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

    //Esta función recibe la información enviada desde el controlador ejecutando la sentencia para registrar el semillero, antes de ser 
    //registrado el semillero se valida que no haya un semillero registrado con el mismo nombre, una vez validado este y no hay 
    //coincidencias se crea el registro el semillero.
    function registrarSemillero() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_semilleros` WHERE nombreSemillero LIKE '%$this->nombreSemillero%'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "El Semillero que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $idSemillero = "";

                $sql = "CALL SP_REGISTRAR_SEMILLERO('$this->nombreSemillero', '$this->idProfesor', '$this->idPsicologo', '$this->idCategoria', '$this->idZona', '$this->idProyecto', '$this->comuna', '$this->barrio', '$this->direccion', '$this->organizacion', '$this->contacto', '$this->emailContacto', '$this->telefono', '$this->idHabilidad', '$this->aliado1', '$this->aliado2', '$this->aliado3', '$this->isdelSemillero', '$this->ano');";
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

    //La función consultar recibe el parámetro enviado desde el controlador ejecutado así la sentencia, esta permite traer toda 
    //la información requerida del registro desde la base de datos y retornarla al controlador en un vector.
    function consultarSemillero() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_SEMILLERO('$this->idSemillero');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdSemillero" => $aRow['idSemillero'],
                    "NombreSemillero" => $aRow['nombreSemillero'],
                    "IdProfesor" => $aRow['idProfesor'],
                    "IdPsicologo" => $aRow['idPsicologo'],
                    "IdCategoria" => $aRow['idCategoria'],
                    "IdZona" => $aRow['idZona'],
                    "IdProyecto" => $aRow['idProyecto'],
                    "Comuna" => $aRow['comuna'],
                    "Barrio" => $aRow['barrio'],
                    "Direccion" => $aRow['direccion'],
                    "Organizacion" => $aRow['organizacion'],
                    "Contacto" => $aRow['contacto'],
                    "EmailContacto" => $aRow['emailContacto'],
                    "Telefono" => $aRow['telefono'],
                    "IdHabilidad" => $aRow['idHabilidad'],
                    "Aliado1" => $aRow['aliado1'],
                    "Aliado2" => $aRow['aliado2'],
                    "Aliado3" => $aRow['aliado3']
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

    //Esta función permite el actualizar el regisstro del semillero, esta función recibe todos los datos enviados desde el controlador,
    //ejecutando la sentencia y actualizando la base de datos con las modificaciones realizadas al registro.
    //Antes de realizar la modificación del registro se valida si el campo profesor o habilidad son el mismo, en caso que uno de estos 
    //dos campos hayan sido modificando, se guarda el registro del historial del nuevo profesor asignado, o de la nueva habilidad asignada.
    function actualizarSemillero() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $profesor = "";
            $habilidad = "";

            $sql1 = "SELECT * FROM `tbl_semilleros` WHERE idSemillero = '$this->idSemillero'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $profesor = $aRow['idProfesor'];
                $habilidad = $aRow['idHabilidad'];
                $psicologo = $aRow['idPsicologo'];

                $sql = "CALL SP_MODIFICAR_SEMILLERO('$this->idSemillero', '$this->nombreSemillero', '$this->idProfesor', '$this->idPsicologo', '$this->idCategoria', '$this->idZona', '$this->idProyecto', '$this->comuna', '$this->barrio', '$this->direccion', '$this->organizacion', '$this->contacto', '$this->emailContacto', '$this->telefono', '$this->idHabilidad', '$this->aliado1', '$this->aliado2', '$this->aliado3');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El registro se actualizo con éxito.";
                    $resp = TRUE;

                    //Registro del historial en caso de ser modificando el profesor o la habilidad del semillero.
                    if ($profesor != $this->idProfesor) {
                        $sqlP = "CALL SP_HISTORIAL_FACILITADORES('$this->idSemillero', '$profesor', '$this->ano');";
                        $rsP = $conexion->query($sqlP);
                    }

                    if ($habilidad != $this->idHabilidad) {
                        $sqlP = "CALL SP_HISTORIAL_HABILIDADES('$this->idSemillero', '$habilidad', '$this->ano');";
                        $rsP = $conexion->query($sqlP);
                    }

                    if ($psicologo != $this->idPsicologo) {
                        $sqlPs = "CALL SP_HISTORIAL_PSICOLOGO('$this->idSemillero', '$psicologo', '$this->ano');";
                        $rsPs = $conexion->query($sqlPs);
                    }
                } else {

                    $this->respuesta = "fail";
                    $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                    $resp = TRUE;
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta de validación no se pudo ejecutar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //La función deshabilitar semillero recibe desde el controlador el id del registro que se desea deshabilitar, este ejecuta 
    //la sentencia con el procedimiento almacenado modificando el estado del semillero de 1 a 0.
    function deshabilitarSemillero() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_SEMILLERO('$this->idSemillero');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del Semillero fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El semillero no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //La función deshabilitar semillero recibe desde el controlador el id del registro que se desea habilitar, este ejecuta 
    //la sentencia con el procedimiento almacenado modificando el estado del semillero de 0 a 1.
    function habilitarSemillero() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_SEMILLERO('$this->idSemillero');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro del Semillero fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El semillero no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    function zonasemilleros(){

        $resp;
        $conexion = $this->link->conectar();
       
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT * FROM tbl_zonas";
             $rs = $conexion->query($sql);
            while ($zonas = $rs->fetch_array()){
                    echo "
                    <a href='zonasemillerossuperadmin.php?ui=".base64_encode($zonas["idZona"])."'><button type='button' class='btn btn-primary' data-dismiss='modal'>".$zonas["nombreZona"]."</button></a><br><br>";
            }

            $this->link->desconectar();
        }
    }

     function aliadossemilleros(){

        $resp;
        $conexion = $this->link->conectar();
       
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT * FROM tbl_aliados";
             $rs = $conexion->query($sql);
            while ($aliados = $rs->fetch_array()){
                    echo "
                    <a href='aliadosemillerossuperadmin.php?ui=".base64_encode($aliados["idAliado"])."'><button type='button' class='btn btn-primary' data-dismiss='modal'>".$aliados["nombreAliados"]."</button></a><br><br>";
            }

            $this->link->desconectar();
        }
    }

    function zonaseleccionada(){

        $resp;
        $conexion = $this->link->conectar();
       
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT * FROM tbl_zonas WHERE idZona = '$this->idZona'";
            $rs = $conexion->query($sql);
                 
                $this->link->desconectar();
            }
     }

      function aliadoseleccionado(){

        $resp;
        $conexion = $this->link->conectar();
       
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
             $sql = "SELECT * FROM `tbl_semilleros WHERE aliado1 = '$this->aliado1' AND WHERE aliado2='$this->aliado2' AND WHERE aliado3='$this->aliado3'";
             $rs = $conexion->query($sql);
                 
                $this->link->desconectar();
            }
     }

     function contarsemilleros() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarsemillero FROM `tbl_semilleros` WHERE isdelSemillero = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Semilleros Existentes: ".$numero['contarsemillero']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }


     function contarSemilleroeliminados() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarsemillero FROM `tbl_semilleros` WHERE isdelSemillero = 0";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Semilleros Eliminados: ".$numero['contarsemillero']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }
}



           