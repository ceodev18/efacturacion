<?php

require '../models/Venta.php';
require '../models/VentaReferencia.php';
require '../models/Empresa.php';
require '../models/DocumentoSunat.php';
require '../tools/Varios.php';

$cl_venta = new Venta();
$cl_varios = new Varios();
$cl_amarre = new VentaReferencia();
$cl_notaventa = new Venta();
$cl_tido = new DocumentoSunat();
$cl_empresa = new Empresa();

$periodo = filter_input(INPUT_GET, 'periodo');
$id_empresa = $_SESSION['id_empresa'];

$cl_empresa->setIdEmpresa($id_empresa);
$cl_empresa->obtenerDatos();

$file_txt = "LE" . $cl_empresa->getRuc() . $periodo . "00140100001111.txt";
$archivo = fopen($file_txt, "w");

$cl_venta->setIdEmpresa($cl_empresa->getIdEmpresa());
$a_ventas = $cl_venta->verFilas($periodo);
$contar = 0;

foreach ($a_ventas as $value) {
    $contar++;
    //print_r($value);
    //echo "<br>";

    $fecha_doc = $value['fecha'];
    $date = new DateTime($fecha_doc);
    $formato_fecha_doc = $date->format('Ymd');
    // echo "<br>" . $formato_fecha_doc;
    $fecha_periodo = $periodo . "00";
    //echo "<br>" . $fecha_periodo;
    if ($formato_fecha_doc < $fecha_periodo) {
        $estado = 6;
    } else {
        $estado = 1;
    }
    // echo "<br>" . $estado;
    $documento_proveedor = $value['documento'];
    if (strlen($documento_proveedor) == 11) {
        $tipo_doc_proveedor = 6;
    }
    if (strlen($documento_proveedor) == 8) {
        $tipo_doc_proveedor = 1;
    }
    if (strlen($documento_proveedor) < 8) {
        $tipo_doc_proveedor = 0;
    }

    $fecha_amarre = "";
    $doc_amarre = "";
    $serie_amarre = "";
    $numero_amarre = "";

    if ($value['id_tido'] == 3 || $value['id_tido']== 4) {
        $cl_amarre->setIdNota($value['id_venta']);
        $cl_amarre->obtenerDatos();

        $cl_notaventa->setIdVenta($cl_amarre->getIdVenta());
        $cl_notaventa->obtenerDatos();

        $fecha_amarre = $cl_varios->fecha_tabla($cl_notaventa->getFecha());
        if ($cl_notaventa->getIdTido() == 1) {
            $doc_amarre = "03";
        }
        if ($cl_notaventa->getIdDocumento() == 2) {
            $doc_amarre = "01";
        }
        $serie_amarre = $cl_notaventa->getSerie();
        $numero_amarre = $cl_notaventa->getNumero();
    }

    $moneda = "PEN";
    /*if ($value['id_moneda'] == 1) {
        $moneda = "PEN";
    }

    if ($value['id_moneda'] == 2) {
        $moneda = "USD";
    }*/

    $cl_tido->setIdTido($value['id_tido']);
    $cl_tido->obtenerDatos();
    $serie_doc = $value['serie'];
    $cod_sunat = $cl_tido->getCodSunat();
    $serie_doc = $cl_varios->zerofill($value['serie'], 4);

    $monto_total_soles = $value['total'] * 1;
    $base = $monto_total_soles / 1.18;
    $igv = $base * 0.18;
    $contenido = $periodo . "00|" .
        $cl_varios->zerofill($value['id_venta'], 4) . "|" .
        "M" . $cl_varios->zerofill($contar, 3) ."|" .
        $cl_varios->fecha_tabla($value['fecha']) . "|" .
        "|" .
        $cl_varios->zerofill($cod_sunat, 2) . "|" .
        strtoupper($serie_doc) . "|" .
        $cl_varios->zerofill($value['numero'], 4) . "|" .
        "|" .
        $tipo_doc_proveedor . "|" .
        $documento_proveedor . "|" .
        utf8_decode($value['datos']) . "|" .
        "|" .
        number_format($base, 2, ".", "") . "|" .
        "0.00|" .
        number_format($igv, 2, ".", "") . "|" .
        "0.00|" .
        "0.00|" .
        "0.00|" .
        "0.00|" .
        "0.00|" .
        "0.00|" .
        "0.00|" .
        "0.00|" .
        number_format($monto_total_soles, 2, ".", "") . "|" .
        $moneda . "|" .
        "1.000" .
        "|" . $fecha_amarre .
        "|" . $doc_amarre .
        "|" . $serie_amarre .
        "|" . $numero_amarre .
        "|" .
        "|" .
        "|" .
        "|" .
        $estado . "|";
    fwrite($archivo, $contenido . PHP_EOL);
}

fclose($archivo);

echo "archivo generado correctamente, haga clic aqui para <a href='" . $file_txt . "' >descargar</a>";
