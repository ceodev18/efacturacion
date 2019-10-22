<?php

include 'cl_conectar.php';

class cl_caja_diaria {

    private $id_tienda;
    private $fecha;
    private $apertura;
    private $entrega;
    private $i_ventas;
    private $i_cobros;
    private $i_otros;
    private $e_devolucion;
    private $e_otros;
    private $sistema;

    function __construct() {
        
    }

    function getId_tienda() {
        return $this->id_tienda;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getApertura() {
        return $this->apertura;
    }

    function getEntrega() {
        return $this->entrega;
    }

    function getI_ventas() {
        return $this->i_ventas;
    }

    function getI_cobros() {
        return $this->i_cobros;
    }

    function getI_otros() {
        return $this->i_otros;
    }

    function getE_devolucion() {
        return $this->e_devolucion;
    }

    function getE_otros() {
        return $this->e_otros;
    }

    function getSistema() {
        return $this->sistema;
    }

    function setId_tienda($id_tienda) {
        $this->id_tienda = $id_tienda;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setApertura($apertura) {
        $this->apertura = $apertura;
    }

    function setEntrega($entrega) {
        $this->entrega = $entrega;
    }

    function setI_ventas($i_ventas) {
        $this->i_ventas = $i_ventas;
    }

    function setI_cobros($i_cobros) {
        $this->i_cobros = $i_cobros;
    }

    function setI_otros($i_otros) {
        $this->i_otros = $i_otros;
    }

    function setE_devolucion($e_devolucion) {
        $this->e_devolucion = $e_devolucion;
    }

    function setE_otros($e_otros) {
        $this->e_otros = $e_otros;
    }

    function setSistema($sistema) {
        $this->sistema = $sistema;
    }

    function insertar() {
        $grabado = false;
        global $conn;
        $query = "insert into caja_diaria values ('" . $this->id_tienda . "', '" . $this->fecha . "', '0', '0', '0', '0', '0', '0', '" . $this->apertura . "', '0', '0')";
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in caja_diaria: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        $conn->close();
        return $grabado;
    }

    function obtener_datos() {
        $existe = false;
        global $conn;
        $consulta = "select * "
                . "from caja_diaria "
                . "where id_empresa = '" . $this->id_tienda . "' and fecha = '" . $this->fecha . "'";
        $respuesta = $conn->query($consulta);
        if ($respuesta->num_rows > 0) {
            while ($fila = $respuesta->fetch_assoc()) {
                $this->i_ventas = $fila ['ing_venta'];
                $this->i_cobros = $fila ['cobro_venta'];
                $this->i_otros = $fila ['o_ingresos'];
                $this->e_devolucion = $fila ['devolucion_venta'];
                $this->e_otros = $fila ['gastos'];
                $this->apertura = $fila ['apertura'];
                $this->sistema = $fila ['m_sistema'];
                $this->entrega = $fila ['m_cierre'];
                $existe = true;
            }
        }
        return $existe;
    }
    
    function ver_cajas() {
        global $conn;
        $query = "select * from caja_diaria "
                . "where id_empresa = '" . $this->id_tienda . "'"
                . "order by fecha asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }
    
    function ver_periodos() {
        global $conn;
        $query = "select distinct(concat(year(fecha), month(fecha))) as periodo "
                . "from caja_diaria "
                . "where id_empresa = '" . $this->id_tienda . "' "
                . "order by periodo asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

}
