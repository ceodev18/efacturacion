<?php

include 'cl_conectar.php';

class cl_clasificacion {

    private $id;
    private $nombre;
    private $id_familia;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getId_familia() {
        return $this->id_familia;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setId_familia($id_familia) {
        $this->id_familia = $id_familia;
    }

    function ver_clasificacion() {
        global $conn;
        $query = "select * from clasificacion_productos "
                . "where id_familia = '" . $this->id_familia . "' "
                . "order by descripcion asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

    function datos_clasificacion() {
        $existe_clasificacion = false;
        global $conn;
        $query = "select descripcion, porcentaje "
                . "from clasificacion_productos "
                . "where codigo = '" . $this->codigo . "'";
        //echo $query;
        $resultado = $conn->query($query);
        if ($resultado->num_rows > 0) {
            $existe_clasificacion = true;
            while ($fila = $resultado->fetch_assoc()) {
                $this->nombre = $fila ['descripcion'];
                $this->porcentaje = $fila ['porcentaje'];
            }
        }
        return $existe_clasificacion;
    }

}
