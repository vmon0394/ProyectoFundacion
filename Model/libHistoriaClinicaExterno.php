<?php

class libHistoriaClinicaExterno {

    private $idHistoriaExterno;
    private $tipoRegistro;
    private $fechaIngreso;
    private $consecutivo;
    private $beneficiario;
    private $tipoDocumento;
    private $documento;
    private $nombres;
    private $apellidos;
    private $idMunicipioNanimiento;
    private $fechaNacimiento;
    private $edad;
    private $sexo;
    private $relacionFundacion;
    private $ocupacio_Institucion;
    private $gradoEscolar;
    private $idMunicipioResidencia;
    private $direccion;
    private $barrio;
    private $telefono;
    private $telefono2;
    private $tipoDeSeguridad;
    private $eps;
    private $motivoConsulta;
    private $antecedentesFamiliares;
    private $conformacionFamiliar;
    private $conflictos;
    private $metasTerapeuticas;
    private $logros;
    private $pruebasAplicadas;
    private $remisiones;
    private $motivoRemisiones;
    private $finalizacion;
    private $estadoProceso;
    private $idPsicologa;
    private $isdelHistorialExterno;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idHistoriaExterno = "";
        $this->tipoRegistro = "";
        $this->fechaIngreso = "";
        $this->consecutivo = "";
        $this->beneficiario = "";
        $this->tipoDocumento = "";
        $this->documento = "";
        $this->nombres = "";
        $this->apellidos = "";
        $this->idMunicipioNanimiento = "";
        $this->fechaNacimiento = "";
        $this->edad = "";
        $this->sexo = "";
        $this->relacionFundacion = "";
        $this->ocupacio_Institucion = "";
        $this->gradoEscolar = "";
        $this->idMunicipioResidencia = "";
        $this->direccion = "";
        $this->barrio = "";
        $this->telefono = "";
        $this->telefono2 = "";
        $this->tipoDeSeguridad = "";
        $this->eps = "";
        $this->motivoConsulta = "";
        $this->antecedentesFamiliares = "";
        $this->conformacionFamiliar = "";
        $this->conflictos = "";
        $this->metasTerapeuticas = "";
        $this->logros = "";
        $this->pruebasAplicadas = "";
        $this->remisiones = "";
        $this->motivoRemisiones = "";
        $this->finalizacion = "";
        $this->estadoProceso = "";
        $this->idPsicologa = "";
        $this->isdelHistorialExterno = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdHistoriaExterno() {
        return $this->idHistoriaExterno;
    }

    function getTipoRegistro() {
        return $this->tipoRegistro;
    }

    function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    function getConsecutivo() {
        return $this->consecutivo;
    }

    function getBeneficiario() {
        return $this->beneficiario;
    }

