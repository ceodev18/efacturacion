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
                                <option value="">Periodo</option>
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
                    <a href="reg_venta.php" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Venta</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tabla_clasificacion" class="table table-striped dt-responsive nowrap">
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
                            $i = 0;
                            if ($i  == 0) {
                                $estado = '<span class="label label-success">Normal</span>';
                            }
                            if ($i  == 1) {
                                $estado = '<span class="label label-warning">Anulado</span>';
                            }

                            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="reports/ver_documento_venta.php?&id_venta=1" target="_blank" alt="Ver e Imprimir" title="Ver e Imprimir">BT | B001-0035</a>
                                </td>
                                <td class="text-center">2019-10-24</td>
                                <td class="text-center">46993209 | OYANGUREN GIRON LUIS ENRIQUE</td>
                                <td class="text-right">100.00</td>
                                <td class="text-right">18.00</td>
                                <td class="text-right">118.00</td>
                                <td class="text-center"><?php echo $estado?></td>
                                <td class="text-center">
                                    <?php
                                    if ($estado == 0) { ?>
                                        <a href="ver_productos.php" target="_blank" class="btn btn-xs btn-dropbox" alt="ver archivo XML" title="ver archivo XML"> <i class="fa fa-file"></i></a>
                                        <button type="button" onclick="" data-toggle="modal" data-target="#modal_ver_detalle" class="btn btn-xs btn-facebook" alt="Ver Detalle" title="Ver Detalle"><i class="fa fa-bars"></i></button>
                                        <button type="button" onclick="" class="btn btn-xs btn-danger" alt="Anular Venta" title="Anular Venta"><i class="fa fa-trash"></i></button>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
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

<script>
    $(document).ready(function () {
        $('#tabla_ventas').dataTable();

    });

    $("#select_periodo").change(function () {
        var periodo = $("#select_periodo").val();
        window.location = "ver_ventas.php?periodo=" + periodo;
    });
</script>
<script>
    function obtener_detalle(id_venta, periodo) {
        var parametros = {
            id_venta: id_venta,
            periodo: periodo
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: 'modals/m_detalle_venta.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {

                $("#modal_detalle").html("Procesando, espere por favor...");
            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#modal_detalle").html(response);
            }
        });
    }

    function anular_venta(id_venta, periodo) {

        var parametros = {
            periodo: periodo,
            id_venta: id_venta
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: 'procesos/del_venta.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                alert("procesando accion");
            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                location.reload();
            }
        });
    }


</script>
</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>