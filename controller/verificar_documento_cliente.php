<?php
session_start();

require '../models/Cliente.php';
require '../models/DocumentoInternet.php';

$c_cliente = new Cliente();
$c_internet = new DocumentoInternet();

$documento = filter_input(INPUT_GET, 'documento');
$resultado = [];

$c_cliente->setDocumento($documento);
$c_cliente->setIdEmpresa($_SESSION['id_empresa']);
if ($c_cliente->verificarDocumento()) {
    $c_cliente->obtenerDatos();
    $resultado["success"] = "existe";
    $resultado["documento"] = $c_cliente->getDocumento();
    $resultado["datos"] = $c_cliente->getDatos();
    $resultado["direccion"] = $c_cliente->getDireccion();
} else {
    if (strlen($documento) == 8) {
        $c_internet->setTipo(2);
    }
    if (strlen($documento) == 11) {
        $c_internet->setTipo(1);
    }
    $c_internet->setDocumento($documento);
    $respuesta = json_decode($c_internet->validar(), true);

    if ($respuesta['success'] == false) {
        $resultado["success"] = "error";
        $resultado["documento"] = $documento;
        $resultado["datos"] = "error de documento";
        $resultado["direccion"] = "";
    } else {
        if ($c_internet->getTipo() == 2) {
            if ($respuesta['source'] == "padron_jne") {
                $resultado["success"] = "nuevo";
                $resultado["documento"] = $respuesta["result"]["DNI"];
                $resultado["datos"] = $respuesta["result"]["apellidos"] . " " . $respuesta["result"]["Nombres"];
                $resultado["direccion"] = "";
            }
        }

        if ($c_internet->getTipo() == 1) {
            $resultado["success"] = "nuevo";
            $resultado["documento"] = $respuesta["result"]["RUC"];
            $resultado["datos"] = $respuesta["result"]["RazonSocial"];
            $resultado["direccion"] = $respuesta["result"]["Direccion"];
        }
    }
}

echo json_encode($resultado);
