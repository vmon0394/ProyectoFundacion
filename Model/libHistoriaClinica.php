<?php

class libHistoriaClinica {

    private $buscarDocumento;
    private $idHistoria;
    private $tipoRegistro;
    private $fechaIngreso;
    private $consecutivo;
    private $idFicha;
    private $telefono2;
    private $beneficiario;
    private $tipoDocumentoBeneficiario;
    private $documentoBeneficiario;
    private $nombresBeneficiario;
    private $apellidosBeneficiario;
    private $parentezcoBeneficiario;
    private $ocupacionBeneficiario;
    private $fechaNacimientoBeneficiario;
    private $edadBeneficiario;
    private $direccionBeneficiario;
    private $barrioBeneficiario;
    private $telefonoBeneficiario;
    private $telefono2Beneficiario;
    private $tipoDeSeguridadBeneficiario;
    private $epsBeneficiario;
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
    private $isdelHistorial;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->buscarDocumento = "";
        $this->idHistoria = "";
        $this->tipoRegistro = "";
        $this->fechaIngreso = "";
        $this->consecutivo = "";
        $this->idFicha = "";
        $this->telefono2 = "";
        $this->beneficiario = "";
        $this->tipoDocumentoBeneficiario = "";
        $this->documentoBeneficiario = "";
        $this->nombresBeneficiario = "";
        $this->apellidosBeneficiario = "";
        $this->parentezcoBeneficiario = "";
        $this->ocupacionBeneficiario = "";
        $this->fechaNacimientoBeneficiario = "";
        $this->edadBeneficiario = "";
        $this->direccionBeneficiario = "";
        $this->barrioBeneficiario = "";
        $this->telefonoBeneficiario = "";
        $this->telefono2Beneficiario = "";
        $this->tipoDeSeguridadBeneficiario = "";
        $this->epsBeneficiario = "";
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
        $this->isdelHistorial = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getBuscarDocumento() {
        return $this->buscarDocumento;
    }

