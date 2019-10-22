<?php

require 'cl_conectar.php';

class cl_ingreso {

    private $periodo;
    private $id;
    private $id_tienda;
    private $entidad;
    private $fecha;
    private $tipo_documento;
    private $serie;
    private $numero;
    private $total;

    function __construct() {
        
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function getId() {
        return $this->id;
    }

    function getId_tienda() {
        return $this->id_tienda;
    }

    function getEntidad() {
        return $this->entidad;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getTipo_documento() {
        return $this->tipo_documento;
    }

    function getSerie() {
        return $this->serie;
    }

    function getNumero() {
        return $this->numero;
    }

    function getTotal() {
        return $this->total;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_tienda($id_tienda) {
        $this->id_tienda = $id_tienda;
    }

    function setEntidad($entidad) {
        $this->entidad = $entidad;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setTipo_documento($tipo_documento) {
        $this->tipo_documento = $tipo_documento;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function obtener_id() {
        $id = 1;
        global $conn;
        $query = "select ifnull(max(id_ingreso) + 1, 1) as codigo "
                . "from ingresos "
                . "where periodo = '" . $this->periodo . "' and id_empresa = '" . $this->id_tienda . "'";
        $resultado = $conn->query($query);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $id = $fila ['codigo'];
            }
        }
        return $id;
    }

    function insertar() {
        $grabado = false;
        global $conn;
        $query = "insert into ingresos values ('" . $this->id_tienda . "', '" . $this->periodo . "', '" . $this->id . "', '" . $this->fecha . "', "
                . "'" . $this->tipo_documento . "', '" . $this->serie . "', '" . $this->numero . "', '" . $this->entidad . "', '" . $this->total . "')";
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in ingresos: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        return $grabado;
    }

    function ver_ingresos() {
        global $conn;
        $query = "select i.id_ingreso, i.periodo, e.razon_social, e.nombre_comercial, i.fecha, td.siglas, i.serie, i.numero, i.total "
                . "from ingresos as i "
                . "inner join entidad as e on e.id_proveedor = i.id_proveedor "
                . "inner join tipo_documento as td on td.id_tido = i.tipo_documento "
                . "where i.id_empresa ='" . $this->id_tienda . "'";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

}
