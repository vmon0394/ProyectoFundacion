<?php

session_start();

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaCompletaSistema = date("Y-m-d");
$fechaSistema = date("Y");
$time = date("H:i");

//Esta variable recibe el valor enviado por la url, en el que se indica el caso del controlador que se va ejecutar.
$opcion = isset($_GET['opcion']) ? htmlspecialchars(stripcslashes($_GET['opcion'])) : '0';
include_once '../Model/libHistoriaClinica.php';

$GLOBALS['objUsu'] = new libHistoriaClinica();

switch ($opcion) {

    //El caso 1 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método buscar historial, este retorna un vector con toda la información 
    //del registro o en su defecto un mensaje.
    case '1': {

            $tipoRegistro = isset($_POST['tipoRegistro']) ? $_POST['tipoRegistro'] : "";
            $consecutivo = isset($_POST['consecutivo']) ? $_POST['consecutivo'] : "";

            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);

            $GLOBALS['objUsu']->buscarHistoria();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 2 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar asesoría participante, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '2': {

            $tipoRegistro = isset($_POST['tipoRegistroAsesoria']) ? $_POST['tipoRegistroAsesoria'] : "";
            $fechaIngreso = isset($_POST['fechaIngreso']) ? $_POST['fechaIngreso'] : "";
            $consecutivo = isset($_POST['consecutivo']) ? $_POST['consecutivo'] : "";
            $idFicha = isset($_POST['idFicha']) ? $_POST['idFicha'] : "";
            $telefono2 = isset($_POST['telefono2']) ? $_POST['telefono2'] : "";
            $beneficiario = isset($_POST['beneficiarios']) ? $_POST['beneficiarios'] : "";
            $tipoDocumentoBeneficiario = isset($_POST['tipoDocumentoBeneficiario']) ? $_POST['tipoDocumentoBeneficiario'] : "";
            $documentoBeneficiario = isset($_POST['documentoBeneficiario']) ? $_POST['documentoBeneficiario'] : "";
            $nombresBeneficiario = isset($_POST['nombresBeneficiario']) ? $_POST['nombresBeneficiario'] : "";
            $apellidosBeneficiario = isset($_POST['apellidosBeneficiario']) ? $_POST['apellidosBeneficiario'] : "";
            $parentezcoBeneficiario = isset($_POST['parentezcoBeneficiario']) ? $_POST['parentezcoBeneficiario'] : "";
            $ocupacionBeneficiario = isset($_POST['ocupacionBeneficiario']) ? $_POST['ocupacionBeneficiario'] : "";
            $fechaNacimientoBeneficiario = isset($_POST['fechaNacimientoBeneficiario']) ? $_POST['fechaNacimientoBeneficiario'] : "";
            $edadBeneficiario = isset($_POST['edadBeneficiario']) ? $_POST['edadBeneficiario'] : "";
            $direccionBeneficiario = isset($_POST['direccionBeneficiario']) ? $_POST['direccionBeneficiario'] : "";
            $barrioBeneficiario = isset($_POST['barrioBeneficiario']) ? $_POST['barrioBeneficiario'] : "";
            $telefonoBeneficiario = isset($_POST['telefonoBeneficiario']) ? $_POST['telefonoBeneficiario'] : "";
            $telefono2Beneficiario = isset($_POST['telefono2Beneficiario']) ? $_POST['telefono2Beneficiario'] : "";
            $tipoDeSeguridadBeneficiario = isset($_POST['tipoSeguridadBeneficiario']) ? $_POST['tipoSeguridadBeneficiario'] : "";
            $epsBeneficiario = isset($_POST['entidadBeneficiario']) ? $_POST['entidadBeneficiario'] : "";
            $motivoConsulta = isset($_POST['motivo']) ? $_POST['motivo'] : "";
            $antecedentesFamiliares = isset($_POST['antecedentes']) ? $_POST['antecedentes'] : "";
            $conformacionFamiliar = isset($_POST['familiares']) ? $_POST['familiares'] : "";
            $conflictos = isset($_POST['conflictos']) ? $_POST['conflictos'] : "";
            $metasTerapeuticas = isset($_POST['metas']) ? $_POST['metas'] : "";
            $logros = isset($_POST['logros']) ? $_POST['logros'] : "";
            $pruebasAplicadas = isset($_POST['pruebas']) ? $_POST['pruebas'] : "";
            $remisiones = isset($_POST['remision']) ? $_POST['remision'] : "";

            //Se lee todos los checkbox seleccionados y se almacenan como una cadena de texto separados por punto y coma en una sola variable.
            $respuestaparRemisiones = "";
            if (isset($_POST['remision'])) {
                foreach ($remisiones as $respuestaparRemisionesSelect) {
                    $respuestaparRemisiones.=$respuestaparRemisionesSelect . ';';
                }
            }

            $motivoRemisiones = isset($_POST['motivoRemisione']) ? $_POST['motivoRemisione'] : "";
            $finalizacion = isset($_POST['finalizo']) ? $_POST['finalizo'] : "";

            $respuestaparFinalizacion = "";
            if (isset($_POST['finalizo'])) {
                foreach ($finalizacion as $respuestaparFinalizacionSelect) {
                    $respuestaparFinalizacion.=$respuestaparFinalizacionSelect . ';';
                }
            }

            $estadoProceso = isset($_POST['estadoProceso']) ? $_POST['estadoProceso'] : "";
            $idPsicologa = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setFechaIngreso($fechaIngreso);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);
            $GLOBALS['objUsu']->setIdFicha($idFicha);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setBeneficiario(strtoupper($beneficiario));
            $GLOBALS['objUsu']->setTipoDocumentoBeneficiario(strtoupper($tipoDocumentoBeneficiario));
            $GLOBALS['objUsu']->setDocumentoBeneficiario(strtoupper($documentoBeneficiario));
            $GLOBALS['objUsu']->setNombresBeneficiario(strtoupper(strtr($nombresBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidosBeneficiario(strtoupper(strtr($apellidosBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParentezcoBeneficiario(strtoupper(strtr($parentezcoBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setOcupacionBeneficiario(strtoupper(strtr($ocupacionBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setFechaNacimientoBeneficiario($fechaNacimientoBeneficiario);
            $GLOBALS['objUsu']->setEdadBeneficiario($edadBeneficiario);
            $GLOBALS['objUsu']->setDireccionBeneficiario(strtoupper($direccionBeneficiario));
            $GLOBALS['objUsu']->setBarrioBeneficiario(strtoupper(strtr($barrioBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoBeneficiario($telefonoBeneficiario);
            $GLOBALS['objUsu']->setTelefono2Beneficiario($telefono2Beneficiario);
            $GLOBALS['objUsu']->setTipoDeSeguridadBeneficiario(strtoupper($tipoDeSeguridadBeneficiario));
            $GLOBALS['objUsu']->setEpsBeneficiario(strtoupper(strtr($epsBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setMotivoConsulta(strtoupper(strtr($motivoConsulta, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAntecedentesFamiliares(strtoupper(strtr($antecedentesFamiliares, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setConformacionFamiliar(strtoupper(strtr($conformacionFamiliar, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setConflictos(strtoupper(strtr($conflictos, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setMetasTerapeuticas(strtoupper(strtr($metasTerapeuticas, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setLogros(strtr(strtoupper($logros, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setPruebasAplicadas(strtoupper(strtr($pruebasAplicadas, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setRemisiones($respuestaparRemisiones);
            $GLOBALS['objUsu']->setMotivoRemisiones(strtoupper(strtr($motivoRemisiones, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setFinalizacion($respuestaparFinalizacion);
            $GLOBALS['objUsu']->setEstadoProceso($estadoProceso);
            $GLOBALS['objUsu']->setIdPsicologa($idPsicologa);

            $GLOBALS['objUsu']->registrarAsesoriaParticipante();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 3 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método registrar consultoría participante, este retorna una respuesta de ejecución y 
    //el mensaje correspondiente a la respuesta y un vector con el id del registro nuevo.
    case '3': {

            $tipoRegistro = isset($_POST['tipoRegistroConsultoria']) ? $_POST['tipoRegistroConsultoria'] : "";
            $fechaIngreso = isset($_POST['fechaIngresoC']) ? $_POST['fechaIngresoC'] : "";
            $consecutivo = isset($_POST['consecutivoC']) ? $_POST['consecutivoC'] : "";
            $idFicha = isset($_POST['idFichaC']) ? $_POST['idFichaC'] : "";
            $telefono2 = isset($_POST['telefono2C']) ? $_POST['telefono2C'] : "";
            $beneficiario = isset($_POST['beneficiarioC']) ? $_POST['beneficiarioC'] : "";
            $tipoDocumentoBeneficiario = isset($_POST['tipoDocumentoBeneficiarioC']) ? $_POST['tipoDocumentoBeneficiarioC'] : "";
            $documentoBeneficiario = isset($_POST['documentoBeneficiarioC']) ? $_POST['documentoBeneficiarioC'] : "";
            $nombresBeneficiario = isset($_POST['nombresBeneficiarioC']) ? $_POST['nombresBeneficiarioC'] : "";
            $apellidosBeneficiario = isset($_POST['apellidosBeneficiarioC']) ? $_POST['apellidosBeneficiarioC'] : "";
            $parentezcoBeneficiario = isset($_POST['parentezcoBeneficiarioC']) ? $_POST['parentezcoBeneficiarioC'] : "";
            $ocupacionBeneficiario = isset($_POST['ocupacionBeneficiarioC']) ? $_POST['ocupacionBeneficiarioC'] : "";
            $fechaNacimientoBeneficiario = isset($_POST['fechaNacimientoBeneficiarioC']) ? $_POST['fechaNacimientoBeneficiarioC'] : "";
            $edadBeneficiario = isset($_POST['edadBeneficiarioC']) ? $_POST['edadBeneficiarioC'] : "";
            $direccionBeneficiario = isset($_POST['direccionBeneficiarioC']) ? $_POST['direccionBeneficiarioC'] : "";
            $barrioBeneficiario = isset($_POST['barrioBeneficiarioC']) ? $_POST['barrioBeneficiarioC'] : "";
            $telefonoBeneficiario = isset($_POST['telefonoBeneficiarioC']) ? $_POST['telefonoBeneficiarioC'] : "";
            $telefono2Beneficiario = isset($_POST['telefono2BeneficiarioC']) ? $_POST['telefono2BeneficiarioC'] : "";
            $tipoDeSeguridadBeneficiario = isset($_POST['tipoSeguridadBeneficiarioC']) ? $_POST['tipoSeguridadBeneficiarioC'] : "";
            $epsBeneficiario = isset($_POST['entidadBeneficiarioC']) ? $_POST['entidadBeneficiarioC'] : "";
            $motivoConsulta = isset($_POST['motivoC']) ? $_POST['motivoC'] : "";
            $antecedentesFamiliares = isset($_POST['antecedentesC']) ? $_POST['antecedentesC'] : "";
            $conformacionFamiliar = isset($_POST['familiaresC']) ? $_POST['familiaresC'] : "";
            $remisiones = isset($_POST['remisionC']) ? $_POST['remisionC'] : "";

            //Se lee todos los checkbox seleccionados y se almacenan como una cadena de texto separados por punto y coma en una sola variable.
            $respuestaparRemisiones = "";
            if (isset($_POST['remisionC'])) {
                foreach ($remisiones as $respuestaparRemisionesSelect) {
                    $respuestaparRemisiones.=$respuestaparRemisionesSelect . ';';
                }
            }

            $motivoRemisiones = isset($_POST['motivoRemisioneC']) ? $_POST['motivoRemisioneC'] : "";
            $finalizacion = isset($_POST['finalizoC']) ? $_POST['finalizoC'] : "";

            $respuestaparFinalizacion = "";
            if (isset($_POST['finalizoC'])) {
                foreach ($finalizacion as $respuestaparFinalizacionSelect) {
                    $respuestaparFinalizacion.=$respuestaparFinalizacionSelect . ';';
                }
            }

            $estadoProceso = isset($_POST['estadoProcesoC']) ? $_POST['estadoProcesoC'] : "";
            $idPsicologa = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setTipoRegistro($tipoRegistro);
            $GLOBALS['objUsu']->setFechaIngreso($fechaIngreso);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);
            $GLOBALS['objUsu']->setIdFicha($idFicha);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setBeneficiario(strtoupper($beneficiario));
            $GLOBALS['objUsu']->setTipoDocumentoBeneficiario(strtoupper($tipoDocumentoBeneficiario));
            $GLOBALS['objUsu']->setDocumentoBeneficiario($documentoBeneficiario);
            $GLOBALS['objUsu']->setNombresBeneficiario(strtoupper(strtr($nombresBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidosBeneficiario(strtoupper(strtr($apellidosBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParentezcoBeneficiario(strtoupper(strtr($parentezcoBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setOcupacionBeneficiario(strtoupper(strtr($ocupacionBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setFechaNacimientoBeneficiario($fechaNacimientoBeneficiario);
            $GLOBALS['objUsu']->setEdadBeneficiario($edadBeneficiario);
            $GLOBALS['objUsu']->setDireccionBeneficiario(strtoupper($direccionBeneficiario));
            $GLOBALS['objUsu']->setBarrioBeneficiario(strtoupper(strtr($barrioBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoBeneficiario($telefonoBeneficiario);
            $GLOBALS['objUsu']->setTelefono2Beneficiario($telefono2Beneficiario);
            $GLOBALS['objUsu']->setTipoDeSeguridadBeneficiario(strtoupper($tipoDeSeguridadBeneficiario));
            $GLOBALS['objUsu']->setEpsBeneficiario(strtoupper(strtr($epsBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setMotivoConsulta(strtoupper(strtr($motivoConsulta, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAntecedentesFamiliares(strtoupper(strtr($antecedentesFamiliares, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setConformacionFamiliar(strtoupper(strtr($conformacionFamiliar, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setRemisiones($respuestaparRemisiones);
            $GLOBALS['objUsu']->setMotivoRemisiones(strtoupper(strtr($motivoRemisiones, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setFinalizacion($respuestaparFinalizacion);
            $GLOBALS['objUsu']->setEstadoProceso($estadoProceso);
            $GLOBALS['objUsu']->setIdPsicologa($idPsicologa);

            $GLOBALS['objUsu']->registrarConsultoriaParticipante();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }

    //El caso 4 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar asesoría participante, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta.
    case '4': {

            $idHistoria = isset($_POST['idAsesoria']) ? $_POST['idAsesoria'] : "";
            $fechaIngreso = isset($_POST['fechaIngreso']) ? $_POST['fechaIngreso'] : "";
            $consecutivo = isset($_POST['consecutivo']) ? $_POST['consecutivo'] : "";
            $telefono2 = isset($_POST['telefono2']) ? $_POST['telefono2'] : "";
            $beneficiario = isset($_POST['beneficiarios']) ? $_POST['beneficiarios'] : "";
            $tipoDocumentoBeneficiario = isset($_POST['tipoDocumentoBeneficiario']) ? $_POST['tipoDocumentoBeneficiario'] : "";
            $documentoBeneficiario = isset($_POST['documentoBeneficiario']) ? $_POST['documentoBeneficiario'] : "";
            $nombresBeneficiario = isset($_POST['nombresBeneficiario']) ? $_POST['nombresBeneficiario'] : "";
            $apellidosBeneficiario = isset($_POST['apellidosBeneficiario']) ? $_POST['apellidosBeneficiario'] : "";
            $parentezcoBeneficiario = isset($_POST['parentezcoBeneficiario']) ? $_POST['parentezcoBeneficiario'] : "";
            $ocupacionBeneficiario = isset($_POST['ocupacionBeneficiario']) ? $_POST['ocupacionBeneficiario'] : "";
            $fechaNacimientoBeneficiario = isset($_POST['fechaNacimientoBeneficiario']) ? $_POST['fechaNacimientoBeneficiario'] : "";
            $edadBeneficiario = isset($_POST['edadBeneficiario']) ? $_POST['edadBeneficiario'] : "";
            $direccionBeneficiario = isset($_POST['direccionBeneficiario']) ? $_POST['direccionBeneficiario'] : "";
            $barrioBeneficiario = isset($_POST['barrioBeneficiario']) ? $_POST['barrioBeneficiario'] : "";
            $telefonoBeneficiario = isset($_POST['telefonoBeneficiario']) ? $_POST['telefonoBeneficiario'] : "";
            $telefono2Beneficiario = isset($_POST['telefono2Beneficiario']) ? $_POST['telefono2Beneficiario'] : "";
            $tipoDeSeguridadBeneficiario = isset($_POST['tipoSeguridadBeneficiario']) ? $_POST['tipoSeguridadBeneficiario'] : "";
            $epsBeneficiario = isset($_POST['entidadBeneficiario']) ? $_POST['entidadBeneficiario'] : "";
            $motivoConsulta = isset($_POST['motivo']) ? $_POST['motivo'] : "";
            $antecedentesFamiliares = isset($_POST['antecedentes']) ? $_POST['antecedentes'] : "";
            $conformacionFamiliar = isset($_POST['familiares']) ? $_POST['familiares'] : "";
            $conflictos = isset($_POST['conflictos']) ? $_POST['conflictos'] : "";
            $metasTerapeuticas = isset($_POST['metas']) ? $_POST['metas'] : "";
            $logros = isset($_POST['logros']) ? $_POST['logros'] : "";
            $pruebasAplicadas = isset($_POST['pruebas']) ? $_POST['pruebas'] : "";
            $remisiones = isset($_POST['remision']) ? $_POST['remision'] : "";

            //Se lee todos los checkbox seleccionados y se almacenan como una cadena de texto separados por punto y coma en una sola variable.
            $respuestaparRemisiones = "";
            if (isset($_POST['remision'])) {
                foreach ($remisiones as $respuestaparRemisionesSelect) {
                    $respuestaparRemisiones.=$respuestaparRemisionesSelect . ';';
                }
            }

            $motivoRemisiones = isset($_POST['motivoRemisione']) ? $_POST['motivoRemisione'] : "";
            $finalizacion = isset($_POST['finalizo']) ? $_POST['finalizo'] : "";

            $respuestaparFinalizacion = "";
            if (isset($_POST['finalizo'])) {
                foreach ($finalizacion as $respuestaparFinalizacionSelect) {
                    $respuestaparFinalizacion.=$respuestaparFinalizacionSelect . ';';
                }
            }

            $estadoProceso = isset($_POST['estadoProceso']) ? $_POST['estadoProceso'] : "";
            $idPsicologa = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setIdHistoria($idHistoria);
            $GLOBALS['objUsu']->setFechaIngreso($fechaIngreso);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setBeneficiario(strtoupper($beneficiario));
            $GLOBALS['objUsu']->setTipoDocumentoBeneficiario(strtoupper($tipoDocumentoBeneficiario));
            $GLOBALS['objUsu']->setDocumentoBeneficiario($documentoBeneficiario);
            $GLOBALS['objUsu']->setNombresBeneficiario(strtoupper(strtr($nombresBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidosBeneficiario(strtoupper(strtr($apellidosBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParentezcoBeneficiario(strtoupper(strtr($parentezcoBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setOcupacionBeneficiario(strtoupper(strtr($ocupacionBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setFechaNacimientoBeneficiario($fechaNacimientoBeneficiario);
            $GLOBALS['objUsu']->setEdadBeneficiario($edadBeneficiario);
            $GLOBALS['objUsu']->setDireccionBeneficiario(strtoupper($direccionBeneficiario));
            $GLOBALS['objUsu']->setBarrioBeneficiario(strtoupper(strtr($barrioBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoBeneficiario($telefonoBeneficiario);
            $GLOBALS['objUsu']->setTelefono2Beneficiario($telefono2Beneficiario);
            $GLOBALS['objUsu']->setTipoDeSeguridadBeneficiario(strtoupper($tipoDeSeguridadBeneficiario));
            $GLOBALS['objUsu']->setEpsBeneficiario(strtoupper(strtr($epsBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setMotivoConsulta(strtoupper(strtr($motivoConsulta, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAntecedentesFamiliares(strtoupper(strtr($antecedentesFamiliares, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setConformacionFamiliar(strtoupper(strtr($conformacionFamiliar, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setConflictos(strtoupper(strtr($conflictos, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setMetasTerapeuticas(strtoupper(strtr($metasTerapeuticas, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setLogros(strtoupper(strtr($logros, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setPruebasAplicadas(strtoupper(strtr($pruebasAplicadas, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setRemisiones($respuestaparRemisiones);
            $GLOBALS['objUsu']->setMotivoRemisiones(strtoupper(strtr($motivoRemisiones, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setFinalizacion($respuestaparFinalizacion);
            $GLOBALS['objUsu']->setEstadoProceso($estadoProceso);
            $GLOBALS['objUsu']->setIdPsicologa($idPsicologa);

            $GLOBALS['objUsu']->actualizarAsesoriaParticipante();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 5 del controlador recibe la información enviada del formulario, esta es almacenada en variables para luego ser enviada por método set 
    //a la librería y ejecutar el método llamado, en este caso el método actualizar consultoría participante, y retorna una respuesta de ejecución y el mensaje 
    //correspondiente a la respuesta. 
    case '5': {

            $idHistoria = isset($_POST['idConsultoria']) ? $_POST['idConsultoria'] : "";
            $fechaIngreso = isset($_POST['fechaIngresoC']) ? $_POST['fechaIngresoC'] : "";
            $consecutivo = isset($_POST['consecutivoC']) ? $_POST['consecutivoC'] : "";
            $idFicha = isset($_POST['idFichaC']) ? $_POST['idFichaC'] : "";
            $telefono2 = isset($_POST['telefono2C']) ? $_POST['telefono2C'] : "";
            $beneficiario = isset($_POST['beneficiarioC']) ? $_POST['beneficiarioC'] : "";
            $tipoDocumentoBeneficiario = isset($_POST['tipoDocumentoBeneficiarioC']) ? $_POST['tipoDocumentoBeneficiarioC'] : "";
            $documentoBeneficiario = isset($_POST['documentoBeneficiarioC']) ? $_POST['documentoBeneficiarioC'] : "";
            $nombresBeneficiario = isset($_POST['nombresBeneficiarioC']) ? $_POST['nombresBeneficiarioC'] : "";
            $apellidosBeneficiario = isset($_POST['apellidosBeneficiarioC']) ? $_POST['apellidosBeneficiarioC'] : "";
            $parentezcoBeneficiario = isset($_POST['parentezcoBeneficiarioC']) ? $_POST['parentezcoBeneficiarioC'] : "";
            $ocupacionBeneficiario = isset($_POST['ocupacionBeneficiarioC']) ? $_POST['ocupacionBeneficiarioC'] : "";
            $fechaNacimientoBeneficiario = isset($_POST['fechaNacimientoBeneficiarioC']) ? $_POST['fechaNacimientoBeneficiarioC'] : "";
            $edadBeneficiario = isset($_POST['edadBeneficiarioC']) ? $_POST['edadBeneficiarioC'] : "";
            $direccionBeneficiario = isset($_POST['direccionBeneficiarioC']) ? $_POST['direccionBeneficiarioC'] : "";
            $barrioBeneficiario = isset($_POST['barrioBeneficiarioC']) ? $_POST['barrioBeneficiarioC'] : "";
            $telefonoBeneficiario = isset($_POST['telefonoBeneficiarioC']) ? $_POST['telefonoBeneficiarioC'] : "";
            $telefono2Beneficiario = isset($_POST['telefono2BeneficiarioC']) ? $_POST['telefono2BeneficiarioC'] : "";
            $tipoDeSeguridadBeneficiario = isset($_POST['tipoSeguridadBeneficiarioC']) ? $_POST['tipoSeguridadBeneficiarioC'] : "";
            $epsBeneficiario = isset($_POST['entidadBeneficiarioC']) ? $_POST['entidadBeneficiarioC'] : "";
            $motivoConsulta = isset($_POST['motivoC']) ? $_POST['motivoC'] : "";
            $antecedentesFamiliares = isset($_POST['antecedentesC']) ? $_POST['antecedentesC'] : "";
            $conformacionFamiliar = isset($_POST['familiaresC']) ? $_POST['familiaresC'] : "";
            $remisiones = isset($_POST['remisionC']) ? $_POST['remisionC'] : "";

            //Se lee todos los checkbox seleccionados y se almacenan como una cadena de texto separados por punto y coma en una sola variable.
            $respuestaparRemisiones = "";
            if (isset($_POST['remisionC'])) {
                foreach ($remisiones as $respuestaparRemisionesSelect) {
                    $respuestaparRemisiones.=$respuestaparRemisionesSelect . ';';
                }
            }

            $motivoRemisiones = isset($_POST['motivoRemisioneC']) ? $_POST['motivoRemisioneC'] : "";
            $finalizacion = isset($_POST['finalizoC']) ? $_POST['finalizoC'] : "";

            $respuestaparFinalizacion = "";
            if (isset($_POST['finalizoC'])) {
                foreach ($finalizacion as $respuestaparFinalizacionSelect) {
                    $respuestaparFinalizacion.=$respuestaparFinalizacionSelect . ';';
                }
            }

            $estadoProceso = isset($_POST['estadoProcesoC']) ? $_POST['estadoProcesoC'] : "";
            $idPsicologa = $_SESSION["idEmpleado"];

            $GLOBALS['objUsu']->setIdHistoria($idHistoria);
            $GLOBALS['objUsu']->setFechaIngreso($fechaIngreso);
            $GLOBALS['objUsu']->setConsecutivo($consecutivo);
            $GLOBALS['objUsu']->setIdFicha($idFicha);
            $GLOBALS['objUsu']->setTelefono2($telefono2);
            $GLOBALS['objUsu']->setBeneficiario(strtoupper($beneficiario));
            $GLOBALS['objUsu']->setTipoDocumentoBeneficiario(strtoupper($tipoDocumentoBeneficiario));
            $GLOBALS['objUsu']->setDocumentoBeneficiario($documentoBeneficiario);
            $GLOBALS['objUsu']->setNombresBeneficiario(strtoupper(strtr($nombresBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setApellidosBeneficiario(strtoupper(strtr($apellidosBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setParentezcoBeneficiario(strtoupper(strtr($parentezcoBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setOcupacionBeneficiario(strtoupper(strtr($ocupacionBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setFechaNacimientoBeneficiario($fechaNacimientoBeneficiario);
            $GLOBALS['objUsu']->setEdadBeneficiario($edadBeneficiario);
            $GLOBALS['objUsu']->setDireccionBeneficiario(strtoupper($direccionBeneficiario));
            $GLOBALS['objUsu']->setBarrioBeneficiario(strtoupper(strtr($barrioBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setTelefonoBeneficiario($telefonoBeneficiario);
            $GLOBALS['objUsu']->setTelefono2Beneficiario($telefono2Beneficiario);
            $GLOBALS['objUsu']->setTipoDeSeguridadBeneficiario(strtoupper($tipoDeSeguridadBeneficiario));
            $GLOBALS['objUsu']->setEpsBeneficiario(strtoupper(strtr($epsBeneficiario, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setMotivoConsulta(strtoupper(strtr($motivoConsulta, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setAntecedentesFamiliares(strtoupper(strtr($antecedentesFamiliares, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setConformacionFamiliar(strtoupper(strtr($conformacionFamiliar, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setRemisiones($respuestaparRemisiones);
            $GLOBALS['objUsu']->setMotivoRemisiones(strtoupper(strtr($motivoRemisiones, "áéíóúñ", "ÁÉÍÓÚÑ")));
            $GLOBALS['objUsu']->setFinalizacion($respuestaparFinalizacion);
            $GLOBALS['objUsu']->setEstadoProceso($estadoProceso);
            $GLOBALS['objUsu']->setIdPsicologa($idPsicologa);

            $GLOBALS['objUsu']->actualizarConsultoriaParticipante();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje()));
            break;
        }

    //El caso 6 del controlador recibe el id del registro a consultar enviando por método set a la librería y ejecuta el metodo llamado, 
    //en este caso el metodo buscar historia para imprimir, este retorna un vector con toda la información del registro.
    case '6': {

            $idHistoria = isset($_POST['idHistoria']) ? $_POST['idHistoria'] : "";

            $GLOBALS['objUsu']->setIdHistoria($idHistoria);

            $GLOBALS['objUsu']->buscarHistoriaImprimir();
            echo json_encode(array('res' => $GLOBALS['objUsu']->getRespuesta(), 'msg' => $GLOBALS['objUsu']->getMensaje(), 'row' => $GLOBALS['objUsu']->getResult()));
            break;
        }
}