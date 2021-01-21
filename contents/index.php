<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id_empresa'])) {
    var_dump($_SESSION);
    //session_destroy();
    header("location: ../login.php");
}

require '../models/VentaInicio.php';
$c_venta_inicio = new VentaInicio();
?>
<!DOCTYPE html>
<html lang="es">

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
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
        <link href="../public/images/favicon.png" rel="icon"/>
        <link href="../public/plugins/chart-c3/c3.min.css" rel="stylesheet">
        <link href="../public/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

        <!--template css-->
        <link href="../public/css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
                        <h4>Blank Page</h4>
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

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                                <strong>ALERTA DE ACTUALIZACION!</strong> a partir del año 2021, sunat exige el codigo SUNAT (Código de productos y servicios estándar de las Naciones Unidas - UNSPSC v14_0801, a que hace referencia el catálogo N° 25 del Anexo V de la Resolución de Superintendencia N° 340-2017/SUNAT y modificatorias.). Modifique el valor en Productos
                            </div>
                        </div>
                    </div>
                </div><!--col-md-6-->
            </div><!--end row-->
            <!--page header end-->


            <!--start page content-->
            <!-- widget de valores generales en inicio -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-chart white-bg padding-0">
                        <div class="widget-title">
                            <span class="label label-primary pull-right">este mes</span>
                            <h5 class="margin-b-0">Ventas</h5>
                        </div>
                        <div class="widget-content">
                            <h1 class="no-margins" id="total_ventas">0</h1>
                            <small>Total Ventas</small>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-chart white-bg padding-0">
                        <div class="widget-title">
                            <span class="label label-success pull-right">este mes</span>
                            <h5 class="margin-b-0">Clientes</h5>
                        </div>
                        <div class="widget-content">
                            <h1 class="no-margins" id="total_clientes">0</h1>
                            <small>Total clientes</small>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-chart white-bg padding-0">
                        <div class="widget-title">
                            <span class="label label-warning pull-right">este mes</span>
                            <h5 class="margin-b-0">Documentos</h5>
                        </div>
                        <div class="widget-content">
                            <h1 class="no-margins" id="total_documentos">0</h1>
                            <small>Total Documentos</small>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget widget-chart white-bg padding-0">
                        <div class="widget-title">
                            <span class="label label-danger pull-right">hoy</span>
                            <h5 class="margin-b-0">Ventas</h5>
                        </div>
                        <div class="widget-content">
                            <h1 class="no-margins" id="total_ventas_hoy">0</h1>
                            <small>Total ventas hoy</small>
                        </div>
                    </div>
                </div><!--end col-->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Flujo de Dinero
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="morris-chart-content">
                                        <div id="morris-line-chart"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <ul class="stat-list list-unstyled">
                                        <li>
                                            <h2 class="margin-b-0 font-300" id="venta_maxima">0.00</h2>
                                            <small>Venta Maxima del mes</small>
                                        </li>
                                        <li>
                                            <h2 class="margin-b-0  font-300" id="venta_minima">0.00</h2>
                                            <small>Venta Minima del mes</small>
                                        </li>
                                        <li>
                                            <h2 class="margin-b-0 font-300" id="venta_promedio">0.00</h2>
                                            <small>Promedio Venta del mes</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--col-md-12-->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default collapsed">
                        <div class="panel-heading">
                            <h3 class="panel-title">Resumen de Ventas del Mes</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tabla_documento_mensual" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Tipo Documento</th>
                                        <th>S/ Sub Total</th>
                                        <th>S/ IGV</th>
                                        <th>S/ Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $a_totales = $c_venta_inicio->VerResumenVentas();

                                    foreach ($a_totales as $fila) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $fila['id_tido']?></td>
                                            <td><?php echo $fila['nombre']?></td>
                                            <td class="text-right"><?php echo number_format($fila['total'] / 1.18, 2)?></td>
                                            <td class="text-right"><?php echo number_format($fila['total'] / 1.18 *0.18,  2)?></td>
                                            <td class="text-right"><?php echo number_format($fila['total'], 2)?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ventas diarias del mes
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="morris-chart-content">
                                        <div id="morris-line-diario"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--col-md-12-->
            </div>

            <!--end page content-->


            <?php include '../fixed/footer.php'; ?>

        </section>
        <!--end main content-->



        <!--Common plugins-->
        <script src="../public/plugins/jquery/dist/jquery.min.js"></script>
        <script src="../public/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../public/plugins/pace/pace.min.js"></script>
        <script src="../public/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="../public/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../public/plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="../public/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="../public/js/float-custom.js"></script>

        <!--page script-->
        <script src="../public/plugins/morris/raphael-2.1.0.min.js"></script>
        <script src="../public/plugins/morris/morris.js"></script>
        <script src="../public/js/inicio.graficas.js"></script>

    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>