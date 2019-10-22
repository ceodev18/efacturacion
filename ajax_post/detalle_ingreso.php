<?php
session_start();
require '../session_class/cs_detalle_ingreso.php';
$cs_detalle = new cs_detalle_ingreso();

$cs_detalle->setProducto(filter_input(INPUT_GET, 'input_codigo_producto'));
$cs_detalle->setDescripcion(filter_input(INPUT_GET, 'input_descripcion_producto'));
$cs_detalle->setCantidad(filter_input(INPUT_GET, 'input_cantidad_producto'));
$cs_detalle->setCosto(filter_input(INPUT_GET, 'input_costo_producto'));
$cs_detalle->setPrecio(filter_input(INPUT_GET, 'input_precio_producto'));

$cs_detalle->i_detalle();
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
