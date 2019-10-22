<?php
session_start();

include '../class/cl_caja_diaria.php';

$c_caja = new cl_caja_diaria();

$c_caja->setFecha(date('Y-m-d'));
$c_caja->setId_tienda($_SESSION['id_empresa']);
$c_caja->setApertura(filter_input(INPUT_POST, 'input_monto'));

$registrado = $c_caja->insertar();

if ($registrado) {
    header("Location: ../ver_caja_diaria.php");
}
