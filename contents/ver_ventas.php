<?php
session_start();
require '../models/Venta.php';
require '../tools/Varios.php';
$c_venta = new Venta();
$c_varios = new Varios();

$c_venta->setIdEmpresa($_SESSION['id_empresa']);

$periodo = date("Ym");
if (filter_input(INPUT_GET, 'periodo')) {
    $periodo = filter_input(INPUT_GET, 'periodo');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistema de Facturacion Electronica - Luna Systems Peru</title>

    <!-- Common plugins -->
    <link href="../public/images/favicon.png" rel="icon"/>
    <link href="../public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
    <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/plugins/pace/pace.css" rel="stylesheet">
    <link href="../public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/plugins/nano-scroll/nanoscroller.css">
    <link rel="stylesheet" href="../public/plugins/metisMenu/metisMenu.min.css">
    <!-- dataTables -->
    <link href="../public/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="../public/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../public/plugins/toast/jquery.toast.min.css" rel="stylesheet">

    <link href="../public/plugins/bootstrap-sweet-alerts/sweet-alert.css" rel="stylesheet">

    <!--template css-->
    <link href="../public/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<?php include '../fixed/menu_superior.php' ?>

<?php include '../fixed/menu_derecha.php' ?>

<?php include '../fixed/menu_izquierda.php' ?>


<!--main content start-->
<section class="main-content container">


    <!--page header start-->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4>Listado de Ventas</h4>
            </div>
            <div class="col-sm-6 text-right">
                <ol class="breadcrumb">
                    <li><a href="../index.php"><i class="fa fa-home"></i></a></li>
                    <li>Ventas</li>
                    <li>Listar ventas</li>
                </ol>
            </div>
        </div>
    </div>
    <!--page header end-->


    <!--start page content-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    Busqueda
                </div>
                <div class="panel-body">
                    <form>
                        <div class="col-sm-3">
                            <h5>Fecha desde:</h5>
                            <input type="date" class="form-control" name="input_fecha_inicio" value="2019-10-24">
                        </div>

                        <div class="col-sm-3">
                            <h5>Fecha hasta:</h5>
                            <input type="date" class="form-control" name="input_fecha_fin" value="2019-10-24">
                        </div>

                        <div class="col-sm-2">
                            <h5>Acciones:</h5>
                            <button type="submit" class="btn btn-info" id="btn_buscar"><i class="fa fa-search"></i> Buscar</button>
                        </div>

                    </form>
                    <form>
                        <div class="col-sm-4">
                            <h5>Seleccionar Periodo:</h5>
                            <select class="form-control" id="select_periodo" name="select_periodo">
                                <option value="-">Seleccionar Periodo</option>
                                <?php
                                $a_periodos = $c_venta->verPeriodos();
                                foreach ($a_periodos as $fila) {
                                    echo '<option value="' . $fila['periodo'] . '">' . $fila['periodo'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default collapsed">
                <div class="panel-heading">
                    <a href="reg_venta.php" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Doc. Venta</a>
                    <a href="reg_nota_venta.php" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Nota Electronica</a>
                    <a href="../reports/pdf_ventas_periodo.php?periodo=<?php echo $periodo?>" target="_blank" class="btn btn-warning"><i class="fa fa-file-pdf-o"></i> Exportar a PDF</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tabla_ventas" class="table table-striped dt-responsive nowrap">
                            <thead>
                            <tr>
                                <!--<th>Codigo</th>-->
                                <th>Documento</th>
                                <th>F. Venta</th>
                                <th>Cliente</th>
                                <th>Sub Total</th>
                                <th>IGV</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $a_ventas = $c_venta->verFilas($periodo);
                            foreach ($a_ventas as $fila) {
                                if ($fila['estado'] == 1) {
                                    $estado = '<span class="label label-success">Normal</span>';
                                    $total = $fila['total'];
                                }
                                if ($fila['estado'] == 2) {
                                    $estado = '<span class="label label-warning">Anulado</span>';
                                    $total = 0;
                                }
                                $documento_venta = $fila['abreviatura'] . " | " . $fila['serie'] . " - " . $c_varios->zerofill($fila['numero'], 3);
                                ?>
                                <tr>
                                    <?php
                                    if ($fila['estado'] == 1) { ?>
                                        <td class="text-center">
                                            <a href="../reports/documento_venta.php?&id_venta=<?php echo $fila['id_venta'] ?>" target="_blank" alt="Ver e Imprimir" title="Ver e Imprimir"><?php echo $documento_venta ?></a>
                                        </td>
                                        <?php
                                    }
                                    if ($fila['estado'] == 2) { ?>
                                        <td class="text-center">
                                            <?php echo $documento_venta ?>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <td class="text-center"><?php echo $fila['fecha'] ?></td>
                                    <td><?php echo $fila['documento'] . " | " . $fila['datos'] ?></td>
                                    <td class="text-right"><?php echo number_format($total / 1.18, 2) ?></td>
                                    <td class="text-right"><?php echo number_format($total / 1.18 * 0.18, 2) ?></td>
                                    <td class="text-right"><?php echo number_format($total, 2) ?></td>
                                    <td class="text-center"><?php echo $estado ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($fila['estado'] == 1) { ?>
                                            <a href="../greenter/files/<?php echo $fila['nombre_xml'] . ".xml" ?>" target="_blank" class="btn btn-xs btn-dropbox" alt="ver archivo XML" title="ver archivo XML"> <i class="fa fa-file"></i></a>
                                            <button type="button" onclick="obtener_detalle('<?php echo $fila['id_venta'] ?>')" class="btn btn-xs btn-facebook" alt="Ver Detalle" title="Ver Detalle"><i class="fa fa-bars"></i></button>
                                            <button type="button" onclick="anular_venta('<?php echo $fila['id_venta'] ?>')" class="btn btn-xs btn-danger" alt="Anular Venta" title="Anular Venta"><i class="fa fa-trash"></i></button>
                                        <?php }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="text-right" colspan="4">Suma Pedido</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end page content-->


    <?php include '../fixed/footer.php'; ?>

</section>
<!--end main content-->

<div class="modal fade" id="modal_ver_detalle" tabindex="-1" role="dialog" aria-labelledby="modal_ver_detalle">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true" class="fa fa-times-circle"></span></button>
                <h3 class="modal-title" id="myModalLabel">Detalle Productos en venta</h3>
            </div>
            <div class="modal-body" id="modal_detalle">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--Common plugins-->
<script src="../public/plugins/jquery/dist/jquery.min.js"></script>
<script src="../public/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/plugins/pace/pace.min.js"></script>
<script src="../public/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="../public/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../public/plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
<script src="../public/plugins/metisMenu/metisMenu.min.js"></script>
<script src="../public/js/float-custom.js"></script>

<!-- Datatables-->
<script src="../public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../public/plugins/toast/jquery.toast.min.js"></script>
<script src="../public/plugins/bootstrap-sweet-alerts/sweet-alert.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tabla_ventas').dataTable({
            order: [[1, "desc"], [0, "desc"]],
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [[50, 100, 300, -1], [50, 100, 300, "All"]],
        });

    });

    $("#select_periodo").change(function () {
        var periodo = $("#select_periodo").val();
        window.location = "ver_ventas.php?periodo=" + periodo;
    });
</script>
<script>
    function obtener_detalle(id_venta) {
        var parametros = {
            idventa: id_venta,
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '../modals/productos_venta.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                $("#modal_detalle").html("Procesando, espere por favor...");
            },
            success: function (response) {
                //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#modal_detalle").html(response);
                $("#modal_ver_detalle").modal('toggle');
            }
        });
    }

    function anular_venta(id_venta) {

        swal({
            title: "Anular Venta",
            text: "Esta seguro de ANULAR este documento?",
            type: "warning",
            showCancelButton: true,
            //cancelButtonClass: 'btn-secondary ',
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Anular",
            cancelButtonText: "No, cancelar!",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                window.location.href = '../controller/del_venta.php?id_venta=' + id_venta;
            }
        });
    }


</script>
</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>