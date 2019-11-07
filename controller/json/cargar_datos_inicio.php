<?php
require_once '../../models/VentaInicio.php';

$c_venta = new VentaInicio();

$tipo = filter_input(INPUT_GET, 'tipo');

if ($tipo == 1) {
    echo $c_venta->CargarDatosesteMes();
}

if ($tipo == 2) {
    echo $c_venta->CargarTotalVentahoy();
}

if ($tipo == 3) {
    echo $c_venta->CargarVentasMensuales();
}