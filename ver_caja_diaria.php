<?php
session_start();

require 'class/cl_caja_diaria.php';
require 'class/cl_movimiento_caja.php';
require_once 'class/cl_tienda.php';
require_once 'class/cl_venta.php';
require_once 'class/cl_detalle_venta.php';

$c_caja = new cl_caja_diaria();
$c_caja->setId_tienda($_SESSION['id_empresa']);
$c_caja->setFecha(date('Y-m-d'));

$c_movimiento = new cl_movimiento_caja();
$c_movimiento->setFecha($c_caja->getFecha());
$c_movimiento->setId_empresa($c_caja->getId_tienda());

$c_tienda = new cl_tienda();
if ($_SESSION['id_empresa'] == null || $_SESSION['id_empresa'] == "") {
    header("Location: login.php");
} else {
    $c_tienda->setId($_SESSION['id_empresa']);
    $c_tienda->validar_tienda();
}

$existe_caja = $c_caja->obtener_datos();

$c_venta = new cl_venta();
$c_venta->setId_tienda($_SESSION['id_empresa']);
$c_venta->setFecha(date('Y-m-d'));

$a_venta = $c_venta->ver_ventas_fecha();
foreach ($a_venta as $value) {
	$c_venta->setTotal($c_venta->getTotal() + $value['total']);
	$c_venta->setPagado($c_venta->getPagado() + $value['pagado']);	
}

$c_detalle = new cl_detalle_venta();
$c_detalle->setId_tienda($c_venta->getId_tienda());
$utilidad = 0;

$a_detalle = $c_detalle->ver_utilidad_productos(date('Y-m-d'));

foreach ($a_detalle as $value) {
	$utilidad += ($value['cantidad'] * ($value['precio'] - $value['costo']));
}

?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Chimbote Store - Caja Diaria</title>

    <!-- Common plugins -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="plugins/pace/pace.css" rel="stylesheet">
    <link href="plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/nano-scroll/nanoscroller.css">
    <link rel="stylesheet" href="plugins/metisMenu/metisMenu.min.css">
    <!-- dataTables -->
    <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/iCheck/blue.css" rel="stylesheet">

    <!--template css-->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php include 'includes/menu_superior.php' ?>

<?php include 'includes/menu_derecha.php' ?>

<?php include 'includes/menu_izquierda.php' ?>


