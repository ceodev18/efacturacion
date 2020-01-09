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

if (strlen($c_cliente->getDocumento())< 8) {
    $c_cliente->setDocumento("00000000");
}

$pdf = new FPDF('P', 'mm', array(80, 350));
$pdf->SetMargins(8,8,8);
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

$pdf->Cell(64, $altura_linea, $c_tido->getNombre() . " ELECTRONICA ", 0, 1, 'C');
$pdf->Cell(64, $altura_linea, "Serie: " . $c_venta->getSerie() . " -  Numero: " . $c_varios->zerofill($c_venta->getNumero(), 5), 0, 1, 'C');
$pdf->Cell(64, $altura_linea, "Fecha: " . $c_varios->fecha_mysql_web($c_venta->getFecha()) . " " . date("h:i:s a"), 0, 1, 'L');
$pdf->Cell(64, $altura_linea, "Cliente: " . $c_cliente->getDocumento(), 0, 1, 'L');
$pdf->MultiCell(64, $altura_linea, utf8_decode($c_cliente->getDatos()), 0, 'J');
$pdf->Ln();

$a_productos = $c_detalle->verFilas();
$suma = 0;
foreach ($a_productos as $value) {
    $suma += ($value['cantidad'] * $value['precio']);
    $y = $pdf->GetY();
    $pdf->SetX(58);
    $pdf->Cell(5, $altura_linea, "x", 0, 0, 'R');
    $pdf->Cell(10, $altura_linea, number_format($value['cantidad'] * $value['precio'], 2), 0, 1, 'R');
    $pdf->SetX(8);
    $pdf->SetY($y);
    $pdf->MultiCell(49, $altura_linea, number_format($value['cantidad'], 0) . " | " . utf8_decode($value['descripcion']), 0, 'J');
}

$pdf->Ln(2);
if ($c_recibido->getNombreXml() != "-") {
    $pdf->Image('../greenter/generate_qr/temp/' . $c_recibido->getNombreXml() . '.png', $pdf->GetX(), $pdf->GetY(), 22, 22);
}

$pdf->Ln(2);
$pdf->Cell(50, $altura_linea, "SUB TOTAL: ", 0, 0, 'R');
$pdf->Cell(14, $altura_linea, number_format($c_venta->getTotal() / 1.18, 2), 0, 1, 'R');
$pdf->Cell(50, $altura_linea, "IGV: ", 0, 0, 'R');
$pdf->Cell(14, $altura_linea, number_format($c_venta->getTotal() / 1.18 * 0.18, 2), 0, 1, 'R');
$pdf->Cell(50, $altura_linea, "TOTAL: ", 0, 0, 'R');
$pdf->Cell(14, $altura_linea, number_format($c_venta->getTotal(), 2), 0, 1, 'R');

$pdf->Ln(2);
$pdf->Cell(64, $altura_linea, utf8_decode($c_numeros_letras->to_word($c_venta->getTotal(), $ncorto)), 0, 1, 'J');

$pdf->Ln(2);
$pdf->MultiCell(64, $altura_linea, "Representacion Impresora de la " . $c_tido->getNombre() . " Electronica, esta puede ser consultada en efacturacion.lunasystemsperu.com.", 0, 'J');
$pdf->Cell(64, $altura_linea, "Gracias por su compra", 0, 1, 'J');
$pdf->Output();
