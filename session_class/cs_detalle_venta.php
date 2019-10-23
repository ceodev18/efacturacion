<?php

class cs_detalle_venta {

    private $producto;
    private $descripcion;
    private $cantidad;
    private $precio;
    private $costo;

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

    function getPrecio() {
        return $this->precio;
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

    function setPrecio($precio) {
        $this->precio = $precio;
    }
    
    function getCosto() {
        return $this->costo;
    }

    function setCosto($costo) {
        $this->costo = $costo;
    }

    function i_detalle() {
        $fila = array();
        $fila['codigo'] = $this->producto;
        $fila['descripcion'] = $this->descripcion;
        $fila['cantidad'] = $this->cantidad;
        $fila['precio'] = $this->precio;
        $fila['costo'] = $this->costo;
        $_SESSION['detalle_venta'][$this->producto] = array();
        array_push($_SESSION['detalle_venta'][$this->producto], $fila);
    }

    function d_item_detalle($item) {
        unset($_SESSION['detalle_venta'][$item]);
    }

}
