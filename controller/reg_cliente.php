<?php
session_start();
require_once "../models/Cliente.php";

$c_cliente  = new Cliente();

$c_cliente->setDocumento(filter_input(INPUT_POST, 'input_documento'));
$c_cliente->setDatos(filter_input(INPUT_POST, 'input_datos'));
$c_cliente->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_cliente->setIdEmpresa($_SESSION['id_empresa']);
$c_cliente->obtenerId();

$realizado = $c_cliente->insertar();

if ($realizado) {
    header("Location: ../contents/ver_clientes.php");
}