<?php
$direccion = "";
$tipo = filter_input(INPUT_GET, 'tipo');
$documento = filter_input(INPUT_GET, 'documento');

//si es ruc
if ($tipo == 1) {
    $direccion = "http://www.lunasystemsperu.com/consultas_json/composer/consulta_sunat_JMP.php?ruc=" . $documento;
}

//si es dni
if ($tipo == 2) {
    $direccion = "http://www.lunasystemsperu.com/consultas_json/composer/consultas_dni_JMP.php?dni=" . $documento;
}