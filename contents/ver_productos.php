<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id_empresa'])) {
    var_dump($_SESSION);
    //session_destroy();
    header("location: ../login.php");
}
require '../models/Producto.php';

$c_producto = new Producto();
$c_producto->setIdEmpresa($_SESSION['id_empresa']);
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
    <!-- dataTables -->
    <link href="../public/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="../public/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="../public/plugins/lightbox2/dist/css/lightbox.css" rel="stylesheet">

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
                <h4>Productos</h4>
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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default collapsed">
                <div class="panel-heading">
                    <a href="reg_producto.php?action=1" class="btn btn-success"> Agregar Producto</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tabla_productos" class="table table-striped dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th width="60%">Descripcion</th>
                                <th width="12%">Cod SUNAT</th>
                                <th>P. Venta</th>
                                <th>Ultima Venta</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $a_productos = $c_producto->verFilas();
                            foreach ($a_productos as $fila) {
                                if ($fila['ultima_salida'] == '1000-01-01') {
                                    $label_estado = '<span class="label label-warning">Sin Movimiento</span>';
                                } else {
                                    $label_estado = '<span class="label label-success">' . $fila['ultima_salida'] . '</span>';
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $fila['id_producto'] ?></td>
                                    <td><?php echo $fila['descripcion'] ?></td>
                                    <td><?php echo $fila['codsunat'] ?></td>
                                    <td class="text-right"><?php echo $fila['precio'] ?></td>
                                    <td class="text-center"><?php echo $label_estado ?></td>
                                    <td class="text-center">
                                        <a href="reg_producto.php?action=2&id=<?php echo $fila['id_producto'] ?>" class="btn btn-xs btn-facebook" title="Editar Producto" alt="Editar Producto"> <i class="fa fa-edit"></i></a>
                                        <a href="ver_kardex.php?codigo=" class="btn btn-xs btn-success" title="Ver Kardex" alt="Ver Kardex"> <i class="fa fa-arrows-h"></i></a>
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

<!-- Datatables-->
<script src="../public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/plugins/datatables/dataTables.responsive.min.js"></script>

<script src="../public/plugins/lightbox2/dist/js/lightbox.min.js"></script>

<script>
    $(document).ready(function () {
        //$('#tabla_clasificacion').dataTable();
        var table = $('#tabla_productos').DataTable();

        table.order([1, 'asc']).draw();
    });
</script>

</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>