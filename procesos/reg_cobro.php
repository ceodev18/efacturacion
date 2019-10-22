<?php
session_start();
require '../class/cl_cobro_venta.php';

$c_cobro = new cl_cobro_venta();

$c_cobro->setMonto(filter_input(INPUT_POST, 'monto'));
$c_cobro->setIdTienda($_SESSION['id_empresa']);
$c_cobro->setFecha(date('Y-m-d'));
$c_cobro->setPeriodo(filter_input(INPUT_POST, 'periodo'));
$c_cobro->setIdVenta(filter_input(INPUT_POST, 'id_venta'));
$c_cobro->setIdPago($c_cobro->obtener_nro());

if ($c_cobro->insertar()) {
    echo "grabado correctamente";
}