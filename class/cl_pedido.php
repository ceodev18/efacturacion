<?php

require 'cl_conectar.php';

class cl_pedido {

    private $campana;
    private $nro;
    private $periodo;
    private $fecha_pedido;
    private $fecha_entrega;
    private $cliente;
    private $datos_cliente;
    private $direccion_cliente;
    private $email_cliente;
    private $telefono_cliente;
    private $documento_cliente;
    private $total;
    private $estado;

    function __construct() {
        
    }

    function getCampana() {
        return $this->campana;
    }

    function getNro() {
        return $this->nro;
    }

    function getFecha_pedido() {
        return $this->fecha_pedido;
    }

    function getFecha_entrega() {
        return $this->fecha_entrega;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getDatos_cliente() {
        return $this->datos_cliente;
    }

    function getDireccion_cliente() {
        return $this->direccion_cliente;
    }

    function getEmail_cliente() {
        return $this->email_cliente;
    }

    function getTelefono_cliente() {
        return $this->telefono_cliente;
    }

    function getDocumento_cliente() {
        return $this->documento_cliente;
    }

    function getTotal() {
        return $this->total;
    }

    function getEstado() {
        return $this->estado;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function setCampana($campana) {
        $this->campana = $campana;
    }

    function setNro($nro) {
        $this->nro = $nro;
    }

    function setFecha_pedido($fecha_pedido) {
        $this->fecha_pedido = $fecha_pedido;
    }

    function setFecha_entrega($fecha_entrega) {
        $this->fecha_entrega = $fecha_entrega;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setDatos_cliente($datos_cliente) {
        $this->datos_cliente = $datos_cliente;
    }

    function setDireccion_cliente($direccion_cliente) {
        $this->direccion_cliente = $direccion_cliente;
    }

    function setEmail_cliente($email_cliente) {
        $this->email_cliente = $email_cliente;
    }

    function setTelefono_cliente($telefono_cliente) {
        $this->telefono_cliente = $telefono_cliente;
    }

    function setDocumento_cliente($documento_cliente) {
        $this->documento_cliente = $documento_cliente;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function obtener_nro() {
        $id = 1;
        global $conn;
        $c_codigo = "select ifnull(max(nro) + 1, 1) as codigo from pedidos where campana = '" . $this->campana . "'";
        $r_codigo = $conn->query($c_codigo);
        if ($r_codigo->num_rows > 0) {
            while ($fila = $r_codigo->fetch_assoc()) {
                $id = $fila ['codigo'];
            }
        }
        return $id;
    }

    function i_pedido() {
        $grabado = false;
        global $conn;
        $i_cliente = "insert into pedidos values ('" . $this->campana . "', '" . $this->nro . "', '" . $this->fecha_pedido . "', '" . $this->fecha_entrega . "', '" . $this->cliente . "', '" . $this->total . "', '" . $this->estado . "')";
        //echo $i_cliente;
        $resultado = $conn->query($i_cliente);
        if (!$resultado) {
            die('Could not enter data in clientes: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }

    function d_pedido() {
        $grabado = false;
        global $conn;
        $query = "delete from pedidos where campana = '" . $this->campana . "' and nro = '" . $this->nro . "'";
        //echo $query;
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in clientes: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }

    function ver_pedidos_campana() {
        global $conn;
        $query = "select p.campana, p.nro, p.fecha_pedido, p.fecha_entrega, c.datos, p.total, p.estado "
                . "from pedidos as p "
                . "inner join clientes as c on c.id = p.cliente "
                . "where p.campana = '" . $this->campana . "'";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

    function ver_campanas() {
        global $conn;
        $query = "select p.campana from pedidos as p group by p.campana order by p.campana asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

    function datos_pedido() {
        $existe = false;
        global $conn;
        $query = "select concat (year(ca.fecha_entrega), lpad(month(ca.fecha_entrega), 2, 0)) as periodo, p.fecha_pedido, ca.fecha_entrega, p.cliente, c.documento, c.datos, c.direccion, c.telefono, c.email, p.total, p.estado "
                . "from pedidos as p "
                . "inner join clientes as c on c.id = p.cliente "
                . "inner join campana as ca on ca.codigo = p.campana "
                . "where p.campana = '" . $this->campana . "' and p.nro = '" . $this->nro . "'";
        $resultado = $conn->query($query);
        if ($resultado->num_rows > 0) {
            $existe = true;
            while ($fila = $resultado->fetch_assoc()) {
                $this->periodo = $fila['periodo'];
                $this->fecha_pedido = $fila ['fecha_pedido'];
                $this->fecha_entrega = $fila ['fecha_entrega'];
                $this->documento_cliente = $fila ['documento'];
                $this->datos_cliente = $fila ['datos'];
                $this->direccion_cliente = $fila ['direccion'];
                $this->telefono_cliente = $fila ['telefono'];
                $this->email_cliente = $fila ['email'];
                $this->total = $fila ['total'];
                $this->estado = $fila ['estado'];
            }
        }
        return $existe;
    }

}
