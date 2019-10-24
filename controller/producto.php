<?php
require '../models/Producto.php';

$c_producto = new Producto();

$action = filter_input(INPUT_POST, 'action');

$c_producto->setDescripcion(filter_input(INPUT_POST, 'input_descripcion_producto'));
$c_producto->setPrecio(filter_input(INPUT_POST, 'input_precio_producto'));
$c_producto->setCosto(filter_input(INPUT_POST, 'input_costo_producto'));
$c_producto->setIscbp(filter_input(INPUT_POST, 'input_afecto'));
if ($c_producto->getIscbp() == "") {
    $c_producto->setIscbp(0);
}
$c_producto->setUltimaSalida('1000-01-01');
$c_producto->setIdEmpresa($_SESSION['id_empresa']);

$realizado = false;
if ($action == 1) {
    $c_producto->obtenerId();
    $realizado = $c_producto->insertar();
}

if ($action == 2) {
    $c_producto->setIdProducto(filter_input(INPUT_POST, 'input_codigo_producto'));
    $realizado = $c_producto->modificar();
}

if ($realizado) {
    //header("Location: ../contents/ver_productos.php");
}