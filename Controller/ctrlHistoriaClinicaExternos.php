<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libHistoriaClinicaExterno.php';

$GLOBALS['objUsu'] = new libHistoriaClinicaExterno();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método buscar historial externo, este retorna un vector con toda la información 
    //del registro o en su defecto un mensaje.
    case '1': {

            $tipoRegistro = isset($_POST['tipoRegistro']) ? $_POST['tipoRegistro'] : "";
            $consecutivo = isset($_POST['consecutivo']) ? $_POST['consecutivo'] : "";

            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);

            $GLOBALS['objUsu']->buscarHistoriaExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 2 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar asesoría externo, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '2': {

            $tipoRegistro = isset($_POST['tipoRegistroAsesoriaEx']) ? $_POST['tipoRegistroAsesoriaEx'] : "";
            $fechaIngreso = isset($_POST['fechaIngresoEx']) ? $_POST['fechaIngresoEx'] : "";
            $consecutivo = isset($_POST['consecutivoEx']) ? $_POST['consecutivoEx'] : "";
            $beneficiario = isset($_POST['beneficiarioEx']) ? $_POST['beneficiarioEx'] : "";
            $tipoDocumento = isset($_POST['tipoDocumentoEx']) ? $_POST['tipoDocumentoEx'] : "";
            $documento = isset($_POST['documentoEx']) ? $_POST['documentoEx'] : "";
            $nombres = isset($_POST['nombreEx']) ? $_POST['nombreEx'] : "";
            $apellidos = isset($_POST['apellidoEx']) ? $_POST['apellidoEx'] : "";
            $idMunicipioNanimiento = isset($_POST['ciudadNacimiento']) ? $_POST['ciudadNacimiento'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimientoEx']) ? $_POST['fechaNacimientoEx'] : "";
            $edad = isset($_POST['edadEx']) ? $_POST['edadEx'] : "";
            $sexo = isset($_POST['sexoEx']) ? $_POST['sexoEx'] : "";
            $relacionFundacion = isset($_POST['relacionFundacion']) ? $_POST['relacionFundacion'] : "";
            $ocupacio_Institucion = isset($_POST['ocupacioInstitucion']) ? $_POST['ocupacioInstitucion'] : "";
            $gradoEscolar = isset($_POST['gradoEx']) ? $_POST['gradoEx'] : "";
            $idMunicipioResidencia = isset($_POST['ciudadResidencia']) ? $_POST['ciudadResidencia'] : "";
            $direccion = isset($_POST['direccionEx']) ? $_POST['direccionEx'] : "";
            $barrio = isset($_POST['barrioEx']) ? $_POST['barrioEx'] : "";
            $telefono = isset($_POST['telefonoEx']) ? $_POST['telefonoEx'] : "";
            $telefono2 = isset($_POST['telefono2Ex']) ? $_POST['telefono2Ex'] : "";
            $tipoDeSeguridad = isset($_POST['seguridadEx']) ? $_POST['seguridadEx'] : "";
            $eps = isset($_POST['entidadEx']) ? $_POST['entidadEx'] : "";
            $motivoConsulta = isset($_POST['motivoEx']) ? $_POST['motivoEx'] : "";
            $antecedentesFamiliares = isset($_POST['antecedentesEx']) ? $_POST['antecedentesEx'] : "";
            $conformacionFamiliar = isset($_POST['familiaresEx']) ? $_POST['familiaresEx'] : "";
            $conflictos = isset($_POST['conflictosEx']) ? $_POST['conflictosEx'] : "";
            $metasTerapeuticas = isset($_POST['metasEx']) ? $_POST['metasEx'] : "";
            $logros = isset($_POST['logrosEx']) ? $_POST['logrosEx'] : "";
            $pruebasAplicadas = isset($_POST['pruebasEx']) ? $_POST['pruebasEx'] : "";
            $remisiones = isset($_POST['remisionEx']) ? $_POST['remisionEx'] : "";

            //Se lee todos los checkbox seleccionados y se almacenan como una cadena de texto separados por punto y coma en una sola variable.
            $respuestaparRemisiones = "";
            if (isset($_POST['remisionEx'])) {
                foreach ($remisiones as $respuestaparRemisionesSelect) {
                    $respuestaparRemisiones.=$respuestaparRemisionesSelect . ';';
                }
            }

            $motivoRemisiones = isset($_POST['motivoRemisioneEx']) ? $_POST['motivoRemisioneEx'] : "";
            $finalizacion = isset($_POST['finalizoEx']) ? $_POST['finalizoEx'] : "";

            $respuestaparFinalizacion = "";
            if (isset($_POST['finalizoEx'])) {
                foreach ($finalizacion as $respuestaparFinalizacionSelect) {
                    $respuestaparFinalizacion.=$respuestaparFinalizacionSelect . ';';
                }
            }

            $estadoProceso = isset($_POST['estadoProcesoEx']) ? $_POST['estadoProcesoEx'] : "";
            $idPsicologa = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setFechaIngreso($fechaIngreso);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);
            $GLOBALS['objUsu']->setBeneficiario(strtoupper($beneficiario));
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento($documento);
            $GLOBALS['objUsu']->setNombres(strtoupper($nombres));
            $GLOBALS['objUsu']->setApellidos(strtoupper($apellidos));
            $GLOBALS['objUsu']->setIdMunicipioNanimiento($idMunicipioNanimiento);
            $GLOBALS['objUsu']->setFechaNacimiento(strtoupper($fechaNacimiento));
            $GLOBALS['objUsu']->setEdad(strtoupper($edad));
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setRelacionFundacion(strtoupper($relacionFundacion));
            $GLOBALS['objUsu']->setOcupacio_Institucion(strtoupper($ocupacio_Institucion));
            $GLOBALS['objUsu']->setGradoEscolar(strtoupper($gradoEscolar));
            $GLOBALS['objUsu']->setIdMunicipioResidencia($idMunicipioResidencia);
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setBarrio(strtoupper($barrio));
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setTipoDeSeguridad(strtoupper($tipoDeSeguridad));
            $GLOBALS['objUsu']->setEps(strtoupper($eps));
            $GLOBALS['objUsu']->setMotivoConsulta(strtoupper($motivoConsulta));
            $GLOBALS['objUsu']->setAntecedentesFamiliares(strtoupper($antecedentesFamiliares));
            $GLOBALS['objUsu']->setConformacionFamiliar(strtoupper($conformacionFamiliar));
            $GLOBALS['objUsu']->setConflictos(strtoupper($conflictos));
            $GLOBALS['objUsu']->setMetasTerapeuticas(strtoupper($metasTerapeuticas));
            $GLOBALS['objUsu']->setLogros(strtoupper($logros));
            $GLOBALS['objUsu']->setPruebasAplicadas(strtoupper($pruebasAplicadas));
            $GLOBALS['objUsu']->setRemisiones($respuestaparRemisiones);
            $GLOBALS['objUsu']->setMotivoRemisiones(strtoupper($motivoRemisiones));
            $GLOBALS['objUsu']->setFinalizacion($respuestaparFinalizacion);
            $GLOBALS['objUsu']->setEstadoProceso($estadoProceso);
            $GLOBALS['objUsu']->setIdPsicologa($idPsicologa);

            $GLOBALS['objUsu']->registrarAsesoriaExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar consultoría externo, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '3': {

            $tipoRegistro = isset($_POST['tipoRegistroConsultoriaEx']) ? $_POST['tipoRegistroConsultoriaEx'] : "";
            $fechaIngreso = isset($_POST['fechaIngresoCEx']) ? $_POST['fechaIngresoCEx'] : "";
            $consecutivo = isset($_POST['consecutivoCEx']) ? $_POST['consecutivoCEx'] : "";
            $beneficiario = isset($_POST['beneficiarioCEx']) ? $_POST['beneficiarioCEx'] : "";
            $tipoDocumento = isset($_POST['tipoDocumentoCEx']) ? $_POST['tipoDocumentoCEx'] : "";
            $documento = isset($_POST['documentoCEx']) ? $_POST['documentoCEx'] : "";
            $nombres = isset($_POST['nombreCEx']) ? $_POST['nombreCEx'] : "";
            $apellidos = isset($_POST['apellidoCEx']) ? $_POST['apellidoCEx'] : "";
            $idMunicipioNanimiento = isset($_POST['ciudadNacimientoCEx']) ? $_POST['ciudadNacimientoCEx'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimientoCEx']) ? $_POST['fechaNacimientoCEx'] : "";
            $edad = isset($_POST['edadCEx']) ? $_POST['edadCEx'] : "";
            $sexo = isset($_POST['sexoCEx']) ? $_POST['sexoCEx'] : "";
            $relacionFundacion = isset($_POST['relacionFundacionCEx']) ? $_POST['relacionFundacionCEx'] : "";
            $ocupacio_Institucion = isset($_POST['ocupacioInstitucionCEx']) ? $_POST['ocupacioInstitucionCEx'] : "";
            $gradoEscolar = isset($_POST['gradoCEx']) ? $_POST['gradoCEx'] : "";
            $idMunicipioResidencia = isset($_POST['ciudadResidenciaCEx']) ? $_POST['ciudadResidenciaCEx'] : "";
            $direccion = isset($_POST['direccionCEx']) ? $_POST['direccionCEx'] : "";
            $barrio = isset($_POST['barrioCEx']) ? $_POST['barrioCEx'] : "";
            $telefono = isset($_POST['telefonoCEx']) ? $_POST['telefonoCEx'] : "";
            $telefono2 = isset($_POST['telefono2CEx']) ? $_POST['telefono2CEx'] : "";
            $tipoDeSeguridad = isset($_POST['seguridadCEx']) ? $_POST['seguridadCEx'] : "";
            $eps = isset($_POST['entidadCEx']) ? $_POST['entidadCEx'] : "";
            $motivoConsulta = isset($_POST['motivoCEx']) ? $_POST['motivoCEx'] : "";
            $antecedentesFamiliares = isset($_POST['antecedentesCEx']) ? $_POST['antecedentesCEx'] : "";
            $conformacionFamiliar = isset($_POST['familiaresCEx']) ? $_POST['familiaresCEx'] : "";
            $remisiones = isset($_POST['remisionCEx']) ? $_POST['remisionCEx'] : "";

            //Se lee todos los checkbox seleccionados y se almacenan como una cadena de texto separados por punto y coma en una sola variable.
            $respuestaparRemisiones = "";
            if (isset($_POST['remisionCEx'])) {
                foreach ($remisiones as $respuestaparRemisionesSelect) {
                    $respuestaparRemisiones.=$respuestaparRemisionesSelect . ';';
                }
            }

            $motivoRemisiones = isset($_POST['motivoRemisioneCEx']) ? $_POST['motivoRemisioneCEx'] : "";
            $finalizacion = isset($_POST['finalizoCEx']) ? $_POST['finalizoCEx'] : "";

            $respuestaparFinalizacion = "";
            if (isset($_POST['finalizoCEx'])) {
                foreach ($finalizacion as $respuestaparFinalizacionSelect) {
                    $respuestaparFinalizacion.=$respuestaparFinalizacionSelect . ';';
                }
            }

            $estadoProceso = isset($_POST['estadoProcesoCEx']) ? $_POST['estadoProcesoCEx'] : "";
            $idPsicologa = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setFechaIngreso($fechaIngreso);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);
            $GLOBALS['objUsu']->setBeneficiario(strtoupper($beneficiario));
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento($documento);
            $GLOBALS['objUsu']->setNombres(strtoupper($nombres));
            $GLOBALS['objUsu']->setApellidos(strtoupper($apellidos));
            $GLOBALS['objUsu']->setIdMunicipioNanimiento($idMunicipioNanimiento);
            $GLOBALS['objUsu']->setFechaNacimiento($fechaNacimiento);
            $GLOBALS['objUsu']->setEdad($edad);
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setRelacionFundacion(strtoupper($relacionFundacion));
            $GLOBALS['objUsu']->setOcupacio_Institucion(strtoupper($ocupacio_Institucion));
            $GLOBALS['objUsu']->setGradoEscolar($gradoEscolar);
            $GLOBALS['objUsu']->setIdMunicipioResidencia($idMunicipioResidencia);
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setBarrio(strtoupper($barrio));
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setTipoDeSeguridad($tipoDeSeguridad);
            $GLOBALS['objUsu']->setEps(strtoupper($eps));
            $GLOBALS['objUsu']->setMotivoConsulta(strtoupper($motivoConsulta));
            $GLOBALS['objUsu']->setAntecedentesFamiliares(strtoupper($antecedentesFamiliares));
            $GLOBALS['objUsu']->setConformacionFamiliar(strtoupper($conformacionFamiliar));
            $GLOBALS['objUsu']->setRemisiones($respuestaparRemisiones);
            $GLOBALS['objUsu']->setMotivoRemisiones(strtoupper($motivoRemisiones));
            $GLOBALS['objUsu']->setFinalizacion($respuestaparFinalizacion);
            $GLOBALS['objUsu']->setEstadoProceso($estadoProceso);
            $GLOBALS['objUsu']->setIdPsicologa($idPsicologa);

            $GLOBALS['objUsu']->registrarConsultoriaExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 4 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar asesoría externo, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta. 
    case '4': {

            $idHistoriaExterno = isset($_POST['idAsesoriaExterno']) ? $_POST['idAsesoriaExterno'] : "";
            $tipoRegistro = isset($_POST['tipoRegistroAsesoriaEx']) ? $_POST['tipoRegistroAsesoriaEx'] : "";
            $fechaIngreso = isset($_POST['fechaIngresoEx']) ? $_POST['fechaIngresoEx'] : "";
            $consecutivo = isset($_POST['consecutivoEx']) ? $_POST['consecutivoEx'] : "";
            $beneficiario = isset($_POST['beneficiarioEx']) ? $_POST['beneficiarioEx'] : "";
            $tipoDocumento = isset($_POST['tipoDocumentoEx']) ? $_POST['tipoDocumentoEx'] : "";
            $documento = isset($_POST['documentoEx']) ? $_POST['documentoEx'] : "";
            $nombres = isset($_POST['nombreEx']) ? $_POST['nombreEx'] : "";
            $apellidos = isset($_POST['apellidoEx']) ? $_POST['apellidoEx'] : "";
            $idMunicipioNanimiento = isset($_POST['ciudadNacimiento']) ? $_POST['ciudadNacimiento'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimientoEx']) ? $_POST['fechaNacimientoEx'] : "";
            $edad = isset($_POST['edadEx']) ? $_POST['edadEx'] : "";
            $sexo = isset($_POST['sexoEx']) ? $_POST['sexoEx'] : "";
            $relacionFundacion = isset($_POST['relacionFundacion']) ? $_POST['relacionFundacion'] : "";
            $ocupacio_Institucion = isset($_POST['ocupacioInstitucion']) ? $_POST['ocupacioInstitucion'] : "";
            $gradoEscolar = isset($_POST['gradoEx']) ? $_POST['gradoEx'] : "";
            $idMunicipioResidencia = isset($_POST['ciudadResidencia']) ? $_POST['ciudadResidencia'] : "";
            $direccion = isset($_POST['direccionEx']) ? $_POST['direccionEx'] : "";
            $barrio = isset($_POST['barrioEx']) ? $_POST['barrioEx'] : "";
            $telefono = isset($_POST['telefonoEx']) ? $_POST['telefonoEx'] : "";
            $telefono2 = isset($_POST['telefono2Ex']) ? $_POST['telefono2Ex'] : "";
            $tipoDeSeguridad = isset($_POST['seguridadEx']) ? $_POST['seguridadEx'] : "";
            $eps = isset($_POST['entidadEx']) ? $_POST['entidadEx'] : "";
            $motivoConsulta = isset($_POST['motivoEx']) ? $_POST['motivoEx'] : "";
            $antecedentesFamiliares = isset($_POST['antecedentesEx']) ? $_POST['antecedentesEx'] : "";
            $conformacionFamiliar = isset($_POST['familiaresEx']) ? $_POST['familiaresEx'] : "";
            $conflictos = isset($_POST['conflictosEx']) ? $_POST['conflictosEx'] : "";
            $metasTerapeuticas = isset($_POST['metasEx']) ? $_POST['metasEx'] : "";
            $logros = isset($_POST['logrosEx']) ? $_POST['logrosEx'] : "";
            $pruebasAplicadas = isset($_POST['pruebasEx']) ? $_POST['pruebasEx'] : "";
            $remisiones = isset($_POST['remisionEx']) ? $_POST['remisionEx'] : "";

            //Se lee todos los checkbox seleccionados y se almacenan como una cadena de texto separados por punto y coma en una sola variable.
            $respuestaparRemisiones = "";
            if (isset($_POST['remisionEx'])) {
                foreach ($remisiones as $respuestaparRemisionesSelect) {
                    $respuestaparRemisiones.=$respuestaparRemisionesSelect . ';';
                }
            }

            $motivoRemisiones = isset($_POST['motivoRemisioneEx']) ? $_POST['motivoRemisioneEx'] : "";
            $finalizacion = isset($_POST['finalizoEx']) ? $_POST['finalizoEx'] : "";

            $respuestaparFinalizacion = "";
            if (isset($_POST['finalizoEx'])) {
                foreach ($finalizacion as $respuestaparFinalizacionSelect) {
                    $respuestaparFinalizacion.=$respuestaparFinalizacionSelect . ';';
                }
            }

            $estadoProceso = isset($_POST['estadoProcesoEx']) ? $_POST['estadoProcesoEx'] : "";
            $idPsicologa = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setIdHistoriaExterno($idHistoriaExterno);
            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setFechaIngreso($fechaIngreso);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);
            $GLOBALS['objUsu']->setBeneficiario(strtoupper($beneficiario));
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento($documento);
            $GLOBALS['objUsu']->setNombres(strtoupper($nombres));
            $GLOBALS['objUsu']->setApellidos(strtoupper($apellidos));
            $GLOBALS['objUsu']->setIdMunicipioNanimiento($idMunicipioNanimiento);
            $GLOBALS['objUsu']->setFechaNacimiento($fechaNacimiento);
            $GLOBALS['objUsu']->setEdad($edad);
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setRelacionFundacion(strtoupper($relacionFundacion));
            $GLOBALS['objUsu']->setOcupacio_Institucion(strtoupper($ocupacio_Institucion));
            $GLOBALS['objUsu']->setGradoEscolar($gradoEscolar);
            $GLOBALS['objUsu']->setIdMunicipioResidencia($idMunicipioResidencia);
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setBarrio(strtoupper($barrio));
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setTipoDeSeguridad(strtoupper($tipoDeSeguridad));
            $GLOBALS['objUsu']->setEps(strtoupper($eps));
            $GLOBALS['objUsu']->setMotivoConsulta(strtoupper($motivoConsulta));
            $GLOBALS['objUsu']->setAntecedentesFamiliares(strtoupper($antecedentesFamiliares));
            $GLOBALS['objUsu']->setConformacionFamiliar(strtoupper($conformacionFamiliar));
            $GLOBALS['objUsu']->setConflictos(strtoupper($conflictos));
            $GLOBALS['objUsu']->setMetasTerapeuticas(strtoupper($metasTerapeuticas));
            $GLOBALS['objUsu']->setLogros(strtoupper($logros));
            $GLOBALS['objUsu']->setPruebasAplicadas(strtoupper($pruebasAplicadas));
            $GLOBALS['objUsu']->setRemisiones($respuestaparRemisiones);
            $GLOBALS['objUsu']->setMotivoRemisiones(strtoupper($motivoRemisiones));
            $GLOBALS['objUsu']->setFinalizacion($respuestaparFinalizacion);
            $GLOBALS['objUsu']->setEstadoProceso($estadoProceso);
            $GLOBALS['objUsu']->setIdPsicologa($idPsicologa);

            $GLOBALS['objUsu']->actualizarAsesoriaExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar consultoría externo, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta. 
    case '5': {

            $idHistoriaExterno = isset($_POST['idConsultoriaExterno']) ? $_POST['idConsultoriaExterno'] : "";
            $tipoRegistro = isset($_POST['tipoRegistroConsultoriaEx']) ? $_POST['tipoRegistroConsultoriaEx'] : "";
            $fechaIngreso = isset($_POST['fechaIngresoCEx']) ? $_POST['fechaIngresoCEx'] : "";
            $consecutivo = isset($_POST['consecutivoCEx']) ? $_POST['consecutivoCEx'] : "";
            $beneficiario = isset($_POST['beneficiarioCEx']) ? $_POST['beneficiarioCEx'] : "";
            $tipoDocumento = isset($_POST['tipoDocumentoCEx']) ? $_POST['tipoDocumentoCEx'] : "";
            $documento = isset($_POST['documentoCEx']) ? $_POST['documentoCEx'] : "";
            $nombres = isset($_POST['nombreCEx']) ? $_POST['nombreCEx'] : "";
            $apellidos = isset($_POST['apellidoCEx']) ? $_POST['apellidoCEx'] : "";
            $idMunicipioNanimiento = isset($_POST['ciudadNacimientoCEx']) ? $_POST['ciudadNacimientoCEx'] : "";
            $fechaNacimiento = isset($_POST['fechaNacimientoCEx']) ? $_POST['fechaNacimientoCEx'] : "";
            $edad = isset($_POST['edadCEx']) ? $_POST['edadCEx'] : "";
            $sexo = isset($_POST['sexoCEx']) ? $_POST['sexoCEx'] : "";
            $relacionFundacion = isset($_POST['relacionFundacionCEx']) ? $_POST['relacionFundacionCEx'] : "";
            $ocupacio_Institucion = isset($_POST['ocupacioInstitucionCEx']) ? $_POST['ocupacioInstitucionCEx'] : "";
            $gradoEscolar = isset($_POST['gradoCEx']) ? $_POST['gradoCEx'] : "";
            $idMunicipioResidencia = isset($_POST['ciudadResidenciaCEx']) ? $_POST['ciudadResidenciaCEx'] : "";
            $direccion = isset($_POST['direccionCEx']) ? $_POST['direccionCEx'] : "";
            $barrio = isset($_POST['barrioCEx']) ? $_POST['barrioCEx'] : "";
            $telefono = isset($_POST['telefonoCEx']) ? $_POST['telefonoCEx'] : "";
            $telefono2 = isset($_POST['telefono2CEx']) ? $_POST['telefono2CEx'] : "";
            $tipoDeSeguridad = isset($_POST['seguridadCEx']) ? $_POST['seguridadCEx'] : "";
            $eps = isset($_POST['entidadCEx']) ? $_POST['entidadCEx'] : "";
            $motivoConsulta = isset($_POST['motivoCEx']) ? $_POST['motivoCEx'] : "";
            $antecedentesFamiliares = isset($_POST['antecedentesCEx']) ? $_POST['antecedentesCEx'] : "";
            $conformacionFamiliar = isset($_POST['familiaresCEx']) ? $_POST['familiaresCEx'] : "";
            $remisiones = isset($_POST['remisionCEx']) ? $_POST['remisionCEx'] : "";

            //Se lee todos los checkbox seleccionados y se almacenan como una cadena de texto separados por punto y coma en una sola variable.
            $respuestaparRemisiones = "";
            if (isset($_POST['remisionCEx'])) {
                foreach ($remisiones as $respuestaparRemisionesSelect) {
                    $respuestaparRemisiones.=$respuestaparRemisionesSelect . ';';
                }
            }

            $motivoRemisiones = isset($_POST['motivoRemisioneCEx']) ? $_POST['motivoRemisioneCEx'] : "";
            $finalizacion = isset($_POST['finalizoCEx']) ? $_POST['finalizoCEx'] : "";

            $respuestaparFinalizacion = "";
            if (isset($_POST['finalizoCEx'])) {
                foreach ($finalizacion as $respuestaparFinalizacionSelect) {
                    $respuestaparFinalizacion.=$respuestaparFinalizacionSelect . ';';
                }
            }

            $estadoProceso = isset($_POST['estadoProcesoCEx']) ? $_POST['estadoProcesoCEx'] : "";
            $idPsicologa = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setIdHistoriaExterno($idHistoriaExterno);
            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setFechaIngreso($fechaIngreso);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);
            $GLOBALS['objUsu']->setBeneficiario(strtoupper($beneficiario));
            $GLOBALS['objUsu']->setTipoDocumento(strtoupper($tipoDocumento));
            $GLOBALS['objUsu']->setDocumento($documento);
            $GLOBALS['objUsu']->setNombres(strtoupper($nombres));
            $GLOBALS['objUsu']->setApellidos(strtoupper($apellidos));
            $GLOBALS['objUsu']->setIdMunicipioNanimiento($idMunicipioNanimiento);
            $GLOBALS['objUsu']->setFechaNacimiento($fechaNacimiento);
            $GLOBALS['objUsu']->setEdad($edad);
            $GLOBALS['objUsu']->setSexo(strtoupper($sexo));
            $GLOBALS['objUsu']->setRelacionFundacion(strtoupper($relacionFundacion));
            $GLOBALS['objUsu']->setOcupacio_Institucion(strtoupper($ocupacio_Institucion));
            $GLOBALS['objUsu']->setGradoEscolar($gradoEscolar);
            $GLOBALS['objUsu']->setIdMunicipioResidencia($idMunicipioResidencia);
            $GLOBALS['objUsu']->setDireccion(strtoupper($direccion));
            $GLOBALS['objUsu']->setBarrio(strtoupper($barrio));
            $GLOBALS['objUsu']->setTelefono($telefono);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setTipoDeSeguridad($tipoDeSeguridad);
            $GLOBALS['objUsu']->setEps(strtoupper($eps));
            $GLOBALS['objUsu']->setMotivoConsulta(strtoupper($motivoConsulta));
            $GLOBALS['objUsu']->setAntecedentesFamiliares(strtoupper($antecedentesFamiliares));
            $GLOBALS['objUsu']->setConformacionFamiliar(strtoupper($conformacionFamiliar));
            $GLOBALS['objUsu']->setRemisiones($respuestaparRemisiones);
            $GLOBALS['objUsu']->setMotivoRemisiones(strtoupper($motivoRemisiones));
            $GLOBALS['objUsu']->setFinalizacion($respuestaparFinalizacion);
            $GLOBALS['objUsu']->setEstadoProceso($estadoProceso);
            $GLOBALS['objUsu']->setIdPsicologa($idPsicologa);

            $GLOBALS['objUsu']->actualizarConsultoriaExterno();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 6 del controlador recibe la fecha del registro que está en ejecución, luego se le hace un Split para separar el año de la fecha 
    //y con este calcular la edad y retornarla a la interfaz.
    case '6': {

            $fecha = "";
            $ano = 0;
            $edad = 0;

            $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : "";

            $fecha = split("-", $fechaNacimiento);
            $ano = $fecha[0];

            $edad = $fechaSistema - $ano;

            echo json_encode(array('result' => $edad));
            break;
        }

    //El caso 7 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo buscar historia externo para imprimir, este retorna un vector con toda la información del registro.
    case '7': {

            $idHistoriaExterno = isset($_POST['idHistoria']) ? $_POST['idHistoria'] : "";

            $GLOBALS['objUsu']->setIdHistoriaExterno($idHistoriaExterno);

            $GLOBALS['objUsu']->buscarHistoriaExternoImprimir();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }
}