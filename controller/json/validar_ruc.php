<?php

require '../../models/Cliente.php';
$c_cliente = new Cliente();

$ruc = filter_input(INPUT_POST, 'ruc');
$direcion = 'http://www.lunasystemsperu.com/consultas_json/composer/consultas_dni_JMP.php?dni=' . $ruc;

//$encontrado_entidad = $cl_entidad->buscar_ruc();
$encontrado_entidad = false;
if ($encontrado_entidad) {
    $array_ruc = array();
    $a_ruc = c_cliente.obtenerDatos();
    foreach ($a_ruc as $value) {
    	$fila_ruc['success'] = true;
        $fila_ruc['nombre_o_razon_social'] = $value['documento'];
        $fila_ruc['nombre_comercial'] = $value['datos'];
        $fila_ruc['direccion_completa'] = $value['direccion'];
        $fila_ruc['condicion_de_domicilio'] = $value['condicion'];
        $fila_ruc['estado_del_contribuyente'] = $value['estado'];
        $fila_ruc['ubigeo'] = $value['ubigeo'];        
    }
    $rpt = (object)array(
		"success" 		=> true,
		"entity" 		=> $fila_ruc
	);
    echo json_encode($fila_ruc);
} else {
    $json_ruc = file_get_contents($direcion, FALSE);
    // Check for errors
    if ($json_ruc === FALSE) {
        die('Error');
    } else {

    echo $json_ruc;
    }
}