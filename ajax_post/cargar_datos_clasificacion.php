<?php

require '../class/cl_clasificacion_producto.php';
$c_clasificacion = new cl_clasificacion_producto();

$c_clasificacion->setCodigo(filter_input(INPUT_GET, 'codigo'));

$datos_clasificacion = $c_clasificacion->datos_clasificacion();

$array_clasificacion = array();

if ($datos_clasificacion) {
    $fila_array['existe'] = true;
    $fila_array['codigo'] = $c_clasificacion->getCodigo();
    $fila_array['descripcion'] = $c_clasificacion->getNombre();
    $fila_array['porcentaje'] = $c_clasificacion->getPorcentaje();
} else {
    $fila_array['existe'] = false;
}

array_push($array_clasificacion, $fila_array);

echo json_encode($array_clasificacion);
