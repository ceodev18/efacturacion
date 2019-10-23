<?php
session_start();

require 'class/cl_familia.php';
require_once 'class/cl_tienda.php';

$c_tienda = new cl_tienda();
$c_familia = new cl_familia();
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
        <title>Chimbote Store - Registro de Productos</title>

        <!-- Common plugins -->
        <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../plugins/pace/pace.css" rel="stylesheet">
        <link href="../plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../plugins/nano-scroll/nanoscroller.css">
        <link rel="stylesheet" href="../plugins/metisMenu/metisMenu.min.css">
        <link rel="stylesheet" type="text/css" href="../public/js/jpreview.css">

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
                <form class="form-horizontal" method="post" action="../procesos/reg_producto.php" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="panel panel-default collapsed">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Agregar Imagen Principal </b></h3>
                            </div>

                            <div class="panel-body">
                                <div class="form-group" >
                                    <input type="file" name="fimagenes[]" class="demo" multiple data-jpreview-container="#demo-1-container" accept="image/*" />
                                </div>
                                <div id="demo-1-container" class="jpreview-container"></div>
                            </div>
                        </div>
                    </div>
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
                                        <input type="text" placeholder="Codigo" class="form-control text-center" id="input_codigo_producto" name="input_codigo_producto" disabled="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Descripcion</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="Descripcion del Producto" class="form-control" id="input_descripcion_producto" name="input_descripcion_producto" required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Familia</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" id="select_familia" name="select_familia">
                                            <?php
                                            $a_familia = $c_familia->ver_familias();
                                            foreach ($a_familia as $value) {
                                                ?>
                                                <option value="<?php echo $value['id_familia'] ?>"><?php echo $value['descripcion'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 control-label">Clasificacion</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" id="select_clasificacion" name="select_clasificacion">
                                            <option value="-">Seleccionar Familia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Precio Venta</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control text-right" id="input_precio_producto" name="input_precio_producto" value="0.00" required/>
                                    </div>
                                    <label class="col-lg-4 control-label">Descuento</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control text-right" id="input_descuento_producto" name="input_descuento_producto" value="0.00" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nuevo Precio</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control text-right" id="input_nuevoprecio_producto" name="input_nuevoprecio_producto" value="0.00" readonly="true"/>
                                    </div>
                                    <label class="col-lg-4 control-label">Precio Compra</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control text-right" id="input_costo_producto" name="input_costo_producto" value="0.00" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Caracteristicas</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="5" id="input_caracteristicas_producto" name="input_caracteristicas_producto" required="true"></textarea>
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
        <script src="../public/js/bootstrap-prettyfile.js"></script>
        <script src="../public/js/jpreview.js"></script>

        <script>
            $('input[type="file"]').prettyFile();
            $('.demo').jPreview();
        </script>

        <script lang="javascript" >
            $(document).ready(function () {
                $("#select_familia").trigger('change');
            });
            
            $("#select_familia").change(function () {
                var id_familia = $("#select_familia").val();
                var select_clasificacion = $("#select_clasificacion");
                var select_familia = $(this);
                if (id_familia !== '')
                {
                    $.ajax({
                        //data: {id: cliente},
                        url: 'ajax_post/select_obtener_clasificacion.php?codigo=' + id_familia,
                        type: 'GET',
                        dataType: 'json',
                        beforeSend: function ()
                        {
                            select_clasificacion.prop('disabled', true);
                        },
                        success: function (response)
                        {
                            select_familia.prop('disabled', false);
                            // Limpiamos el select
                            select_clasificacion.find('option').remove();
                            $(response).each(function (i, v) { // indice, valor
                                select_clasificacion.append('<option value="' + v.id + '">' + v.Nombre + '</option>');
                            })

                            select_clasificacion.prop('disabled', false);
                        },
                        error: function ()
                        {
                            alert('Ocurrio un error en el servidor ..');
                            select_clasificacion.prop('disabled', true);
                        }
                    });
                }
                else
                {
                    alert('Ocurrio un error en el servidor ..');
                    select_clasificacion.prop('disabled', true);
                }
            });
        </script>

    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>