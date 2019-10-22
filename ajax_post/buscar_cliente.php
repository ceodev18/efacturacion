<?php
session_start();

require '../class/cl_conectar.php';
$searchTerm = mysqli_real_escape_string($conn, (filter_input(INPUT_GET, 'term')));
global $conn;
$query = "select * "
        . "from clientes "
        . "where (datos like '%" . $searchTerm . "%' or telefono like '%" . $searchTerm . "%' or direccion like '%" . $searchTerm . "%') "
        . "and id_empresa = '".$_SESSION['id_empresa']."'";
$resultado = $conn->query($query);
$a_cliente = $resultado->fetch_all(MYSQLI_ASSOC);
$array_cliente = array();
$fila_cliente = array();
foreach ($a_cliente as $value) {
    $fila_cliente['value'] = $value['datos'] . " | " . $value['id_cliente'] . " | Doc: " . $value['documento'] ;
    $fila_cliente['id'] = $value['id_cliente'];
    $fila_cliente['datos'] = $value['datos'];
    $fila_cliente['total_venta'] = $value['total_venta'];
    $fila_cliente['total_pagado'] = $value['total_pagado'];
    array_push($array_cliente, $fila_cliente);
}
echo json_encode($array_cliente);
