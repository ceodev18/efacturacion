<?php
require '../models/Producto.php';

$c_producto = new Producto();

$action = filter_input(INPUT_GET, 'action');
//1 para registrar
//2 para editar

if ($action == 2) {
    $c_producto->setIdProducto(filter_input(INPUT_GET, 'id'));
    $c_producto->obtenerDatos();
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
        <link rel="stylesheet" type="text/css" href="../public/js/jpreview.css">
        <link href="../public/plugins/iCheck/blue.css" rel="stylesheet">

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
                        <h4>Registrar Producto</h4>
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
                <form class="form-horizontal" method="post" action="../controller/producto.php">
                    <div class="col-sm-12">
                        <!-- START panel-->
                        <div class="panel panel-default">
                            <div class="panel-heading">Datos del Producto</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div id ="resultado" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Codigo</label>
                                    <div class="col-lg-2">
                                        <input type="text" placeholder="Codigo" class="form-control text-center" id="input_codigo_producto" name="input_codigo_producto" disabled="true" value="<?php echo $c_producto->getIdProducto()?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Descripcion</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="Descripcion del Producto" class="form-control" id="input_descripcion_producto" name="input_descripcion_producto" required="true" value="<?php echo $c_producto->getDescripcion()?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Precio Venta</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control text-right" id="input_precio_producto" name="input_precio_producto" value="<?php echo $c_producto->getPrecio()?>" required/>
                                    </div>
                                    <label class="col-lg-4 control-label">Costo</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control text-right" id="input_costo_producto" name="input_costo_producto" value="<?php echo $c_producto->getCosto()?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Afecto ISCBP</label>
                                    <div class="col-lg-2">
                                        <input type="checkbox" class="i-checks"  id="input_afecto" name="input_afecto" value="1"/>
                                        <input type="hidden" id="action" name="action" value="<?php echo $action?>" />
                                        <input type="hidden" id="hidden_idproducto" name="hidden_idproducto" value="<?php echo $c_producto->getIdProducto()?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="form-group">
                                    <div class="col-lg-offset-10 col-lg-1">
                                        <button type="submit" class="btn btn-sm btn-primary" id="btn_enviar_form">Guardar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- END panel-->
                    </div>
                </form>
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
        <!-- iCheck for radio and checkboxes -->
        <script src="../public/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue'
                });
            });
        </script>


    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>