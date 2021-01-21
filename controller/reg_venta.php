<?php
session_start();

require '../models/Venta.php';
require '../models/VentaSunat.php';
require '../models/DocumentoEmpresa.php';
require '../models/ProductoVenta.php';
require '../models/VentaServicio.php';
require '../models/Cliente.php';
require '../tools/Varios.php';
require '../tools/SendCurlVenta.php';

$c_cliente = new Cliente();
$c_venta = new Venta();
$c_tido = new DocumentoEmpresa();
$c_detalle = new ProductoVenta();
$c_servicio = new VentaServicio();
$c_curl = new SendCurlVenta();
$c_sunat = new VentaSunat();
$c_varios = new Varios();

$id_empresa = $_SESSION['id_empresa'];

$c_cliente->setIdEmpresa($id_empresa);
$c_cliente->setDocumento(filter_input(INPUT_POST, 'documento_cliente'));
$c_cliente->setDatos(filter_input(INPUT_POST, 'datos_cliente'));
$c_cliente->setDireccion(filter_input(INPUT_POST, 'direccion_cliente'));

if ($c_cliente->getDocumento() == "") {
    $c_cliente->setDocumento("SD" . $c_varios->generarCodigo(5));
    $c_cliente->obtenerId();
    $c_cliente->insertar();
} else {
    if (!$c_cliente->verificarDocumento()) {
        $c_cliente->obtenerId();
        $c_cliente->insertar();
    }
}

$c_tido->setIdEmpresa($id_empresa);
$c_tido->setIdTido(filter_input(INPUT_POST, 'documento_venta'));
$c_tido->obtenerDatos();

$c_venta->setIdEmpresa($id_empresa);
$c_venta->setFecha(date("Y-m-d"));
//$c_venta->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_venta->setIdTido($c_tido->getIdTido());
$c_venta->setSerie($c_tido->getSerie());
$c_venta->setNumero($c_tido->getNumero());
$c_venta->setIdCliente($c_cliente->getIdCliente());
$c_venta->setTotal(filter_input(INPUT_POST, 'total_pedido'));
$c_venta->obtenerId();

$c_detalle->setIdVenta($c_venta->getIdVenta());
$c_servicio->setIdventa($c_venta->getIdVenta());
$tipoventa = filter_input(INPUT_POST, 'tipoventa');

$resultado["valor"] = 0;

if ($c_venta->insertar()) {
    //recorrer array para guardar productos en la venta
    $array_detalle = $_SESSION['ventaproductos'];

    if ($tipoventa == 1) {
        foreach ($array_detalle as $fila) {
            $c_detalle->setIdProducto($fila['idproducto']);
            $c_detalle->setCantidad($fila['cantidad']);
            $c_detalle->setCosto($fila['costo']);
            $c_detalle->setPrecio($fila['precio']);
            $c_detalle->insertar();
        }
    }

    if ($tipoventa == 2) {
        $nroitem = 1;
        foreach ($array_detalle as $fila) {
            $c_servicio->setDescripcion($fila['descripcion']);
            $c_servicio->setCantidad($fila['cantidad']);
            $c_servicio->setMonto($fila['precio']);
            $c_servicio->setCodsunat($fila['codsunat']);
            $c_servicio->setIditem($nroitem);
            $c_servicio->insertar();
            $nroitem++;
        }
    }


    //definir url segun el tipo de documento sunat
    if ($c_venta->getIdTido() == 1) {
        $archivo = "boleta";
    }
    if ($c_venta->getIdTido() == 2) {
        $archivo = "factura";
    }

    if ($c_venta->getIdTido() == 1 || $c_venta->getIdTido() == 2) {
        //enviar por curl id de venta para generar xml, hash, qr y retornar json para generar fpdf documento de venta
        $c_curl->setIdTido($c_venta->getIdTido());
        $c_curl->setIdVenta($c_venta->getIdVenta());
        $respuesta = $c_curl->enviar_json();
        //var_dump($respuesta);

        $json_respuesta = json_decode($respuesta, true);

        if ($json_respuesta["success"] == true) {
            //ya no es necesario llamar a generar pdf
            //$c_curl->generar_pdf();
            $resultado["valor"] = $c_venta->getIdVenta();
        } else {
            print_r($json_respuesta);
        }
    } else {
        $c_sunat->setIdVenta($c_venta->getIdVenta());
        $c_sunat->setHash("-");
        $c_sunat->setNombreXml("-");
        $c_sunat->insertar();

        $resultado["valor"] = $c_venta->getIdVenta();

    }

//    $resultado["valor"] = $c_venta->getIdVenta();
} else {
    $resultado["valor"] = 0;
}

echo json_encode($resultado);