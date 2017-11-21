<?php

	class libactividades{

		private $info_actividad;
		private $actividad_comu;
		private $acompanamiento;
		private $visita_institu;
		private $respuesta;
    	private $mensaje;
    	private $result;
    	private $link;


		function __construct() {

			$this->informacion_actividad = "";
			$this->actividad_comunitaria = "";
			$this->acompanamiento = "";
			$this->visita_institucion = "";

			$this->respuesta = "";
        	$this->mensaje = "";
        	$this->result = "";

			include_once 'conexion.php';
        	$this->link = new Conexion();
		}

		 function getIdEmpleado() {
        return $this->informacion_actividad;
    	}

    	 function getIdEmpleado() {
        return $this->actividad_comunitaria;
    	}

    	 function getIdEmpleado() {
        return $this->acompanamiento;
    	}

    	 function getIdEmpleado() {
        return $this->visita_institucion;
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

    	function setinfo_actividad($info_actividad) {
        $this->informacion_actividad = $info_actividad;
    	}

    	function setactividad_comu($actividad_comu) {
        $this->actividad_comunitaria = $actividad_comu;
    	}
    	function setacompanamiento($acompanamiento) {
        $this->acompanamiento = $acompanamiento;
    	}
    	function setvisita_institu($visita_institu) {
        $this->visita_institu = $visita_institu;
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

    	function registraractivi(){

    		$resp
    		$conexion = $this->link->conectar();

        	if (!$conexion) {
           		$this->respuesta = "fail";
            	$this->mensaje = $this->link->getError();
            	$resp = FALSE;
        	} else {

        		$sql = "CALL SP_REGISTRAR_ACTIVIDAD_COMUNIDAD('$this->info_actividad','$this->actividad_comu','$this->acompanamiento','$this->visita_institu'); ";
        		$rs = $conexion->query($sql);
        		 if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El registro se realizó con éxito.";
                    $resp = TRUE;
                }else {

                    $this->respuesta = "fail";
                    $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                    $resp = TRUE;
                }

                $this->link->desconectar();
        	}
    	}
	}


?>