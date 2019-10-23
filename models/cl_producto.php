<?php

require 'cl_conectar.php';

class cl_producto {

    private $id;
    private $id_tienda;
    private $descripcion;
    private $caracteristicas;
    private $costo;
    private $precio;
    private $cantidad;
    private $ultimo_ingreso;
    private $ultima_salida;
    private $id_clasificacion;
    private $id_familia;
    private $imagen;
    private $registrado;
    private $nro_visitas;
    private $descuento;
    private $online;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getId_tienda() {
        return $this->id_tienda;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCaracteristicas() {
        return $this->caracteristicas;
    }

    function getCosto() {
        return $this->costo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getUltimo_ingreso() {
        return $this->ultimo_ingreso;
    }

    function getUltima_salida() {
        return $this->ultima_salida;
    }

    function getId_clasificacion() {
        return $this->id_clasificacion;
    }

    function getId_familia() {
        return $this->id_familia;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getRegistrado() {
        return $this->registrado;
    }

    function getNro_visitas() {
        return $this->nro_visitas;
    }

    function getDescuento() {
        return $this->descuento;
    }
    
    function getOnline() {
        return $this->online;
    }

    function setOnline($online) {
        $this->online = $online;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_tienda($id_tienda) {
        $this->id_tienda = $id_tienda;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCaracteristicas($caracteristicas) {
        $this->caracteristicas = $caracteristicas;
    }

    function setCosto($costo) {
        $this->costo = $costo;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setUltimo_ingreso($ultimo_ingreso) {
        $this->ultimo_ingreso = $ultimo_ingreso;
    }

    function setUltima_salida($ultima_salida) {
        $this->ultima_salida = $ultima_salida;
    }

    function setId_clasificacion($id_clasificacion) {
        $this->id_clasificacion = $id_clasificacion;
    }

    function setId_familia($id_familia) {
        $this->id_familia = $id_familia;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setRegistrado($registrado) {
        $this->registrado = $registrado;
    }

    function setNro_visitas($nro_visitas) {
        $this->nro_visitas = $nro_visitas;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function obtener_nro() {
        $id = 1;
        global $conn;
        $query = "select ifnull(max(id_producto) + 1, 1) as codigo "
                . "from productos "
                . "where id_empresa = '" . $this->id_tienda . "'";
        $resultado = $conn->query($query);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $id = $fila['codigo'];
            }
        }
        return $id;
    }

    function datos_producto() {
        $existe_producto = false;
        global $conn;
        $query = "select p.nombre_corto, p.precio, p.costo, p.descripcion, p.imagen, p.cantidad, p.ultimo_ingreso, p.ultima_salida, p.descuento "
                . "from productos as p "
                . "where p.id_producto = '" . $this->id . "' and p.id_empresa = '" . $this->id_tienda . "'";
        $resultado = $conn->query($query);
        if ($resultado->num_rows > 0) {
            $existe_producto = true;
            while ($fila = $resultado->fetch_assoc()) {
                $this->descripcion = $fila ['nombre_corto'];
                $this->precio = $fila ['precio'];
                $this->costo = $fila ['costo'];
                $this->caracteristicas = $fila ['descripcion'];
                $this->imagen = $fila ['imagen'];
                $this->cantidad = $fila ['cantidad'];
                $this->ultimo_ingreso = $fila ['ultimo_ingreso'];
                $this->ultima_salida = $fila ['ultima_salida'];
                $this->descuento = $fila ['descuento'];
            }
        }
        return $existe_producto;
    }

    function i_producto() {
        $grabado = false;
        global $conn;
        $i_cliente = "insert into productos values ('" . $this->id . "', '" . $this->id_tienda . "', '" . $this->descripcion . "', '" . $this->caracteristicas . "', '" . $this->costo . "', '" . $this->precio . "','" . $this->cantidad . "', '" . $this->ultimo_ingreso . "', '" . $this->ultima_salida . "', "
                . "'" . $this->id_clasificacion . "', '" . $this->id_familia . "', current_time(), '0', '" . $this->descuento . "', '" . $this->imagen . "', '".$this->online."')";
        //echo $i_cliente;
        $resultado = $conn->query($i_cliente);
        if (!$resultado) {
            die('Could not enter data in productos: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
       // $conn->close();
        return $grabado;
    }

    function m_producto() {
        $grabado = false;
        global $conn;
        $query = "update productos "
                . "set nombre_corto = '" . $this->descripcion . "', costo = '" . $this->costo . "', precio = '" . $this->precio . "', "
                . "clasificacion = '" . $this->clasificacion . "', descripcion = '" . $this->caracteristicas . "' "
                . "where id_producto = '" . $this->id . "' and id_empresa = '" . $this->id_tienda . "'";
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not modifty data in productos: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        $conn->close();
        return $grabado;
    }

    function ver_productos() {
        global $conn;
        $query = "select p.id_producto, p.nombre_corto, c.descripcion as clasificacion, f.descripcion as familia, p.precio, p.descuento, p.cantidad "
                . "from productos as p "
                . "inner join familia_productos as f on f.id_familia = p.id_familia "
                . "inner join clasificacion_productos as c on c.id_clasificacion = p.id_clasificacion and c.id_familia = p.id_familia "
                . "where p.id_empresa = '" . $this->id_tienda . "' "
                . "order by p.nombre_corto asc ";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

}
