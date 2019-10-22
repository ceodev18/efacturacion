<?php
require '../class/cl_clasificacion.php';
$c_clasificacion = new cl_clasificacion();

$c_clasificacion->setId_familia(filter_input(INPUT_GET, 'codigo'));

$datos_clasificacion = $c_clasificacion->ver_clasificacion();

$array_clasificacion = array();

foreach ($datos_clasificacion as $value) {
    $fila_array['id'] = $value['id_clasificacion'];
    $fila_array['Nombre'] = $value['descripcion'];
    array_push($array_clasificacion, $fila_array);
} 

echo json_encode($array_clasificacion);