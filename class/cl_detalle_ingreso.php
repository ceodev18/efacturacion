<?php

require 'cl_conectar.php';

class cl_detalle_ingreso {

    private $id_tienda;
    private $periodo;
    private $ingreso;
    private $producto;
    private $cantidad;
    private $costo;
    private $precio;

    function __construct() {
        
    }

    function getId_tienda() {
        return $this->id_tienda;
    }

    function setId_tienda($id_tienda) {
        $this->id_tienda = $id_tienda;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function getProducto() {
        return $this->producto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getCosto() {
        return $this->costo;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setCosto($costo) {
        $this->costo = $costo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function insertar() {
        $grabado = false;
        global $conn;
        $query = "insert into detalle_ingreso values ('" . $this->id_tienda . "', '" . $this->periodo . "', '" . $this->ingreso . "', '" . $this->producto . "', '" . $this->cantidad . "', '" . $this->costo . "', '" . $this->precio . "')";
        echo $query;
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in detalle_ingreso: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }

    function d_detalle() {
        $eliminado = false;
        global $conn;
        $query = "delete from detalle_ingreso "
                . "where periodo = '" . $this->periodo . "' and ingreso = '" . $this->ingreso . "' and id_empresa '" . $this->id_tienda . "'";
        //echo $i_cliente;
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not delete data in detalle_ingreso: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $eliminado = true;
        }
        // $conn->close();
        return $eliminado;
    }

}
