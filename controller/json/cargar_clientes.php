<?php
session_start();

require '../../models/Cliente.php';
$c_cliente = new Cliente();
$c_cliente->setIdEmpresa($_SESSION['id_empresa']);

$searchTerm = filter_input(INPUT_GET, 'term');

$resultados = $c_cliente->buscarClientes($searchTerm);

$array_resultado = array();
foreach ($resultados as $value) {
    $fila = array();
    $fila['value'] = $value['documento'] . " | " . $value['datos'];
    $fila['codigo'] = $value['id_cliente'];
    $fila['documento'] = $value['documento'];
    $fila['datos'] = $value['datos'];
    array_push($array_resultado, $fila);
}

echo json_encode($array_resultado);