<?php

session_start();

require_once '../class/cl_conectar.php';
require_once '../class/cl_varios.php';

require_once '../class/cl_tienda.php';
require_once '../class/cl_venta.php';
require_once '../class/cl_detalle_venta.php';

require('../fixed/rotations.php');
define('FPDF_FONTPATH', '../fixed/font/');

$c_tienda = new cl_tienda();
$c_venta = new cl_venta();
$c_detalle = new cl_detalle_venta();
$c_varios = new cl_varios();

if ($_SESSION['id_empresa'] == null || $_SESSION['id_empresa'] == "") {
    header("Location: ../login.php");
} else {
    $c_tienda->setId($_SESSION['id_empresa']);
    $c_tienda->validar_tienda();
}

$periodo = filter_input(INPUT_GET, 'periodo');
$id_tienda = $_SESSION['id_empresa'];
$id_venta = filter_input(INPUT_GET, 'id_venta');

$c_venta->setId_tienda($id_tienda);
$c_venta->setPeriodo($periodo);
$c_venta->setCodigo($id_venta);

$c_detalle->setId_venta($id_venta);
$c_detalle->setPeriodo($periodo);
$c_detalle->setId_tienda($id_tienda);

class PDF extends PDF_Rotate {

    function RotatedText($x, $y, $txt, $angle) {
        //Text rotated around its origin
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }

}

$altura_linea = 4;
$pdf = new PDF('P', 'mm', array(76, 350));
$pdf->SetMargins(8, 8, 8);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$pdf->Image('../images/tiendas/logo/' . $c_tienda->getLogo(), 28, 8, 20, 20);
$pdf->Ln(22);

$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(00, 00, 0);
$pdf->Cell(60, $altura_linea, "*** " . utf8_decode($c_tienda->getNombre_comercial()) . " ***", 0, 1, 'C');
$pdf->MultiCell(60, $altura_linea, utf8_decode($c_tienda->getRuc() . " | " . $c_tienda->getRazon_social()), 0, 'C');
$pdf->Cell(60, $altura_linea, "Cel/Tel: " . $c_tienda->getTelefono(), 0, 1, 'C');
$pdf->MultiCell(60, $altura_linea, utf8_decode($c_tienda->getDireccion()), 0, 'C');
$pdf->Ln();
$a_venta = $c_venta->ver_ventas_id();
foreach ($a_venta as $value) {
    $pdf->Cell(60, $altura_linea, $value['nombre'] . " | " . $c_varios->zerofill($value['serie'], 3) . " - " . $c_varios->zerofill($value['numero'], 5), 0, 1, 'C');
    $pdf->Cell(20, $altura_linea, "Fecha: " . $c_varios->fecha_mysql_web($value['fecha']), 0, 1, 'L');
    $pdf->Cell(20, $altura_linea, "Cliente: " . utf8_decode($value['datos']), 0, 1, 'L');
}

$pdf->Ln();

$a_productos = $c_detalle->ver_productos();
$suma = 0;
foreach ($a_productos as $value) {
    $suma += ($value['cantidad'] * $value['precio']);
    $y = $pdf->GetY();
    $pdf->SetX(53);
    $pdf->Cell(5, $altura_linea, "x", 0, 0, 'R');
    $pdf->Cell(10, $altura_linea, number_format($value['cantidad'] * $value['precio'], 2), 0, 1, 'R');
    $pdf->SetX(8);
    $pdf->SetY($y);
    $pdf->MultiCell(45, $altura_linea, number_format($value['cantidad'], 0) . " | " . utf8_decode($value['nombre_corto']), 0, 'J');
}
$pdf->Ln();
$pdf->Cell(40, $altura_linea, "TOTAL", 0, 0, 'R');
$pdf->Cell(20, $altura_linea, number_format($suma, 2), 0, 1, 'R');

$pdf->Ln();
$pdf->MultiCell(60, $altura_linea, utf8_decode("Conservar su ticket para reclamos. (Máximo 48 horas) Gracias por su compra."), 0, 'C');

$pdf->Output();
?>