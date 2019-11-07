<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id_empresa'])) {
    var_dump($_SESSION);
    //session_destroy();
    header("location: ../login.php");
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