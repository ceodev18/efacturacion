<?php
require '../models/Empresa.php';
require '../models/DocumentoInternet.php';

$c_empresa = new Empresa();
$c_internet = new DocumentoInternet();

$c_empresa->setRuc(filter_input(INPUT_GET, 'ruc'));

$existe_empresa = $c_empresa->validarLogin();

if ($existe_empresa) {
    //aqui se imprimir un array que diga que la empresa ya existe
    echo $c_empresa->getIdEmpresa() . "<br>";
    echo "existe";
} else {
    $c_internet->setTipo(1);
    $c_internet->setDocumento($c_empresa->getRuc());
    echo $c_internet->validar();
}