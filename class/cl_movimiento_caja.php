<?php

include 'cl_conectar.php';

class cl_movimiento_caja {

    private $fecha;
    private $id_empresa;
    private $id_movimiento;
    private $descripcion;
    private $ingreso;
    private $egreso;

    function __construct() {
        
    }

    function getFecha() {
        return $this->fecha;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getId_movimiento() {
        return $this->id_movimiento;
    }

    function getIngreso() {
        return $this->ingreso;
    }

    function getEgreso() {
        return $this->egreso;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setId_movimiento($id_movimiento) {
        $this->id_movimiento = $id_movimiento;
    }

    function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    function setEgreso($egreso) {
        $this->egreso = $egreso;
    }

    function ver_movimientos() {
        global $conn;
        $query = "select id_movimiento, descripcion, ingreso, salida "
                . "from movimiento_caja "
                . "where id_empresa = '" . $this->id_empresa . "' and fecha = '" . $this->fecha . "' "
                . "order by id_movimiento asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

    function insertar() {
        $grabado = false;
        global $conn;
        $query = "insert into movimiento_caja  values ('" . $this->id_empresa . "', '" . $this->fecha . "','" . $this->id_movimiento . "', '" . $this->descripcion . "', "
                . "'" . $this->ingreso . "', '" . $this->egreso . "')";
        //echo $query;
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in movimiento_caja  : ' . mysqli_error($conn));
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
        $query = "select ifnull(max(id_movimiento) + 1, 1) as codigo "
                . "from movimiento_caja  "
                . "where id_empresa = '" . $this->id_empresa . "' and fecha = '" . $this->fecha . "'";
        $r_codigo = $conn->query($query);
        if ($r_codigo->num_rows > 0) {
            while ($fila = $r_codigo->fetch_assoc()) {
                $id_movimiento = $fila ['id_movimiento'];
            }
        }
        return $id;
    }

}
