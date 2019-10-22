<?php

require '../class/cl_tienda.php';
$c_tienda = new cl_tienda();

$ruc = filter_input(INPUT_POST, 'ruc');
$c_tienda->setRuc($ruc);
$direcion = 'https://www.conmetal.pe/erp/ajax_post/consulta_ruc_nubefact.php?ruc=' . $ruc;

$encontrado_entidad = $c_tienda->validar_ruc();
$fila_ruc = array();
if ($encontrado_entidad) {
    $array_ruc = array();
    $a_ruc = $c_tienda->validar_tienda();
    if ($a_ruc) {
        $fila_ruc['nombre_o_razon_social'] = $c_tienda->getRazon_social();
        $fila_ruc['nombre_comercial'] = $c_tienda->getNombre_comercial();
        $fila_ruc['direccion_completa'] = $c_tienda->getDireccion();
        $fila_ruc['condicion_de_domicilio'] = '';
        $fila_ruc['estado_del_contribuyente'] = '';
    }
    array_push($array_ruc, $fila_ruc);
    $rpt = (object) array(
                "success" => "existe",
                "entity" => $fila_ruc
    );
    echo json_encode($rpt);
    //echo json_encode($fila_ruc);
} else {
    $json_ruc = file_get_contents($direcion, FALSE);
    // Check for errors
    if ($json_ruc === FALSE) {
        die('Error');
    }

    echo $json_ruc;
}


