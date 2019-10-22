<?php
session_start();
require_once '../class/cl_detalle_venta.php';
require_once '../class/cl_venta.php';
require_once '../class/cl_varios.php';

$c_detalle = new cl_detalle_venta();
$c_venta= new cl_venta();
$c_varios = new cl_varios();

$c_detalle->setId_tienda($_SESSION['id_empresa']);
$c_detalle->setPeriodo(filter_input(INPUT_POST, 'periodo'));
$c_detalle->setId_venta(filter_input(INPUT_POST, 'id_venta'));

$c_venta->setId_tienda($c_detalle->getId_tienda());
$c_venta->setPeriodo($c_detalle->getPeriodo());
$c_venta->setCodigo($c_detalle->getId_venta());

$a_detalle = $c_detalle->ver_productos();

$a_venta = $c_venta->ver_ventas_id();
foreach ($a_venta as $value) {
    echo 'Fecha : ' . $value['fecha'] . "<br>";
    echo 'Documento : ' . $value['siglas'] . ' | ' . $c_varios->zerofill($value['serie'], 3) . ' - ' . $c_varios->zerofill($value['numero'], 5). "<br>";
    echo 'Cliente : ' . $value['datos'] . '<br>';
    echo 'Total : ' . number_format($value['total'], 2) . '<br>';
}

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
                <td><?php echo $value['nombre_corto'] ?></td>
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
