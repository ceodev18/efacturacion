<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('America/Lima');

use Greenter\Model\Client\Client;
use Greenter\Model\Despatch\Despatch;
use Greenter\Model\Despatch\DespatchDetail;
use Greenter\Model\Despatch\Direction;
use Greenter\Model\Despatch\Shipment;
use Greenter\Model\Despatch\Transportist;
use Greenter\Model\Sale\Document;
use Greenter\Model\Company\Company;
use Greenter\Model\Company\Address;
use Greenter\Ws\Services\SunatEndpoints;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../../models/Venta.php';
require __DIR__ . '/../../models/GuiaRemision.php';
require __DIR__ . '/../../models/Cliente.php';
require __DIR__ . '/../../models/Empresa.php';
require __DIR__ . '/../../models/ProductoVenta.php';

require __DIR__ . '/../../greenter/generate_qr/class/GenerarQr.php';

$util = Util::getInstance();

$c_guia = new GuiaRemision();
$c_guia->setIdGuia(filter_input(INPUT_POST, 'id_guia'));
$c_guia->obtenerDatos();

$c_venta = new Venta();
$c_venta->setIdVenta($c_guia->getIdVenta());
$c_venta->obtenerDatos();

$c_cliente = new Cliente();
$c_cliente->setIdCliente($c_venta->getIdCliente());
$c_cliente->obtenerDatos();

if (strlen($c_cliente->getDocumento()) == 8) {
    $tipo_doc = "1";
} elseif (strlen($c_cliente->getDocumento()) == 11) {
    $tipo_doc = "6";
}else {
    $tipo_doc = "0";
    $c_cliente->setDocumento('00000000');
}


$client = new Client();
$client->setTipoDoc($tipo_doc)
    ->setNumDoc($c_cliente->getDocumento())
    ->setRznSocial($c_cliente->getDatos());

$c_empresa = new Empresa();
$c_empresa->setIdEmpresa($c_venta->getIdEmpresa());
$c_empresa->obtenerDatos();

$util->setRuc($c_empresa->getRuc());
$util->setClave($c_empresa->getClaveSol());
$util->setUsuario($c_empresa->getUserSol());

$empresa = new Company();
$empresa->setRuc($c_empresa->getRuc())
    ->setNombreComercial($c_empresa->getRazonSocial())
    ->setRazonSocial($c_empresa->getRazonSocial())
    ->setAddress((new Address())
        ->setUbigueo($c_empresa->getUbigeo())
        ->setDistrito($c_empresa->getDistrito())
        ->setProvincia($c_empresa->getProvincia())
        ->setDepartamento($c_empresa->getDepartamento())
        ->setUrbanizacion('-')
        ->setCodLocal('0000')
        ->setDireccion($c_empresa->getDireccion()));


$c_productos = new ProductoVenta();
$c_productos->setIdVenta($c_venta->getIdVenta());

$items = $c_productos->verFilas();

$array_items = array();
$sumar_cantidades = 0;

foreach ($items as $value) {
    $detail = new DespatchDetail();
    $detail->setCantidad($value['cantidad'])
        ->setUnidad('NIU')
        ->setDescripcion($value['descripcion'] )
        ->setCodigo($value['id_producto']);
        //->setCodProdSunat($value['id_producto']);

    $sumar_cantidades += $value['cantidad'];

    $array_items[] = $detail;
}

$transp = new Transportist();
$transp->setTipoDoc('6')
    ->setNumDoc($c_guia->getRucTransporte())
    ->setRznSocial($c_guia->getRazTransporte())
    ->setPlaca($c_guia->getVehiculo())
    ->setChoferTipoDoc('1')
    ->setChoferDoc($c_guia->getChofer());

$envio = new Shipment();
$envio->setModTraslado('01')
    ->setCodTraslado('01')
    ->setDesTraslado('VENTA')
    ->setFecTraslado(new \DateTime())
    ->setIndTransbordo(false)
    ->setPesoTotal($c_guia->getPeso())
    ->setUndPesoTotal('KGM')
    ->setNumBultos($sumar_cantidades)
    ->setLlegada(new Direction($c_guia->getUbigeo(), $c_guia->getDirLlegada()))
    ->setPartida(new Direction($c_empresa->getUbigeo(),$c_empresa->getDireccion()))
    ->setTransportista($transp);

$despatch = new Despatch();
$despatch->setTipoDoc('09')
    ->setSerie($c_guia->getSerie())
    ->setCorrelativo($c_guia->getNumero())
    ->setFechaEmision(new \DateTime())
    ->setCompany($empresa)
    ->setDestinatario($client)
    //->setTercero($client)
    ->setObservacion('FT: ' . $c_venta->getSerie() . "-" . $c_venta->getNumero())
    ->setEnvio($envio);

$despatch->setDetails([$detail]);

// Envio a SUNAT.
$see = $util->getSee(SunatEndpoints::GUIA_PRODUCCION);

$res = $see->send($despatch);
$util->writeXml($despatch, $see->getFactory()->getLastXml());

$nombre_archivo = $despatch->getName();

//generar qr
$qr = $c_empresa->getRuc() . "|" . "09" . "|" . $c_guia->getSerie() . "-" . $c_guia->getNumero() . "|0.00|0.00|" . $c_guia->getFecha() . "|" . $tipo_doc . "|" . $c_cliente->getDocumento();
$c_generar = new generarQr();
$c_generar->setTexto_qr($qr);
$c_generar->setNombre_archivo($nombre_archivo);
$c_generar->generar_qr();
/*
if ($res->isSuccess()) {
    $cdr = $res->getCdrResponse();
    $util->writeCdr($despatch, $res->getCdrZip());

    $util->showResponse($despatch, $cdr);
} else {
    echo $util->getErrorResponse($res->getError());
}
*/

$respuesta = array();
if ($res->isSuccess()) {

    $dominio = "http://" . $_SERVER["HTTP_HOST"] . "/clientes/efacturacion/";
    $nombre_xml = $dominio . "/greenter/files/" . $despatch->getName() . ".xml";
    $hash = $util->getHash($despatch);

    $c_guia->setHash($hash);
    $c_guia->setNombreXml($nombre_archivo);
    $c_guia->actualizarHash();

    //obtener cdr y guardar en json
    $cdr = $res->getCdrResponse();
    $util->writeCdr($despatch, $res->getCdrZip());
    $descripcion = $cdr->getDescription();

    $respuesta = array(
        "success" => true,
        "resultado" => array(
            "nombre_archivo" => $nombre_archivo,
            "direccion_xml" => $nombre_xml,
            "direccion_qr" => $qr,
            "hash" => $hash,
            "descripcion_cdr" => $descripcion
        )
    );

    //$util->getResponseFromCdr($cdr);
} else {
    var_dump($res->getError());
    $respuesta = array(
        "success" => false,
        "resultado" => "error al procesar"
    );
}

echo json_encode($respuesta);



