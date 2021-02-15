<?php
session_start();

require '../models_session/VentaProducto.php';

$cs_detalle = new ventaProducto();
$action = filter_input(INPUT_POST, 'action');

if ($action != 3) {
    $cs_detalle->setIdproducto(filter_input(INPUT_POST, 'id_producto'));
}

if ($action == 1) {
    if (filter_input(INPUT_POST, 'id_producto') == "") {
        $cs_detalle->setIdproducto(count($_SESSION['ventaproductos']) + 1);
    }
    $cs_detalle->setDescripcion(filter_input(INPUT_POST, 'descripcion'));
    $cs_detalle->setCantidad(filter_input(INPUT_POST, 'cantidad'));
    $cs_detalle->setPrecio(filter_input(INPUT_POST, 'precio'));
    $cs_detalle->setCosto(filter_input(INPUT_POST, 'costo'));
    $cs_detalle->setCodsunat(filter_input(INPUT_POST, 'codsunat'));

    $cs_detalle->agregar();
}
if ($action == 2) {
    $cs_detalle->eliminar();
}
//echo "action: " . $action;

$total = 0;
$item = 1;
$array_detalle = $_SESSION['ventaproductos'];
foreach ($array_detalle as $fila) {
    $total = $total + ($fila['cantidad'] * $fila['precio']);
    ?>
    <tr>
        <td class="text-center"><?php echo $item ?></td>
        <td><?php echo $fila['descripcion'] . " | Cod. SUNAT " . $fila['codsunat'] ?></td>
        <td class="text-right"><?php echo number_format($fila['cantidad'], 0) ?></td>
        <td class="text-right"><?php echo number_format($fila['precio'], 2) ?></td>
        <td class="text-right"><?php echo number_format($fila['cantidad'] * $fila['precio'], 2) ?></td>
        <td class="text-center">
            <a class="btn btn-xs btn-danger" onclick="eliminarProducto(<?php echo $fila['idproducto']; ?>)">
                <i class="fa fa-close"></i>
            </a>
        </td>
    </tr>
    <?php
    $item++;
}
?>
<script>
    $('#input_total_pedido').val(<?php echo $total ?>);
    $('#lbl_suma_pedido').text("S/ " + number_format(<?php echo $total ?>, 2));
</script>

