<?php

class cl_kardex {

    private $id_producto;
    private $id_tienda;

    function __construct() {
        
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function getId_tienda() {
        return $this->id_tienda;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setId_tienda($id_tienda) {
        $this->id_tienda = $id_tienda;
    }

    function ver_kardex() {
        global $conn;
        $query = "select k.id_kardex, k.fecha_movimiento, k.id_movimiento, tm.nom_mov as nombre, k.cant_salida, k.cant_ingreso, k.costo_salida, k.costo_ingreso, k.f_registro "
                . "from kardex as k "
                . "inner join tipo_movimiento as tm on tm.idtipo_movimiento = k.tipo_movimiento "
                . "where k.id_producto = '" . $this->id_producto . "' and k.id_empresa = '" . $this->id_tienda . "'";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

}
