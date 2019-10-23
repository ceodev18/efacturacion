<?php
session_start();

require 'class/cl_varios.php';
require 'class/cl_tienda.php';
require 'class/cl_caja_diaria.php';

$c_varios = new cl_varios();
$c_tienda = new cl_tienda();

if ($_SESSION['id_empresa'] == null || $_SESSION['id_empresa'] == "") {
    header("Location: login.php");
} else {
    $c_tienda->setId($_SESSION['id_empresa']);
    $c_tienda->validar_tienda();
}

$c_caja = new cl_caja_diaria();
$c_caja->setId_tienda($_SESSION['id_empresa']);

?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Chimbote Store - Listar Cajas</title>

        <!-- Common plugins -->
        <link href="../public/images/favicon.png" rel="icon"/>
        <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../plugins/pace/pace.css" rel="stylesheet">
        <link href="../plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../plugins/nano-scroll/nanoscroller.css">
        <link rel="stylesheet" href="../plugins/metisMenu/metisMenu.min.css">
        <!-- dataTables -->
        <link href="../plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="../plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../plugins/toast/jquery.toast.min.css" rel="stylesheet">

        <!--template css-->
        <link href="../public/css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
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
                        <h4>Listado de Cajas</h4>
                    </div>
                    <div class="col-sm-6 text-right">
                        <ol class="breadcrumb">
                            <li><a href="../index.php"><i class="fa fa-home"></i></a></li>
                            <li>Cajas Diarias</li>
                            <li>Listar Cajas</li>
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
                            <a href="reg_venta.php" class="btn btn-success" > Agregar Venta</a>
                            <div class="panel-heading-btn col-sm-3">
                                <select class="form-control" id="select_periodo" name="select_periodo">
                                    <option value="-" >Seleccionar Periodo</option>
                                    <?php
                                    $a_periodos = $c_caja->ver_periodos();
                                    foreach ($a_periodos as $value) {
                                        ?>
                                        <option value="<?php echo $value['periodo'] ?>"><?php echo $value['periodo'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tabla_cajas" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Apertura</th>
                                            <th>Ingresos</th>
                                            <th>Egresos</th>
                                            <th>Cierre</th>
                                            <th>Sistema </th>
                                            <th>Diferencia</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a_cajas = $c_caja->ver_cajas();
                                        $total = 0;
                                        $pagado = 0;
                                        foreach ($a_cajas as $value) {
                                            $ingresos = $value['ing_venta'] + $value['cobro_venta'] + $value['o_ingresos'];
                                            $egresos = $value['devolucion_venta'] + $value['pago_compra'] + $value['gastos'];
                                            $diferencia = $value['m_sistema'] - $value['m_cierre'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $value['fecha']?></td>
                                                <td class="text-center"><?php echo $value['apertura'] ?></td>
                                                <td class="text-center"><?php echo number_format($ingresos, 2) ?></td>
                                                <td class="text-right"><?php echo number_format($egresos, 2) ?></td>
                                                <td class="text-right"><?php echo number_format($value['m_cierre'], 2) ?></td>
                                                <td class="text-right"><?php echo number_format($value['m_sistema'], 2) ?></td>
                                                <td class="text-right"><?php echo number_format($diferencia, 2) ?></td>
                                                <td class="text-center"></td>
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
        <script src="../plugins/jquery/dist/jquery.min.js"></script>
        <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../plugins/pace/pace.min.js"></script>
        <script src="../plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="../plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="../plugins/metisMenu/metisMenu.min.js"></script>
        <script src="../public/js/float-custom.js"></script>

        <!-- Datatables-->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/toast/jquery.toast.min.js"></script>

        <script>
                                        $(document).ready(function () {
                                            $('#tabla_cajas').dataTable();

                                        });

                                        $("#select_periodo").change(function () {
                                            var campana = $("#select_periodo").val();
                                            window.location = "ver_cajas.php?periodo=" + campana;
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

        </script>
    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>