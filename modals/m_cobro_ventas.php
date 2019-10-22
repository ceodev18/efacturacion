<?php
session_start();
require_once '../class/cl_cobro_venta.php';
require_once '../class/cl_venta.php';
require_once '../class/cl_varios.php';

$c_cobro = new cl_cobro_venta();
$c_venta= new cl_venta();
$c_varios = new cl_varios();

$c_cobro->setIdTienda($_SESSION['id_empresa']);
$c_cobro->setPeriodo(filter_input(INPUT_POST, 'periodo'));
$c_cobro->setIdVenta(filter_input(INPUT_POST, 'id_venta'));

$c_venta->setId_tienda($c_cobro->getIdTienda());
$c_venta->setPeriodo($c_cobro->getPeriodo());
$c_venta->setCodigo($c_cobro->getIdVenta());

$a_detalle = $c_cobro->ver_pagos();

$a_venta = $c_venta->ver_ventas_id();

$total = 0;
foreach ($a_venta as $value) {
    $total = $value['total'];
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
            <th>#.</th>
            <th>Fecha</th>
            <th>Monto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $item = 1;
        $suma_pago = 0;
        foreach ($a_detalle as $value) {
            $suma_pago += $value['monto'];
            ?>
            <tr>
                <td class="text-center"><?php echo $value['id_cobro_ventas'] ?></td>
                <td class="text-center"><?php echo $value['fecha'] ?></td>
                <td class="text-right"><?php echo number_format($value['monto'], 2) ?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-xs btn-danger" alt="Anular" title="Anular" onclick="eliminar_pago(<?php echo $value['id_cobro_ventas']?>, <?php echo $c_cobro->getPeriodo();?>, <?php echo $c_cobro->getIdVenta()?>)"> <i class="fa fa-trash"></i></button>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td class="text-center"></td>
            <td class="text-right text-capitalize">TOTAL</td>
            <td class="text-right"><?php echo number_format($suma_pago, 2) ?></td>
        </tr>
    </tfoot>
</table>

<?php 
if ($suma_pago < $total) { 
    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_reg_pago">Agregar Pago</button>';
}
?>
