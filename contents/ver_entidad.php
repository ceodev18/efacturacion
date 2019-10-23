<?php
session_start();

require 'class/cl_entidad.php';
require_once 'class/cl_tienda.php';
$c_entidad = new cl_entidad();

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
        <title>Chimbote Store - Proveedores - Empresas</title>

        <!-- Common plugins -->
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

        <?php include 'fixed/menu_superior.php' ?>

        <?php include 'fixed/menu_derecha.php' ?>

        <?php include 'fixed/menu_izquierda.php' ?>


        <!--main content start-->
        <section class="main-content container">



            <!--page header start-->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Proveedores - Empresas</h4>
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
                            <a href="reg_entidad.php" class="btn btn-success" > Agregar Proveedor</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tabla_clasificacion" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>RUC</th>
                                            <th>Razon Social</th>
                                            <th>Condicion</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a_entidad = $c_entidad->ver_entidad();
                                        foreach ($a_entidad as $value) {
                                            $condicion = $value['condicion'];
                                            if ($condicion == 'HABIDO') {
                                                $lbl_condicion = '<span class="btn btn-xs btn-success">' . $condicion . '</span>';
                                            }
                                            if ($condicion == 'NO HABIDO') {
                                                $lbl_condicion = '<span class="btn btn-xs btn-warning">' . $condicion . '</span>';
                                            }

                                            $estado = $value['estado'];
                                            if ($estado == 'ACTIVO') {
                                                $lbl_estado = '<span class="btn btn-xs btn-success">' . $estado . '</span>';
                                            }
                                            if ($estado == 'BAJA PROV. POR OFICI') {
                                                $lbl_estado = '<span class="btn btn-xs btn-warning">' . $estado . '</span>';
                                            }
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $value['ruc'] ?></td>
                                                <td class="text-left"><?php echo $value['razon_social'] ?></td>
                                                <td class="text-center">
                                                    <?php echo $lbl_condicion ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $lbl_estado ?>
                                                </td>
                                                <td class="text-center">
                                                    <button type=button" class="btn btn-xs btn-info" title="Ver Detalles" alt="Ver Detalles"> <i class="fa fa-info"></i></button>
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


            <?php include 'fixed/footer.php'; ?>

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

        <!-- Datatables-->
        <script src="../public/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../public/plugins/datatables/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#tabla_clasificacion').dataTable();
            });
        </script>
    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>