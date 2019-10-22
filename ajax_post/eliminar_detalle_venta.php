<?php
session_start();
require '../session_class/cs_detalle_venta.php';
$cs_detalle = new cs_detalle_venta();

$item_producto = filter_input(INPUT_POST, 'item');
$cs_detalle->d_item_detalle($item_producto);

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
        $item ++;
    }
}
?>
<script>
    $('#input_total_pedido').val(<?php echo $total ?>);
    $('#lbl_suma_pedido').text("S/ " + number_format(<?php echo $total ?>, 2));
    $('#lbl_suma_pedido_pago').text("S/ " + number_format(<?php echo $total ?>, 2));
</script>
