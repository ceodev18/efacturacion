<?php
session_start();

require '../../models/DocumentoEmpresa.php';

$c_tido = new DocumentoEmpresa();
$c_tido->setIdEmpresa($_SESSION['id_empresa']);
$c_tido->setIdTido(filter_input(INPUT_GET, 'idtido'));
$c_tido->obtenerDatos();

$resultado = [];
$resultado['serie'] = $c_tido->getSerie();
$resultado['numero'] = $c_tido->getNumero();

echo json_encode($resultado);