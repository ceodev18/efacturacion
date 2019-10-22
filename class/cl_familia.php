<?php

include 'cl_conectar.php';

class cl_familia {

    private $id;
    private $descripcion;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function ver_familias() {
        global $conn;
        $query = "select * "
                . "from familia_productos "
                . "order by descripcion asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

}
