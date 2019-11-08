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

if ($tipo == 4) {
	$dias = date('t');
	$obJson = json_decode($c_venta->VerComparativaDiaria(), true);
	$listaDias= array();
	$cont=0;
	for ($i=0; $i < $dias; $i++) { 
		if (isset($obJson[$cont]) && $obJson[$cont]["dia"]==$i+1) {
			$listaDias[]=$obJson[$cont];
			$cont+=1;
		}else{
			$listaDias[] = array("dia"=>$i+1,"total_dia"=>0,"cantidad_dia"=>0);
		}
	}
	echo json_encode($listaDias);
   // print_r($listaDias);
}