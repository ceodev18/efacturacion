<?php
session_start();

require '../models_session/VentaProducto.php';

$cs_detalle = new ventaProducto();
$action = filter_input(INPUT_POST, 'action');

$cs_detalle->setIdproducto(filter_input(INPUT_POST, 'id_producto'));
$cs_detalle->setDescripcion(filter_input(INPUT_POST, 'descripcion'));
$cs_detalle->setCantidad(filter_input(INPUT_POST, 'cantidad'));
$cs_detalle->setPrecio(filter_input(INPUT_POST, 'precio'));
$cs_detalle->setCosto(filter_input(INPUT_POST, 'costo'));

if ($action == 1) {
    $cs_detalle->agregar();
}
if ($action == 2) {
    $cs_detalle->eliminar();
}
echo "action: " . $action;

$total = 0;
$array_detalle = $_SESSION['ventaproductos'];
foreach ($array_detalle as $fila) {
        $total = $total + ($fila['cantidad'] * $fila['precio']);
        ?>
        <tr>
            <td class = "text-center"><?php echo $fila['idproducto'] ?></td>
            <td><?php echo $fila['descripcion'] ?></td>
            <td class="text-right"><?php echo number_format($fila['cantidad'], 0) ?></td>
            <td class="text-right"><?php echo number_format($fila['precio'], 2) ?></td>
            <td class="text-right"><?php echo number_format($fila['cantidad'] * $fila['precio'], 2) ?></td>
            <td class="text-center">
                <a class="btn btn-xs btn-danger" onclick="DelProducto(<?php echo $fila['codigo']; ?>)">
                    <i class="fa fa-close"></i>
                </a>
            </td>
        </tr>
        <?php
}
?>
<script>
    $('#input_total_pedido').val(<?php echo $total ?>);
    $('#lbl_suma_pedido').text("S/ " + number_format(<?php echo $total ?>, 2));
    $('#lbl_suma_pedido_pago').text("S/ " + number_format(<?php echo $total ?>, 2));
</script>

