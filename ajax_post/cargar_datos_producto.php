<?php

require '../class/cl_producto.php';
$c_producto = new cl_producto();

$c_producto->setCodigo(filter_input(INPUT_POST, 'codigo'));

$datos_producto = $c_producto->datos_producto();

$array_producto = array();

if ($datos_producto) {
    $fila_array['existe'] = true;
    $fila_array['codigo'] = $c_producto->getCodigo();
    $fila_array['descripcion'] = $c_producto->getDescripcion();
    $fila_array['caracteristicas'] = $c_producto->getCaracteristicas();
    $fila_array['precio_venta'] = $c_producto->getPrecio();
    $fila_array['imagen'] = $c_producto->getImagen();
} else {
    $fila_array['existe'] = false;
}

array_push($array_producto, $fila_array);

echo json_encode($array_producto);
