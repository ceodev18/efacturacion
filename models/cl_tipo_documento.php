<?php

require 'cl_conectar.php';

class cl_tipo_documento {

    private $id;
    private $nombre;
    private $sunat;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getSunat() {
        return $this->sunat;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setSunat($sunat) {
        $this->sunat = $sunat;
    }
    
    function ver_documentos() {
        global $conn;
        $query = "select * from tipo_documento order by nombre asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }


}
