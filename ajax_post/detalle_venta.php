<?php
session_start();
require '../session_class/cs_detalle_venta.php';
$cs_detalle = new cs_detalle_venta();

$cs_detalle->setProducto(filter_input(INPUT_GET, 'input_codigo_producto'));
$cs_detalle->setDescripcion(filter_input(INPUT_GET, 'input_descripcion_producto'));
$cs_detalle->setCosto(filter_input(INPUT_GET, 'input_costo_producto'));
$cs_detalle->setCantidad(filter_input(INPUT_GET, 'input_cantidad_producto'));
$cs_detalle->setPrecio(filter_input(INPUT_GET, 'input_precio_producto'));

$cs_detalle->i_detalle();
$item = 1;
$total = 0;
$json_detalle = $_SESSION['detalle_venta'];
foreach ($json_detalle as $fila) {
    foreach ($fila as $value) {
        $total = $total + ($value['cantidad'] * $value['precio']);
        ?>
        <tr>
            <td class = "text-center"><?php echo $item ?></td>
            <td><?php echo $value['descripcion'] ?></td>
            <td class="text-right"><?php echo number_format($value['cantidad'], 0) ?></td>
            <td class="text-right"><?php echo number_format($value['precio'], 2) ?></td>
            <td class="text-right"><?php echo number_format($value['cantidad'] * $value['precio'], 2) ?></td>
            <td class="text-center">
                <a class="btn btn-xs btn-danger" onclick="DelProducto(<?php echo $value['codigo']; ?>)">
                    <i class="fa fa-close"></i>
                </a>
            </td>
        </tr>
        <?php
        $item++;
    }
}
?>
<script>
    $('#input_total_pedido').val(<?php echo $total ?>);
    $('#lbl_suma_pedido').text("S/ " + number_format(<?php echo $total ?>, 2));
    $('#lbl_suma_pedido_pago').text("S/ " + number_format(<?php echo $total ?>, 2));
</script>
