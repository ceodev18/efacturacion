<?php

session_start();

require '../class/cl_venta.php';
require '../class/cl_detalle_venta.php';
require '../class/cl_cobro_venta.php';

$c_venta = new cl_venta();
$c_detalle = new cl_detalle_venta();
$c_cobro = new cl_cobro_venta();

$id_tienda = $_SESSION['id_empresa'];
$id_venta = filter_input(INPUT_POST, 'id_venta');
$periodo = filter_input(INPUT_POST, 'periodo');

//eliminar pagos de venta
$c_cobro->setIdTienda($id_tienda);
$c_cobro->setIdVenta($id_venta);
$c_cobro->setPeriodo($periodo);
$c_cobro->eliminar_pagos();

//eliminar detalle de venta
$c_detalle->setId_tienda($id_tienda);
$c_detalle->setId_venta($id_venta);
$c_detalle->setPeriodo($periodo);
$c_detalle->eliminar_detalle();

//anular venta
$c_venta->setCodigo($id_venta);
$c_venta->setPeriodo($periodo);
$c_venta->setId_tienda($id_tienda);
$c_venta->anular();