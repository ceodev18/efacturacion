<?php
session_start();

require '../class/cl_cliente.php';
$c_cliente = new cl_cliente();

if (isset($_POST)) {
    $c_cliente->setId_tienda($_SESSION['id_empresa']);
    $c_cliente->setId($c_cliente->obtener_id());
    //$c_cliente->setDocumento(trim(filter_input(INPUT_POST, 'input_documento')));
    $c_cliente->setDocumento('');
    $c_cliente->setCliente(strtoupper(filter_input(INPUT_POST, 'input_nombre')));
    $c_cliente->setDireccion(strtoupper(filter_input(INPUT_POST, 'input_direccion')));
    $c_cliente->setEmail(strtolower(filter_input(INPUT_POST, 'input_email')));
    $c_cliente->setTelefono(filter_input(INPUT_POST, 'input_telefono'));
    $c_cliente->setTotal_pagado('0.00');
    $c_cliente->setTotal_ventas('0.00');
    $c_cliente->setUltima_venta('0000-00-00');

    $registrado = $c_cliente->i_cliente();

    if ($registrado) {
        header("Location: ../ver_clientes.php");
    }
} else {
    echo "no se han recibido datos";
}