<?php
require '../models/Venta.php';
require '../models/ProductoVenta.php';
require '../models/VentaAnulada.php';

$c_venta = new Venta();
$c_anulada = new VentaAnulada();
$c_producto = new ProductoVenta();

$c_venta->setIdVenta(filter_input(INPUT_GET, 'id_venta'));

$c_producto->setIdVenta($c_venta->getIdVenta());
$c_producto->eliminar();

$c_anulada->setIdVenta($c_venta->getIdVenta());
$c_anulada->setFecha(date("Y-m-d"));
$c_anulada->setMotivo("-");

if ($c_venta->anular()) {
    $c_anulada->insertar();
    header("Location: ../contents/ver_ventas.php");
}