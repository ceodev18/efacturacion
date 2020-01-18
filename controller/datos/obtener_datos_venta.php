<?php
session_start();
$_SESSION['ventaproductos'] = array();

require '../../models/Venta.php';
require '../../models/Cliente.php';
require '../../models/ProductoVenta.php';

//obtener las variables
$tido = filter_input(INPUT_GET, 'idtido');
$serie = filter_input(INPUT_GET, 'serie');
$numero = filter_input(INPUT_GET, 'numero');

//iniciar clases
$c_venta = new Venta();
$c_cliente = new Cliente();
$c_detalle = new ProductoVenta();

//enviar datos para consultar detalle
$c_venta->setIdTido($tido);
$c_venta->setSerie($serie);
$c_venta->setNumero($numero);
$c_venta->validarVenta();

//iniciar array resultado
$resultado = [];

//validar si existe venta
if ($c_venta->getIdVenta() == null || $c_venta->getIdVenta() == "") {
    $resultado['success'] = "error";
} else {
    $c_venta->obtenerDatos();
    $c_cliente->setIdCliente($c_venta->getIdCliente());
    $c_cliente->obtenerDatos();

    $c_detalle->setIdVenta($c_venta->getIdVenta());
    $a_detalle = $c_detalle->verFilas();
    foreach ($a_detalle as $row) {
        $fila = array();
        $fila['idproducto'] = $row['id_producto'];
        $fila['descripcion'] = $row['descripcion'];
        $fila['cantidad'] = $row['cantidad'];
        $fila['precio'] = $row['precio'];
        $fila['costo'] = $row['costo'];
        $_SESSION['ventaproductos'][$row['id_producto']] = $fila;
    }

    //iniciar array resultado con valores reales
    $resultado['success'] = "existe";
    $resultado['idventa'] = $c_venta->getIdVenta();
    $resultado['total'] = $c_venta->getTotal();
    $resultado['doc_cliente'] = $c_cliente->getDocumento();
    $resultado['nom_cliente'] = $c_cliente->getDatos();
    $resultado['dir_cliente'] = $c_cliente->getDireccion();
}

echo json_encode($resultado);