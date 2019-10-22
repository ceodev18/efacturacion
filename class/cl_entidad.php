<?php

require 'cl_conectar.php';

class cl_entidad {

    private $id;
    private $ruc;
    private $razon_social;
    private $nombre_comercial;
    private $direccion;
    private $condicion;
    private $estado;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getRuc() {
        return $this->ruc;
    }

    function getRazon_social() {
        return $this->razon_social;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCondicion() {
        return $this->condicion;
    }

    function getEstado() {
        return $this->estado;
    }

    function getNombre_comercial() {
        return $this->nombre_comercial;
    }

    function setNombre_comercial($nombre_comercial) {
        $this->nombre_comercial = strtoupper($nombre_comercial);
    }

    function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    function setRazon_social($razon_social) {
        $this->razon_social = strtoupper($razon_social);
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCondicion($condicion) {
        $this->condicion = $condicion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function ver_entidad() {
        global $conn;
        $query = "select * from entidad order by razon_social asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

    function insertar() {
        $grabado = false;
        global $conn;
        $query = "insert into entidad values ('" . $this->id . "', '" . $this->ruc . "', '" . $this->razon_social . "', '" . $this->nombre_comercial . "', '" . $this->direccion . "', '" . $this->condicion . "', '" . $this->estado . "')";
        echo $query;
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in entidad: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        $conn->close();
        return $grabado;
    }

    function validar_ruc() {
        $existe = false;
        global $conn;
        $consulta = "select id_proveedor "
                . "from entidad "
                . "where ruc = '" . $this->ruc . "'";
        $respuesta = $conn->query($consulta);
        if ($respuesta->num_rows > 0) {
            while ($fila = $respuesta->fetch_assoc()) {
                $this->id = $fila ['id_proveedor'];
                $existe = true;
            }
        }
        return $existe;
    }
    
    function datos_entidad() {
        $existe = false;
        global $conn;
        $consulta = "select * "
                . "from entidad "
                . "where id_proveedor = '" . $this->id . "'";
        $respuesta = $conn->query($consulta);
        if ($respuesta->num_rows > 0) {
            while ($fila = $respuesta->fetch_assoc()) {
                $this->nombre_comercial = $fila ['nombre_comercial'];
                $this->razon_social = $fila ['razon_social'];
                $this->direccion= $fila ['direccion_fiscal'];
                $this->condicion = $fila ['condicion'];
                $this->estado = $fila ['estado'];
                $existe = true;
            }
        }
        return $existe;
    }

    function obtener_id() {
        $id = 1;
        global $conn;
        $c_codigo = "select ifnull(max(id_proveedor) + 1, 1) as codigo from entidad";
        $r_codigo = $conn->query($c_codigo);
        if ($r_codigo->num_rows > 0) {
            while ($fila = $r_codigo->fetch_assoc()) {
                $id = $fila ['codigo'];
            }
        }
        return $id;
    }

}
