<?php
session_start();
include '../session_class/cs_detalle_ingreso.php';
$cs_detalle = new cs_detalle_pedido();

$item_producto = filter_input(INPUT_POST, 'item');
$cs_detalle->d_item_detalle($item_producto);

$item = 1;
$total = 0;
$json_detalle = $_SESSION['detalle_ingreso'];
foreach ($json_detalle as $fila) {
    foreach ($fila as $value) {
        $total = $total + ($value['cantidad'] * $value['costo']);
        ?>
        <tr>
            <td class = "text-center"><?php echo $item ?></td>
            <td class = "text-center"><?php echo $value['codigo'] ?></td>
            <td><?php echo $value['descripcion'] ?></td>
            <td class="text-center"><?php echo number_format($value['cantidad'], 0) ?></td>
            <td class="text-center">Und</td>
            <td class="text-right"><?php echo number_format($value['costo'], 2) ?></td>
            <td class="text-right"><?php echo number_format($value['cantidad'] * $value['costo'], 2) ?></td>
            <td class="text-center">
                <a class="btn btn-xs btn-danger" onclick="DelProducto(<?php echo $value['codigo']; ?>)">
                    <i class="fa fa-close"></i>
                </a>
            </td>
        </tr>
        <?php
    }
    $item ++;
}
?>
<script>
    $('#input_hidden_total').val(<?php echo $total ?>);
    $('#input_total').val(number_format(<?php echo $total ?>, 2));
</script>