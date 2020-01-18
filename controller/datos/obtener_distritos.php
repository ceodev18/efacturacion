<?php
require '../../models/Ubigeo.php';

$c_ubigeo = new Ubigeo();

$c_ubigeo->setDepartamento(filter_input(INPUT_POST, 'departamento'));
$c_ubigeo->setProvincia(filter_input(INPUT_POST, 'provincia'));

echo $c_ubigeo->verDistritos();