    function getIdHistoria() {
        return $this->idHistoria;
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

    function getIdFicha() {
        return $this->idFicha;
    }

    function getTelefono2() {
        return $this->telefono2;
    }

    function getBeneficiario() {
        return $this->beneficiario;
    }

    function getTipoDocumentoBeneficiario() {
        return $this->tipoDocumentoBeneficiario;
    }

    function getDocumentoBeneficiario() {
        return $this->documentoBeneficiario;
    }

    function getNombresBeneficiario() {
        return $this->nombresBeneficiario;
    }

    function getApellidosBeneficiario() {
        return $this->apellidosBeneficiario;
    }

    function getParentezcoBeneficiario() {
        return $this->parentezcoBeneficiario;
    }

    function getOcupacionBeneficiario() {
        return $this->ocupacionBeneficiario;
    }

    function getFechaNacimientoBeneficiario() {
        return $this->fechaNacimientoBeneficiario;
    }

    function getEdadBeneficiario() {
        return $this->edadBeneficiario;
    }

    function getDireccionBeneficiario() {
        return $this->direccionBeneficiario;
    }

    function getBarrioBeneficiario() {
        return $this->barrioBeneficiario;
    }

    function getTelefonoBeneficiario() {
        return $this->telefonoBeneficiario;
    }

    function getTelefono2Beneficiario() {
        return $this->telefono2Beneficiario;
    }

    function getTipoDeSeguridadBeneficiario() {
        return $this->tipoDeSeguridadBeneficiario;
    }

    function getEpsBeneficiario() {
        return $this->epsBeneficiario;
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

    function getIsdelHistorial() {
        return $this->isdelHistorial;
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

    function setBuscarDocumento($buscarDocumento) {
        $this->buscarDocumento = $buscarDocumento;
    }

    function setIdHistoria($idHistoria) {
        $this->idHistoria = $idHistoria;
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

    function setIdFicha($idFicha) {
        $this->idFicha = $idFicha;
    }

    function setTelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    function setBeneficiario($beneficiario) {
        $this->beneficiario = $beneficiario;
    }

    function setTipoDocumentoBeneficiario($tipoDocumentoBeneficiario) {
        $this->tipoDocumentoBeneficiario = $tipoDocumentoBeneficiario;
    }

    function setDocumentoBeneficiario($documentoBeneficiario) {
        $this->documentoBeneficiario = $documentoBeneficiario;
    }

    function setNombresBeneficiario($nombresBeneficiario) {
        $this->nombresBeneficiario = $nombresBeneficiario;
    }

    function setApellidosBeneficiario($apellidosBeneficiario) {
        $this->apellidosBeneficiario = $apellidosBeneficiario;
    }

    function setParentezcoBeneficiario($parentezcoBeneficiario) {
        $this->parentezcoBeneficiario = $parentezcoBeneficiario;
    }

    function setOcupacionBeneficiario($ocupacionBeneficiario) {
        $this->ocupacionBeneficiario = $ocupacionBeneficiario;
    }

    function setFechaNacimientoBeneficiario($fechaNacimientoBeneficiario) {
        $this->fechaNacimientoBeneficiario = $fechaNacimientoBeneficiario;
    }

    function setEdadBeneficiario($edadBeneficiario) {
        $this->edadBeneficiario = $edadBeneficiario;
    }

    function setDireccionBeneficiario($direccionBeneficiario) {
        $this->direccionBeneficiario = $direccionBeneficiario;
    }

    function setBarrioBeneficiario($barrioBeneficiario) {
        $this->barrioBeneficiario = $barrioBeneficiario;
    }

    function setTelefonoBeneficiario($telefonoBeneficiario) {
        $this->telefonoBeneficiario = $telefonoBeneficiario;
    }

    function setTelefono2Beneficiario($telefono2Beneficiario) {
        $this->telefono2Beneficiario = $telefono2Beneficiario;
    }

    function setTipoDeSeguridadBeneficiario($tipoDeSeguridadBeneficiario) {
        $this->tipoDeSeguridadBeneficiario = $tipoDeSeguridadBeneficiario;
    }

    function setEpsBeneficiario($epsBeneficiario) {
        $this->epsBeneficiario = $epsBeneficiario;
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

    function setIsdelHistorial($isdelHistorial) {
        $this->isdelHistorial = $isdelHistorial;
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

    //Esta función permite buscar por el documento si a la persona ya se le inicio un proceso, en caso de que ya se le haya iniciado uno, 
    //se retorna toda la información del proceso que ha iniciado, de lo contrario retorna la información basica del participante y un
    //mensaje indicando que es un nuevo proceso que se le va iniciar al participante.
    function buscarHistoria() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $idFicha = "";

            $sql = "SELECT idFicha FROM `tbl_ficha_sociofamiliar` WHERE documento = '$this->buscarDocumento'";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();
                $idFicha = $aRow['idFicha'];
            }

            $sql1 = "CALL SP_BUSCAR_HISTORIA('$this->tipoRegistro', '$this->consecutivo');";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow1 = $rs1->fetch_array();

                $row1 = array(
                    "IdHistoria" => $aRow1['idHistoria'],
                    "TipoRegistro" => $aRow1['tipoRegistroHis'],
                    "FechaIngreso" => $aRow1['fechaIngreso'],
                    "Consecutivo" => $aRow1['consecutivo'],
                    "IdFicha" => $aRow1['idFicha'],
                    "Nombres" => $aRow1['nombres'],
                    "Apellidos" => $aRow1['apellidos'],
                    "Sexo" => $aRow1['sexo'],
                    "Municipio" => $aRow1['municipio'],
                    "FechaNacimiento" => $aRow1['fechaNacimiento'],
                    "Edad" => $aRow1['edad'],
                    "TipoDocumento" => $aRow1['tipoDocumento'],
                    "Documento" => $aRow1['documento'],
                    "TipoDeSeguridad" => $aRow1['tipoDeSeguridad'],
                    "Telefono" => $aRow1['telefono'],
                    "Direccion" => $aRow1['direccion'],
                    "Barrio_vereda" => $aRow1['barrio_vereda'],
                    "Institucion" => $aRow1['institucion'],
                    "NombreSemillero" => $aRow1['nombreSemillero'],
                    "Telefono2" => $aRow1['telefono2'],
                    "Beneficiario" => $aRow1['beneficiario'],
                    "TipoDocumentoBeneficiario" => $aRow1['tipoDocumentoBeneficiario'],
                    "DocumentoBeneficiario" => $aRow1['documentoBeneficiario'],
                    "NombresBeneficiario" => $aRow1['nombresBeneficiario'],
                    "ApellidosBeneficiario" => $aRow1['apellidosBeneficiario'],
                    "ParentezcoBeneficiario" => $aRow1['parentezcoBeneficiario'],
                    "OcupacionBeneficiario" => $aRow1['ocupacionBeneficiario'],
                    "FechaNacimientoBeneficiario" => $aRow1['fechaNacimientoBeneficiario'],
                    "EdadBeneficiario" => $aRow1['edadBeneficiario'],
                    "DireccionBeneficiario" => $aRow1['direccionBeneficiario'],
                    "BarrioBeneficiario" => $aRow1['barrioBeneficiario'],
                    "TelefonoBeneficiario" => $aRow1['telefonoBeneficiario'],
                    "Telefono2Beneficiario" => $aRow1['telefono2Beneficiario'],
                    "TipoDeSeguridadBeneficiario" => $aRow1['tipoDeSeguridadBeneficiario'],
                    "EpsBeneficiario" => $aRow1['epsBeneficiario'],
                    "MotivoConsulta" => $aRow1['motivoConsulta'],
                    "AntecedentesFamiliares" => $aRow1['antecedentesFamiliares'],
                    "ConformacionFamiliar" => $aRow1['conformacionFamiliar'],
                    "Conflictos" => $aRow1['conflictos'],
                    "MetasTerapeuticas" => $aRow1['metasTerapeuticas'],
                    "Logros" => $aRow1['logros'],
                    "PruebasAplicadas" => $aRow1['pruebasAplicadas'],
                    "Remisiones" => $aRow1['remisiones'],
                    "MotivoRemisiones" => $aRow1['motivoRemisiones'],
                    "Finalizacion" => $aRow1['finalizacion'],
                    "EstadoProceso" => $aRow1['estadoProceso'],
                    "IdPsicologa" => $aRow1['idPsicologa']
                );
                $this->result = $row1;
                $this->respuesta = "exis";
                $resp = TRUE;
            } else {

                $conexion = $this->link->conectar();

                $sql2 = "CALL SP_BUSCAR_FICHA('$this->consecutivo');";
                $rs2 = $conexion->query($sql2);

                if ($rs2->num_rows > 0) {

                    $aRow2 = $rs2->fetch_array();

                    $row2 = array(
                        "Consecutivo" => $aRow2['documento'],
                        "IdFicha" => $aRow2['idFicha'],
                        "Nombres" => $aRow2['nombres'],
                        "Apellidos" => $aRow2['apellidos'],
                        "Sexo" => $aRow2['sexo'],
                        "MunicipioNacimiento" => $aRow2['municipio'],
                        "FechaNacimiento" => $aRow2['fechaNacimiento'],
                        "Edad" => $aRow2['edad'],
                        "TipoDocumento" => $aRow2['tipoDocumento'],
                        "Documento" => $aRow2['documento'],
                        "TipoDeSeguridad" => $aRow2['tipoDeSeguridad'],
                        "Telefono" => $aRow2['telefono'],
                        "Direccion" => $aRow2['direccion'],
                        "Barrio" => $aRow2['barrio_vereda'],
                        "Institucion" => $aRow2['institucion'],
                        "Semillero" => $aRow2['nombreSemillero']
                    );
                    $this->result = $row2;
                    $this->respuesta = "new";
                    $resp = TRUE;
                } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "<div style='color: red'>El documento que intentar buscar no tiene ficha registrada.</div>";
                    $resp = FALSE;
                }
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite el registro de la asesoría cuando en un proceso nuevo de este tipo que se le abre al participante.
    function registrarAsesoriaParticipante() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_historia_clinica` WHERE consecutivo = '$this->consecutivo' AND tipoRegistroHis = '$this->tipoRegistro'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "La atención y seguimiento psicológico con el consecutivo $this->consecutivo que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_ASESORIA_PARTICIPANTE('$this->tipoRegistro', '$this->fechaIngreso', '$this->consecutivo', '$this->idFicha', '$this->telefono2', '$this->beneficiario', "
                        . "'$this->tipoDocumentoBeneficiario', '$this->documentoBeneficiario', '$this->nombresBeneficiario', '$this->apellidosBeneficiario', '$this->parentezcoBeneficiario', '$this->ocupacionBeneficiario', "
                        . "'$this->fechaNacimientoBeneficiario', '$this->edadBeneficiario', '$this->direccionBeneficiario', '$this->barrioBeneficiario', '$this->telefonoBeneficiario', '$this->telefono2Beneficiario', "
                        . "'$this->tipoDeSeguridadBeneficiario', '$this->epsBeneficiario', '$this->motivoConsulta', '$this->antecedentesFamiliares', '$this->conformacionFamiliar', '$this->conflictos', '$this->metasTerapeuticas',"
                        . "'$this->logros', '$this->pruebasAplicadas', '$this->remisiones', '$this->motivoRemisiones', '$this->finalizacion', '$this->estadoProceso', '$this->idPsicologa', '$this->isdelHistorial');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {

                    $sql2 = "SELECT idHistoria FROM `tbl_historia_clinica` WHERE consecutivo = '$this->consecutivo' AND tipoRegistroHis = '$this->tipoRegistro'";
                    $rs2 = $conexion->query($sql2);

                    $aRow = $rs2->fetch_array();
                    $row = array(
                        "IdHistoria" => $aRow['idHistoria'],
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

    //Esta función permite el registro de una consultoría cuando en un proceso nuevo de este tipo que se le abre al participante.
    function registrarConsultoriaParticipante() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_historia_clinica` WHERE consecutivo = '$this->consecutivo' AND tipoRegistroHis = '$this->tipoRegistro'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "La consultoría con el consecutivo $this->consecutivo que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_CONSULTORIA_PARTICIPANTE('$this->tipoRegistro', '$this->fechaIngreso', '$this->consecutivo', '$this->idFicha', '$this->telefono2', '$this->beneficiario', "
                        . "'$this->tipoDocumentoBeneficiario', '$this->documentoBeneficiario', '$this->nombresBeneficiario', '$this->apellidosBeneficiario', '$this->parentezcoBeneficiario', '$this->ocupacionBeneficiario', "
                        . "'$this->fechaNacimientoBeneficiario', '$this->edadBeneficiario', '$this->direccionBeneficiario', '$this->barrioBeneficiario', '$this->telefonoBeneficiario', '$this->telefono2Beneficiario', "
                        . "'$this->tipoDeSeguridadBeneficiario', '$this->epsBeneficiario', '$this->motivoConsulta', '$this->antecedentesFamiliares', '$this->conformacionFamiliar', '$this->remisiones', "
                        . "'$this->motivoRemisiones', '$this->finalizacion', '$this->estadoProceso', '$this->idPsicologa', '$this->isdelHistorial');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {

                    $sql2 = "SELECT idHistoria FROM `tbl_historia_clinica` WHERE consecutivo = '$this->consecutivo' AND tipoRegistroHis = '$this->tipoRegistro'";
                    $rs2 = $conexion->query($sql2);

                    $aRow = $rs2->fetch_array();
                    $row = array(
                        "IdHistoria" => $aRow['idHistoria'],
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

    //Esta función permite la modificación de los datos del proceso de asesoría que se le abierto al participante.
    function actualizarAsesoriaParticipante() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_ASESORIA_PARTICIPANTE('$this->idHistoria', '$this->fechaIngreso', '$this->consecutivo', '$this->telefono2', '$this->beneficiario', "
                    . "'$this->tipoDocumentoBeneficiario', '$this->documentoBeneficiario', '$this->nombresBeneficiario', '$this->apellidosBeneficiario', '$this->parentezcoBeneficiario', '$this->ocupacionBeneficiario', "
                    . "'$this->fechaNacimientoBeneficiario', '$this->edadBeneficiario', '$this->direccionBeneficiario', '$this->barrioBeneficiario', '$this->telefonoBeneficiario', '$this->telefono2Beneficiario', "
                    . "'$this->tipoDeSeguridadBeneficiario', '$this->epsBeneficiario', '$this->motivoConsulta', '$this->antecedentesFamiliares', '$this->conformacionFamiliar', '$this->conflictos', '$this->metasTerapeuticas',"
                    . "'$this->logros', '$this->pruebasAplicadas', '$this->remisiones', '$this->motivoRemisiones', '$this->finalizacion', '$this->estadoProceso', '$this->idPsicologa');";
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

    //Esta función permite la modificación de los datos del proceso de consiltoría que se le abierto al participante.
    function actualizarConsultoriaParticipante() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_CONSULTORIA_PARTICIPANTE('$this->idHistoria', '$this->fechaIngreso', '$this->consecutivo', '$this->idFicha', '$this->telefono2', '$this->beneficiario', "
                    . "'$this->tipoDocumentoBeneficiario', '$this->documentoBeneficiario', '$this->nombresBeneficiario', '$this->apellidosBeneficiario', '$this->parentezcoBeneficiario', '$this->ocupacionBeneficiario', "
                    . "'$this->fechaNacimientoBeneficiario', '$this->edadBeneficiario', '$this->direccionBeneficiario', '$this->barrioBeneficiario', '$this->telefonoBeneficiario', '$this->telefono2Beneficiario', "
                    . "'$this->tipoDeSeguridadBeneficiario', '$this->epsBeneficiario', '$this->motivoConsulta', '$this->antecedentesFamiliares', '$this->conformacionFamiliar', '$this->remisiones', "
                    . "'$this->motivoRemisiones', '$this->finalizacion', '$this->estadoProceso', '$this->idPsicologa');";
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

    //Esta función permite traer toda la información del proceso que se le abrió al participante y se desea hacer una impresión de este proceso.
    function buscarHistoriaImprimir() {

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
                    . "<th style='padding-right: 10px; color: #000; width:60px; text-align:center;'>Fecha</th>"
                    . "<th style='padding-right: 10px; color: #000; width:600px; text-align:center;'>Observación</th>"
                    . "</tr>";

            $sql = "CALL SP_BUSCAR_HISTORIA_IMPRIMIR('$this->idHistoria');";
            $rs = $conexion->query($sql);

            $conexion = $this->link->conectar();

            $sql2 = "SELECT * FROM `tbl_seguimiento_sesion` WHERE idHistoria = '$this->idHistoria' AND isdelSeguimiento = '1' ";
            $rs2 = $conexion->query($sql2);

            while ($datos = $rs2->fetch_object()) {

                $tabla .= "<tr>"
                        . "<td>" . $cont++ . "</td>"
                        . "<td>" . date("d-m-Y", strtotime($datos->fechaSeguimientoSesion)) . "</td>"
                        . "<td  class='text_justificado'>" . wordwrap($datos->observaciones, $largoMax2, $rompeLineas2, $romper_palabras_largas2) . "</td>"
                        . "</tr>";
            }

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdHistoria" => $aRow['idHistoria'],
                    "TipoRegistro" => $aRow['tipoRegistroHis'],
                    "FechaIngreso" => $aRow['fechaIngreso'],
                    "Consecutivo" => $aRow['consecutivo'],
                    "IdFicha" => $aRow['idFicha'],
                    "Nombres" => $aRow['nombres'],
                    "Apellidos" => $aRow['apellidos'],
                    "Sexo" => $aRow['sexo'],
                    "Municipio" => $aRow['municipio'],
                    "FechaNacimiento" => $aRow['fechaNacimiento'],
                    "Edad" => $aRow['edad'],
                    "TipoDocumento" => $aRow['tipoDocumento'],
                    "Documento" => $aRow['documento'],
                    "TipoDeSeguridad" => $aRow['tipoDeSeguridad'],
                    "Telefono" => $aRow['telefono'],
                    "Direccion" => $aRow['direccion'],
                    "Barrio_vereda" => $aRow['barrio_vereda'],
                    "Institucion" => $aRow['institucion'],
                    "NombreSemillero" => $aRow['nombreSemillero'],
                    "Telefono2" => $aRow['telefono2'],
                    "Beneficiario" => $aRow['beneficiario'],
                    "TipoDocumentoBeneficiario" => $aRow['tipoDocumentoBeneficiario'],
                    "DocumentoBeneficiario" => $aRow['documentoBeneficiario'],
                    "NombresBeneficiario" => $aRow['nombresBeneficiario'],
                    "ApellidosBeneficiario" => $aRow['apellidosBeneficiario'],
                    "ParentezcoBeneficiario" => $aRow['parentezcoBeneficiario'],
                    "OcupacionBeneficiario" => $aRow['ocupacionBeneficiario'],
                    "FechaNacimientoBeneficiario" => $aRow['fechaNacimientoBeneficiario'],
                    "EdadBeneficiario" => $aRow['edadBeneficiario'],
                    "DireccionBeneficiario" => $aRow['direccionBeneficiario'],
                    "BarrioBeneficiario" => $aRow['barrioBeneficiario'],
                    "TelefonoBeneficiario" => $aRow['telefonoBeneficiario'],
                    "Telefono2Beneficiario" => $aRow['telefono2Beneficiario'],
                    "TipoDeSeguridadBeneficiario" => $aRow['tipoDeSeguridadBeneficiario'],
                    "EpsBeneficiario" => $aRow['epsBeneficiario'],
                    "MotivoConsulta" => wordwrap($aRow['motivoConsulta'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "AntecedentesFamiliares" => wordwrap($aRow['antecedentesFamiliares'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "ConformacionFamiliar" => $aRow['conformacionFamiliar'],
                    "Conflictos" => wordwrap($aRow['conflictos'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "MetasTerapeuticas" => wordwrap($aRow['metasTerapeuticas'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "Logros" => wordwrap($aRow['logros'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "PruebasAplicadas" => wordwrap($aRow['pruebasAplicadas'], $largoMax, $rompeLineas, $romper_palabras_largas),
                    "Remisiones" => $aRow['remisiones'],
                    "MotivoRemisiones" => wordwrap($aRow['motivoRemisiones'], $largoMax2, $rompeLineas2, $romper_palabras_largas2),
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
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

}

//$x = new libHistoriaClinica();
//$x->setIdHistoria("1");
//$x->buscarHistoriaImprimir2();
//print_r($x->getResult());
