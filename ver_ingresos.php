<?php
session_start();

require 'class/cl_ingreso.php';
require 'class/cl_varios.php';
require_once 'class/cl_tienda.php';
$c_ingreso = new cl_ingreso();
$c_varios = new cl_varios();

$c_tienda = new cl_tienda();
if ($_SESSION['id_empresa'] == null || $_SESSION['id_empresa'] == "") {
    header("Location: login.php");
} else {
    $c_tienda->setId($_SESSION['id_empresa']);
    $c_tienda->validar_tienda();
}

$c_ingreso->setId_tienda($_SESSION['id_empresa']);
?>
<!DOCTYPE html>
<html lang="es">

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Chimbote Store - Ingresos de Mercaderia</title>

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
                        <h4>Ingresos de Mercaderia</h4>
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
                            <a href="reg_ingreso.php" class="btn btn-success" > Agregar Ingreso Mercaderia</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id.</th>
                                            <th>Fec. Ingreso</th>
                                            <th>Proveedor</th>
                                            <th>Documento</th>
                                            <th>Monto</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a_ingresos = $c_ingreso->ver_ingresos();
                                        foreach ($a_ingresos as $value) {
                                            ?>
                                            <tr class="odd gradeX">
                                                <td class="text-center"><?php echo $value['periodo']. $c_varios->zerofill($value['id_ingreso'], 2)?></td>
                                                <td class="text-center"><?php echo $value['fecha']?></td>
                                                <td><?php echo $value['razon_social']?></td>
                                                <td class="text-center"><?php echo $value['siglas'] . '/ ' . $value['serie'] . ' - ' . $c_varios->zerofill($value['numero'], 6)?></td>
                                                <td class="text-right">S/ <?php echo number_format($value['total'], 2)?></td>
                                                <td class="text-center">
                                                    <a href="ver_resumen_empleado.php?codigo=1" class="btn btn-info btn-sm"><i class="fa fa-bars"></i>
                                                    </a>
                                                    <a href="reports/pdf_ver_ingreso.php?codigo=<?php echo $value['id_ingreso']?>&periodo=<?php echo $value['periodo']?>" class="btn btn-success btn-sm"><i class="fa fa-print"></i>
                                                    </a>
                                                    <button type="button" onclick="eliminar_ingreso(<?php echo $value['id_ingreso']?>,<?php echo $value['periodo']?>)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                    </button>
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
                $('#data-table').dataTable();
            });
        </script>
    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>