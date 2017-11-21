<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libFichaSocioFamiliar.php';

$GLOBALS['objUsu'] = new libFichaSocioFamiliar();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar ficha niños, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '1': {

            $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
            $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
            $idCiudadNacimiento = isset($_POST['ciudadNacimiento']) ? $_POST['ciudadNacimiento'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : "";
            $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
            $tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : "";
            $documento = isset($_POST['documento']) ? $_POST['documento'] : "";
            $RH = isset($_POST['rh']) ? $_POST['rh'] : "";
            $tipoDeSeguridad = isset($_POST['tipoSeguridad']) ? $_POST['tipoSeguridad'] : "";
            $eps_sisben = isset($_POST['entidad']) ? $_POST['entidad'] : "";
            $telefono = isset($_POST['telefonoN']) ? $_POST['telefonoN'] : "";
            $ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : "";
            $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
            $direccion = isset($_POST['direccionN']) ? $_POST['direccionN'] : "";
            $barrioOvereda = isset($_POST['barrioOvereda']) ? $_POST['barrioOvereda'] : "";
            $barrio_vereda = isset($_POST['barrioN']) ? $_POST['barrioN'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $idCiudadResidencia = isset($_POST['ciudadResidencia']) ? $_POST['ciudadResidencia'] : "";
            $institucion = isset($_POST['institucion']) ? $_POST['institucion'] : "";
            $grado = isset($_POST['grado']) ? $_POST['grado'] : "";
            $repitencia = isset($_POST['repitencia']) ? $_POST['repitencia'] : "";
            $cuantos = isset($_POST['cuantos']) ? $_POST['cuantos'] : "";
            $cuales = isset($_POST['cualesRepite']) ? $_POST['cualesRepite'] : "";
            $anoDeIngreso = isset($_POST['anoIngreso']) ? $_POST['anoIngreso'] : "";
            $anosDePermanencia = isset($_POST['anoPermanencia']) ? $_POST['anoPermanencia'] : "";
            $nombreMadre_Padre = isset($_POST['nombresPadre']) ? $_POST['nombresPadre'] : "";
            $telefonoMadre_Padre = isset($_POST['telefonoPadre']) ? $_POST['telefonoPadre'] : "";
            $celularMadre_padre = isset($_POST['celularPadre']) ? $_POST['celularPadre'] : "";
            $nombreCuidador = isset($_POST['nombresCuidador']) ? $_POST['nombresCuidador'] : "";
            $parentezcoCuidador = isset($_POST['parentezcoCuidador']) ? $_POST['parentezcoCuidador'] : "";
            $telefonoCuidador = isset($_POST['telefonoCuidador']) ? $_POST['telefonoCuidador'] : "";
            $celularCuidador = isset($_POST['celularCuidador']) ? $_POST['celularCuidador'] : "";
            $tipologiaFamiliar = isset($_POST['tipologia']) ? $_POST['tipologia'] : "";
            $miembrosFamilia = isset($_POST['numeroMiembros']) ? $_POST['numeroMiembros'] : "";
            $personasEmpleoFormal = isset($_POST['empleoFormal']) ? $_POST['empleoFormal'] : "";
            $personasEmpleoInformal = isset($_POST['empleoInformal']) ? $_POST['empleoInformal'] : "";
            $desplazado = isset($_POST['desplazado']) ? $_POST['desplazado'] : "";
            $registro = isset($_POST['registro']) ? $_POST['registro'] : "";            
            $victima = isset($_POST['victima']) ? $_POST['victima'] : "";
            $registro_victima = isset($_POST['registroVictima']) ? $_POST['registroVictima'] : "";
            $etnia = isset($_POST['etnia']) ? $_POST['etnia'] : "";
            $discapacidad = isset($_POST['discapacidad']) ? $_POST['discapacidad'] : "";
            $observacionDiscapacidad = isset($_POST['observacionDiscapa']) ? $_POST['observacionDiscapa'] : "";
            $familiaresEmpresa = isset($_POST['familiarEmpresa']) ? $_POST['familiarEmpresa'] : "";
            $compania = isset($_POST['compania']) ? $_POST['compania'] : "";
            $tipoVinculacion = isset($_POST['tipoVinculacion']) ? $_POST['tipoVinculacion'] : "";
            $nombreParentezco = isset($_POST['nombresFamiliarEmpresa']) ? $_POST['nombresFamiliarEmpresa'] : "";
            $idSemillero = isset($_POST['semilleroN']) ? $_POST['semilleroN'] : "";            
            $participa_otro_semillero = isset($_POST['participaOtroSemillero']) ? $_POST['participaOtroSemillero'] : "";
            $otros_semilleros = isset($_POST['otroSemilleros']) ? $_POST['otroSemilleros'] : "";
            $participa_servicios = isset($_POST['participaServicios']) ? $_POST['participaServicios'] : "";
            $que_servicios = isset($_POST['queSemilleros']) ? $_POST['queSemilleros'] : "";
            $anoRegistro = $fechaSistema;

            $GLOBALS['objUsu']->setNombres(strtoupper(strtr($nombres, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidos(strtoupper(strtr($apellidos, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setIdCiudadNacimiento($idCiudadNacimiento);
            $GLOBALS['objUsu']->setFechaNacimiento(strtoupper($fechaNacimiento));
            $GLOBALS['objUsu']->setEdad(strtoupper($edad));
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento(strtoupper($documento));
            $GLOBALS['objUsu']->setRH(strtoupper($RH));
            $GLOBALS['objUsu']->setTipoDeSeguridad(strtoupper($tipoDeSeguridad));
            $GLOBALS['objUsu']->setEps_sisben(strtoupper($eps_sisben));
            $GLOBALS['objUsu']->setTelefono(strtoupper($telefono));
            $GLOBALS['objUsu']->setOcupacion(strtoupper(strtr($ocupacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setCelular(strtoupper($celular));
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setBarrioOvereda(strtoupper($barrioOvereda));
            $GLOBALS['objUsu']->setBarrio_vereda(strtoupper(strtr($barrio_vereda, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setIdCiudadResidencia($idCiudadResidencia);
            $GLOBALS['objUsu']->setInstitucion(strtoupper(strtr($institucion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setGrado(strtoupper($grado));
            $GLOBALS['objUsu']->setRepitencia(strtoupper($repitencia));
            $GLOBALS['objUsu']->setCuantos(strtoupper($cuantos));
            $GLOBALS['objUsu']->setCuales(strtoupper($cuales));
            $GLOBALS['objUsu']->setAnoDeIngreso(strtoupper($anoDeIngreso));
            $GLOBALS['objUsu']->setAnosDePermanencia(strtoupper($anosDePermanencia));
            $GLOBALS['objUsu']->setNombreMadre_Padre(strtoupper(strtr($nombreMadre_Padre, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoMadre_Padre(strtoupper($telefonoMadre_Padre));
            $GLOBALS['objUsu']->setCelularMadre_padre(strtoupper($celularMadre_padre));
            $GLOBALS['objUsu']->setNombreCuidador(strtoupper(strtr($nombreCuidador, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParentezcoCuidador(strtoupper(strtr($parentezcoCuidador, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoCuidador(strtoupper($telefonoCuidador));
            $GLOBALS['objUsu']->setCelularCuidador(strtoupper($celularCuidador));
            $GLOBALS['objUsu']->setTipologiaFamiliar(strtoupper($tipologiaFamiliar));
            $GLOBALS['objUsu']->setMiembrosFamilia(strtoupper($miembrosFamilia));
            $GLOBALS['objUsu']->setPersonasEmpleoFormal(strtoupper($personasEmpleoFormal));
            $GLOBALS['objUsu']->setPersonasEmpleoInformal(strtoupper($personasEmpleoInformal));
            $GLOBALS['objUsu']->setDesplazado(strtoupper($desplazado));
            $GLOBALS['objUsu']->setRegistro(strtoupper($registro));
            $GLOBALS['objUsu']->setVictima(strtoupper($victima));
            $GLOBALS['objUsu']->setRegistro_victima(strtoupper($registro_victima));            
            $GLOBALS['objUsu']->setEtnia(strtoupper($etnia));
            $GLOBALS['objUsu']->setDiscapacidad(strtoupper($discapacidad));
            $GLOBALS['objUsu']->setObservacionDiscapacidad(strtoupper($observacionDiscapacidad));
            $GLOBALS['objUsu']->setFamiliaresEmpresa(strtoupper($familiaresEmpresa));
            $GLOBALS['objUsu']->setCompania(strtoupper($compania));
            $GLOBALS['objUsu']->setTipoVinculacion(strtoupper($tipoVinculacion));
            $GLOBALS['objUsu']->setNombreParentezco(strtoupper(strtr($nombreParentezco, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdSemillero($idSemillero);            
            $GLOBALS['objUsu']->setParticipa_otro_semillero(strtoupper($participa_otro_semillero));
            $GLOBALS['objUsu']->setOtros_semilleros(strtoupper(strtr($otros_semilleros, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParticipa_servicios(strtoupper($participa_servicios));
            $GLOBALS['objUsu']->setQue_servicios(strtoupper(strtr($que_servicios, "áéíóúñ", "ÁÉÍÓÚÑ")));
            
            $GLOBALS['objUsu']->setAnoRegistro(strtoupper($anoRegistro));

            $GLOBALS['objUsu']->registrarFichaNinos();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 2 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar ficha adultos, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '2': {

            $idSemillero = isset($_POST['semilleroAdulto']) ? $_POST['semilleroAdulto'] : "";
            $nombres = isset($_POST['nombresAdulto']) ? $_POST['nombresAdulto'] : "";
            $apellidos = isset($_POST['apellidosAdulto']) ? $_POST['apellidosAdulto'] : "";
            $sexo = isset($_POST['sexoAdulto']) ? $_POST['sexoAdulto'] : "";
            $idCiudadNacimiento = isset($_POST['ciudadNacimientoAdulto']) ? $_POST['ciudadNacimientoAdulto'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimientoAdulto']) ? $_POST['fechaNacimientoAdulto'] : "";
            $edad = isset($_POST['edadAdulto']) ? $_POST['edadAdulto'] : "";
            $tipoDocumento = isset($_POST['tipoDocumentoAdulto']) ? $_POST['tipoDocumentoAdulto'] : "";
            $documento = isset($_POST['documentoAdulto']) ? $_POST['documentoAdulto'] : "";
            $RH = isset($_POST['rhAdulto']) ? $_POST['rhAdulto'] : "";
            $tipoDeSeguridad = isset($_POST['tipoSeguridadAdulto']) ? $_POST['tipoSeguridadAdulto'] : "";
            $eps_sisben = isset($_POST['entidadAdulto']) ? $_POST['entidadAdulto'] : "";
            $telefono = isset($_POST['telefonoAdulto']) ? $_POST['telefonoAdulto'] : "";
            $ocupacion = isset($_POST['ocupacionAdulto']) ? $_POST['ocupacionAdulto'] : "";
            $celular = isset($_POST['celularAdulto']) ? $_POST['celularAdulto'] : "";
            $direccion = isset($_POST['direccionAdulto']) ? $_POST['direccionAdulto'] : "";
            $barrioOvereda = isset($_POST['barrioOveredaAdulto']) ? $_POST['barrioOveredaAdulto'] : "";
            $barrio_vereda = isset($_POST['barrioAdulto']) ? $_POST['barrioAdulto'] : "";
            $email = isset($_POST['emailAdulto']) ? $_POST['emailAdulto'] : "";
            $idCiudadResidencia = isset($_POST['ciudadResidenciaAdulto']) ? $_POST['ciudadResidenciaAdulto'] : "";
            $nivelEscolaridad = isset($_POST['nivelEscolaridad']) ? $_POST['nivelEscolaridad'] : "";
            $estadoEscolarizacion = isset($_POST['estadoEscolaridad']) ? $_POST['estadoEscolaridad'] : "";
            $areaEspecializacion = isset($_POST['areaProfesionalizacion']) ? $_POST['areaProfesionalizacion'] : "";
            $anoDeIngreso = isset($_POST['anoIngresoAdulto']) ? $_POST['anoIngresoAdulto'] : "";
            $anosDePermanencia = isset($_POST['anoPermanenciaAdulto']) ? $_POST['anoPermanenciaAdulto'] : "";
            $nombreNino = isset($_POST['nombresNino']) ? $_POST['nombresNino'] : "";
            $parentezcoNino = isset($_POST['parentezcoNino']) ? $_POST['parentezcoNino'] : "";
            $programa = isset($_POST['programaNino']) ? $_POST['programaNino'] : "";
            $tipologiaFamiliar = isset($_POST['tipologiaAdulto']) ? $_POST['tipologiaAdulto'] : "";
            $discapacidad = isset($_POST['discapacidadAdulto']) ? $_POST['discapacidadAdulto'] : "";
            $observacionDiscapacidad = isset($_POST['observacionDiscapaAdulto']) ? $_POST['observacionDiscapaAdulto'] : "";
            $desplazado = isset($_POST['desplazadoAdulto']) ? $_POST['desplazadoAdulto'] : "";
            $registro = isset($_POST['registroAdulto']) ? $_POST['registroAdulto'] : "";
            $victima = isset($_POST['victimaAdulto']) ? $_POST['victimaAdulto'] : "";
            $registro_victima = isset($_POST['registroVictimaAdulto']) ? $_POST['registroVictimaAdulto'] : "";
            $etnia = isset($_POST['etniaAdulto']) ? $_POST['etniaAdulto'] : "";
            $miembrosFamilia = isset($_POST['numeroMiembrosAdulto']) ? $_POST['numeroMiembrosAdulto'] : "";
            $personasEmpleoFormal = isset($_POST['empleoFormalAdulto']) ? $_POST['empleoFormalAdulto'] : "";
            $personasEmpleoInformal = isset($_POST['empleoInformalAdulto']) ? $_POST['empleoInformalAdulto'] : "";
            $familiaresEmpresa = isset($_POST['familiarEmpresaAdulto']) ? $_POST['familiarEmpresaAdulto'] : "";
            $compania = isset($_POST['companiaAdulto']) ? $_POST['companiaAdulto'] : "";
            $tipoVinculacion = isset($_POST['tipoVinculacionAdulto']) ? $_POST['tipoVinculacionAdulto'] : "";
            $nombreParentezco = isset($_POST['nombresFamiliarEmpresaAdulto']) ? $_POST['nombresFamiliarEmpresaAdulto'] : "";
            $anoRegistro = $fechaSistema;

            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setNombres(strtoupper(strtr($nombres, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidos(strtoupper(strtr($apellidos, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setIdCiudadNacimiento($idCiudadNacimiento);
            $GLOBALS['objUsu']->setFechaNacimiento(strtoupper($fechaNacimiento));
            $GLOBALS['objUsu']->setEdad(strtoupper($edad));
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento(strtoupper($documento));
            $GLOBALS['objUsu']->setRH(strtoupper($RH));
            $GLOBALS['objUsu']->setTipoDeSeguridad(strtoupper($tipoDeSeguridad));
            $GLOBALS['objUsu']->setEps_sisben(strtoupper($eps_sisben));
            $GLOBALS['objUsu']->setTelefono(strtoupper($telefono));
            $GLOBALS['objUsu']->setOcupacion(strtoupper(strtr($ocupacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setCelular(strtoupper($celular));
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setBarrioOvereda(strtoupper($barrioOvereda));
            $GLOBALS['objUsu']->setBarrio_vereda(strtoupper(strtr($barrio_vereda, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setIdCiudadResidencia($idCiudadResidencia);
            $GLOBALS['objUsu']->setNivelEscolaridad(strtoupper($nivelEscolaridad));
            $GLOBALS['objUsu']->setEstadoEscolarizacion(strtoupper($estadoEscolarizacion));
            $GLOBALS['objUsu']->setAreaEspecializacion(strtoupper(strtr($areaEspecializacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAnoDeIngreso(strtoupper($anoDeIngreso));
            $GLOBALS['objUsu']->setAnosDePermanencia(strtoupper($anosDePermanencia));
            $GLOBALS['objUsu']->setNombreNino(strtoupper(strtr($nombreNino, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParentezcoNino(strtoupper(strtr($parentezcoNino, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setPrograma(strtoupper(strtr($programa, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTipologiaFamiliar(strtoupper($tipologiaFamiliar));
            $GLOBALS['objUsu']->setDiscapacidad(strtoupper($discapacidad));
            $GLOBALS['objUsu']->setObservacionDiscapacidad(strtoupper($observacionDiscapacidad));
            $GLOBALS['objUsu']->setDesplazado(strtoupper($desplazado));
            $GLOBALS['objUsu']->setRegistro(strtoupper($registro));
            $GLOBALS['objUsu']->setVictima(strtoupper($victima));
            $GLOBALS['objUsu']->setRegistro_victima(strtoupper($registro_victima)); 
            $GLOBALS['objUsu']->setEtnia(strtoupper($etnia));
            $GLOBALS['objUsu']->setMiembrosFamilia(strtoupper($miembrosFamilia));
            $GLOBALS['objUsu']->setPersonasEmpleoFormal(strtoupper($personasEmpleoFormal));
            $GLOBALS['objUsu']->setPersonasEmpleoInformal(strtoupper($personasEmpleoInformal));
            $GLOBALS['objUsu']->setFamiliaresEmpresa(strtoupper($familiaresEmpresa));
            $GLOBALS['objUsu']->setCompania(strtoupper($compania));
            $GLOBALS['objUsu']->setTipoVinculacion(strtoupper($tipoVinculacion));
            $GLOBALS['objUsu']->setNombreParentezco(strtoupper(strtr($nombreParentezco, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->registrarFichaAdultos();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo consultar ficha, este retorna un vector con toda la información del registro.
    case '3': {

            $idFicha = isset($_POST['idFicha']) ? $_POST['idFicha'] : "";

            $GLOBALS['objUsu']->setIdFicha($idFicha);

            $GLOBALS['objUsu']->consultarFicha();
            $GLOBALS['objUsu']->consultarUrl();

            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult(), 'row2' => $GLOBALS['objUsu']->getResult2()));
            break;
        }

    //El caso 4 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar ficha niños, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '4': {

            $idFicha = isset($_POST['idFichaNinos']) ? $_POST['idFichaNinos'] : "";
            $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
            $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
            $idCiudadNacimiento = isset($_POST['ciudadNacimiento']) ? $_POST['ciudadNacimiento'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : "";
            $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
            $tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : "";
            $documento = isset($_POST['documento']) ? $_POST['documento'] : "";
            $RH = isset($_POST['rh']) ? $_POST['rh'] : "";
            $tipoDeSeguridad = isset($_POST['tipoSeguridad']) ? $_POST['tipoSeguridad'] : "";
            $eps_sisben = isset($_POST['entidad']) ? $_POST['entidad'] : "";
            $telefono = isset($_POST['telefonoN']) ? $_POST['telefonoN'] : "";
            $ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : "";
            $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
            $direccion = isset($_POST['direccionN']) ? $_POST['direccionN'] : "";
            $barrioOvereda = isset($_POST['barrioOvereda']) ? $_POST['barrioOvereda'] : "";
            $barrio_vereda = isset($_POST['barrioN']) ? $_POST['barrioN'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $idCiudadResidencia = isset($_POST['ciudadResidencia']) ? $_POST['ciudadResidencia'] : "";
            $institucion = isset($_POST['institucion']) ? $_POST['institucion'] : "";
            $grado = isset($_POST['grado']) ? $_POST['grado'] : "";
            $repitencia = isset($_POST['repitencia']) ? $_POST['repitencia'] : "";
            $cuantos = isset($_POST['cuantos']) ? $_POST['cuantos'] : "";
            $cuales = isset($_POST['cualesRepite']) ? $_POST['cualesRepite'] : "";
            $anoDeIngreso = isset($_POST['anoIngreso']) ? $_POST['anoIngreso'] : "";
            $anosDePermanencia = isset($_POST['anoPermanencia']) ? $_POST['anoPermanencia'] : "";
            $nombreMadre_Padre = isset($_POST['nombresPadre']) ? $_POST['nombresPadre'] : "";
            $telefonoMadre_Padre = isset($_POST['telefonoPadre']) ? $_POST['telefonoPadre'] : "";
            $celularMadre_padre = isset($_POST['celularPadre']) ? $_POST['celularPadre'] : "";
            $nombreCuidador = isset($_POST['nombresCuidador']) ? $_POST['nombresCuidador'] : "";
            $parentezcoCuidador = isset($_POST['parentezcoCuidador']) ? $_POST['parentezcoCuidador'] : "";
            $telefonoCuidador = isset($_POST['telefonoCuidador']) ? $_POST['telefonoCuidador'] : "";
            $celularCuidador = isset($_POST['celularCuidador']) ? $_POST['celularCuidador'] : "";
            $tipologiaFamiliar = isset($_POST['tipologia']) ? $_POST['tipologia'] : "";
            $miembrosFamilia = isset($_POST['numeroMiembros']) ? $_POST['numeroMiembros'] : "";
            $personasEmpleoFormal = isset($_POST['empleoFormal']) ? $_POST['empleoFormal'] : "";
            $personasEmpleoInformal = isset($_POST['empleoInformal']) ? $_POST['empleoInformal'] : "";
            $desplazado = isset($_POST['desplazado']) ? $_POST['desplazado'] : "";
            $registro = isset($_POST['registro']) ? $_POST['registro'] : "";
            $victima = isset($_POST['victima']) ? $_POST['victima'] : "";
            $registro_victima = isset($_POST['registroVictima']) ? $_POST['registroVictima'] : "";
            $etnia = isset($_POST['etnia']) ? $_POST['etnia'] : "";
            $discapacidad = isset($_POST['discapacidad']) ? $_POST['discapacidad'] : "";
            $observacionDiscapacidad = isset($_POST['observacionDiscapa']) ? $_POST['observacionDiscapa'] : "";
            $familiaresEmpresa = isset($_POST['familiarEmpresa']) ? $_POST['familiarEmpresa'] : "";
            $compania = isset($_POST['compania']) ? $_POST['compania'] : "";
            $tipoVinculacion = isset($_POST['tipoVinculacion']) ? $_POST['tipoVinculacion'] : "";
            $nombreParentezco = isset($_POST['nombresFamiliarEmpresa']) ? $_POST['nombresFamiliarEmpresa'] : "";
            $idSemillero = isset($_POST['semilleroN']) ? $_POST['semilleroN'] : "";
            $participa_otro_semillero = isset($_POST['participaOtroSemillero']) ? $_POST['participaOtroSemillero'] : "";
            $otros_semilleros = isset($_POST['otroSemilleros']) ? $_POST['otroSemilleros'] : "";
            $participa_servicios = isset($_POST['participaServicios']) ? $_POST['participaServicios'] : "";
            $que_servicios = isset($_POST['queSemilleros']) ? $_POST['queSemilleros'] : "";
            $anoRegistro = $fechaCompletaSistema;

            $GLOBALS['objUsu']->setIdFicha($idFicha);
            $GLOBALS['objUsu']->setNombres(strtoupper(strtr($nombres, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidos(strtoupper(strtr($apellidos, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setIdCiudadNacimiento($idCiudadNacimiento);
            $GLOBALS['objUsu']->setFechaNacimiento(strtoupper($fechaNacimiento));
            $GLOBALS['objUsu']->setEdad(strtoupper($edad));
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento(strtoupper($documento));
            $GLOBALS['objUsu']->setRH(strtoupper($RH));
            $GLOBALS['objUsu']->setTipoDeSeguridad(strtoupper($tipoDeSeguridad));
            $GLOBALS['objUsu']->setEps_sisben(strtoupper($eps_sisben));
            $GLOBALS['objUsu']->setTelefono(strtoupper($telefono));
            $GLOBALS['objUsu']->setOcupacion(strtoupper(strtr($ocupacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setCelular(strtoupper($celular));
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setBarrioOvereda(strtoupper(strtr($barrioOvereda, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setBarrio_vereda(strtoupper($barrio_vereda));
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setIdCiudadResidencia($idCiudadResidencia);
            $GLOBALS['objUsu']->setInstitucion(strtoupper(strtr($institucion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setGrado(strtoupper($grado));
            $GLOBALS['objUsu']->setRepitencia(strtoupper($repitencia));
            $GLOBALS['objUsu']->setCuantos(strtoupper($cuantos));
            $GLOBALS['objUsu']->setCuales(strtoupper($cuales));
            $GLOBALS['objUsu']->setAnoDeIngreso(strtoupper($anoDeIngreso));
            $GLOBALS['objUsu']->setAnosDePermanencia(strtoupper($anosDePermanencia));
            $GLOBALS['objUsu']->setNombreMadre_Padre(strtoupper(strtr($nombreMadre_Padre, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoMadre_Padre(strtoupper($telefonoMadre_Padre));
            $GLOBALS['objUsu']->setCelularMadre_padre(strtoupper($celularMadre_padre));
            $GLOBALS['objUsu']->setNombreCuidador(strtoupper(strtr($nombreCuidador, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParentezcoCuidador(strtoupper(strtr($parentezcoCuidador, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoCuidador(strtoupper($telefonoCuidador));
            $GLOBALS['objUsu']->setCelularCuidador(strtoupper($celularCuidador));
            $GLOBALS['objUsu']->setTipologiaFamiliar(strtoupper($tipologiaFamiliar));
            $GLOBALS['objUsu']->setMiembrosFamilia(strtoupper($miembrosFamilia));
            $GLOBALS['objUsu']->setPersonasEmpleoFormal(strtoupper($personasEmpleoFormal));
            $GLOBALS['objUsu']->setPersonasEmpleoInformal(strtoupper($personasEmpleoInformal));
            $GLOBALS['objUsu']->setDesplazado(strtoupper($desplazado));
            $GLOBALS['objUsu']->setRegistro(strtoupper($registro));
            $GLOBALS['objUsu']->setVictima(strtoupper($victima));
            $GLOBALS['objUsu']->setRegistro_victima(strtoupper($registro_victima)); 
            $GLOBALS['objUsu']->setEtnia(strtoupper($etnia));
            $GLOBALS['objUsu']->setDiscapacidad(strtoupper($discapacidad));
            $GLOBALS['objUsu']->setObservacionDiscapacidad(strtoupper($observacionDiscapacidad));
            $GLOBALS['objUsu']->setFamiliaresEmpresa(strtoupper($familiaresEmpresa));
            $GLOBALS['objUsu']->setCompania(strtoupper($compania));
            $GLOBALS['objUsu']->setTipoVinculacion(strtoupper($tipoVinculacion));
            $GLOBALS['objUsu']->setNombreParentezco(strtoupper(strtr($nombreParentezco, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setParticipa_otro_semillero(strtoupper($participa_otro_semillero));
            $GLOBALS['objUsu']->setOtros_semilleros(strtoupper(strtr($otros_semilleros, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParticipa_servicios(strtoupper($participa_servicios));
            $GLOBALS['objUsu']->setQue_servicios(strtoupper(strtr($que_servicios, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->actualizarFichaNinos();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar ficha adultos, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.  
    case '5': {

            $idFicha = isset($_POST['idFichaAdultos']) ? $_POST['idFichaAdultos'] : "";
            $idSemillero = isset($_POST['semilleroAdulto']) ? $_POST['semilleroAdulto'] : "";
            $nombres = isset($_POST['nombresAdulto']) ? $_POST['nombresAdulto'] : "";
            $apellidos = isset($_POST['apellidosAdulto']) ? $_POST['apellidosAdulto'] : "";
            $sexo = isset($_POST['sexoAdulto']) ? $_POST['sexoAdulto'] : "";
            $idCiudadNacimiento = isset($_POST['ciudadNacimientoAdulto']) ? $_POST['ciudadNacimientoAdulto'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimientoAdulto']) ? $_POST['fechaNacimientoAdulto'] : "";
            $edad = isset($_POST['edadAdulto']) ? $_POST['edadAdulto'] : "";
            $tipoDocumento = isset($_POST['tipoDocumentoAdulto']) ? $_POST['tipoDocumentoAdulto'] : "";
            $documento = isset($_POST['documentoAdulto']) ? $_POST['documentoAdulto'] : "";
            $RH = isset($_POST['rhAdulto']) ? $_POST['rhAdulto'] : "";
            $tipoDeSeguridad = isset($_POST['tipoSeguridadAdulto']) ? $_POST['tipoSeguridadAdulto'] : "";
            $eps_sisben = isset($_POST['entidadAdulto']) ? $_POST['entidadAdulto'] : "";
            $telefono = isset($_POST['telefonoAdulto']) ? $_POST['telefonoAdulto'] : "";
            $ocupacion = isset($_POST['ocupacionAdulto']) ? $_POST['ocupacionAdulto'] : "";
            $celular = isset($_POST['celularAdulto']) ? $_POST['celularAdulto'] : "";
            $direccion = isset($_POST['direccionAdulto']) ? $_POST['direccionAdulto'] : "";
            $barrioOvereda = isset($_POST['barrioOveredaAdulto']) ? $_POST['barrioOveredaAdulto'] : "";
            $barrio_vereda = isset($_POST['barrioAdulto']) ? $_POST['barrioAdulto'] : "";
            $email = isset($_POST['emailAdulto']) ? $_POST['emailAdulto'] : "";
            $idCiudadResidencia = isset($_POST['ciudadResidenciaAdulto']) ? $_POST['ciudadResidenciaAdulto'] : "";
            $nivelEscolaridad = isset($_POST['nivelEscolaridad']) ? $_POST['nivelEscolaridad'] : "";
            $estadoEscolarizacion = isset($_POST['estadoEscolaridad']) ? $_POST['estadoEscolaridad'] : "";
            $areaEspecializacion = isset($_POST['areaProfesionalizacion']) ? $_POST['areaProfesionalizacion'] : "";
            $anoDeIngreso = isset($_POST['anoIngresoAdulto']) ? $_POST['anoIngresoAdulto'] : "";
            $anosDePermanencia = isset($_POST['anoPermanenciaAdulto']) ? $_POST['anoPermanenciaAdulto'] : "";
            $nombreNino = isset($_POST['nombresNino']) ? $_POST['nombresNino'] : "";
            $parentezcoNino = isset($_POST['parentezcoNino']) ? $_POST['parentezcoNino'] : "";
            $programa = isset($_POST['programaNino']) ? $_POST['programaNino'] : "";
            $tipologiaFamiliar = isset($_POST['tipologiaAdulto']) ? $_POST['tipologiaAdulto'] : "";
            $discapacidad = isset($_POST['discapacidadAdulto']) ? $_POST['discapacidadAdulto'] : "";
            $observacionDiscapacidad = isset($_POST['observacionDiscapaAdulto']) ? $_POST['observacionDiscapaAdulto'] : "";
            $desplazado = isset($_POST['desplazadoAdulto']) ? $_POST['desplazadoAdulto'] : "";
            $registro = isset($_POST['registroAdulto']) ? $_POST['registroAdulto'] : "";
            $victima = isset($_POST['victimaAdulto']) ? $_POST['victimaAdulto'] : "";
            $registro_victima = isset($_POST['registroVictimaAdulto']) ? $_POST['registroVictimaAdulto'] : "";
            $etnia = isset($_POST['etniaAdulto']) ? $_POST['etniaAdulto'] : "";
            $miembrosFamilia = isset($_POST['numeroMiembrosAdulto']) ? $_POST['numeroMiembrosAdulto'] : "";
            $personasEmpleoFormal = isset($_POST['empleoFormalAdulto']) ? $_POST['empleoFormalAdulto'] : "";
            $personasEmpleoInformal = isset($_POST['empleoInformalAdulto']) ? $_POST['empleoInformalAdulto'] : "";
            $familiaresEmpresa = isset($_POST['familiarEmpresaAdulto']) ? $_POST['familiarEmpresaAdulto'] : "";
            $compania = isset($_POST['companiaAdulto']) ? $_POST['companiaAdulto'] : "";
            $tipoVinculacion = isset($_POST['tipoVinculacionAdulto']) ? $_POST['tipoVinculacionAdulto'] : "";
            $nombreParentezco = isset($_POST['nombresFamiliarEmpresaAdulto']) ? $_POST['nombresFamiliarEmpresaAdulto'] : "";
            $anoRegistro = $fechaCompletaSistema;

            $GLOBALS['objUsu']->setIdFicha($idFicha);
            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setNombres(strtoupper(strtr($nombres, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidos(strtoupper(strtr($apellidos, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setIdCiudadNacimiento($idCiudadNacimiento);
            $GLOBALS['objUsu']->setFechaNacimiento(strtoupper($fechaNacimiento));
            $GLOBALS['objUsu']->setEdad(strtoupper($edad));
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento(strtoupper($documento));
            $GLOBALS['objUsu']->setRH(strtoupper($RH));
            $GLOBALS['objUsu']->setTipoDeSeguridad(strtoupper($tipoDeSeguridad));
            $GLOBALS['objUsu']->setEps_sisben(strtoupper($eps_sisben));
            $GLOBALS['objUsu']->setTelefono(strtoupper($telefono));
            $GLOBALS['objUsu']->setOcupacion(strtoupper(strtr($ocupacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setCelular(strtoupper($celular));
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setBarrioOvereda(strtoupper($barrioOvereda));
            $GLOBALS['objUsu']->setBarrio_vereda(strtoupper(strtr($barrio_vereda, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setIdCiudadResidencia($idCiudadResidencia);
            $GLOBALS['objUsu']->setNivelEscolaridad(strtoupper($nivelEscolaridad));
            $GLOBALS['objUsu']->setEstadoEscolarizacion(strtoupper($estadoEscolarizacion));
            $GLOBALS['objUsu']->setAreaEspecializacion(strtoupper(strtr($areaEspecializacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAnoDeIngreso(strtoupper($anoDeIngreso));
            $GLOBALS['objUsu']->setAnosDePermanencia(strtoupper($anosDePermanencia));
            $GLOBALS['objUsu']->setNombreNino(strtoupper(strtr($nombreNino, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParentezcoNino(strtoupper(strtr($parentezcoNino, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setPrograma(strtoupper($programa));
            $GLOBALS['objUsu']->setTipologiaFamiliar(strtoupper($tipologiaFamiliar));
            $GLOBALS['objUsu']->setDiscapacidad(strtoupper($discapacidad));
            $GLOBALS['objUsu']->setObservacionDiscapacidad(strtoupper($observacionDiscapacidad));
            $GLOBALS['objUsu']->setDesplazado(strtoupper($desplazado));
            $GLOBALS['objUsu']->setRegistro(strtoupper($registro));
            $GLOBALS['objUsu']->setVictima(strtoupper($victima));
            $GLOBALS['objUsu']->setRegistro_victima(strtoupper($registro_victima)); 
            $GLOBALS['objUsu']->setEtnia(strtoupper($etnia));
            $GLOBALS['objUsu']->setMiembrosFamilia(strtoupper($miembrosFamilia));
            $GLOBALS['objUsu']->setPersonasEmpleoFormal(strtoupper($personasEmpleoFormal));
            $GLOBALS['objUsu']->setPersonasEmpleoInformal(strtoupper($personasEmpleoInformal));
            $GLOBALS['objUsu']->setFamiliaresEmpresa(strtoupper($familiaresEmpresa));
            $GLOBALS['objUsu']->setCompania(strtoupper($compania));
            $GLOBALS['objUsu']->setTipoVinculacion(strtoupper($tipoVinculacion));
            $GLOBALS['objUsu']->setNombreParentezco(strtoupper(strtr($nombreParentezco, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->actualizarFichaAdultos();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 6 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este caso 
    //deshabilitar ficha, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta.
    case '6': {

            $idFicha = isset($_POST['idFicha']) ? $_POST['idFicha'] : "";
            $fechaDeshabilitado = $fechaCompletaSistema;

            $GLOBALS['objUsu']->setIdFicha($idFicha);
            $GLOBALS['objUsu']->setFechaDeshabilitado($fechaDeshabilitado);

            $GLOBALS['objUsu']->deshabilitarFicha();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 7 recibe el id del registro seleccionado, este dato es enviado por método set a la librería y se ejecuta el método llamado, en este 
    //caso habilitar ficha, y retorna una respuesta de ejecución y el mensaje correspondiente a la respuesta. 
    case '7': {

            $idFicha = isset($_POST['idFicha']) ? $_POST['idFicha'] : "";
            $fechaReingreso = $fechaCompletaSistema;

            $GLOBALS['objUsu']->setIdFicha($idFicha);
            $GLOBALS['objUsu']->setFechaReingreso($fechaReingreso);

            $GLOBALS['objUsu']->habilitarFicha();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 10 del controlador recibe la fecha del registro que está en ejecución, luego se le hace un Split para separar el año de la fecha 
    //y con este calcular la edad y retornarla a la interfaz.
    case '10': {

            //fecha actual
            $dia = date("j");
            $mes = date("n");
            $ano = date("Y");

            //fecha de nacimiento
            $dianaz = 0;
            $mesnaz = 0;
            $anonaz = 0;

            $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : "";

            $fecha = split("-", $fechaNacimiento);
            $anonaz = $fecha[0];
            $mesnaz = $fecha[1];
            $dianaz = $fecha[2];

            //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
            if (($mesnaz == $mes) && ($dianaz > $dia)) {
                $ano = ($ano - 1);
            }

            //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
            if ($mesnaz > $mes) {
                $ano = ($ano - 1);
            }

            //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
            $edad = ($ano - $anonaz);

            echo json_encode(array('result' => $edad));
            break;
        }

    //El caso 10 del controlador recibe la fecha del registro que está en ejecución, luego se compara con la fecha del sistema para
    //calcular los años de permanencia en el semillero y retornarla a la interfaz.
    case '11': {

            $idFicha = isset($_POST['idFicha']) ? $_POST['idFicha'] : "";

            if ($idFicha != "") {

                $anoDeIngreso = isset($_POST['anoIngreso']) ? $_POST['anoIngreso'] : "";
                $anosDePermanencia = $fechaSistema - $anoDeIngreso;

                $GLOBALS['objUsu']->setIdFicha($idFicha);
                $GLOBALS['objUsu']->calcularPermanenciaSemillero($anosDePermanencia);
                echo json_encode(array('result' => $GLOBALS['objUsu']->getResult()));
            } else {

                $anoDeIngreso = isset($_POST['anoIngreso']) ? $_POST['anoIngreso'] : "";
                $anosDePermanencia = $fechaSistema - $anoDeIngreso;

                echo json_encode(array('result' => $anosDePermanencia));
            }
            break;
        }

    case '12': {

            $idFacilitador = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setIdFacilitador($idFacilitador);

            $GLOBALS['objUsu']->validarAsisteciaTalleres();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    case '13': {

            $GLOBALS['objUsu']->validarAsisteciaTalleresPsico();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    case '14': {

            $GLOBALS['objUsu']->validarAsisteciaTalleresAdmin();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 15 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar voluntarios y egresados, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '15': {

            $idSemillero = isset($_POST['semilleroVolunEgres']) ? $_POST['semilleroVolunEgres'] : "";
            $tipoDocumento = isset($_POST['tipoDocumentoVolunEgres']) ? $_POST['tipoDocumentoVolunEgres'] : "";
            $documento = isset($_POST['documentoVolunEgres']) ? $_POST['documentoVolunEgres'] : "";
            $nombres = isset($_POST['nombresVolunEgres']) ? $_POST['nombresVolunEgres'] : "";
            $apellidos = isset($_POST['apellidosVolunEgres']) ? $_POST['apellidosVolunEgres'] : "";
            $sexo = isset($_POST['sexoVolunEgres']) ? $_POST['sexoVolunEgres'] : "";
            $idCiudadNacimiento = isset($_POST['ciudadNacimientoVolunEgres']) ? $_POST['ciudadNacimientoVolunEgres'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimientoVolunEgres']) ? $_POST['fechaNacimientoVolunEgres'] : "";
            $edad = isset($_POST['edadVolunEgres']) ? $_POST['edadVolunEgres'] : "";
            $estado_civil = isset($_POST['estadoCivilVolunEgres']) ? $_POST['estadoCivilVolunEgres'] : "";
            $numero_hijos = isset($_POST['numeroHijosVolunEgres']) ? $_POST['numeroHijosVolunEgres'] : "";
            $promocion_egresado = isset($_POST['promocionVolunEgres']) ? $_POST['promocionVolunEgres'] : "";
            $anoDeIngreso = isset($_POST['anoIngresoVolunEgres']) ? $_POST['anoIngresoVolunEgres'] : "";
            $anosDePermanencia = isset($_POST['anoPermanenciaVolunEgres']) ? $_POST['anoPermanenciaVolunEgres'] : "";
            $idCiudadResidencia = isset($_POST['ciudadResidenciaVolunEgres']) ? $_POST['ciudadResidenciaVolunEgres'] : "";
            $barrioOvereda = isset($_POST['barrioOveredaVolunEgres']) ? $_POST['barrioOveredaVolunEgres'] : "";
            $barrio_vereda = isset($_POST['barrioVolunEgres']) ? $_POST['barrioVolunEgres'] : "";
            $direccion = isset($_POST['direccionVolunEgres']) ? $_POST['direccionVolunEgres'] : "";
            $telefono = isset($_POST['telefonoVolunEgres']) ? $_POST['telefonoVolunEgres'] : "";
            $celular = isset($_POST['celularVolunEgres']) ? $_POST['celularVolunEgres'] : "";
            $email = isset($_POST['emailVolunEgres']) ? $_POST['emailVolunEgres'] : "";
            $nivelEscolaridad = isset($_POST['nivelEscolaridadVolunEgres']) ? $_POST['nivelEscolaridadVolunEgres'] : "";
            $estadoEscolarizacion = isset($_POST['estadoEscolaridadVolunEgres']) ? $_POST['estadoEscolaridadVolunEgres'] : "";
            $semestre_escolaridad = isset($_POST['semestreVolunEgres']) ? $_POST['semestreVolunEgres'] : "";
            $areaEspecializacion = isset($_POST['areaProfesionalizacionVolunEgres']) ? $_POST['areaProfesionalizacionVolunEgres'] : "";
            $lugar_formacion = isset($_POST['lugarFormacionVolunEgres']) ? $_POST['lugarFormacionVolunEgres'] : "";
            $trabaja_actualmente = isset($_POST['trabajaActualmenteVolunEgres']) ? $_POST['trabajaActualmenteVolunEgres'] : "";
            $tipo_trabajo = isset($_POST['tipoTrabajoVolunEgres']) ? $_POST['tipoTrabajoVolunEgres'] : "";
            $nombre_empresa = isset($_POST['nombreEmpresaVolunEgres']) ? $_POST['nombreEmpresaVolunEgres'] : "";
            $tipo_contrato = isset($_POST['tipoContratoVolunEgres']) ? $_POST['tipoContratoVolunEgres'] : "";
            $anoRegistro = $fechaSistema;

            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento(strtoupper($documento));
            $GLOBALS['objUsu']->setNombres(strtoupper(strtr($nombres, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidos(strtoupper(strtr($apellidos, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setIdCiudadNacimiento($idCiudadNacimiento);
            $GLOBALS['objUsu']->setFechaNacimiento(strtoupper($fechaNacimiento));
            $GLOBALS['objUsu']->setEdad(strtoupper($edad));
            $GLOBALS['objUsu']->setEstado_civil(strtoupper($estado_civil));
            $GLOBALS['objUsu']->setNumero_hijos(strtoupper($numero_hijos));
            $GLOBALS['objUsu']->setPromocion_egresado(strtoupper($promocion_egresado));
            $GLOBALS['objUsu']->setAnoDeIngreso(strtoupper($anoDeIngreso));
            $GLOBALS['objUsu']->setAnosDePermanencia(strtoupper($anosDePermanencia));
            $GLOBALS['objUsu']->setIdCiudadResidencia($idCiudadResidencia);
            $GLOBALS['objUsu']->setBarrioOvereda(strtoupper($barrioOvereda));
            $GLOBALS['objUsu']->setBarrio_vereda(strtoupper(strtr($barrio_vereda, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setTelefono(strtoupper($telefono));
            $GLOBALS['objUsu']->setCelular(strtoupper($celular));
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setNivelEscolaridad(strtoupper($nivelEscolaridad));
            $GLOBALS['objUsu']->setEstadoEscolarizacion(strtoupper($estadoEscolarizacion));
            $GLOBALS['objUsu']->setSemestre_escolaridad(strtoupper(strtr($semestre_escolaridad, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAreaEspecializacion(strtoupper(strtr($areaEspecializacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setLugar_formacion(strtoupper(strtr($lugar_formacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTrabaja_actualmente(strtoupper($trabaja_actualmente));
            $GLOBALS['objUsu']->setTipo_trabajo(strtoupper($tipo_trabajo));
            $GLOBALS['objUsu']->setNombre_empresa(strtoupper(strtr($nombre_empresa, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTipo_contrato(strtoupper($tipo_contrato));
            $GLOBALS['objUsu']->setAnoRegistro($anoRegistro);

            $GLOBALS['objUsu']->registrarVoluntariosEgresados();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 15 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar voluntarios y egresados, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '16': {

            $idFicha = isset($_POST['idFichaVolunEgres']) ? $_POST['idFichaVolunEgres'] : "";
            $idSemillero = isset($_POST['semilleroVolunEgres']) ? $_POST['semilleroVolunEgres'] : "";
            $tipoDocumento = isset($_POST['tipoDocumentoVolunEgres']) ? $_POST['tipoDocumentoVolunEgres'] : "";
            $documento = isset($_POST['documentoVolunEgres']) ? $_POST['documentoVolunEgres'] : "";
            $nombres = isset($_POST['nombresVolunEgres']) ? $_POST['nombresVolunEgres'] : "";
            $apellidos = isset($_POST['apellidosVolunEgres']) ? $_POST['apellidosVolunEgres'] : "";
            $sexo = isset($_POST['sexoVolunEgres']) ? $_POST['sexoVolunEgres'] : "";
            $idCiudadNacimiento = isset($_POST['ciudadNacimientoVolunEgres']) ? $_POST['ciudadNacimientoVolunEgres'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimientoVolunEgres']) ? $_POST['fechaNacimientoVolunEgres'] : "";
            $edad = isset($_POST['edadVolunEgres']) ? $_POST['edadVolunEgres'] : "";
            $estado_civil = isset($_POST['estadoCivilVolunEgres']) ? $_POST['estadoCivilVolunEgres'] : "";
            $numero_hijos = isset($_POST['numeroHijosVolunEgres']) ? $_POST['numeroHijosVolunEgres'] : "";
            $promocion_egresado = isset($_POST['promocionVolunEgres']) ? $_POST['promocionVolunEgres'] : "";
            $anoDeIngreso = isset($_POST['anoIngresoVolunEgres']) ? $_POST['anoIngresoVolunEgres'] : "";
            $anosDePermanencia = isset($_POST['anoPermanenciaVolunEgres']) ? $_POST['anoPermanenciaVolunEgres'] : "";
            $idCiudadResidencia = isset($_POST['ciudadResidenciaVolunEgres']) ? $_POST['ciudadResidenciaVolunEgres'] : "";
            $barrioOvereda = isset($_POST['barrioOveredaVolunEgres']) ? $_POST['barrioOveredaVolunEgres'] : "";
            $barrio_vereda = isset($_POST['barrioVolunEgres']) ? $_POST['barrioVolunEgres'] : "";
            $direccion = isset($_POST['direccionVolunEgres']) ? $_POST['direccionVolunEgres'] : "";
            $telefono = isset($_POST['telefonoVolunEgres']) ? $_POST['telefonoVolunEgres'] : "";
            $celular = isset($_POST['celularVolunEgres']) ? $_POST['celularVolunEgres'] : "";
            $email = isset($_POST['emailVolunEgres']) ? $_POST['emailVolunEgres'] : "";
            $nivelEscolaridad = isset($_POST['nivelEscolaridadVolunEgres']) ? $_POST['nivelEscolaridadVolunEgres'] : "";
            $estadoEscolarizacion = isset($_POST['estadoEscolaridadVolunEgres']) ? $_POST['estadoEscolaridadVolunEgres'] : "";
            $semestre_escolaridad = isset($_POST['semestreVolunEgres']) ? $_POST['semestreVolunEgres'] : "";
            $areaEspecializacion = isset($_POST['areaProfesionalizacionVolunEgres']) ? $_POST['areaProfesionalizacionVolunEgres'] : "";
            $lugar_formacion = isset($_POST['lugarFormacionVolunEgres']) ? $_POST['lugarFormacionVolunEgres'] : "";
            $trabaja_actualmente = isset($_POST['trabajaActualmenteVolunEgres']) ? $_POST['trabajaActualmenteVolunEgres'] : "";
            $tipo_trabajo = isset($_POST['tipoTrabajoVolunEgres']) ? $_POST['tipoTrabajoVolunEgres'] : "";
            $nombre_empresa = isset($_POST['nombreEmpresaVolunEgres']) ? $_POST['nombreEmpresaVolunEgres'] : "";
            $tipo_contrato = isset($_POST['tipoContratoVolunEgres']) ? $_POST['tipoContratoVolunEgres'] : "";

            $GLOBALS['objUsu']->setIdFicha($idFicha);
            $GLOBALS['objUsu']->setIdSemillero($idSemillero);
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento(strtoupper($documento));
            $GLOBALS['objUsu']->setNombres(strtoupper(strtr($nombres, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidos(strtoupper(strtr($apellidos, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setIdCiudadNacimiento($idCiudadNacimiento);
            $GLOBALS['objUsu']->setFechaNacimiento(strtoupper($fechaNacimiento));
            $GLOBALS['objUsu']->setEdad(strtoupper($edad));
            $GLOBALS['objUsu']->setEstado_civil(strtoupper($estado_civil));
            $GLOBALS['objUsu']->setNumero_hijos(strtoupper($numero_hijos));
            $GLOBALS['objUsu']->setPromocion_egresado(strtoupper($promocion_egresado));
            $GLOBALS['objUsu']->setAnoDeIngreso(strtoupper($anoDeIngreso));
            $GLOBALS['objUsu']->setAnosDePermanencia(strtoupper($anosDePermanencia));
            $GLOBALS['objUsu']->setIdCiudadResidencia($idCiudadResidencia);
            $GLOBALS['objUsu']->setBarrioOvereda(strtoupper($barrioOvereda));
            $GLOBALS['objUsu']->setBarrio_vereda(strtoupper(strtr($barrio_vereda, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setTelefono(strtoupper($telefono));
            $GLOBALS['objUsu']->setCelular(strtoupper($celular));
            $GLOBALS['objUsu']->setEmail($email);
            $GLOBALS['objUsu']->setNivelEscolaridad(strtoupper($nivelEscolaridad));
            $GLOBALS['objUsu']->setEstadoEscolarizacion(strtoupper($estadoEscolarizacion));
            $GLOBALS['objUsu']->setSemestre_escolaridad(strtoupper(strtr($semestre_escolaridad, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAreaEspecializacion(strtoupper(strtr($areaEspecializacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setLugar_formacion(strtoupper(strtr($lugar_formacion, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTrabaja_actualmente(strtoupper($trabaja_actualmente));
            $GLOBALS['objUsu']->setTipo_trabajo(strtoupper($tipo_trabajo));
            $GLOBALS['objUsu']->setNombre_empresa(strtoupper(strtr($nombre_empresa, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTipo_contrato(strtoupper($tipo_contrato));

            $GLOBALS['objUsu']->actualizarVoluntariosEgresados();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
        case '17': {

            $GLOBALS['objUsu']->validarCamposVaciosAdmin();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }
}