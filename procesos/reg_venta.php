<?php

session_start();

require '../class/cl_venta.php';
require '../class/cl_detalle_venta.php';
require '../class/cl_cobro_venta.php';
require '../session_class/cs_detalle_venta.php';
require '../class/cl_documento_empresa.php';

$cs_detalle = new cs_detalle_venta();
$c_venta = new cl_venta();
$c_detalle = new cl_detalle_venta();
$c_cobro = new cl_cobro_venta();
$c_tido = new cl_documento_empresa();

if (isset($_POST)) {
    $cobro = filter_input(INPUT_POST, 'total_pago');
    $total = filter_input(INPUT_POST, 'total_pedido');
    $c_venta->setEstado(1);
    if ($cobro > $total) {
        $cobro = $total;
    }
    if ($cobro < $total) {
        $c_venta->setEstado(2);
    }
    $c_venta->setId_tienda($_SESSION['id_empresa']);
    $c_venta->setPeriodo(date('Ym'));
    $c_venta->setCodigo($c_venta->obtener_nro());
    $c_venta->setFecha(date('Y-m-d'));
    $c_venta->setId_cliente(filter_input(INPUT_POST, 'id_cliente'));
    $c_venta->setTotal(filter_input(INPUT_POST, 'total_pedido'));
    $c_venta->setPagado($cobro);
    $c_venta->setId_tido(7);
    $c_venta->setSerie(1);
    $c_venta->setId_usuario($_SESSION['id_usuario']);
    $c_tido->setIdTienda($_SESSION['id_empresa']);
    $c_tido->setId_documento($c_venta->getId_tido());
    $c_tido->setSerie(1);
    $c_venta->setNumero($c_tido->obtener_nro());

    $c_detalle->setId_tienda($_SESSION['id_empresa']);
    $c_detalle->setPeriodo($c_venta->getPeriodo());
    $c_detalle->setId_venta($c_venta->getCodigo());

    $c_cobro->setIdTienda($_SESSION['id_empresa']);
    $c_cobro->setIdVenta($c_venta->getCodigo());
    $c_cobro->setPeriodo($c_venta->getPeriodo());
    $c_cobro->setIdPago($c_cobro->obtener_nro());

    $registrado = $c_venta->insertar();

    if ($registrado) {
        $json_detalle = $_SESSION['detalle_venta'];
        foreach ($json_detalle as $fila) {
            foreach ($fila as $value) {
                $c_detalle->setId_producto($value['codigo']);
                $c_detalle->setCantidad($value['cantidad']);
                $c_detalle->setPrecio($value['precio']);
                $c_detalle->setCosto($value['costo']);
                $c_detalle->insertar();
            }
        }

        $c_cobro->setMonto($c_venta->getPagado());
        $c_cobro->setFecha($c_venta->getFecha());
        if ($c_cobro->getMonto() > 0) {
            $c_cobro->insertar();
        }

        echo "datos registrados";
        //header("Location: ../ver_ventas.php");
    }
} else {
    echo "no se han recibido datos";
}