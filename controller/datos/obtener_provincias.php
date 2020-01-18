<?php
require '../../models/Ubigeo.php';

$c_ubigeo = new Ubigeo();

$c_ubigeo->setDepartamento(filter_input(INPUT_POST, 'departamento'));
echo $c_ubigeo->verProvincias();