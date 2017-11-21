<?php

class pruebaImagen{
    private $id;
    private $nombre;
    private $imagen;
    
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;
            
    function __construct() {
        $this->id = "";
        $this->nombre = "";
        $this->imagen = "";
        
        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";
        
        include 'conexion.php';
        $this->link = new Conexion();
    }
    
    function getId(){
        return $this->id;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getImagen(){
        return $this->imagen;
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
    
    function setId($id){
        $this->id = $id; 
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setImagen($imagen){
        $this->imagen = $imagen;
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
}

