<?php

class libFichaSocioFamiliar {

    private $idFicha;
    private $tipoRegistro;
    private $nombres;
    private $apellidos;
    private $sexo;
    private $idCiudadNacimiento;
    private $fechaNacimiento;
    private $edad;
    private $estado_civil;
    private $numero_hijos;
    private $promocion_egresado;
    private $tipoDocumento;
    private $documento;
    private $RH;
    private $tipoDeSeguridad;
    private $eps_sisben;
    private $telefono;
    private $ocupacion;
    private $nombreNino;
    private $parentezcoNino;
    private $programa;
    private $celular;
    private $direccion;
    private $barrioOvereda;
    private $barrio_vereda;
    private $email;
    private $idCiudadResidencia;
    private $institucion;
    private $nivelEscolaridad;
    private $estadoEscolarizacion;
    private $semestre_escolaridad;
    private $areaEspecializacion;
    private $lugar_formacion;
    private $grado;
    private $repitencia;
    private $cuantos;
    private $cuales;
    private $anoDeIngreso;
    private $anosDePermanencia;
    private $isdel;
    private $nombreMadre_Padre;
    private $telefonoMadre_Padre;
    private $celularMadre_padre;
    private $nombreCuidador;
    private $parentezcoCuidador;
    private $telefonoCuidador;
    private $celularCuidador;
    private $tipologiaFamiliar;
    private $miembrosFamilia;
    private $personasEmpleoFormal;
    private $personasEmpleoInformal;
    private $desplazado;
    private $registro;
    private $victima;
    private $registro_victima;
    private $etnia;
    private $discapacidad;
    private $observacionDiscapacidad;
    private $trabaja_actualmente;
    private $tipo_trabajo;
    private $nombre_empresa;
    private $tipo_contrato;
    private $familiaresEmpresa;
    private $compania;
    private $tipoVinculacion;
    private $nombreParentezco;
    private $idSemillero;
    private $participa_otro_semillero;
    private $otros_semilleros;
    private $participa_servicios;
    private $que_servicios;
    private $fechaReingreso;
    private $fechaDeshabilitado;
    private $anoRegistro;
    private $idFacilitador;
    private $urlFoto;
    private $respuesta;
    private $respuesta2;
    private $mensaje;
    private $result;
    private $result2;
    private $link;

