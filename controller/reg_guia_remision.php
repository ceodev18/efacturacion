<?php
session_start();

require '../models/GuiaRemision.php';
require '../models/DocumentoEmpresa.php';
require '../tools/SendCurlGuia.php';

$c_guia = new GuiaRemision();
$c_documentos = new DocumentoEmpresa();
$sendGuia = new SendCurlGuia();

$c_guia->setFecha(filter_input(INPUT_POST, 'fecha_emision'));
$c_guia->setIdVenta(filter_input(INPUT_POST, 'id_venta'));
$c_guia->setDirLlegada(filter_input(INPUT_POST, 'dir_llegada'));
$c_guia->setUbigeo(filter_input(INPUT_POST, 'ubigeo'));
$c_guia->setTipoTransporte(filter_input(INPUT_POST, 'tipo_transporte'));
$c_guia->setRucTransporte(filter_input(INPUT_POST, 'ruc_transporte'));
$c_guia->setRazTransporte(filter_input(INPUT_POST, 'razon_transporte'));
$c_guia->setVehiculo(filter_input(INPUT_POST, 'vehiculo'));
$c_guia->setChofer(filter_input(INPUT_POST, 'chofer'));
$c_guia->setPeso(filter_input(INPUT_POST, 'peso'));
$c_guia->setNroBultos(filter_input(INPUT_POST, 'nro_bultos'));
$c_guia->setIdEmpresa($_SESSION['id_empresa']);

$c_documentos->setIdTido(11);
$c_documentos->setIdEmpresa($c_guia->getIdEmpresa());
$c_documentos->obtenerDatos();

$c_guia->setSerie($c_documentos->getSerie());
$c_guia->setNumero($c_documentos->getNumero());

$c_guia->obtenerId();

if ($c_guia->insertar()) {

    $sendGuia->setIdGuia($c_guia->getIdGuia());
    $respuesta = $sendGuia->enviar_json();

    $json_respuesta = json_decode($respuesta, true);
    //die($respuesta);
    $resultado["valor"] = 0;
    if ($json_respuesta["success"] == true) {
        //ya no es necesario llamar a generar pdf
        //$c_curl->generar_pdf();
        $resultado["valor"] = $c_guia->getIdGuia();
    } else {
        die($json_respuesta);
    }
} else {
    $resultado["valor"] = 0;
}

echo json_encode($resultado);