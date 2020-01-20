<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set('America/Lima');

//ob_start();
//require('../includes/fpdf.php');

require '../models/Empresa.php';
require '../models/GuiaRemision.php';
require '../models/Venta.php';
require '../models/ProductoVenta.php';
require '../models/Cliente.php';
require '../models/DocumentoSunat.php';
require '../tools/NumerosaLetras.php';
require '../tools/Varios.php';

require('../tools/fpdf/fpdf.php');
define('FPDF_FONTPATH', '../tools/fpdf/font/');

$id_guia = filter_input(INPUT_GET, 'id_guia', FILTER_SANITIZE_NUMBER_INT);

//echo "nro guia" . $id_guia;

$c_varios = new Varios();
$c_numeros_letras = new NumerosaLetras();

$c_guia = new GuiaRemision();
$c_guia->setIdGuia($id_guia);
$c_guia->obtenerDatos();

$c_venta = new Venta();
$c_venta->setIdVenta($c_guia->getIdVenta());
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

$serie = $c_varios->zerofill($c_guia->getSerie(), 4);
$numero = $c_varios->zerofill($c_guia->getNumero(), 8);

$c_detalle = new ProductoVenta();
$c_detalle->setIdVenta($c_venta->getIdVenta());

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

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetMargins(10,8,10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$imagen = $c_empresa->getLogo();
$r = 100;
$g = 100;
$b = 100;

$pdf->Image('../public/images/' . $imagen, 10, 10, 25, 25);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);


$pdf->SetFont('Arial', 'B', 12);
$pdf->Rect(140, 10, 60, 24);
$pdf->SetTextColor(00, 00, 0);
$pdf->SetY(10);
$pdf->SetX(140);
$pdf->Cell(60, 6, "RUC: " . $c_empresa->getRuc(), 0, 1, 'C');
$pdf->SetX(140);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->MultiCell(60, 6, "GUIA DE REMISION ELECTRONICA", 0, "C", 1);
//$pdf->Cell(70, 8, $c_tido->getNombre() . " ELECTRONICA", 0, 1, 'C', 1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(140);
$pdf->SetTextColor(00, 00, 0);
$pdf->Cell(60, 6, $serie . "-" . $numero, 0, 1, 'C');

$pdf->SetY(10);
$pdf->SetX(40);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(110, 4, $c_empresa->getRazonSocial(), 0, 1, 'L');
$pdf->SetX(40);
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(75, 4, $c_empresa->getDireccion(), 0, "L");
$pdf->SetX(40);
$pdf->Cell(75, 4, "Telefono: " . $c_empresa->getTelefono() , 0, 0, 'L');
$pdf->SetY(26);
$pdf->SetX(40);
$pdf->Cell(75, 4, "Fecha Traslado: " . $c_varios->fecha_mysql_web($c_guia->getFecha()) , 0, 0, 'L');
$pdf->SetY(30);
$pdf->SetX(40);
$pdf->Cell(75, 4, "Doc Venta: " . $c_tido->getAbreviatura() . " | " . $c_venta->getSerie() . "-" . $c_varios->zerofill($c_venta->getNumero(), 4), 0, 0, 'L');

$pdf->SetY(36);

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->Cell(92, 6, "DESTINATARIO", 0, 0, 'C', 1);
$pdf->Cell(6, 6, "", 0, 0, "C", 0);
$pdf->Cell(92, 6, "TRANSPORTE", 0, 1, 'C', 1);
$pdf->Ln(1);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 9);

$y = $pdf->GetY();
$pdf->MultiCell(92, 4, $c_cliente->getDocumento() . " | " . utf8_decode(trim($c_cliente->getDatos())));
$pdf->SetY($y);
$pdf->SetX(102);
$pdf->Cell(6, 4, "", 0, 0, "C", 0);
$pdf->MultiCell(92, 4,$c_guia->getRucTransporte() . " | " . utf8_decode(trim($c_guia->getRazTransporte())));

$y = $pdf->GetY();
$pdf->MultiCell(92, 4, "***Dir Llegada: " .$c_guia->getDirLlegada() . " - " . $c_guia->getUbigeo() );
$pdf->SetY($y);
$pdf->SetX(102);
$pdf->Cell(6, 4, "", 0, 0, "C", 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 4,"Placa Vehiculo: " , 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(20, 4,strtoupper($c_guia->getVehiculo()), 0, 1, 'L', 0);

$pdf->SetX(108);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 4,"DNI Chofer: " , 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(20, 4,strtoupper($c_guia->getChofer()), 0, 1, 'L', 0);

$pdf->SetX(108);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 4,"Tipo: " , 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(20, 4,"VENTA UX", 0, 1, 'L', 0);

$pdf->Ln(8);

$y = $pdf->GetY() ;
//$pdf->Line(10, $y, 200, $y);
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->Cell(15, 5, "Item.", 0, 0, 'C', 1);
$pdf->Cell(120, 5, "DESCRIPCION", 0, 0, 'C', 1);
$pdf->Cell(15, 5, "CANT.", 0, 0, 'C', 1);
$pdf->Cell(20, 5, "Und. ", 0, 0, 'C', 1);
$pdf->Cell(20, 5, "Peso", 0, 1, 'C', 1);

$y = $pdf->GetY();
//$pdf->Line(10, $y, 200, $y);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 9);

$a_productos = $c_detalle->verFilas();
$suma = 0;
$items = 0;
$fila_productos = array();
foreach ($a_productos as $value) {
    $items++;
    $cantidad = $value['cantidad'];
    $precio = $value['precio'];
    $suma += $cantidad;
    $pdf->Cell(15, 4, $items, 0, 0, 'C');
    //$pdf->Cell(110, 10, $value['descripcion'], 0, 0, 'L');
    $pdf->SetX(145);
    $pdf->Cell(15, 4, $value['cantidad'], 0, 0, 'C');
    $pdf->Cell(20, 4,"UND", 0, 0, 'C');
    $pdf->SetX(25);
    $pdf->MultiCell(135, 4, utf8_decode($value['descripcion']), 0, 'J');
    //$pdf->Ln(2);
}
$pdf->Ln(4);

$pdf->SetY(-35);

$pdf->Ln(3);
$y = $pdf->GetY();
$pdf->Line(10, $y, 200, $y);

//$pdf->SetY(-184);

//$pdf->Image('../greenter/generate_qr/temp/' . $c_guia->getNombreXml() . '.png', 130, 108, 22, 22);


$pdf->Ln(2);
$pdf->Cell(170, 5, "TOTAL UNDD: ", 0, 0, 'R');
$pdf->Cell(20, 5, number_format($suma, 2), 0, 1, 'R');

$pdf->Ln(3);
$y = $pdf->GetY();
$pdf->Line(10, $y, 200, $y);
$pdf->Ln(2);
$pdf->MultiCell(190, 4, utf8_decode("Representacion Impresa de la GUIA DE REMISION ELECTRONICA, visite efacturacion.lunasystemsperu.com"), 0, 'C');
$pdf->MultiCell(190, 4, utf8_decode("Resumen: " . $c_guia->getHash()), 0, 'C');

$nombre_archivo = $c_guia->getNombreXml() . ".pdf";

//$pdf->Output();
//para descargar automatica
//$pdf->Output("../public/archivos/" . $nombre_archivo, "F");
//para abrir y generarle nombre automaticamente
$pdf->Output($nombre_archivo, "I");
//ob_end_flush();