    function __construct() {

        $this->idFicha = "";
        $this->tipoRegistro = "";
        $this->nombres = "";
        $this->apellidos = "";
        $this->sexo = "";
        $this->idCiudadNacimiento = "";
        $this->fechaNacimiento = "";
        $this->edad = 0;
        $this->estado_civil = "";
        $this->numero_hijos = "";
        $this->promocion_egresado = "";
        $this->tipoDocumento = "";
        $this->documento = "";
        $this->RH = "";
        $this->tipoDeSeguridad = "";
        $this->eps_sisben = "";
        $this->telefono = "";
        $this->ocupacion = "";
        $this->nombreNino = "";
        $this->parentezcoNino = "";
        $this->programa = "";
        $this->celular = "";
        $this->direccion = "";
        $this->barrioOvereda = "";
        $this->barrio_vereda = "";
        $this->email = "";
        $this->idCiudadResidencia = "";
        $this->institucion = "";
        $this->nivelEscolaridad = "";
        $this->estadoEscolarizacion = "";
        $this->semestre_escolaridad = "";
        $this->areaEspecializacion = "";
        $this->lugar_formacion = "";
        $this->grado = "";
        $this->repitencia = "";
        $this->cuantos = 0;
        $this->cuales = "";
        $this->anoDeIngreso = "";
        $this->anosDePermanencia = "";
        $this->isdel = 1;
        $this->nombreMadre_Padre = "";
        $this->telefonoMadre_Padre = "";
        $this->celularMadre_padre = "";
        $this->nombreCuidador = "";
        $this->parentezcoCuidador = "";
        $this->telefonoCuidador = "";
        $this->celularCuidador = "";
        $this->tipologiaFamiliar = "";
        $this->miembrosFamilia = "";
        $this->personasEmpleoFormal = 0;
        $this->personasEmpleoInformal = 0;
        $this->desplazado = "";
        $this->registro = "";
        $this->victima = "";
        $this->registro_victima = "";
        $this->etnia = "";
        $this->discapacidad = "";
        $this->observacionDiscapacidad = "";
        $this->trabaja_actualmente = "";
        $this->tipo_trabajo = "";
        $this->nombre_empresa = "";
        $this->tipo_contrato = "";
        $this->familiaresEmpresa = "";
        $this->compania = "";
        $this->tipoVinculacion = "";
        $this->nombreParentezco = "";
        $this->idSemillero = "";
        $this->participa_otro_semillero = "";
        $this->otros_semilleros = "";
        $this->participa_servicios = "";
        $this->que_servicios = "";
        $this->fechaReingreso = "";
        $this->fechaDeshabilitado = "";
        $this->anoRegistro = "";
        $this->idFacilitador = "";
        $this->urlFoto = "";

        $this->respuesta = "";
        $this->respuesta2 = "";
        $this->mensaje = "";
        $this->result = "";
        $this->result2 = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdFicha() {
        return $this->idFicha;
    }

    function getTipoRegistro() {
        return $this->tipoRegistro;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getIdCiudadNacimiento() {
        return $this->idCiudadNacimiento;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getEdad() {
        return $this->edad;
    }

    function getEstado_civil() {
        return $this->estado_civil;
    }

    function getNumero_hijos() {
        return $this->numero_hijos;
    }

    function getPromocion_egresado() {
        return $this->promocion_egresado;
    }

    function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getRH() {
        return $this->RH;
    }

    function getTipoDeSeguridad() {
        return $this->tipoDeSeguridad;
    }

    function getEps_sisben() {
        return $this->eps_sisben;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getOcupacion() {
        return $this->ocupacion;
    }

    function getNombreNino() {
        return $this->nombreNino;
    }

    function getParentezcoNino() {
        return $this->parentezcoNino;
    }

    function getPrograma() {
        return $this->programa;
    }

    function getCelular() {
        return $this->celular;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getBarrioOvereda() {
        return $this->barrioOvereda;
    }

    function getBarrio_vereda() {
        return $this->barrio_vereda;
    }

    function getEmail() {
        return $this->email;
    }

    function getIdCiudadResidencia() {
        return $this->idCiudadResidencia;
    }

    function getInstitucion() {
        return $this->institucion;
    }

    function getNivelEscolaridad() {
        return $this->nivelEscolaridad;
    }

    function getEstadoEscolarizacion() {
        return $this->estadoEscolarizacion;
    }

    function getSemestre_escolaridad() {
        return $this->semestre_escolaridad;
    }

    function getAreaEspecializacion() {
        return $this->areaEspecializacion;
    }

    function getLugar_formacion() {
        return $this->lugar_formacion;
    }

    function getGrado() {
        return $this->grado;
    }

    function getRepitencia() {
        return $this->repitencia;
    }

    function getCuantos() {
        return $this->cuantos;
    }

    function getCuales() {
        return $this->cuales;
    }

    function getAnoDeIngreso() {
        return $this->anoDeIngreso;
    }

    function getAnosDePermanencia() {
        return $this->anosDePermanencia;
    }

    function getIsdel() {
        return $this->isdel;
    }

    function getNombreMadre_Padre() {
        return $this->nombreMadre_Padre;
    }

    function getTelefonoMadre_Padre() {
        return $this->telefonoMadre_Padre;
    }

    function getCelularMadre_padre() {
        return $this->celularMadre_padre;
    }

    function getNombreCuidador() {
        return $this->nombreCuidador;
    }

    function getParentezcoCuidador() {
        return $this->parentezcoCuidador;
    }

    function getTelefonoCuidador() {
        return $this->telefonoCuidador;
    }

    function getCelularCuidador() {
        return $this->celularCuidador;
    }

    function getTipologiaFamiliar() {
        return $this->tipologiaFamiliar;
    }

    function getMiembrosFamilia() {
        return $this->miembrosFamilia;
    }

    function getPersonasEmpleoFormal() {
        return $this->personasEmpleoFormal;
    }

    function getPersonasEmpleoInformal() {
        return $this->personasEmpleoInformal;
    }

    function getDesplazado() {
        return $this->desplazado;
    }

    function getRegistro() {
        return $this->registro;
    }

    function getVictima() {
        return $this->victima;
    }

    function getRegistro_victima() {
        return $this->registro_victima;
    }

    function getEtnia() {
        return $this->etnia;
    }

    function getDiscapacidad() {
        return $this->discapacidad;
    }

    function getObservacionDiscapacidad() {
        return $this->observacionDiscapacidad;
    }

    function getTrabaja_actualmente() {
        return $this->trabaja_actualmente;
    }

    function getTipo_trabajo() {
        return $this->tipo_trabajo;
    }

    function getNombre_empresa() {
        return $this->nombre_empresa;
    }

    function getTipo_contrato() {
        return $this->tipo_contrato;
    }

    function getFamiliaresEmpresa() {
        return $this->familiaresEmpresa;
    }

    function getCompania() {
        return $this->compania;
    }

    function getTipoVinculacion() {
        return $this->tipoVinculacion;
    }

    function getNombreParentezco() {
        return $this->nombreParentezco;
    }

    function getIdSemillero() {
        return $this->idSemillero;
    }

    function getParticipa_otro_semillero() {
        return $this->participa_otro_semillero;
    }

    function getOtros_semilleros() {
        return $this->otros_semilleros;
    }

    function getParticipa_servicios() {
        return $this->participa_servicios;
    }

    function getQue_servicios() {
        return $this->que_servicios;
    }

    function getFechaReingreso() {
        return $this->fechaReingreso;
    }

    function getFechaDeshabilitado() {
        return $this->fechaDeshabilitado;
    }

    function getAnoRegistro() {
        return $this->anoRegistro;
    }

    function getIdFacilitador() {
        return $this->idFacilitador;
    }
    
    function getUrlFoto() {
        return $this->urlFoto;
    }

    function getRespuesta() {
        return $this->respuesta;
    }
    function getRespuesta2() {
        return $this->respuesta2;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getResult() {
        return $this->result;
    }
    function getResult2() {
        return $this->result2;
    }

    function getLink() {
        return $this->link;
    }

    function setIdFicha($idFicha) {
        $this->idFicha = $idFicha;
    }

    function setTipoRegistro($tipoRegistro) {
        $this->tipoRegistro = $tipoRegistro;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setIdCiudadNacimiento($idCiudadNacimiento) {
        $this->idCiudadNacimiento = $idCiudadNacimiento;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setEstado_civil($estado_civil) {
        $this->estado_civil = $estado_civil;
    }

    function setNumero_hijos($numero_hijos) {
        $this->numero_hijos = $numero_hijos;
    }

    function setPromocion_egresado($promocion_egresado) {
        $this->promocion_egresado = $promocion_egresado;
    }

    function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setRH($RH) {
        $this->RH = $RH;
    }

    function setTipoDeSeguridad($tipoDeSeguridad) {
        $this->tipoDeSeguridad = $tipoDeSeguridad;
    }

    function setEps_sisben($eps_sisben) {
        $this->eps_sisben = $eps_sisben;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setOcupacion($ocupacion) {
        $this->ocupacion = $ocupacion;
    }

    function setNombreNino($nombreNino) {
        $this->nombreNino = $nombreNino;
    }

    function setParentezcoNino($parentezcoNino) {
        $this->parentezcoNino = $parentezcoNino;
    }

    function setPrograma($programa) {
        $this->programa = $programa;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setBarrioOvereda($barrioOvereda) {
        $this->barrioOvereda = $barrioOvereda;
    }

    function setBarrio_vereda($barrio_vereda) {
        $this->barrio_vereda = $barrio_vereda;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setIdCiudadResidencia($idCiudadResidencia) {
        $this->idCiudadResidencia = $idCiudadResidencia;
    }

    function setInstitucion($institucion) {
        $this->institucion = $institucion;
    }

    function setNivelEscolaridad($nivelEscolaridad) {
        $this->nivelEscolaridad = $nivelEscolaridad;
    }

    function setEstadoEscolarizacion($estadoEscolarizacion) {
        $this->estadoEscolarizacion = $estadoEscolarizacion;
    }

    function setSemestre_escolaridad($semestre_escolaridad) {
        $this->semestre_escolaridad = $semestre_escolaridad;
    }

    function setAreaEspecializacion($areaEspecializacion) {
        $this->areaEspecializacion = $areaEspecializacion;
    }

    function setLugar_formacion($lugar_formacion) {
        $this->lugar_formacion = $lugar_formacion;
    }

    function setGrado($grado) {
        $this->grado = $grado;
    }

    function setRepitencia($repitencia) {
        $this->repitencia = $repitencia;
    }

    function setCuantos($cuantos) {
        $this->cuantos = $cuantos;
    }

    function setCuales($cuales) {
        $this->cuales = $cuales;
    }

    function setAnoDeIngreso($anoDeIngreso) {
        $this->anoDeIngreso = $anoDeIngreso;
    }

    function setAnosDePermanencia($anosDePermanencia) {
        $this->anosDePermanencia = $anosDePermanencia;
    }

    function setIsdel($isdel) {
        $this->isdel = $isdel;
    }

    function setNombreMadre_Padre($nombreMadre_Padre) {
        $this->nombreMadre_Padre = $nombreMadre_Padre;
    }

    function setTelefonoMadre_Padre($telefonoMadre_Padre) {
        $this->telefonoMadre_Padre = $telefonoMadre_Padre;
    }

    function setCelularMadre_padre($celularMadre_padre) {
        $this->celularMadre_padre = $celularMadre_padre;
    }

    function setNombreCuidador($nombreCuidador) {
        $this->nombreCuidador = $nombreCuidador;
    }

    function setParentezcoCuidador($parentezcoCuidador) {
        $this->parentezcoCuidador = $parentezcoCuidador;
    }

    function setTelefonoCuidador($telefonoCuidador) {
        $this->telefonoCuidador = $telefonoCuidador;
    }

    function setCelularCuidador($celularCuidador) {
        $this->celularCuidador = $celularCuidador;
    }

    function setTipologiaFamiliar($tipologiaFamiliar) {
        $this->tipologiaFamiliar = $tipologiaFamiliar;
    }

    function setMiembrosFamilia($miembrosFamilia) {
        $this->miembrosFamilia = $miembrosFamilia;
    }

    function setPersonasEmpleoFormal($personasEmpleoFormal) {
        $this->personasEmpleoFormal = $personasEmpleoFormal;
    }

    function setPersonasEmpleoInformal($personasEmpleoInformal) {
        $this->personasEmpleoInformal = $personasEmpleoInformal;
    }

    function setDesplazado($desplazado) {
        $this->desplazado = $desplazado;
    }

    function setRegistro($registro) {
        $this->registro = $registro;
    }

    function setVictima($victima) {
        $this->victima = $victima;
    }

    function setRegistro_victima($registro_victima) {
        $this->registro_victima = $registro_victima;
    }

    function setEtnia($etnia) {
        $this->etnia = $etnia;
    }

    function setDiscapacidad($discapacidad) {
        $this->discapacidad = $discapacidad;
    }

    function setObservacionDiscapacidad($observacionDiscapacidad) {
        $this->observacionDiscapacidad = $observacionDiscapacidad;
    }

    function setTrabaja_actualmente($trabaja_actualmente) {
        $this->trabaja_actualmente = $trabaja_actualmente;
    }

    function setTipo_trabajo($tipo_trabajo) {
        $this->tipo_trabajo = $tipo_trabajo;
    }

    function setNombre_empresa($nombre_empresa) {
        $this->nombre_empresa = $nombre_empresa;
    }

    function setTipo_contrato($tipo_contrato) {
        $this->tipo_contrato = $tipo_contrato;
    }

    function setFamiliaresEmpresa($familiaresEmpresa) {
        $this->familiaresEmpresa = $familiaresEmpresa;
    }

    function setCompania($compania) {
        $this->compania = $compania;
    }

    function setTipoVinculacion($tipoVinculacion) {
        $this->tipoVinculacion = $tipoVinculacion;
    }

    function setNombreParentezco($nombreParentezco) {
        $this->nombreParentezco = $nombreParentezco;
    }

    function setIdSemillero($idSemillero) {
        $this->idSemillero = $idSemillero;
    }

    function setParticipa_otro_semillero($participa_otro_semillero) {
        $this->participa_otro_semillero = $participa_otro_semillero;
    }

    function setOtros_semilleros($otros_semilleros) {
        $this->otros_semilleros = $otros_semilleros;
    }

    function setParticipa_servicios($participa_servicios) {
        $this->participa_servicios = $participa_servicios;
    }

    function setQue_servicios($que_servicios) {
        $this->que_servicios = $que_servicios;
    }

    function setFechaReingreso($fechaReingreso) {
        $this->fechaReingreso = $fechaReingreso;
    }

    function setFechaDeshabilitado($fechaDeshabilitado) {
        $this->fechaDeshabilitado = $fechaDeshabilitado;
    }

    function setAnoRegistro($anoRegistro) {
        $this->anoRegistro = $anoRegistro;
    }

    function setIdFacilitador($idFacilitador) {
        $this->idFacilitador = $idFacilitador;
    }
    
    function setUrlFoto($urlFoto) {
        $this->urlFoto = $urlFoto;
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

    //Esta función permite el registro de las fichas socio familiares de los niños, antes del registrar se valida con el documento 
    //que el niños ya no este registrado, si no está registrado del niño, se realiza el registro con éxito. 
    function registrarFichaNinos() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_FICHA_NINOS('$this->nombres', '$this->apellidos', '$this->sexo', '$this->idCiudadNacimiento', '$this->fechaNacimiento', "
                    . "'$this->edad', '$this->tipoDocumento', '$this->documento', '$this->RH', '$this->tipoDeSeguridad', '$this->eps_sisben', '$this->telefono', '$this->ocupacion', "
                    . "'$this->celular', '$this->direccion', '$this->barrioOvereda', '$this->barrio_vereda', '$this->email', '$this->idCiudadResidencia', '$this->institucion', '$this->grado', '$this->repitencia', "
                    . "'$this->cuantos', '$this->cuales', '$this->anoDeIngreso', '$this->anosDePermanencia', '$this->isdel', '$this->nombreMadre_Padre', '$this->telefonoMadre_Padre',"
                    . "'$this->celularMadre_padre', '$this->nombreCuidador', '$this->parentezcoCuidador', '$this->telefonoCuidador', '$this->celularCuidador', '$this->tipologiaFamiliar', "
                    . "'$this->miembrosFamilia', '$this->personasEmpleoFormal', '$this->personasEmpleoInformal', '$this->desplazado', '$this->registro', '$this->victima', '$this->registro_victima', "
                    . "'$this->etnia', '$this->discapacidad', '$this->observacionDiscapacidad', '$this->familiaresEmpresa', '$this->compania', '$this->tipoVinculacion', '$this->nombreParentezco', "
                    . "'$this->idSemillero', '$this->participa_otro_semillero', '$this->otros_semilleros', '$this->participa_servicios', '$this->que_servicios', '$this->anoRegistro');";
            $rs = $conexion->query($sql);

            if ($rs != "") {
                $dato = $rs->fetch_object();
                $this->respuesta = $dato->respuesta;
                $this->mensaje = $dato->mensaje;

                if ($dato->respuesta == "all") {

                    $row = array(
                        "IdFicha" => $dato->idFicha,
                    );
                }

                $this->result = $row;
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite el registro de las fichas socio familiares de los adultos, antes del registrar se valida con el documento 
    //que el adulto ya no este registrado, si no está registrado el adulto, se realiza el registro con éxito. 
    function registrarFichaAdultos() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_FICHA_ADULTOS('$this->idSemillero', '$this->nombres', '$this->apellidos', '$this->sexo', '$this->idCiudadNacimiento', '$this->fechaNacimiento', "
                    . "'$this->edad', '$this->tipoDocumento', '$this->documento', '$this->RH', '$this->tipoDeSeguridad', '$this->eps_sisben', '$this->telefono', '$this->ocupacion', "
                    . "'$this->celular', '$this->direccion', '$this->barrioOvereda', '$this->barrio_vereda', '$this->email', '$this->idCiudadResidencia', '$this->nivelEscolaridad', "
                    . "'$this->estadoEscolarizacion', '$this->areaEspecializacion', '$this->anoDeIngreso', "
                    . "'$this->anosDePermanencia', '$this->nombreNino', '$this->parentezcoNino', '$this->programa', '$this->tipologiaFamiliar', '$this->discapacidad', '$this->observacionDiscapacidad', "
                    . "'$this->desplazado', '$this->registro', '$this->victima', '$this->registro_victima', '$this->etnia', '$this->miembrosFamilia', '$this->personasEmpleoFormal', '$this->personasEmpleoInformal', "
                    . "'$this->familiaresEmpresa', '$this->compania', '$this->tipoVinculacion', '$this->nombreParentezco', '$this->isdel', $this->anoRegistro);";
            $rs = $conexion->query($sql);

            if ($rs != "") {
                $dato = $rs->fetch_object();
                $this->respuesta = $dato->respuesta;
                $this->mensaje = $dato->mensaje;

                if ($dato->respuesta == "all") {

                    $row = array(
                        "IdFicha" => $dato->idFicha,
                    );
                }

                $this->result = $row;
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite el registro de los voluntarios y egresados, antes del registrar se valida con el documento 
    //que el participante ya no este registrado, si no está registrado el participante, se realiza el registro con éxito. 
    function registrarVoluntariosEgresados() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_REGISTRAR_VOLUNTARIOS_EGRESADOS('$this->tipoDocumento', '$this->documento', '$this->nombres', '$this->apellidos', '$this->sexo', '$this->idCiudadNacimiento', "
                    . "'$this->fechaNacimiento', '$this->edad', '$this->estado_civil', '$this->numero_hijos', '$this->promocion_egresado', '$this->anoDeIngreso', '$this->anosDePermanencia', "
                    . "'$this->idCiudadResidencia', '$this->barrioOvereda', '$this->barrio_vereda', '$this->direccion', '$this->telefono', '$this->celular', '$this->email', "
                    . "'$this->nivelEscolaridad', '$this->estadoEscolarizacion', '$this->semestre_escolaridad', '$this->areaEspecializacion', '$this->lugar_formacion', '$this->trabaja_actualmente', "
                    . "'$this->tipo_trabajo', '$this->nombre_empresa', '$this->tipo_contrato', '$this->isdel', '$this->idSemillero', '$this->anoRegistro');";
            $rs = $conexion->query($sql);

            if ($rs != "") {
                $dato = $rs->fetch_object();
                $this->respuesta = $dato->respuesta;
                $this->mensaje = $dato->mensaje;

                if ($dato->respuesta == "all") {

                    $row = array(
                        "IdFicha" => $dato->idFicha,
                    );
                }

                $this->result = $row;
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite traer toda la información de una fichas socio familiar y luego retornarla en un vector.
    function consultarFicha() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            
            $sql = "CALL SP_CONSULTAR_FICHA('$this->idFicha');";
            $rs = $conexion->query($sql);
//            $sql2 = "SELECT MAX(fecha),url FROM tbl_documentos WHERE tipoDocumento = 'FotoPerfil' AND idFicha = '$this->idFicha'";
//            $rs2 = $conexion->query($sql2);
//            
//            while ($aRow2 = $rs2->fetch_array()) {
//                $url = $aRow2['url'];
//                $imagen = "<img src='$url'/>";
//            }

            if ($rs->num_rows > 0 ) {
                
                $sql2 = "SELECT MAX(fecha),url FROM tbl_documentos WHERE tipoDocumento = 'FotoPerfil' AND idFicha = '$this->idFicha'";
                $rs2 = $conexion->query($sql2);
                
//                if($aRow2 = $rs2->fetch_array()) {
//                    $url = $aRow2['url'];
//                    $imagen = "<img src='$url'/>";
//                  }
//                
                $aRow = $rs->fetch_array();
                

                $row = array(
                    "TipoRegistro" => $aRow['idCategoria'],
                    "IdFicha" => $aRow['idFicha'],
                    "Nombres" => $aRow['nombres'],
                    "Apellidos" => $aRow['apellidos'],
                    "Sexo" => $aRow['sexo'],
                    "IdDepartamentoNacimiento" => $aRow['idDepartamentoNacimiento'],
                    "IdMunicipioNacimiento" => $aRow['idMunicipioNacimiento'],
                    "FechaNacimiento" => $aRow['fechaNacimiento'],
                    "Edad" => $aRow['edad'],
                    "Estado_civil" => $aRow['estado_civil'],
                    "Numero_hijos" => $aRow['numero_hijos'],
                    "Promocion_egresado" => $aRow['promocion_egresado'],
                    "TipoDocumento" => $aRow['tipoDocumento'],
                    "Documento" => $aRow['documento'],
                    "RH" => $aRow['RH'],
                    "TipoDeSeguridad" => $aRow['tipoDeSeguridad'],
                    "Eps_sisben" => $aRow['eps_sisben'],
                    "Telefono" => $aRow['telefono'],
                    "Ocupacion" => $aRow['ocupacion'],
                    "NombreNino" => $aRow['nombreNino'],
                    "ParentezcoNino" => $aRow['parentezcoNino'],
                    "Programa" => $aRow['programa'],
                    "Celular" => $aRow['celular'],
                    "Direccion" => $aRow['direccion'],
                    "BarrioOvereda" => $aRow['barrioOvereda'],
                    "Barrio_vereda" => $aRow['barrio_vereda'],
                    "Email" => $aRow['email'],
                    "IdDepartamentoResidencia" => $aRow['idDepartamentoResidencia'],
                    "IdMunicipioResidencia" => $aRow['idMunicipioResidencia'],
                    "Institucion" => $aRow['institucion'],
                    "NivelEscolaridad" => $aRow['nivelEscolaridad'],
                    "EstadoEscolarizacion" => $aRow['estadoEscolarizacion'],
                    "Semestre_escolaridad" => $aRow['semestre_escolaridad'],
                    "AreaEspecializacion" => $aRow['areaEspecializacion'],
                    "Grado" => $aRow['grado'],
                    "Lugar_formacion" => $aRow['lugar_formacion'],
                    "Repitencia" => $aRow['repitencia'],
                    "Cuantos" => $aRow['cuantos'],
                    "Cuales" => $aRow['cuales'],
                    "AnoDeIngreso" => $aRow['anoDeIngreso'],
                    "AnosDePermanencia" => $aRow['anosDePermanencia'],
                    "NombreMadre_Padre" => $aRow['nombreMadre_Padre'],
                    "TelefonoMadre_Padre" => $aRow['telefonoMadre_Padre'],
                    "CelularMadre_padre" => $aRow['celularMadre_padre'],
                    "NombreCuidador" => $aRow['nombreCuidador'],
                    "ParentezcoCuidador" => $aRow['parentezcoCuidador'],
                    "TelefonoCuidador" => $aRow['telefonoCuidador'],
                    "CelularCuidador" => $aRow['celularCuidador'],
                    "TipologiaFamiliar" => $aRow['tipologiaFamiliar'],
                    "MiembrosFamilia" => $aRow['miembrosFamilia'],
                    "PersonasEmpleoFormal" => $aRow['personasEmpleoFormal'],
                    "PersonasEmpleoInformal" => $aRow['personasEmpleoInformal'],
                    "Desplazado" => $aRow['desplazado'],
                    "Registro" => $aRow['registro'],
                    "Victima" => $aRow['victima'],
                    "Registro_victima" => $aRow['registro_victima'],
                    "Etnia" => $aRow['etnia'],
                    "Discapacidad" => $aRow['discapacidad'],
                    "ObservacionDiscapacidad" => $aRow['observacionDiscapacidad'],
                    "Trabaja_actualmente" => $aRow['trabaja_actualmente'],
                    "Tipo_trabajo" => $aRow['tipo_trabajo'],
                    "Nombre_empresa" => $aRow['nombre_empresa'],
                    "Tipo_contrato" => $aRow['tipo_contrato'],
                    "FamiliaresEmpresa" => $aRow['familiaresEmpresa'],
                    "Compania" => $aRow['compania'],
                    "TipoVinculacion" => $aRow['tipoVinculacion'],
                    "NombreParentezco" => $aRow['nombreParentezco'],
                    "IdSemillero" => $aRow['idSemillero'],
                    "Participa_otro_semillero" => $aRow['participa_otro_semillero'],
                    "Otros_semilleros" => $aRow['otros_semilleros'],
                    "Participa_servicios" => $aRow['participa_servicios'],
                    "Que_servicios" => $aRow['que_servicios'],
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
    function consultarUrl() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $ruta = "";

            $sql1 = "SELECT MAX(fecha),url FROM tbl_documentos WHERE tipoDocumento = 'FotoPerfil' AND idFicha = '$this->idFicha'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $url = "../".$aRow['url'];
                
                $imagenPerfil = "<img border='1' width='90' height='90' src='$url'/>";
                
                $this->respuesta2 = "all";
                $this->result2 = $imagenPerfil;
                $resp = FALSE;
                
            } else {
                $this->respuesta2 = "fail";
//                $this->mensaje = "La consulta no se pudo realizar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite la modificación de los datos de la ficha socio familiar de los niños que hayan sido consultados.
    function actualizarFichaNinos() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE `idFicha` = '$this->idFicha'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $idSemillero = $aRow['idSemillero'];

                if ($idSemillero != $this->idSemillero) {

                    $sqlH = "INSERT INTO `tbl_historial_participante_semilleros`(`idParticipante`, `idSemillero`, `anoHistoParticipante`) "
                            . "VALUES ('$this->idFicha', '$idSemillero', '$this->anoRegistro')";
                    $rsH = $conexion->query($sqlH);
                }

                $sql = "CALL SP_MODIFICAR_FICHA_NINOS('$this->idFicha', '$this->nombres', '$this->apellidos', '$this->sexo', '$this->idCiudadNacimiento', '$this->fechaNacimiento', "
                        . "'$this->edad', '$this->tipoDocumento', '$this->documento', '$this->RH', '$this->tipoDeSeguridad', '$this->eps_sisben', '$this->telefono', '$this->ocupacion', "
                        . "'$this->celular', '$this->direccion', '$this->barrioOvereda', '$this->barrio_vereda', '$this->email', '$this->idCiudadResidencia', '$this->institucion', '$this->grado', '$this->repitencia', "
                        . "'$this->cuantos', '$this->cuales', '$this->anoDeIngreso', '$this->anosDePermanencia', '$this->nombreMadre_Padre', '$this->telefonoMadre_Padre',"
                        . "'$this->celularMadre_padre', '$this->nombreCuidador', '$this->parentezcoCuidador', '$this->telefonoCuidador', '$this->celularCuidador', '$this->tipologiaFamiliar', "
                        . "'$this->miembrosFamilia', '$this->personasEmpleoFormal', '$this->personasEmpleoInformal', '$this->desplazado', '$this->registro', '$this->victima', '$this->registro_victima', "
                        . "'$this->etnia', '$this->discapacidad', '$this->observacionDiscapacidad', '$this->familiaresEmpresa', '$this->compania', '$this->tipoVinculacion', '$this->nombreParentezco', '$this->idSemillero', "
                        . "'$this->participa_otro_semillero', '$this->otros_semilleros', '$this->participa_servicios', '$this->que_servicios');";
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
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta de validación no se pudo ejecutar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite la modificación de los datos de la ficha socio familiar de los adultos que hayan sido consultados.
    function actualizarFichaAdultos() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE `idFicha` = '$this->idFicha'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $idSemillero = $aRow['idSemillero'];

                if ($idSemillero != $this->idSemillero) {

                    $sqlH = "INSERT INTO `tbl_historial_participante_semilleros`(`idParticipante`, `idSemillero`, `anoHistoParticipante`) "
                            . "VALUES ('$this->idFicha', '$idSemillero', '$this->anoRegistro')";
                    $rsH = $conexion->query($sqlH);
                }

                $sql = "CALL SP_MODIFICAR_FICHA_ADULTOS('$this->idFicha', '$this->idSemillero', '$this->nombres', '$this->apellidos', '$this->sexo', '$this->idCiudadNacimiento', '$this->fechaNacimiento', "
                        . "'$this->edad', '$this->tipoDocumento', '$this->documento', '$this->RH', '$this->tipoDeSeguridad', '$this->eps_sisben', '$this->telefono', '$this->ocupacion', "
                        . "'$this->celular', '$this->direccion', '$this->barrioOvereda', '$this->barrio_vereda', '$this->email', '$this->idCiudadResidencia', '$this->nivelEscolaridad', '$this->estadoEscolarizacion', '$this->areaEspecializacion', '$this->anoDeIngreso', "
                        . "'$this->anosDePermanencia', '$this->nombreNino', '$this->parentezcoNino', '$this->programa', '$this->tipologiaFamiliar', '$this->discapacidad', '$this->observacionDiscapacidad', "
                        . "'$this->desplazado', '$this->registro', '$this->victima', '$this->registro_victima', '$this->etnia', '$this->miembrosFamilia', '$this->personasEmpleoFormal', '$this->personasEmpleoInformal', "
                        . "'$this->familiaresEmpresa', '$this->compania', '$this->tipoVinculacion', '$this->nombreParentezco');";
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
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta de validación no se pudo ejecutar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite la modificación de los datos de la ficha socio familiar de los adultos que hayan sido consultados.
    function actualizarVoluntariosEgresados() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE `idFicha` = '$this->idFicha'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $idSemillero = $aRow['idSemillero'];

                if ($idSemillero != $this->idSemillero) {

                    $sqlH = "INSERT INTO `tbl_historial_participante_semilleros`(`idParticipante`, `idSemillero`, `anoHistoParticipante`) "
                            . "VALUES ('$this->idFicha', '$idSemillero', '$this->anoRegistro')";
                    $rsH = $conexion->query($sqlH);
                }

                $sql = "CALL SP_MODIFICAR_VOLUNTARIOS_EGRESADOS('$this->idFicha', '$this->tipoDocumento', '$this->documento', '$this->nombres', '$this->apellidos', '$this->sexo', '$this->idCiudadNacimiento', "
                        . "'$this->fechaNacimiento', '$this->edad', '$this->estado_civil', '$this->numero_hijos', '$this->promocion_egresado', '$this->anoDeIngreso', '$this->anosDePermanencia', "
                        . "'$this->idCiudadResidencia', '$this->barrioOvereda', '$this->barrio_vereda', '$this->direccion', '$this->telefono', '$this->celular', '$this->email', "
                        . "'$this->nivelEscolaridad', '$this->estadoEscolarizacion', '$this->semestre_escolaridad', '$this->areaEspecializacion', '$this->lugar_formacion', '$this->trabaja_actualmente', "
                        . "'$this->tipo_trabajo', '$this->nombre_empresa', '$this->tipo_contrato', '$this->idSemillero');";
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
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta de validación no se pudo ejecutar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite deshabilitar el registro de una ficha socio familiar, esta se hace modificando el estado de la ficha de 1 a 0,
    //este deshabilitar guarda la fecha de cuando fue deshabilitada esta ficha.
    function deshabilitarFicha() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT fechaDeshabilitado FROM `tbl_ficha_sociofamiliar` WHERE idFicha = '$this->idFicha' ";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();

                $fechaD = "";

                if ($aRow['fechaDeshabilitado'] != "") {
                    $fechaD = $aRow['fechaDeshabilitado'] . $this->fechaDeshabilitado . ";";
                } else {
                    $fechaD = $this->fechaDeshabilitado . ";";
                }

                $sql = "CALL SP_DESHABILITAR_FICHA('$this->idFicha', '$fechaD');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El registro de la ficha socio familiar fue eliminado con éxito.";
                    $resp = TRUE;
                } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "El registro no se pudo eliminar por una falla en la solicitud.";
                    $resp = FALSE;
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar el registro de una ficha socio familiar, esta se hace modificando el estado de la ficha de 0 a 1, 
    //este habilitar guarda la fecha de cuando se volvio habilitada la ficha.
    function habilitarFicha() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT fechaReingreso FROM `tbl_ficha_sociofamiliar` WHERE idFicha = '$this->idFicha' ";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();

                $fechaR = "";

                if ($aRow['fechaReingreso'] != "") {
                    $fechaR = $aRow['fechaReingreso'] . $this->fechaReingreso . ";";
                } else {
                    $fechaR = $this->fechaReingreso . ";";
                }

                $sql = "CALL SP_HABILITAR_FICHA('$this->idFicha', '$fechaR');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El registro de la ficha socio familiar fue habilitado con éxito.";
                    $resp = TRUE;
                } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "El registro no se pudo habilitar por una falla en la solicitud.";
                    $resp = FALSE;
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función resive el id de un registro ya exitente, con este se confulta si el participante ah sido deshabilitado y si ah tenido reingresos
    //si cumople con estos, con cabe a los dos campos se calcula el tiempo rear que el participante lleva en el semillero.
    function calcularPermanenciaSemillero($anosDePermanencia) {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT anosDePermanencia, fechaReingreso, fechaDeshabilitado, isdel FROM `tbl_ficha_sociofamiliar` WHERE idFicha = '$this->idFicha'";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_object();

                //Tiempo de permanencia
                $anosRealSemillero = 0;

                //Años permanencia
                $anosDeshabilitados = 0;
                $fechasDeshabilitados = "";
                $fechasReingresos = "";
                $annoR = "";
                $annoD = "";

                if ($aRow->isdel == "1") {

                    if ($aRow->fechaReingreso != "") {

                        $fechasDeshabilitados = split(";", $aRow->fechaDeshabilitado);
                        $fechasReingresos = split(";", $aRow->fechaReingreso);

                        for ($i = 0; $i < sizeof($fechasDeshabilitados); $i++) {

                            $annoR = "";
                            $annoD = "";

                            if ($fechasDeshabilitados[$i] != "" && $fechasReingresos[$i] != "") {

                                $annoR = split("-", $fechasReingresos[$i]);
                                $annoD = split("-", $fechasDeshabilitados[$i]);

                                $anosDeshabilitados += $annoR[0] - $annoD[0];
                            }
                        }

//                    echo $anosDePermanencia . " - " . $anosDeshabilitados;
                        $anosRealSemillero = $anosDePermanencia - $anosDeshabilitados;
                    } else {

                        $anosRealSemillero = $anosDePermanencia;
                    }
                } else {
                    $anosRealSemillero = $aRow->anosDePermanencia;
                }

                $this->link->desconectar();
                $this->result = $anosRealSemillero;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $this->link->desconectar();
            }
        }
    }

    //Permite consultar los registros de todos los participantes, luego se busca cada participantes en cada uno de los talleres que se le ha registrado
    //al semillero al que pertenece, luego se cuenta las inasistencias, y si es mayor a 5 se retorna un mensaje de aviso con la información del participante
    //que registra 5 o mas faltas.
    function validarAsisteciaTalleresAdmin() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            //Consulta general de los datos de los niños.
            $sql = "SELECT f.idFicha, s.idSemillero, s.nombreSemillero, f.documento, f.nombres, f.apellidos FROM tbl_ficha_sociofamiliar f INNER JOIN tbl_semilleros s ON f.idSemillero = s.idSemillero WHERE f.isdel = '1'";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $idFicha = "";
                $idSemillero = "";
                $nombreSemillero = "";
                $documento = "";
                $nombre = "";
                $apellido = "";
                while ($aRow = $rs->fetch_array()) {

                    $cont_faltas = 0;
                    $idFicha = $aRow['idFicha'];
                    $idSemillero = $aRow['idSemillero'];
                    $nombreSemillero = $aRow['nombreSemillero'];
                    $documento = $aRow['documento'];
                    $nombre = $aRow['nombres'];
                    $apellido = $aRow['apellidos'];

                    $sqlT = "SELECT cadenaIdNinosTaller, asistenciaTaller FROM `tbl_talleres` WHERE idSemillero = '$idSemillero' AND asistenciaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                    $rsT = $conexion->query($sqlT);

                    $cadenaIdNinosTaller = "";
                    $asistenciaTaller = "";

                    while ($aRowT = $rsT->fetch_array()) {

                        $cadenaIdNinosTaller = split(";", $aRowT['cadenaIdNinosTaller']);
                        $asistenciaTaller = split(";", $aRowT['asistenciaTaller']);

                        for ($i = 0; $i < sizeof($cadenaIdNinosTaller); $i++) {

                            if ($cadenaIdNinosTaller[$i] != "") {

                                if ($cadenaIdNinosTaller[$i] == $idFicha) {

                                    if ($asistenciaTaller[$i] == "0") {
                                        $cont_faltas++;
                                    }
                                }
                            }
                        }
                    }

                    if ($cont_faltas >= 5) {

                        $this->respuesta = "all";
                        $this->mensaje .= " - $documento $nombre $apellido :: $nombreSemillero<br>";
                    }
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "No registra participantes en los semilleros asignados.";
            }
            $this->link->desconectar();
        }
    }

    //Permite consultar los registros de todos los participantes, luego se busca cada participantes en cada uno de los talleres formativos que se le ha registrado
    //al semillero al que pertenece, luego se cuenta las inasistencias, y si es mayor a 5 se retorna un mensaje de aviso con la información del participante
    //que registra 5 o mas faltas.
    function validarAsisteciaTalleres() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            //Consulta general de los datos de los niños.
            $sql = "SELECT f.idFicha, s.idSemillero, f.documento, f.nombres, f.apellidos FROM tbl_ficha_sociofamiliar f INNER JOIN tbl_semilleros s ON f.idSemillero = s.idSemillero "
                    . "WHERE s.idProfesor = '$this->idFacilitador' AND f.isdel = '1'";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $idFicha = "";
                $idSemillero = "";
                $documento = "";
                $nombre = "";
                $apellido = "";
                while ($aRow = $rs->fetch_array()) {

                    $cont_faltas = 0;
                    $idFicha = $aRow['idFicha'];
                    $idSemillero = $aRow['idSemillero'];
                    $documento = $aRow['documento'];
                    $nombre = $aRow['nombres'];
                    $apellido = $aRow['apellidos'];

                    $sqlT = "SELECT cadenaIdNinosTaller, asistenciaTaller FROM `tbl_talleres` WHERE idSemillero = '$idSemillero' AND tipoTaller <> 'Taller Psicosocial' AND asistenciaTaller BETWEEN '2017-01-01' AND '2017-12-31'";

                    $rsT = $conexion->query($sqlT);

                    $cadenaIdNinosTaller = "";
                    $asistenciaTaller = "";

                    while ($aRowT = $rsT->fetch_array()) {

                        $cadenaIdNinosTaller = split(";", $aRowT['cadenaIdNinosTaller']);
                        $asistenciaTaller = split(";", $aRowT['asistenciaTaller']);

                        for ($i = 0; $i < sizeof($cadenaIdNinosTaller); $i++) {

                            if ($cadenaIdNinosTaller[$i] != "") {

                                if ($cadenaIdNinosTaller[$i] == $idFicha) {

                                    if ($asistenciaTaller[$i] == "0") {
                                        $cont_faltas++;
                                    }
                                }
                            }
                        }
                    }

                    if ($cont_faltas >= 5) {

                        $this->respuesta = "all";
                        $this->mensaje .= " - $documento $nombre $apellido <br>";
                    }
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "No registra participantes en los semilleros asignados.";
            }
            $this->link->desconectar();
        }
    }

    //Permite consultar los registros de todos los participantes, luego se busca cada participantes en cada uno de los talleres psicosocial que se le ha registrado
    //al semillero al que pertenece, luego se cuenta las inasistencias, y si es mayor a 5 se retorna un mensaje de aviso con la información del participante
    //que registra 5 o mas faltas.
    function validarAsisteciaTalleresPsico() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            //Consulta general de los datos de los niños.
            $sql = "SELECT f.idFicha, s.idSemillero, f.documento, f.nombres, f.apellidos FROM tbl_ficha_sociofamiliar f INNER JOIN tbl_semilleros s ON f.idSemillero = s.idSemillero WHERE f.isdel = '1'";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $idFicha = "";
                $idSemillero = "";
                $documento = "";
                $nombre = "";
                $apellido = "";
                while ($aRow = $rs->fetch_array()) {

                    $cont_faltas = 0;
                    $idFicha = $aRow['idFicha'];
                    $idSemillero = $aRow['idSemillero'];
                    $documento = $aRow['documento'];
                    $nombre = $aRow['nombres'];
                    $apellido = $aRow['apellidos'];

                    $sqlT = "SELECT cadenaIdNinosTaller, asistenciaTaller FROM `tbl_talleres` WHERE idSemillero = '$idSemillero' AND tipoTaller = 'Taller Psicosocial' AND asistenciaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                    $rsT = $conexion->query($sqlT);

                    $cadenaIdNinosTaller = "";
                    $asistenciaTaller = "";

                    while ($aRowT = $rsT->fetch_array()) {

                        $cadenaIdNinosTaller = split(";", $aRowT['cadenaIdNinosTaller']);
                        $asistenciaTaller = split(";", $aRowT['asistenciaTaller']);

                        for ($i = 0; $i < sizeof($cadenaIdNinosTaller); $i++) {

                            if ($cadenaIdNinosTaller[$i] != "") {

                                if ($cadenaIdNinosTaller[$i] == $idFicha) {

                                    if ($asistenciaTaller[$i] == "0") {
                                        $cont_faltas++;
                                    }
                                }
                            }
                        }
                    }

                    if ($cont_faltas >= 5) {

                        $this->respuesta = "all";
                        $this->mensaje .= " - $documento $nombre $apellido <br>";
                    }
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "No registra participantes en los semilleros asignados.";
            }
            $this->link->desconectar();
        }
    }

    //Permite consultar los registros de todos los participantes, luego se busca cada participantes en cada uno de los talleres que se le ha registrado
    //al semillero al que pertenece, luego se mira si tiene alertas y las muestra.
    function validarAlertas() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            //Consulta general de los datos de los niños.
            $sql = "SELECT f.idFicha, s.idSemillero, s.nombreSemillero, f.documento, f.nombres, f.apellidos FROM tbl_ficha_sociofamiliar f INNER JOIN tbl_semilleros s ON f.idSemillero = s.idSemillero WHERE f.isdel = '1'";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $idFicha = "";
                $idSemillero = "";
                $nombreSemillero = "";
                $documento = "";
                $nombre = "";
                $apellido = "";
                while ($aRow = $rs->fetch_array()) {

                    $cont_faltas = 0;
                    $idFicha = $aRow['idFicha'];
                    $idSemillero = $aRow['idSemillero'];
                    $nombreSemillero = $aRow['nombreSemillero'];
                    $documento = $aRow['documento'];
                    $nombre = $aRow['nombres'];
                    $apellido = $aRow['apellidos'];

                    $sqlT = "SELECT cadenaIdNinosTaller, observacion FROM `tbl_talleres` WHERE idSemillero = '$idSemillero' AND asistenciaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                    $rsT = $conexion->query($sqlT);

                    $cadenaIdNinosTaller = "";
                    $observacion = "";

                    while ($aRowT = $rsT->fetch_array()) {

                        $cadenaIdNinosTaller = split(";", $aRowT['cadenaIdNinosTaller']);
                        $observacion = split(";", $aRowT['observacion']);

                        for ($i = 0; $i < sizeof($cadenaIdNinosTaller); $i++) {

                            if ($cadenaIdNinosTaller[$i] != "") {

                                if ($cadenaIdNinosTaller[$i] == $idFicha) {

                                    if ($observacion[$i] != "") {
                                         $this->respuesta = "all";
                                         $this->mensaje .= " - $documento $nombre $apellido :: $nombreSemillero $observacion<br>";
                                    }
                                }
                            }
                        }
                    }

                    if ($observacion[$i] != "") {
                         $this->respuesta = "all";
                         $this->mensaje .= " - $documento $nombre $apellido :: $nombreSemillero $observacion<br>";
                    }
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "No registra participantes en los semilleros asignados.";
            }
            $this->link->desconectar();
        }
    }



     function contarFichas() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarfichas FROM `tbl_ficha_sociofamiliar` WHERE isdel = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Fichas Socio Familiares Existentes: ".$numero['contarfichas']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

    function contarFichaseliminadas() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarfichaseli FROM `tbl_ficha_sociofamiliar` WHERE isdel = 0";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Fichas Socio Familiares Eliminadas: ".$numero['contarfichaseli']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

}

//$x = new libFichaSocioFamiliar;
//$x->setIdFacilitador('4');
//$x->setFechaDeshabilitado('2016-02-09');
//$x->validarAsisteciaTalleres();
//echo $x->getMensaje();
