<?php
session_start();

require '../class/cl_ingreso.php';
require '../class/cl_detalle_ingreso.php';
require '../class/variosp';
$c_ingreso = new cl_ingreso();
$c_detalle = new cl_detalle_ingreso();
$c_varios = new varios();

$c_ingreso->setId_tienda($_SESSION['id_empresa']);
$c_ingreso->setPeriodo(filter_input(INPUT_POST, 'input_periodo'));
$c_ingreso->setId($c_ingreso->obtener_id());
$c_ingreso->setFecha($c_varios->fecha_web_mysql(filter_input(INPUT_POST, 'input_fecha')));
$c_ingreso->setEntidad(filter_input(INPUT_POST, 'input_id_proveedor'));
$c_ingreso->setTipo_documento(filter_input(INPUT_POST, 'select_documento'));
$c_ingreso->setSerie(filter_input(INPUT_POST, 'input_serie'));
$c_ingreso->setNumero(filter_input(INPUT_POST, 'input_numero'));
$c_ingreso->setTotal(filter_input(INPUT_POST, 'input_hidden_total'));

$grabado = $c_ingreso->insertar();


if ($grabado) {
    $json_detalle = $_SESSION['detalle_ingreso'];
        foreach ($json_detalle as $fila) {
            foreach ($fila as $value) {
                $c_detalle->setId_tienda($_SESSION['id_empresa']);
                $c_detalle->setPeriodo($c_ingreso->getPeriodo());
                $c_detalle->setIngreso($c_ingreso->getId());
                $c_detalle->setProducto($value['codigo']);
                $c_detalle->setCantidad($value['cantidad']);
                $c_detalle->setCosto($value['costo']);
                $c_detalle->setPrecio($value['precio']);
                $c_detalle->insertar();
            }
        }
        header("Location: ../ver_ingresos.php");
} 


