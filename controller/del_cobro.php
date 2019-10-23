<?php
session_start();
require '../class/cl_cobro_venta.php';

$c_cobro = new cl_cobro_venta();

$c_cobro->setIdTienda($_SESSION['id_empresa']);
$c_cobro->setPeriodo(filter_input(INPUT_POST, 'periodo'));
$c_cobro->setIdVenta(filter_input(INPUT_POST, 'id_venta'));
$c_cobro->setIdPago(filter_input(INPUT_POST, 'id_cobro'));

if ($c_cobro->eliminar()) {
    echo "pago eliminado correctamente";
} else {
echo "error";
}