<?php

class cs_detalle_ingreso {

    private $producto;
    private $descripcion;
    private $cantidad;
    private $costo;
    private $precio;

    function __construct() {
        
    }
    function getProducto() {
        return $this->producto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getCosto() {
        return $this->costo;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
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
    
    function i_detalle() {
        $fila = array();
        $fila['codigo'] = $this->producto;
        $fila['descripcion'] = $this->descripcion;
        $fila['cantidad'] = $this->cantidad;
        $fila['costo'] = $this->costo;
        $fila['precio'] = $this->precio;
        $_SESSION['detalle_ingreso'][$this->producto] = array();
        array_push($_SESSION['detalle_ingreso'][$this->producto], $fila);
    }

    function d_item_detalle($item) {
        unset($_SESSION['detalle_ingreso'][$item]);
    }

}
