<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set('America/Lima');

//ob_start();
//require('../includes/fpdf.php');

require '../models/Empresa.php';
require '../models/Venta.php';
require '../models/ProductoVenta.php';
require '../models/Cliente.php';
require '../models/DocumentoSunat.php';
require '../tools/NumerosaLetras.php';
require '../models/VentaSunat.php';
require '../tools/Varios.php';

require('../tools/fpdf/fpdf.php');
define('FPDF_FONTPATH', '../tools/fpdf/font/');

$id_venta = filter_input(INPUT_GET, 'id_venta', FILTER_SANITIZE_NUMBER_INT);



$c_varios = new Varios();
$c_numeros_letras = new NumerosaLetras();

$c_venta = new Venta();
$c_venta->setIdVenta($id_venta);
$c_venta->obtenerDatos();

$c_empresa = new Empresa();
$c_empresa->setIdEmpresa($c_venta->getIdEmpresa());
$c_empresa->obtenerDatos();

$c_cliente = new Cliente();
$c_cliente->setIdCliente($c_venta->getIdCliente());
$c_cliente->obtenerDatos();

$c_tido = new DocumentoSunat();
$c_tido->setIdTido($c_venta->getIdTido());
$c_tido->obtenerDatos();

$serie = $c_varios->zerofill($c_venta->getSerie(), 4);
$numero = $c_varios->zerofill($c_venta->getNumero(), 8);

$c_detalle = new ProductoVenta();
$c_detalle->setIdVenta($c_venta->getIdVenta());

$c_recibido = new VentaSunat();
$c_recibido->setIdVenta($c_venta->getIdVenta());
$c_recibido->obtenerDatos();

$id_moneda = 1;
$nmoneda = "";
$ncorto = "";
if ($id_moneda == 1) {
    $nmoneda = "SOLES";
    $ncorto = "PEN";
}
if ($id_moneda == 2) {
    $nmoneda = "DOLAR AMERICANO";
    $ncorto = "USD";
}

if (strlen($c_cliente->getDocumento())== 7) {
    $c_cliente->setDocumento("00000000");
}

$pdf = new FPDF('P', 'mm', array(80, 350));
$pdf->SetMargins(10,8,10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$altura_linea = 4 ;

$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(00, 00, 0);
$pdf->Cell(64, $altura_linea, "*** " . utf8_decode($c_empresa->getNombreComercial()) . " ***", 0, 1, 'C');
$pdf->MultiCell(64, $altura_linea, utf8_decode($c_empresa->getRuc() . " | " . $c_empresa->getRazonSocial()), 0, 'C');
$pdf->Cell(64, $altura_linea, "Cel/Tel: " . $c_empresa->getTelefono(), 0, 1, 'C');
$pdf->MultiCell(64, $altura_linea, utf8_decode($c_empresa->getDireccion()), 0, 'C');
$pdf->Ln();

$pdf->Output();
