<?php
session_start();
require_once "../models/Cliente.php";

$c_cliente  = new Cliente();

$c_cliente->setDocumento(filter_input(INPUT_POST, 'input_documento'));
$c_cliente->setDatos(filter_input(INPUT_POST, 'input_datos_cliente'));
$c_cliente->setDatos(addslashes($c_cliente->getDatos()));
$c_cliente->setDireccion(filter_input(INPUT_POST, 'input_direccion_cliente'));
$c_cliente->setIdEmpresa($_SESSION['id_empresa']);

if (filter_input(INPUT_POST, 'inputcodigo') == "") {
    $c_cliente->obtenerId();
    $realizado = $c_cliente->insertar();
} else {
    $c_cliente->setIdCliente(filter_input(INPUT_POST, 'inputcodigo'));
    $realizado = $c_cliente->modificar();
}




if ($realizado) {
    header("Location: ../contents/ver_clientes.php");
}