    function getTipoDocumento() {
        return $this->tipoDocumento;
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

    function getIdMunicipioNanimiento() {
        return $this->idMunicipioNanimiento;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getEdad() {
        return $this->edad;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getRelacionFundacion() {
        return $this->relacionFundacion;
    }

    function getOcupacio_Institucion() {
        return $this->ocupacio_Institucion;
    }

    function getGradoEscolar() {
        return $this->gradoEscolar;
    }

    function getIdMunicipioResidencia() {
        return $this->idMunicipioResidencia;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getBarrio() {
        return $this->barrio;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getTelefono2() {
        return $this->telefono2;
    }

    function getTipoDeSeguridad() {
        return $this->tipoDeSeguridad;
    }

    function getEps() {
        return $this->eps;
    }

    function getMotivoConsulta() {
        return $this->motivoConsulta;
    }

    function getAntecedentesFamiliares() {
        return $this->antecedentesFamiliares;
    }

    function getConformacionFamiliar() {
        return $this->conformacionFamiliar;
    }

    function getConflictos() {
        return $this->conflictos;
    }

    function getMetasTerapeuticas() {
        return $this->metasTerapeuticas;
    }

    function getLogros() {
        return $this->logros;
    }

    function getPruebasAplicadas() {
        return $this->pruebasAplicadas;
    }

    function getRemisiones() {
        return $this->remisiones;
    }

    function getMotivoRemisiones() {
        return $this->motivoRemisiones;
    }

    function getFinalizacion() {
        return $this->finalizacion;
    }

    function getEstadoProceso() {
        return $this->estadoProceso;
    }

    function getIdPsicologa() {
        return $this->idPsicologa;
    }

    function getIsdelHistorialExterno() {
        return $this->isdelHistorialExterno;
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

    function setIdHistoriaExterno($idHistoriaExterno) {
        $this->idHistoriaExterno = $idHistoriaExterno;
    }

    function setTipoRegistro($tipoRegistro) {
        $this->tipoRegistro = $tipoRegistro;
    }

    function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    function setConsecutivo($consecutivo) {
        $this->consecutivo = $consecutivo;
    }

    function setBeneficiario($beneficiario) {
        $this->beneficiario = $beneficiario;
    }

    function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
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

    function setIdMunicipioNanimiento($idMunicipioNanimiento) {
        $this->idMunicipioNanimiento = $idMunicipioNanimiento;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setRelacionFundacion($relacionFundacion) {
        $this->relacionFundacion = $relacionFundacion;
    }

    function setOcupacio_Institucion($ocupacio_Institucion) {
        $this->ocupacio_Institucion = $ocupacio_Institucion;
    }

    function setGradoEscolar($gradoEscolar) {
        $this->gradoEscolar = $gradoEscolar;
    }

    function setIdMunicipioResidencia($idMunicipioResidencia) {
        $this->idMunicipioResidencia = $idMunicipioResidencia;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setBarrio($barrio) {
        $this->barrio = $barrio;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setTelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    function setTipoDeSeguridad($tipoDeSeguridad) {
        $this->tipoDeSeguridad = $tipoDeSeguridad;
    }

    function setEps($eps) {
        $this->eps = $eps;
    }

    function setMotivoConsulta($motivoConsulta) {
        $this->motivoConsulta = $motivoConsulta;
    }

    function setAntecedentesFamiliares($antecedentesFamiliares) {
        $this->antecedentesFamiliares = $antecedentesFamiliares;
    }

    function setConformacionFamiliar($conformacionFamiliar) {
        $this->conformacionFamiliar = $conformacionFamiliar;
    }

    function setConflictos($conflictos) {
        $this->conflictos = $conflictos;
    }

    function setMetasTerapeuticas($metasTerapeuticas) {
        $this->metasTerapeuticas = $metasTerapeuticas;
    }

    function setLogros($logros) {
        $this->logros = $logros;
    }

    function setPruebasAplicadas($pruebasAplicadas) {
        $this->pruebasAplicadas = $pruebasAplicadas;
    }

    function setRemisiones($remisiones) {
        $this->remisiones = $remisiones;
    }

    function setMotivoRemisiones($motivoRemisiones) {
        $this->motivoRemisiones = $motivoRemisiones;
    }

    function setFinalizacion($finalizacion) {
        $this->finalizacion = $finalizacion;
    }

    function setEstadoProceso($estadoProceso) {
        $this->estadoProceso = $estadoProceso;
    }

    function setIdPsicologa($idPsicologa) {
        $this->idPsicologa = $idPsicologa;
    }

    function setIsdelHistorialExterno($isdelHistorialExterno) {
        $this->isdelHistorialExterno = $isdelHistorialExterno;
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

    //Esta función permite buscar por el documento si a la persona ya se le inicio un procesos, en caso de que ya se le haya iniciado uno, 
    //se retorna toda la información del proceso que ha iniciado, de lo contrario devuelve un mensaje informando que es un nuevo proceso.
    function buscarHistoriaExterno() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_BUSCAR_HISTORIA_EXTERNO('$this->tipoRegistro', '$this->consecutivo');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdHistoriaExterno" => $aRow['idHistoriaExterno'],
                    "TipoRegistro" => $aRow['tipoRegistro'],
                    "FechaIngreso" => $aRow['fechaIngreso'],
                    "Consecutivo" => $aRow['consecutivo'],
                    "Beneficiario" => $aRow['beneficiario'],
                    "TipoDocumento" => $aRow['tipoDocumento'],
                    "Documento" => $aRow['documento'],
                    "Nombres" => $aRow['nombres'],
                    "Apellidos" => $aRow['apellidos'],
                    "IdDepartamentoNacimiento" => $aRow['idDepartamentoNacimiento'],
                    "IdMunicipioNacimiento" => $aRow['idMunicipioNanimiento'],
                    "FechaNacimiento" => $aRow['fechaNacimiento'],
                    "Edad" => $aRow['edad'],
                    "Sexo" => $aRow['sexo'],
                    "RelacionFundacion" => $aRow['relacionFundacion'],
                    "Ocupacio_Institucion" => $aRow['ocupacio_Institucion'],
                    "GradoEscolar" => $aRow['gradoEscolar'],
                    "IdDepartamentoResidencia" => $aRow['idDepartamentoResidencia'],
                    "IdMunicipioResidencia" => $aRow['idMunicipioResidencia'],
                    "Direccion" => $aRow['direccion'],
                    "Barrio" => $aRow['barrio'],
                    "Telefono" => $aRow['telefono'],
                    "Telefono2" => $aRow['telefono2'],
                    "TipoDeSeguridad" => $aRow['tipoDeSeguridad'],
                    "Eps" => $aRow['eps'],
                    "MotivoConsulta" => $aRow['motivoConsulta'],
                    "AntecedentesFamiliares" => $aRow['antecedentesFamiliares'],
                    "ConformacionFamiliar" => $aRow['conformacionFamiliar'],
                    "Conflictos" => $aRow['conflictos'],
                    "MetasTerapeuticas" => $aRow['metasTerapeuticas'],
                    "Logros" => $aRow['logros'],
                    "PruebasAplicadas" => $aRow['pruebasAplicadas'],
                    "Remisiones" => $aRow['remisiones'],
                    "MotivoRemisiones" => $aRow['motivoRemisiones'],
                    "Finalizacion" => $aRow['finalizacion'],
                    "EstadoProceso" => $aRow['estadoProceso'],
                    "IdPsicologa" => $aRow['idPsicologa']
                );
                $this->result = $row;
                $this->respuesta = "exis";
                $resp = TRUE;
            } else {
                $this->respuesta = "new";
                $this->mensaje = "<div style='color: #009d48'>La persona no registra ninguna $this->tipoRegistro iniciada, proceda a diligenciar el formato e iniciar una $this->tipoRegistro.</div>";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite el registro de la asesorías cuando en un proceso nuevo que se le abre a la persona de este tipo.
    function registrarAsesoriaExterno() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_historia_clinica_externos` WHERE tipoRegistro = '$this->tipoRegistro' AND consecutivo = '$this->consecutivo'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "La atención y seguimiento psicológico con el consecutivo $this->consecutivo que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_ASESORIA_EXTERNO('$this->tipoRegistro', '$this->fechaIngreso', '$this->consecutivo', '$this->beneficiario', '$this->tipoDocumento', '$this->documento', "
                        . "'$this->nombres', '$this->apellidos', '$this->idMunicipioNanimiento', '$this->fechaNacimiento', '$this->edad', '$this->sexo', "
                        . "'$this->relacionFundacion', '$this->ocupacio_Institucion', '$this->gradoEscolar', '$this->idMunicipioResidencia', '$this->direccion', '$this->barrio', "
                        . "'$this->telefono', '$this->telefono2', '$this->tipoDeSeguridad', '$this->eps', '$this->motivoConsulta', '$this->antecedentesFamiliares', '$this->conformacionFamiliar', "
                        . "'$this->conflictos', '$this->metasTerapeuticas', '$this->logros', '$this->pruebasAplicadas', '$this->remisiones', '$this->motivoRemisiones', '$this->finalizacion', '$this->estadoProceso', "
                        . "'$this->idPsicologa', '$this->isdelHistorialExterno');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {

                    $sql2 = "SELECT idHistoriaExterno FROM `tbl_historia_clinica_externos` WHERE tipoRegistro = '$this->tipoRegistro' AND consecutivo = '$this->consecutivo'";
                    $rs2 = $conexion->query($sql2);

                    $aRow = $rs2->fetch_array();
                    $row = array(
                        "IdHistoriaExterno" => $aRow['idHistoriaExterno'],
                    );

                    $this->result = $row;
                    $this->respuesta = "all";
                    $this->mensaje = "El registro de atención y seguimiento psicológico se realizó con éxito.";
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

    //Esta función permite el registro de una consultoría cuando en un proceso nuevo que se le abre a la persona de este tipo.
    function registrarConsultoriaExterno() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_historia_clinica_externos` WHERE tipoRegistro = '$this->tipoRegistro' AND consecutivo = '$this->consecutivo'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "La consultoría con el consecutivo $this->consecutivo que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_CONSULTORIA_EXTERNO('$this->tipoRegistro', '$this->fechaIngreso', '$this->consecutivo', '$this->beneficiario', '$this->tipoDocumento', '$this->documento', "
                        . "'$this->nombres', '$this->apellidos', '$this->idMunicipioNanimiento', '$this->fechaNacimiento', '$this->edad', '$this->sexo', "
                        . "'$this->relacionFundacion', '$this->ocupacio_Institucion', '$this->gradoEscolar', '$this->idMunicipioResidencia', '$this->direccion', '$this->barrio', "
                        . "'$this->telefono', '$this->telefono2', '$this->tipoDeSeguridad', '$this->eps', '$this->motivoConsulta', '$this->antecedentesFamiliares', '$this->conformacionFamiliar',"
                        . "'$this->remisiones', '$this->motivoRemisiones', '$this->finalizacion', '$this->estadoProceso', '$this->idPsicologa', '$this->isdelHistorialExterno');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {

                    $sql2 = "SELECT idHistoriaExterno FROM `tbl_historia_clinica_externos` WHERE tipoRegistro = '$this->tipoRegistro' AND consecutivo = '$this->consecutivo'";
                    $rs2 = $conexion->query($sql2);

                    $aRow = $rs2->fetch_array();
                    $row = array(
                        "IdHistoriaExterno" => $aRow['idHistoriaExterno'],
                    );

                    $this->result = $row;
                    $this->respuesta = "all";
                    $this->mensaje = "El registro de la consultoría se realizó con éxito.";
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

    //Esta función permite la modificación de los datos del proceso de asesoría que se le abierto a una persona.
    function actualizarAsesoriaExterno() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_ASESORIA_EXTERNO('$this->idHistoriaExterno', '$this->fechaIngreso', '$this->consecutivo', '$this->beneficiario', '$this->tipoDocumento',"
                    . " '$this->documento', '$this->nombres', '$this->apellidos', '$this->idMunicipioNanimiento', '$this->fechaNacimiento', '$this->edad', '$this->sexo', "
                    . "'$this->relacionFundacion', '$this->ocupacio_Institucion', '$this->gradoEscolar', '$this->idMunicipioResidencia', '$this->direccion', '$this->barrio', "
                    . "'$this->telefono', '$this->telefono2', '$this->tipoDeSeguridad', '$this->eps', '$this->motivoConsulta', '$this->antecedentesFamiliares', '$this->conformacionFamiliar', "
                    . "'$this->conflictos', '$this->metasTerapeuticas', '$this->logros', '$this->pruebasAplicadas', '$this->remisiones', '$this->motivoRemisiones', '$this->finalizacion', '$this->estadoProceso', "
                    . "'$this->idPsicologa');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de atención y seguimiento psicológico se actualizo con éxito.";
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite la modificación de los datos del proceso de consiltoría que se le abierto a una persona.
    function actualizarConsultoriaExterno() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_CONSULTORIA_EXTERNO('$this->idHistoriaExterno', '$this->fechaIngreso', '$this->consecutivo', '$this->beneficiario', '$this->tipoDocumento', "
                    . "'$this->documento', '$this->nombres', '$this->apellidos', '$this->idMunicipioNanimiento', '$this->fechaNacimiento', '$this->edad', '$this->sexo', "
                    . "'$this->relacionFundacion', '$this->ocupacio_Institucion', '$this->gradoEscolar', '$this->idMunicipioResidencia', '$this->direccion', '$this->barrio', "
                    . "'$this->telefono', '$this->telefono2', '$this->tipoDeSeguridad', '$this->eps', '$this->motivoConsulta', '$this->antecedentesFamiliares', '$this->conformacionFamiliar', "
                    . "'$this->remisiones', '$this->motivoRemisiones', '$this->finalizacion', '$this->estadoProceso', '$this->idPsicologa');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la consultoría se actualizo con éxito.";
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite traer toda la información del proceso que se le abrió a la persona y se desea hacer una impresión de esta.
    function buscarHistoriaExternoImprimir() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $largoMax = 150; // numero maximo de caracteres antes de hacer un salto de linea
            $rompeLineas = '</br>';
            $romper_palabras_largas = true; // rompe una palabra si es demacido larga
            
            $largoMax2 = 150; // numero maximo de caracteres antes de hacer un salto de linea
            $rompeLineas2 = '</br>';
            $romper_palabras_largas2 = true; // rompe una palabra si es demacido larga
            
            $tabla = "";
            $cont = 1;

            $tabla .= "<tr>"
                    . "<th style='padding-right: 10px; color: #000; width:20px; text-align:center;'>N°</th>"
                    . "<th style='padding-right: 10px; color: #000; width:200px; text-align:center;'>Fecha</th>"
                    . "<th style='padding-right: 10px; color: #000; width:600px; text-align:center;'>Observación</th>"
                    . "</tr>";

            $sql = "CALL SP_BUSCAR_HISTORIA_EXTERNO_IMPRIMIR('$this->idHistoriaExterno');";
            $rs = $conexion->query($sql);

            $conexion = $this->link->conectar();

            $sql2 = "SELECT * FROM `tbl_seguimiento_sesion_externos` WHERE idHistoriaExterno = '$this->idHistoriaExterno' AND isdelSeguimientoExterno = '1' ";
            $rs2 = $conexion->query($sql2);

            while ($datos = $rs2->fetch_object()) {

                $tabla .= "<tr>"
                        . "<td>" . $cont++ . "</td>"
                        . "<td>" . date("d-m-Y", strtotime($datos->fechaSeguimientoSesion)) . "</td>"
                        . "<td class='text_justificado'>" . wordwrap($datos->observaciones, $largoMax2, $rompeLineas2, $romper_palabras_largas2) . "</td>"
                        . "</tr>";
            }

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdHistoriaExterno" => $aRow['idHistoriaExterno'],
                    "TipoRegistro" => $aRow['tipoRegistro'],
                    "FechaIngreso" => $aRow['fechaIngreso'],
                    "Consecutivo" => $aRow['consecutivo'],
                    "Beneficiario" => $aRow['beneficiario'],
                    "TipoDocumento" => $aRow['tipoDocumento'],
                    "Documento" => $aRow['documento'],
                    "Nombres" => $aRow['nombres'],
                    "Apellidos" => $aRow['apellidos'],
                    "IdDepartamentoNacimiento" => $aRow['idDepartamentoNacimiento'],
                    "IdMunicipioNacimiento" => $aRow['idMunicipioNanimiento'],
                    "FechaNacimiento" => $aRow['fechaNacimiento'],
                    "Edad" => $aRow['edad'],
                    "Sexo" => $aRow['sexo'],
                    "RelacionFundacion" => $aRow['relacionFundacion'],
                    "Ocupacio_Institucion" => $aRow['ocupacio_Institucion'],
                    "GradoEscolar" => $aRow['gradoEscolar'],
                    "IdDepartamentoResidencia" => $aRow['idDepartamentoResidencia'],
                    "IdMunicipioResidencia" => $aRow['idMunicipioResidencia'],
                    "Direccion" => $aRow['direccion'],
                    "Barrio" => $aRow['barrio'],
                    "Telefono" => $aRow['telefono'],
                    "Telefono2" => $aRow['telefono2'],
                    "TipoDeSeguridad" => $aRow['tipoDeSeguridad'],
                    "Eps" => $aRow['eps'],
                    "MotivoConsulta" => wordwrap($aRow['motivoConsulta'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "AntecedentesFamiliares" => wordwrap($aRow['antecedentesFamiliares'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "ConformacionFamiliar" => $aRow['conformacionFamiliar'],
                    "Conflictos" => wordwrap($aRow['conflictos'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "MetasTerapeuticas" => wordwrap($aRow['metasTerapeuticas'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "Logros" => wordwrap($aRow['logros'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "PruebasAplicadas" => wordwrap($aRow['pruebasAplicadas'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "Remisiones" => $aRow['remisiones'],
                    "MotivoRemisiones" => wordwrap($aRow['motivoRemisiones'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "Finalizacion" => $aRow['finalizacion'],
                    "EstadoProceso" => $aRow['estadoProceso'],
                    "TblSeguimientos" => $tabla,
                    "Psicologa" => "<u>" . $aRow['nombresEmp'] . " " . $aRow['apellidosEmp'] . "</u>",
                    "TarjetaProfecional" => "<u>" . $aRow['tarjetaProfecional'] . "</u>"
                );
                $this->result = $row;
                $this->respuesta = "exis";
                $resp = TRUE;
            } else {
                $this->respuesta = "new";
                $this->mensaje = "<div style='color: #009d48'>La persona no registra ninguna $this->tipoRegistro iniciada, proceda a diligenciar el formato e iniciar una $this->tipoRegistro.</div>";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

}
