<?php

class libReportePrestamos {
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;
    
    function __construct() {
        
        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
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
    
    function reportePrestamos(){
        $resp;
        $conexion = $this->link->conectar();
        
        if(!$conexion){
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        }  else {
            
            /*
             * participantes 
             */
            $totalParticipantes = 0;
            $participantesActivos = 0;
            $participantesInactivos = 0;
            $otrosSemilleros = 0;
            $menores = 0;
            $mayores = 0;
            $institucion = 0;
            $semilleros = 0;
            
            $consultaParticipantes = "SELECT * FROM tbl_usuario_laboratorio";
            $rscp = $conexion->query($consultaParticipantes);
            
            $totalParticipantes = $rscp->num_rows;
            
            while ($rowRscp = $rscp->fetch_array()){
                
                if($rowRscp['isdelUsuario'] == "1"){
                    $participantesActivos++;
                }else if ($rowRscp['isdelUsuario'] == "0"){
                    $participantesInactivos++;
                }
                if ($rowRscp['idSemillero'] > "0"){
                    $otrosSemilleros++;
                }
                if ($rowRscp['tipoRegistro'] == 'adulto'){
                    $mayores++;
                }else if ($rowRscp['tipoRegistro'] == "nino"){
                    $menores++;
                }else if ($rowRscp['tipoRegistro'] == "institucion"){
                    $institucion++;
                }else if ($rowRscp['tipoRegistro'] == "semillero"){
                    $semillero++;
                }      
            }
            
            
            /*
             * servicios
             */
            $totalServicios = 0;
            $activosServicios = 0;
            $inactivosServicios = 0;
            
            $consultaServicios = "SELECT * FROM tbl_servicios";
            $rscs = $conexion->query($consultaServicios);
            
            $totalServicios = $rscs->num_rows;
            
            while ($rowRscs = $rscs->fetch_array()){
                if ($rowRscs['isdelServicio']== "1"){
                    $activosServicios++;
                }elseif ($rowRscs['isdelServicios']=="0") {
                    $inactivosServicios++;
                }
            }
            
            /*
             *  de materiales
             */
            $totalMateriales = 0;
            $buenos = 0;
            $regulares = 0;
            $incompletos = 0;
            $obsoletos = 0;
            $disponibles = 0;
            $inactivos = 0;
            
            $sql = "SELECT * FROM tbl_inventario";
            $rs = $conexion->query($sql);
            $totalMateriales = $rs->num_rows;
            
            while ($aRow = $rs->fetch_array()){
                
                if ($aRow['isdelMaterial'] == "1"){
                    $disponibles++;
                }else if($aRow['isdelMaterial'] == "0"){
                    $inactivos++;
                }if ($aRow['estado'] == "Bueno"){
                    $buenos++;
                }else if ($aRow['estado'] == "Regular"){
                    $regulares++;
                }else if ($aRow['estado'] == "Incompleto"){
                    $incompletos++;
                }else if($aRow['estado'] == "Obsoleto"){
                    $obsoletos++;
                }    
            }
            
            
            /*
             * prestamos
             */
            $prestamos = 0;
            $Pactivos = 0;
            $Pinactivos = 0;
            
            
            $sql1 = "SELECT * FROM tbl_prestamo_devolucion";
            $rs1 = $conexion->query($sql1);
            $prestamos = $rs1->num_rows;
            
            while ($bRow = $rs1->fetch_array()){
                if($bRow['isdelPrestamo'] == "1"){
                    $Pactivos++;
                }else if($bRow['isdelPrestamo'] == "0"){
                    $Pinactivos++;
                }
            }
            
            $maxP = "";
            $minP = "";
            
            $sql2 = "SELECT DISTINCT codigo, COUNT(codigo) FROM tbl_prestamo_devolucion GROUP BY codigo ORDER BY COUNT(codigo) DESC LIMIT 1";
            $rs2 = $conexion->query($sql2);
            
            $cRow = $rs2->fetch_array();
            
            $codigo = $cRow['codigo'];
            
            $sql3 = "SELECT nombreMaterial FROM tbl_inventario WHERE codigo = '$codigo'";
            $rs3 = $conexion->query($sql3);
            
            $dRow = $rs3->fetch_array();
            
            $maxP = $dRow['nombreMaterial'];

        $sql4 = "SELECT DISTINCT documento, COUNT(documento) FROM tbl_prestamo_devolucion GROUP BY documento ORDER BY COUNT(documento) DESC LIMIT 1";
            $rs4 = $conexion->query($sql4);
            $crom = $rs4->fetch_array();
            
            $document = $crom['documento'];
            
            $sql5 = "SELECT nombre, apellido FROM tbl_usuario_laboratorio WHERE documento = '$document'";
            $rs5 = $conexion->query($sql5);
            
            $crom2 = $rs5->fetch_array();
            
            $minP = $crom2['nombre']." ".$crom2['apellido'];
            
            /*
             * variable que envia el arreglo
             */
            
            $row = array(
                "TotalParticipantes" => $totalParticipantes,
                "ParticipantesActivos" => $participantesActivos,
                "ParticipantesInactivos" => $participantesInactivos,
                "OtrosSemilleros" => $otrosSemilleros,
                "Menores" => $menores,
                "Mayores" => $mayores,
                "Instituciones" => $institucion,
                "Semilleros" => $semilleros,
                "TotalServicios" => $totalServicios,
                "ActivosServicios" => $activosServicios,
                "InactivosServicios" => $inactivosServicios,
                "Total" => $totalMateriales,
                "Activos" => $disponibles,
                "Inactivos" => $inactivos,
                "Buenos" => $buenos,
                "Incompletos" => $incompletos,
                "Regulares" => $regulares,
                "Obsoletos" => $obsoletos,
                "Prestamos" => $prestamos,
                "Pactivos" => $Pactivos,
                "Pinactivos" => $Pinactivos,
                "MaxP" => $maxP,
                "MinP" => $minP
            );
            
            $this->link->desconectar();
            $this->result = $row;
            $this->respuesta = "all";
        }
    }
    
    
}
