<?php

require 'cl_conectar.php';

class cl_detalle_venta {

    private $id_tienda;
    private $periodo;
    private $id_venta;
    private $id_producto;
    private $cantidad;
    private $precio;
    private $costo;

    function __construct() {
        
    }

    function getId_tienda() {
        return $this->id_tienda;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function getId_venta() {
        return $this->id_venta;
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCosto() {
        return $this->costo;
    }

    function setId_tienda($id_tienda) {
        $this->id_tienda = $id_tienda;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function setId_venta($id_venta) {
        $this->id_venta = $id_venta;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCosto($costo) {
        $this->costo = $costo;
    }

    function insertar() {
        $grabado = false;
        global $conn;
        $query = "insert into detalle_venta values ('" . $this->id_tienda . "', '" . $this->periodo . "', '" . $this->id_venta . "', '" . $this->id_producto . "', '" . $this->cantidad . "', '" . $this->precio . "', '" . $this->costo . "')";
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in detalle_venta: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }

    function ver_productos() {
        global $conn;
        $query = "select dv.cantidad, dv.precio, dv.costo, p.nombre_corto "
                . "from detalle_venta as dv "
                . "inner join productos as p on p.id_producto = dv.id_producto and p.id_empresa = dv.id_empresa "
                . "where dv.id_empresa = '" . $this->id_tienda . "' and periodo = '" . $this->periodo . "' and codigo = '" . $this->id_venta . "' "
                . "order by p.nombre_corto asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }
    
    function ver_utilidad_productos($fecha) {
        global $conn;
        $query = "select dv.id_producto, dv.cantidad, dv.precio, dv.costo "
		. "from ventas as v "
		. "inner join detalle_venta as dv on dv.id_empresa = v.id_empresa and dv.periodo = v.periodo and dv.codigo = v.codigo "
		. "where v.id_empresa = '" . $this->id_tienda . "' and v.fecha = '".$fecha."'";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }
    
    function eliminar_detalle() {
        $grabado = false;
        global $conn;
        $query = "delete from detalle_venta where id_empresa = '" . $this->id_tienda . "' and periodo = '" . $this->periodo . "' and codigo = '" . $this->id_venta . "'";
//        echo $query;
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not delete data in detalle_venta: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }

}
