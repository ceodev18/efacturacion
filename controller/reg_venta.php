<?php
session_start();

require '../models/Venta.php';
require '../models/DocumentoEmpresa.php';
require '../models/ProductoVenta.php';
require '../models/Cliente.php';

$c_cliente = new Cliente();
$c_venta = new Venta();
$c_tido = new DocumentoEmpresa();
$c_detalle = new ProductoVenta();
$id_empresa = $_SESSION['id_empresa'];

$c_cliente->setIdEmpresa($id_empresa);
$c_cliente->setDocumento(filter_input(INPUT_POST, 'documento_cliente'));
$c_cliente->setDatos(filter_input(INPUT_POST, 'datos_cliente'));
$c_cliente->setDireccion(filter_input(INPUT_POST, 'direccion_cliente'));

if (!$c_cliente->verificarDocumento()) {
    $c_cliente->obtenerId();
    $c_cliente->insertar();
}

$c_tido->setIdEmpresa($id_empresa);
$c_tido->setIdTido(filter_input(INPUT_POST, 'documento_venta'));
$c_tido->obtenerDatos();

$c_venta->setIdEmpresa($id_empresa);
$c_venta->setFecha(date("Y-m-d"));
$c_venta->setIdTido($c_tido->getIdTido());
$c_venta->setSerie($c_tido->getSerie());
$c_venta->setNumero($c_tido->getNumero());
$c_venta->setIdCliente($c_cliente->getIdCliente());
$c_venta->setTotal(filter_input(INPUT_POST, 'total_pedido'));
$c_venta->obtenerId();

$c_detalle->setIdVenta($c_venta->getIdVenta());

$resultado = [];
if ($c_venta->insertar()) {
    $array_detalle = $_SESSION['ventaproductos'];
    foreach ($array_detalle as $fila) {
        $c_detalle->setIdProducto($fila['idproducto']);
        $c_detalle->setCantidad($fila['cantidad']);
        $c_detalle->setCosto($fila['costo']);
        $c_detalle->setPrecio($fila['precio']);
        $c_detalle->insertar();
    }
    $resultado["valor"] = $c_venta->getIdVenta();
} else {
    $resultado["valor"] = 0;
}

echo json_encode($resultado);