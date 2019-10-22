<?php
session_start();

$_SESSION['detalle_ingreso'] = "";
require 'class/cl_tipo_documento.php';
require_once 'class/cl_tienda.php';

$c_tienda = new cl_tienda();
if ($_SESSION['id_empresa'] == null || $_SESSION['id_empresa'] == "") {
    header("Location: login.php");
} else {
    $c_tienda->setId($_SESSION['id_empresa']);
    $c_tienda->validar_tienda();
}
$c_tido = new cl_tipo_documento();
?>
<!DOCTYPE html>
<html lang="es">

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Chimbote Store - Ingreso de Mercaderia</title>

        <!-- Common plugins -->
        <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="plugins/pace/pace.css" rel="stylesheet">
        <link href="plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="plugins/nano-scroll/nanoscroller.css">
        <link rel="stylesheet" href="plugins/metisMenu/metisMenu.min.css">
        <!--jquery steps-->
        <link rel="stylesheet" href="plugins/jquery-steps/jquery-steps.css">
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
                        <h4>Registrar Ingreso de Mercaderia</h4>
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
                <div class="col-sm-12">
                    <!-- START panel-->
                    <div class="panel panel-default">
                        <div class="panel-heading">Datos del Cliente</div>
                        <div class="panel-body">
                            <div id="example-basic">
                                <h3>Datos Generales</h3>
                                <section>
                                    <form class="form-horizontal" id="frm_ingresos" method="post" action="procesos/reg_ingreso.php">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Periodo</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control text-center" maxlength="6" name="input_periodo" id="input_periodo" value="<?php echo date('Y') . date('m') ?>" required="true"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Tipo Documento</label>
                                            <div class="col-md-3">
                                                <select class="form-control" name="select_documento" id="select_documento">
                                                    <?php
                                                    $a_tipo_documentos = $c_tido->ver_documentos();
                                                    foreach ($a_tipo_documentos as $value) {
                                                        ?>
                                                        <option value="<?php echo $value['id_tido'] ?>" ><?php echo $value['nombre'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label class="col-md-2 control-label">Fecha</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control text-center" name="input_fecha" id="input_fecha" value="<?php echo date('d/m/Y') ?>" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Serie</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control text-center" name="input_serie" id="input_serie" maxlength="5" required />
                                            </div>
                                            <label class="col-md-2 control-label">Numero</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control  text-center" name="input_numero" id="input_numero" maxlength="7"  required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Proveedor:</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control  text-center" name="input_ruc_proveedor" id="input_ruc_proveedor" maxlength="11"  required />
                                                <input type="hidden" id="input_id_proveedor" name="input_id_proveedor" >
                                            </div>
                                            <div class="col-md-2">
                                                <a href="reg_entidad.php" target="_blank" class="btn btn-default">Crear Proveedor</a>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Razon Social:</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="input_razon_proveedor" id="input_razon_proveedor" required  readonly="true"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Direccion Fiscal:</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="input_direccion" id="input_direccion" required  readonly="true"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Total:</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="input_total" id="input_total" value="0.00" readonly="true"/>
                                                <input type="hidden" name="input_hidden_total" id="input_hidden_total" />
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                <h3>Detalle Ingreso</h3>
                                <section>
                                    <fieldset>
                                        <legend class="pull-left width-full">Agregar Productos</legend>
                                        <!-- begin row -->
                                        <div class="row">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Buscar Productos</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" name="input_buscar_productos" id="input_buscar_productos"/>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="reg_productos.php" class="btn btn-success" name="btn_crear_producto" id="btn_crear_producto" target="_blank">Nuevo Producto</a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Producto</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control text-center" name="input_codigo_producto" id="input_codigo_producto" readonly="true"/>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="input_descripcion_producto" id="input_descripcion_producto" readonly="true"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Cantidad</label>
                                                    <div class="col-md-1">
                                                        <input type="text" class="form-control text-right" name="input_cantidad_producto" id="input_cantidad_producto" readonly="true"/>
                                                    </div>
                                                    <label class="col-md-2 control-label">Costo con IGV</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control text-right"  name="input_costo_producto" id="input_costo_producto" readonly="true"/>
                                                    </div>
                                                    <label class="col-md-2 control-label">Precio con IGV</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control text-right"  name="input_precio_producto" id="input_precio_producto" readonly="true"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="button" id="btn_add_producto" class="btn btn-primary" disabled="true" onclick="addProductos()">Agregar Productos</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end row -->
                                    </fieldset>
                                    <fieldset>
                                        <legend class="pull-left width-full">Ver Productos</legend>
                                        <!-- begin row -->
                                        <div class="row">
                                            <div class="col-xs-12" >
                                                <div class="table-responsive" >
                                                    <table id="tabla_materiales" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Item.</th>
                                                                <th>Codigo.</th>
                                                                <th>Descripcion</th>
                                                                <th>Cantidad</th>
                                                                <th>Und. Med.</th>
                                                                <th>Costo</th>
                                                                <th>Parcial</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </fieldset>
                                </section>
                                <!--                                <h3>Finalizar</h3>
                                                                <section>
                                                                    
                                                                </section>-->
                            </div>

                        </div>
                    </div>
                    <!-- END panel-->
                </div>
            </div>

            <!--end page content-->


            <?php include 'includes/footer.php'; ?>

        </section>
        <!--end main content-->



        <!--Common plugins-->
        <!--<script src="plugins/jquery/dist/jquery.min.js"></script>-->
        <script src="plugins/jquery/dist/jquery-2.2.4.min.js" type="text/javascript"></script>-->
        <!--<script src="https://code.jquery.com/jquery-3.1.0.js"></script>-->
        <script src="plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/pace/pace.min.js"></script>
        <script src="plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="plugins/metisMenu/metisMenu.min.js"></script>
        <script src="js/float-custom.js"></script>
        <!--jquery steps-->
        <script src="plugins/jquery-steps/jquery.steps.min.js"></script>
        <script src="plugins/jquery-validate/jquery.validate.min.js"></script>

        <script>
                                                            $("#example-basic").steps({
                                                                headerTag: "h3",
                                                                bodyTag: "section",
                                                                autoFocus: true,
                                                                onFinished: function (event, currentIndex)
                                                                {
                                                                    $('#frm_ingresos').submit();
                                                                    alert("Grabado Satisfactoriamente");
                                                                }

                                                            });
        </script>
        <script>
            function number_format(amount, decimals) {
                amount += ''; // por si pasan un numero en vez de un string
                amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

                decimals = decimals || 0; // por si la variable no fue fue pasada

                // si no es un numero o es igual a cero retorno el mismo cero
                if (isNaN(amount) || amount === 0)
                    return parseFloat(0).toFixed(decimals);
                // si es mayor o menor que cero retorno el valor formateado como numero
                amount = '' + amount.toFixed(decimals);
                var amount_parts = amount.split('.'),
                        regexp = /(\d+)(\d{3})/;
                while (regexp.test(amount_parts[0]))
                    amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
                return amount_parts.join('.');
            }

            function addProductos() {
                $.ajax({
                    data: {
                        input_codigo_producto: $('#input_codigo_producto').val(),
                        input_descripcion_producto: $('#input_descripcion_producto').val(),
                        input_costo_producto: $('#input_costo_producto').val(),
                        input_precio_producto: $('#input_precio_producto').val(),
                        input_cantidad_producto: $('#input_cantidad_producto').val()
                    },
                    url: 'ajax_post/detalle_ingreso.php',
                    type: 'GET',
                    //dataType: 'json',
                    beforeSend: function ()
                    {
                        //$('#body_detalle_pedido').html("");
                        $('table tbody').html("");
                    },
                    success: function (r)
                    {
                        //alert(r);
                        $('table tbody').append(r);
                        clean();
                        //$('#body_detalle_pedido').html(r);
                    },
                    error: function ()
                    {
                        alert('Ocurrio un error en el servidor ..');
                        $('table tbody').html("");
                        //$('#body_detalle_pedido').html("");
                    }
                });
            }

            function clean() {
                $('#input_codigo_producto').val('');
                $('#input_descripcion_producto').val('');
                $('#input_costo_producto').val('0.00');
                $('#input_precio_producto').val('0.00');
                $('#input_cantidad_producto').val('');
                $('#input_codigo_producto').val('');
                $('#btn_add_producto').prop("disabled", true);
                $('#btn_guardar_pedido').prop("disabled", false);
                $('#input_cantidad_producto').prop("readonly", true);
                $('#input_costo_producto').prop("readonly", true);
                $('#input_precio_producto').prop("readonly", true);
                $('#input_buscar_productos').focus();
            }

            $(function () {
                //autocomplete
                $("#input_ruc_proveedor").autocomplete({
                    source: "ajax_post/buscar_proveedores.php",
                    minLength: 2,
                    select: function (event, ui) {
                        event.preventDefault();
                        $('#input_id_proveedor').val(ui.item.id);
                        $('#input_ruc_proveedor').val(ui.item.ruc);
                        $('#input_razon_proveedor').val(ui.item.razon_social);
                        $('#input_direccion').val(ui.item.direccion);
                    }
                });
            });

            $("#input_buscar_productos").autocomplete({
                source: "ajax_post/buscar_producto.php",
                minLength: 2,
                select: function (event, ui) {
                    event.preventDefault();
                    console.log(ui.item.codigo);
                    $('#input_codigo_producto').val(ui.item.codigo);
                    $('#input_costo_producto').val(ui.item.costo);
                    $('#input_precio_producto').val(ui.item.precio);
                    $('#input_descripcion_producto').val(ui.item.descripcion);
                    $('#input_cantidad_producto').prop("readonly", false);
                    $('#input_costo_producto').prop("readonly", false);
                    $('#input_precio_producto').prop("readonly", false);
                    $('#btn_add_producto').prop("disabled", false);
                    $('#input_cantidad_producto').focus();
                    $('#input_buscar_productos').val("");
                }
            });

        </script>
    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>