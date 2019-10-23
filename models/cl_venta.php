<?php

require 'cl_conectar.php';

class cl_venta {

    private $id_tienda;
    private $periodo;
    private $codigo;
    private $fecha;
    private $id_cliente;
    private $total;
    private $id_tido;
    private $serie;
    private $numero;
    private $pagado;
    private $estado;
    private $id_usuario;

    function __construct() {
        
    }

    function getId_tienda() {
        return $this->id_tienda;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getTotal() {
        return $this->total;
    }

    function getId_tido() {
        return $this->id_tido;
    }

    function getSerie() {
        return $this->serie;
    }

    function getNumero() {
        return $this->numero;
    }

    function getPagado() {
        return $this->pagado;
    }

    function getEstado() {
        return $this->estado;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_tienda($id_tienda) {
        $this->id_tienda = $id_tienda;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setId_tido($id_tido) {
        $this->id_tido = $id_tido;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setPagado($pagado) {
        $this->pagado = $pagado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function obtener_nro() {
        $id = 1;
        global $conn;
        $c_codigo = "select ifnull(max(codigo) + 1, 1) as codigo "
                . "from ventas where periodo = '" . $this->periodo . "' and id_empresa = '" . $this->id_tienda . "'";
        $r_codigo = $conn->query($c_codigo);
        if ($r_codigo->num_rows > 0) {
            while ($fila = $r_codigo->fetch_assoc()) {
                $id = $fila ['codigo'];
            }
        }
        return $id;
    }

    function insertar() {
        $grabado = false;
        global $conn;
        $query = "insert into ventas values ('" . $this->id_tienda . "','" . $this->periodo . "', '" . $this->codigo . "', '" . $this->fecha . "', '" . $this->id_cliente . "', '" . $this->id_tido . "', '" . $this->serie . "', '" . $this->numero . "', '" . $this->total . "', '" . $this->pagado . "', "
                . "'" . $this->estado . "', current_time(), '" . $this->id_usuario . "')";
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in ventas: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }

    function anular() {
        $grabado = false;
        global $conn;
        $query = "update ventas "
                . "set estado = '0', total = 0, pagado = 0 "
                . "where periodo = '" . $this->periodo . "' and id_empresa = '" . $this->id_tienda . "' and codigo = '" . $this->codigo . "'";
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in ventas: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }

    function ver_ventas_periodo() {
        global $conn;
        $query = "select v.periodo, v.codigo, v.fecha, c.datos, v.total, v.pagado, td.siglas, v.serie, v.numero, v.estado "
                . "from ventas as v "
                . "inner join clientes as c on c.id_cliente = v.id_cliente and c.id_empresa = v.id_empresa "
                . "inner join tipo_documento as td on td.id_tido = v.tipo_documento "
                . "where v.periodo = '" . $this->periodo . "' and v.id_empresa = '" . $this->id_tienda . "'";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

    function ver_ventas_fecha() {
        global $conn;
        $query = "select v.periodo, v.codigo, v.fecha, c.datos, v.total, v.pagado, td.siglas, v.serie, v.numero, v.estado "
                . "from ventas as v "
                . "inner join clientes as c on c.id_cliente = v.id_cliente and c.id_empresa = v.id_empresa "
                . "inner join tipo_documento as td on td.id_tido = v.tipo_documento "
                . "where v.fecha= '" . $this->fecha . "' and v.id_empresa = '" . $this->id_tienda . "'";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

    function ver_ventas_id() {
        global $conn;
        $query = "select v.periodo, v.codigo, v.fecha, c.datos, v.total, v.pagado, td.nombre, td.siglas, v.serie, v.numero, v.estado "
                . "from ventas as v "
                . "inner join clientes as c on c.id_cliente = v.id_cliente and c.id_empresa = v.id_empresa "
                . "inner join tipo_documento as td on td.id_tido = v.tipo_documento "
                . "where v.periodo = '" . $this->periodo . "' and v.id_empresa = '" . $this->id_tienda . "' and v.codigo = '" . $this->codigo . "'";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

    function ver_periodos() {
        global $conn;
        $query = "select distinct(periodo) as periodo "
                . "from ventas "
                . "where id_empresa = '" . $this->id_tienda . "' "
                . "order by periodo asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

}
