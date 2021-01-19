<?php
require '../models/ProductoVenta.php';
require '../models/Venta.php';
require '../models/Cliente.php';
require '../models/DocumentoSunat.php';

require '../tools/Varios.php';

$idventa = filter_input(INPUT_POST, 'idventa');

$c_varios = new Varios();

$c_venta = new Venta();
$c_detalle = new ProductoVenta();

$c_venta->setIdVenta($idventa);
$c_venta->obtenerDatos();

$c_cliente = new Cliente();
$c_cliente->setIdCliente($c_venta->getIdCliente());
$c_cliente->obtenerDatos();

$c_docsunat = new DocumentoSunat();
$c_docsunat->setIdTido($c_venta->getIdTido());
$c_docsunat->obtenerDatos();

$c_detalle->setIdVenta($idventa);
$a_detalle = $c_detalle->verFilas();

echo 'Fecha : ' . $c_venta->getFecha() . "<br>";
echo 'Documento : ' . $c_docsunat->getAbreviatura() . ' | ' . $c_varios->zerofill($c_venta->getSerie(), 3) . ' - ' . $c_varios->zerofill($c_venta->getNumero(), 5). "<br>";
echo 'Cliente : ' . $c_cliente->getDocumento() . " | " . $c_cliente->getDatos() . '<br>';
echo 'Total : ' . number_format($c_venta->getTotal(), 2) . '<br>';

?>
<hr>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Cant.</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Parcial</th>
        <th>Utilidad</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $total_parcial = 0;
    $total_utilidad = 0;
    foreach ($a_detalle as $value) {
        $cantidad = $value['cantidad'];
        $precio = $value['precio'];
        $costo = $value['costo'];
        $parcial = $precio * $cantidad;
        $utilidad = ($precio - $costo) * $cantidad;
        $total_parcial += $parcial;
        $total_utilidad += $utilidad;
        ?>
        <tr>
            <td class="text-center"><?php echo $cantidad ?></td>
            <td><?php echo $value['descripcion'] ?></td>
            <td class="text-right"><?php echo number_format($precio, 2) ?></td>
            <td class="text-right"><?php echo number_format($parcial, 2) ?></td>
            <td class="text-right"><?php echo number_format($utilidad, 2) ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td class="text-center"></td>
        <td class="text-right text-capitalize">TOTAL</td>
        <td class="text-right"></td>
        <td class="text-right"><?php echo number_format($total_parcial, 2) ?></td>
        <td class="text-right"><?php echo number_format($total_utilidad, 2) ?></td>
    </tr>
    </tfoot>
</table>
