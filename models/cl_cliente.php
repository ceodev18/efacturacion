<?php

require 'cl_conectar.php';

class cl_cliente {

    private $id;
    private $id_tienda;
    private $documento;
    private $cliente;
    private $direccion;
    private $email;
    private $telefono;
    private $total_ventas;
    private $total_pagado;
    private $ultima_venta;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getTotal_ventas() {
        return $this->total_ventas;
    }

    function getTotal_pagado() {
        return $this->total_pagado;
    }

    function getUltima_venta() {
        return $this->ultima_venta;
    }

    function getId_tienda() {
        return $this->id_tienda;
    }

    function setId_tienda($id_tienda) {
        $this->id_tienda = $id_tienda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setTotal_ventas($total_ventas) {
        $this->total_ventas = $total_ventas;
    }

    function setTotal_pagado($total_pagado) {
        $this->total_pagado = $total_pagado;
    }

    function setUltima_venta($ultima_venta) {
        $this->ultima_venta = $ultima_venta;
    }

    function i_cliente() {
        $grabado = false;
        global $conn;
        $i_cliente = "insert into clientes values ('" . $this->id . "', '" . $this->id_tienda . "','" . $this->documento . "', '" . $this->cliente . "', "
                . "'" . $this->direccion . "', '" . $this->telefono . "', '" . $this->email . "', '" . $this->total_ventas . "' , '" . $this->total_pagado . "', '" . $this->ultima_venta . "')";
        //echo $i_cliente;
        $resultado = $conn->query($i_cliente);
        if (!$resultado) {
            die('Could not enter data in clientes: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        $conn->close();
        return $grabado;
    }

    function obtener_id() {
        $id = 1;
        global $conn;
        $c_codigo = "select ifnull(max(id_cliente) + 1, 1) as codigo "
                . "from clientes "
                . "where id_empresa = '" . $this->id_tienda . "'";
        $r_codigo = $conn->query($c_codigo);
        if ($r_codigo->num_rows > 0) {
            while ($fila = $r_codigo->fetch_assoc()) {
                $id = $fila ['codigo'];
            }
        }
        return $id;
    }

    function datos_cliente_documento() {
        $existe = false;
        global $conn;
        $c_codigo = "select * from clientes where documento = '" . $this->documento . "'";
        $r_codigo = $conn->query($c_codigo);
        if ($r_codigo->num_rows > 0) {
            $existe = true;
            while ($fila = $r_codigo->fetch_assoc()) {
                $this->id = $fila['id'];
            }
        }
        return $existe;
    }

    function ver_clientes() {
        global $conn;
        $query = "select * from clientes "
                . "where id_empresa = '" . $this->id_tienda . "'"
                . "order by datos asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

}
