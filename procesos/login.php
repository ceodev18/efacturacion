<?php

session_start();

include '../class/cl_tienda.php';
include '../class/cl_usuario.php';

$c_tienda = new cl_tienda();
$c_usuario = new cl_usuario();

$ruc = filter_input(INPUT_POST, 'ruc_empresa');
$usuario = filter_input(INPUT_POST, 'usuario');
$password = filter_input(INPUT_POST, 'password');

$c_tienda->setRuc($ruc);

if ($c_tienda->validar_ruc()) {

    $c_usuario->setNick($usuario);
    $c_usuario->setId_empresa($c_tienda->getId());
    $c_usuario->validar_nick_tienda();

    if ($c_usuario->getPassword() == $password) {
        $_SESSION['id_usuario'] = $c_usuario->getId();
        $_SESSION['id_empresa'] = $c_usuario->getId_empresa();
        header("Location: ../index.php");
    } else {
        header("Location: ../login.php?error=CONTRASEÑA INCORRECTA");
    }
} else {
    header("Location: ../login.php?error=EMPRESA NO EXISTE");
}