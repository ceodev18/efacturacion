<?php
$direccion = " 	JR. FRANCISCO PIZARRO NRO. 740 P.J. BOLIVAR BAJO (A 2 CASAS DE EDITORIAL RIO SANTA) ANCASH - SANTA - CHIMBOTE";
$items = explode('-', $direccion);
echo count($items);

//print_r($items);

$pieces = explode(' ', trim($items[0]));
echo "departamento: " .  end($pieces);

echo "provincia " . $items[1];
echo "distrito" . $items[2];

echo "https://api.jys.pe/ruc/20605162739.json";