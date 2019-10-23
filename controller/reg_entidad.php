<?php

session_start();
require '../class/cl_entidad.php';
$c_entidad = new cl_entidad();

$c_entidad->setId($c_entidad->obtener_id());
$c_entidad->setRuc(filter_input(INPUT_POST, 'input_ruc'));
$c_entidad->setRazon_social(filter_input(INPUT_POST, 'input_razon_social'));
$c_entidad->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_entidad->setCondicion(filter_input(INPUT_POST, 'input_condicion'));
$c_entidad->setEstado(filter_input(INPUT_POST, 'input_estado'));
$c_entidad->setNombre_comercial(filter_input(INPUT_POST, 'input_comercial'));

$grabado = $c_entidad->insertar();


if ($grabado) {
    header("Location: ../ver_entidad.php");
} 


