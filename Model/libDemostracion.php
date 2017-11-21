<?php

class libDemostracion {
    private $id;
    private $respuesta;
    private $link;
    private $mensaje;
    private $result;
    
    function __construct() {
        $this->id = "";
        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = ""; 
        
        include '../Model/conexion.php';
        $this->link = new Conexion();
        
    }
    
    function getId(){
        return $this->id;
    }
     function getRespuesta(){
        return $this->respuesta;
    }
     function getMensaje(){
        return $this->mensaje;
    }
     function getResult(){
        return $this->result;
    }
    
    function getLink(){
        return $this->link;
    }
    
    function setId($id){
        $this->id = $id;
    }
     function setRespuesta($respuesta){
        $this->respuesta = $respuesta;
    }
     function setMensaje($mensaje){
        $this->mensaje = $mensaje;
    }
     function setResult($result){
        $this->result = $result;
    }
     
    function setLink($link){
        $this->link = $link;
    }
    
    function registrarDemostracion(){
        $resp;
        $conexion = $this->link->conectar();
        
        if(!$conexion){
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = false;
        }else{
            $sql = "INSERT INTO tbl_demostracion VALUE ( id=$this->id) ";
            $rs = query($sql);
             
            if($rs > 0){
                $this->respuesta = "all";
                $this->mensaje = "Se Inserto";
                $resp = false;
            }else{
                 $this->respuesta = "all";
                 $this->mensaje = "No se Inserto";
                 $resp = false;
            }
            $this->link->desconectar();
        }
    }
}

