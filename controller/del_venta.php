<?php
require '../models/Venta.php';

$c_venta = new Venta();

$c_venta->setIdVenta(filter_input(INPUT_GET, 'id_venta'));

if ($c_venta->anular()) {
    header("Location: ../contents/ver_ventas.php");
}