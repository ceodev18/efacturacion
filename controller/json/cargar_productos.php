<?php
session_start();

require '../../models/Producto.php';
$c_producto = new Producto();
$c_producto->setIdEmpresa($_SESSION['id_empresa']);

$searchTerm = filter_input(INPUT_GET, 'term');

$resultados = $c_producto->BuscarProductos($searchTerm);

$array_resultado = array();
foreach ($resultados as $value) {
    $fila = array();
    $fila['value'] = $value['descripcion'] . " | P.Venta S/ : " . $value['precio'] . " | Cod: " . $value['id_producto'] ;
    $fila['codigo'] = $value['id_producto'];
    $fila['descripcion'] = $value['descripcion'];
    $fila['precio'] = $value['precio'];
    $fila['costo'] = $value['costo'];
    array_push($array_resultado, $fila);
}
echo json_encode($array_resultado);
