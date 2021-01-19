<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set('America/Lima');

require '../models/Empresa.php';
require '../models/Venta.php';
require '../tools/Varios.php';

require('../tools/fpdf/fpdf.php');
define('FPDF_FONTPATH', '../tools/fpdf/font/');

$id_empresa = $_SESSION['id_empresa'];
$periodo = filter_input(INPUT_GET, 'periodo');

$c_venta = new Venta();
$c_empresa = new Empresa();
$c_varios = new Varios();

$c_venta->setIdEmpresa($id_empresa);
$a_ventas = $c_venta->verFilas($periodo);

$c_empresa = new Empresa();
$c_empresa->setIdEmpresa($id_empresa);
$c_empresa->obtenerDatos();

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetMargins(10,8,10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);

$altura = 4;

$pdf->Cell(275, $altura, "REPORTE DE VENTAS DEL PERIODO: " . $periodo, 0, 1, "C");
$pdf->Ln(5);

$pdf->Cell(30, $altura, "EMPRESA:", 0, 0, "");
$pdf->Cell(150, $altura, $c_empresa->getRuc() . " | " . $c_empresa->getRazonSocial(), 0, 1, "");

$pdf->Ln();

$pdf->SetFont('Arial', 'B', 9);
//iniciar cabezeras del detalle venta
$pdf->Cell(20,$altura, "Codigo", 1, 0, "C");
$pdf->Cell(25,$altura, "Fecha", 1, 0, "C");
$pdf->Cell(30,$altura, "Documento", 1, 0, "C");
$pdf->Cell(140,$altura, "Cliente", 1, 0, "C");
$pdf->Cell(20,$altura, "SubTotal", 1, 0, "C");
$pdf->Cell(20,$altura, "IGV", 1, 0, "C");
$pdf->Cell(20,$altura, "Total", 1, 1, "C");

$pdf->SetFont('Arial', '', 9);
$item = 1;
$suma_total = 0;
foreach ($a_ventas as $fila) {
    $total= 0;
    $cliente = "          **** DOCUMENTO ANULADO **** ";
    if ($fila['estado'] == 1) {
        $total = $fila['total'];
        $cliente = $fila['documento'] . " | " . utf8_decode($fila['datos']);
    }
    $suma_total+= $total;
    $codigo = $periodo . $c_varios->zerofill($item, 3);
    $documento_venta = $fila['abreviatura'] . " | " . $fila['serie'] . " - " . $c_varios->zerofill($fila['numero'], 3);

    $pdf->Cell(20,$altura, $codigo, 0, 0, "C");
    $pdf->Cell(25,$altura, $fila['fecha'], 0, 0, "C");
    $pdf->Cell(30,$altura,  $documento_venta, 0, 0, "C");
    //$pdf->Cell(140,$altura,$cliente, 0, 0, "");
    $pdf->SetX(225);
    $pdf->Cell(20,$altura, number_format($total / 1.18, 2), 0, 0, "R");
    $pdf->Cell(20,$altura, number_format($total / 1.18 * 0.18, 2), 0, 0, "R");
    $pdf->Cell(20,$altura, number_format($total, 2), 0, 0, "R");

    $pdf->SetX(85);
    $pdf->MultiCell(140, $altura, $cliente, 0, '');


    $item++;
}

$pdf->Ln();
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(20,$altura, "", 0, 0, "C");
$pdf->Cell(25,$altura, "", 0, 0, "C");
$pdf->Cell(30,$altura,  "", 0, 0, "C");
$pdf->Cell(140,$altura,"", 0, 0, "");
$pdf->Cell(20,$altura, number_format($suma_total / 1.18, 2), 0, 0, "R");
$pdf->Cell(20,$altura, number_format($suma_total / 1.18 * 0.18, 2), 0, 0, "R");
$pdf->Cell(20,$altura, number_format($suma_total, 2), 0, 1, "R");

$nombre_archivo ="ventas_periodo_" . $periodo . ".pdf";

$pdf->Output($nombre_archivo, "I");