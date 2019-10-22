<?php
session_start();

require 'class/cl_cliente.php';
require_once 'class/cl_tienda.php';
$c_cliente = new cl_cliente();
$c_cliente->setId_tienda($_SESSION['id_empresa']);

$c_tienda = new cl_tienda();
if ($_SESSION['id_empresa'] == null || $_SESSION['id_empresa'] == "") {
    header("Location: login.php");
} else {
    $c_tienda->setId($_SESSION['id_empresa']);
    $c_tienda->validar_tienda();
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
        <title>Chimbote Store - Clientes</title>

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
                        <h4>Clientes</h4>
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
                            <a href="reg_cliente.php" class="btn btn-success" > Agregar Cliente</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tabla_clasificacion" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Datos Cliente</th>
                                            <th>S/ Venta</th>
                                            <th>S/ Deuda</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a_clientes = $c_cliente->ver_clientes();
                                        foreach ($a_clientes as $value) {
                                        $diferencia = $value['total_venta'] - $value['total_pagado'];
                                        if ($diferencia > 0) {
                                        $texto_estado = '<span class="btn btn-xs btn-danger">Deudor</span>';
                                        } else {
                                        $texto_estado = '<span class="btn btn-xs btn-success">Normal</span>';
                                        }
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $value['id_cliente'] ?></td>
                                                <td><?php echo $value['datos'] . " | Doc: " . $value['documento'] ?></td>
                                                <td class="text-right"><?php echo number_format($value['total_venta'], 2) ?></td>
                                                <td class="text-right"><?php echo number_format($value['total_venta'] - $value['total_pagado'], 2) ?></td>
                                                <td class="text-center">
                                                    <?php echo $texto_estado?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-xs btn-danger" > <i class="fa fa-edit"></i></a>
                                                </td>
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

            <!--end page content-->


            <?php include 'includes/footer.php'; ?>

        </section>
        <!--end main content-->



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
        <script>
            $(document).ready(function () {
                $('#tabla_clasificacion').dataTable();
            });
        </script>
    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>