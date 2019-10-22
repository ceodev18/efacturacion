<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
session_start();

include '../class/cl_movimiento_caja.php';

$c_movimiento = new cl_movimiento_caja();

$c_movimiento ->setFecha(date('Y-m-d'));
$c_movimiento ->setId_empresa($_SESSION['id_empresa']);
$c_movimiento ->setId_movimiento($c_movimiento ->obtener_id());

$c_movimiento ->setDescripcion(filter_input(INPUT_POST, 'input_motivo'));

$radio_tipo= filter_input(INPUT_POST, 'radio_tipo');
if ($radio_tipo == 1) {
	$c_movimiento ->setIngreso(filter_input(INPUT_POST, 'input_monto'));
}
if ($radio_tipo == 2) {
	$c_movimiento ->setEgreso(filter_input(INPUT_POST, 'input_monto'));
}

$registrado = $c_movimiento ->insertar();

if ($registrado) {
    header("Location: ../ver_caja_diaria.php");
}