<!--main content start-->
<section class="main-content container">


    <!--page header start-->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4>Caja diaria</h4>
            </div>
            <div class="col-sm-6 text-right">
                <ol class="breadcrumb">
                    <li><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                    <li>pages</li>
                    <li>empty page</li>
                </ol>
            </div>
        </div>
    </div>
    <!--page header end-->


    <!--start page content-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default collapsed">
                <div class="panel-heading">
                    <?php if (!$existe_caja) { ?>
                        <button type="button" data-toggle="modal" data-target="#modal_reg_apertura"
                                class="btn btn-warning" alt="Aperturar Caja" title="Aperturar Caja"><i
                                    class="fa fa-money"></i> Abrir Caja
                        </button>
                    <?php } ?>
                    <?php if ($existe_caja) { ?>
                        <a href="ver_caja_mensual.php" class="btn btn-danger"> cierre caja</a>
                    <?php } ?>
                    <a href="ver_caja_mensual.php" class="btn btn-success"> Ver Cierre Mensual</a>
                </div>
                <div class="panel-body">
                    <?php
                    if ($existe_caja) {
                        ?>
                        <div class="col-lg-6">
                            <div class="panel panel-default collapsed">
                                <div class="panel-heading">
                                    <span><i class="fa fa-dollar"></i> Ver Caja</span>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Detalle caja</th>
                                            <th>monto</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Apertura</td>
                                            <td class="text-right text-success">
                                                + <?php echo number_format($c_caja->getApertura(), 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Ventas Efectivo</td>
                                            <td class="text-right text-success">
                                                + <?php echo number_format($c_caja->getI_ventas(), 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Cobros Ventas</td>
                                            <td class="text-right text-success">
                                                + <?php echo number_format($c_caja->getI_cobros(), 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Otros Ingresos</td>
                                            <td class="text-right text-success">
                                                + <?php echo number_format($c_caja->getI_otros(), 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Ventas Anuladas</td>
                                            <td class="text-right text-danger">
                                                - <?php echo number_format($c_caja->getE_devolucion(), 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Gastos</td>
                                            <td class="text-right text-danger">
                                                - <?php echo number_format($c_caja->getE_otros(), 2) ?></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">
                                                <strong><?php echo number_format($c_caja->getApertura() + $c_caja->getSistema(), 2) ?></strong>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="panel panel-default collapsed">
                                <div class="panel-heading">
                                    <span><i class="fa fa-bars"></i> Ver resumen</span>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Total Ventas</td>
                                            <td class="text-right"><?php echo number_format($c_venta->getTotal(), 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ventas en Efectivo</td>
                                            <td class="text-right"><?php echo number_format($c_venta->getPagado(), 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ventas por cobrar</td>
                                            <td class="text-right"><?php echo number_format($c_venta->getTotal() - $c_venta->getPagado(), 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Utilidad</td>
                                            <td class="text-right"><?php echo number_format($utilidad, 2) ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="panel panel-default collapsed">
                                <div class="panel-heading">
                                    <span><i class="fa fa-subway"></i> Ver Movimientos</span>
                                    <button type="button" data-toggle="modal" data-target="#modal_reg_movimiento" class="btn btn-warning col-lg-offset-2" alt="Añadir Movimiento" title="Añadir Movimiento"><i class="fa fa-money"></i> Agregar Movimiento </button>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Detalle Movimientos</th>
                                            <th>monto</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $a_movimientos = $c_movimiento->ver_movimientos();
                                        $suma_movimientos = 0;
                                        foreach ($a_movimientos as $value) {
                                            $ingreso = $value['ingreso'];
                                            $egreso = $value['salida'];

                                            $suma_movimientos += ($ingreso - $egreso);

                                            $valor_numero = 0.00;
                                            if ($ingreso > 0) {
                                                $valor_numero = "+ " . number_format($ingreso, 2);
                                            } else {
                                                $valor_numero = "- " . number_format($egreso, 2);
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $value['id_movimiento'] ?></td>
                                                <td><?php echo $value['descripcion'] ?></td>
                                                <td class="text-right"><?php echo $valor_numero ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><?php echo number_format($suma_movimientos, 2) ?></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="panel panel-default collapsed">
                                <div class="panel-heading">
                                    <span><i class="fa fa-money"></i> Ver Totales</span>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Descripcion</th>
                                            <th>monto</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>total sistema</td>
                                            <td class="text-right"><?php echo number_format($c_caja->getApertura() + $c_caja->getSistema(), 2) ?></td>
                                        </tr>
                                        <tr>
                                            <td>en efectivo</td>
                                            <td class="text-right"><?php echo number_format($c_caja->getEntrega(), 2) ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <?php
                    } else {
                        require 'modals/m_sin_caja.php';
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <!--end page content-->


    <?php include 'includes/footer.php'; ?>

</section>
<!--end main content-->

<div class="modal fade" id="modal_reg_apertura" tabindex="-1" role="dialog" aria-labelledby="modal_reg_apertura">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true" class="fa fa-times-circle"></span></button>-->
                <h3 class="modal-title" id="myModalLabel">Abrir Caja</h3>
            </div>
            <div class="modal-body">
                <div id="modal_pago_resultado"></div>
                <form role="form" class="form-horizontal" method="post" action="procesos/reg_apertura_caja.php">
                    <div class="modal-form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Monto</label>
                            <div class="col-lg-10">
                                <input type="number" step="0.01" placeholder="S/ " name="input_monto" id="input_monto"
                                       class="form-control" required="true">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn_pago_cliente">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_reg_movimiento" tabindex="-1" role="dialog" aria-labelledby="modal_reg_movimiento">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true" class="fa fa-times-circle"></span></button>-->
                <h3 class="modal-title" id="myModalLabel">Registrar Movimiento Caja</h3>
            </div>
            <div class="modal-body">
                <div id="modal_pago_resultado"></div>
                <form role="form" class="form-horizontal" method="post" action="procesos/reg_movimiento_caja.php">
                    <div class="modal-form">
                    	<div class="form-group">
                            <label class="col-lg-3 control-label">Tipo Movimiento</label>
                            <div class="col-lg-9">
                                <div class="i-checks"><label> <input type="radio" value="1" name="radio_tipo"> <i></i> Ingreso de Dinero</label></div>
                                <div class="i-checks"><label> <input type="radio" checked="" value="2" name="radio_tipo"> <i></i> Salida de Dinero </label></div>                          
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Motivo</label>
                            <div class="col-lg-9">
                                <input type="text" placeholder="Motivo/ Descripcion" name="input_motivo" id="input_motivo"
                                       class="form-control" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Monto</label>
                            <div class="col-lg-9">
                                <input type="number" step="0.01" placeholder="S/ " name="input_monto" id="input_monto"
                                       class="form-control" required="true">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn_pago_cliente">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--Common plugins-->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/pace/pace.min.js"></script>
<script src="plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
<script src="plugins/metisMenu/metisMenu.min.js"></script>
<script src="js/float-custom.js"></script>

<!-- Datatables-->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.responsive.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue'
                });
            });
        </script>

<script>
    $(document).ready(function () {
        $('#tabla_clasificacion').dataTable();
    });
</script>
</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>