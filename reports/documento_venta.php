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

$pdf = new FPDF('L', 'mm', 'A5');
$pdf->SetMargins(10,8,10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$imagen = $c_empresa->getLogo();
$r = 0;
$g = 150;
$b = 200;

$pdf->Image('../public/images/' . $imagen, 10, 10, 25, 25);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);


$pdf->SetFont('Arial', 'B', 12);
$pdf->Rect(130, 10, 70, 24);
$pdf->SetTextColor(00, 00, 0);
$pdf->SetY(10);
$pdf->SetX(130);
$pdf->Cell(70, 6, "RUC: " . $c_empresa->getRuc(), 0, 1, 'C');
$pdf->SetX(130);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->MultiCell(70, 6, $c_tido->getNombre() . " ELECTRONICA", 0, "C", 1);
//$pdf->Cell(70, 8, $c_tido->getNombre() . " ELECTRONICA", 0, 1, 'C', 1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(130);
$pdf->SetTextColor(00, 00, 0);
$pdf->Cell(70, 6, $serie . "-" . $numero, 0, 1, 'C');

$pdf->SetY(10);
$pdf->SetX(40);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(110, 5, $c_empresa->getRazonSocial(), 0, 1, 'L');
$pdf->SetX(40);
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(75, 5, $c_empresa->getDireccion(), 0, "L");
$pdf->SetX(40);
$pdf->Cell(75, 5, "Telefono: " . $c_empresa->getTelefono() , 0, 1, 'L');

$pdf->SetY(36);
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->Cell(190, 6, "FACTURADO A ", 0, 1, 'C', 1);
$pdf->Ln(1);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(25, 4, "CLIENTE: ", 0, 0, 'L');
$pdf->Cell(93, 4, $c_cliente->getDocumento(), 0, 0, 'L');
$pdf->Cell(32, 4, "FECHA EMISION:", 0, 0, 'R');
$pdf->Cell(40, 4, $c_varios->fecha_tabla($c_venta->getFecha()), 0, 1, 'C');

$pdf->Cell(118, 4, utf8_decode($c_cliente->getDatos()), 0, 0, 'L');
$pdf->Cell(32, 4, "MONEDA:", 0, 0, 'R');
$pdf->Cell(40, 4, $nmoneda, 0, 1, 'C');

$pdf->Cell(25, 4, "DIRECCION:", 0, 0, 'L');
//$pdf->Cell(130, 5, utf8_decode($c_entidad->getDireccion()), 0, 0, 'L');
$pdf->SetX(128);
$pdf->Cell(32, 4, "IGV:", 0, 0, 'R');
$pdf->Cell(40, 4, "18.00 %", 0, 0, 'C');
$pdf->SetX(35);
$pdf->MultiCell(90, 4, utf8_decode(trim($c_cliente->getDireccion())));


$pdf->Ln(1);

$y = $pdf->GetY();
//$pdf->Line(10, $y, 200, $y);
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->Cell(15, 5, "CANT.", 0, 0, 'C', 1);
$pdf->Cell(135, 5, "DESCRIPCION", 0, 0, 'C', 1);
$pdf->Cell(20, 5, "P.UNIT ", 0, 0, 'C', 1);
$pdf->Cell(20, 5, "P. TOTAL", 0, 1, 'C', 1);

$y = $pdf->GetY();
//$pdf->Line(10, $y, 200, $y);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 9);

$a_productos = $c_detalle->verFilas();
$suma = 0;
$items = array();
$fila_productos = array();
foreach ($a_productos as $value) {
    $cantidad = $value['cantidad'];
    $precio = $value['precio'];
    $subtotal = $cantidad * $precio;
    $pdf->Cell(15, 4, $value['cantidad'], 0, 0, 'C');
    //$pdf->Cell(110, 10, $value['descripcion'], 0, 0, 'L');
    $pdf->SetX(160);
    $pdf->Cell(20, 4, number_format($precio, 2), 0, 0, 'R');
    $pdf->Cell(20, 4, number_format($subtotal, 2), 0, 0, 'R');
    $pdf->SetX(25);
    $pdf->MultiCell(135, 4, utf8_decode($value['descripcion']), 0, 'J');
    //$pdf->Ln(2);
}

$pdf->SetY(-45);

$pdf->Ln(3);
$y = $pdf->GetY();
$pdf->Line(10, $y, 200, $y);

$pdf->SetY(-36);

$pdf->Image('../greenter/generate_qr/temp/' . $c_recibido->getNombreXml() . '.png', 130, 108, 22, 22);


$pdf->Ln(2);
$pdf->Cell(170, 5, "SUB TOTAL: ", 0, 0, 'R');
$pdf->Cell(20, 5, number_format($c_venta->getTotal() / 1.18, 2), 0, 1, 'R');

$total_final = number_format($c_venta->getTotal(), 2, ".", "");
/*
$pdf->Cell(170, 4, "Operaciones Gravadas: ", 0, 0, 'R');
$pdf->Cell(20, 4, number_format($c_venta->getTotal() / 1.18, 2), 0, 1, 'R');
$pdf->Cell(170, 4, "Operaciones Inafectas: ", 0, 0, 'R');
$pdf->Cell(20, 4, number_format(0, 2), 0, 1, 'R');
$pdf->Cell(170, 4, "Operaciones Gratuitas: ", 0, 0, 'R');
$pdf->Cell(20, 4, number_format(0, 2), 0, 1, 'R');
$pdf->Cell(170, 4, "Operaciones Exoneradas: ", 0, 0, 'R');
$pdf->Cell(20, 4, number_format(0, 2), 0, 1, 'R');
$pdf->Ln(3);
*/
$pdf->Cell(70, 4, "Importe en Letras", 0, 0, 'L');
$pdf->Cell(100, 4, "IGV: ", 0, 0, 'R');
$pdf->Cell(20, 4, number_format($c_venta->getTotal() / 1.18 * 0.18, 2), 0, 1, 'R');
$pdf->Cell(120, 4, utf8_decode($c_numeros_letras->to_word($total_final, $ncorto)), 0, 0, 'L');
$pdf->Cell(50, 4, "TOTAL: ", 0, 0, 'R');
$pdf->Cell(20, 4, number_format($c_venta->getTotal(), 2), 0, 1, 'R');

$pdf->Ln(3);
$y = $pdf->GetY();
$pdf->Line(10, $y, 200, $y);
$pdf->Ln(2);
$pdf->MultiCell(190, 4, utf8_decode("Representacion Impresa de la " . $c_tido->getNombre() . " ELECTRONICA, visite efacturacion.lunasystemsperu.com"), 0, 'C');
$pdf->MultiCell(190, 4, utf8_decode("Resumen: " . $c_recibido->getHash()), 0, 'C');

$nombre_archivo = $c_recibido->getNombreXml() . ".pdf";

//$pdf->Output();
//para descargar automatica
//$pdf->Output("../public/archivos/" . $nombre_archivo, "F");
//para abrir y generarle nombre automaticamente
$pdf->Output($nombre_archivo, "I");
//ob_end_flush();
