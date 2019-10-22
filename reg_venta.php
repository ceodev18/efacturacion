<?php
session_start();
$_SESSION['detalle_venta'] = "";

require_once 'class/cl_tienda.php';
require 'class/cl_documento_empresa.php';
require 'class/cl_caja_diaria.php';

$c_tido = new cl_documento_empresa();

$c_tienda = new cl_tienda();
if ($_SESSION['id_empresa'] == null || $_SESSION['id_empresa'] == "") {
    header("Location: login.php");
} else {
    $c_tienda->setId($_SESSION['id_empresa']);
    $c_tienda->validar_tienda();
}

$c_caja = new cl_caja_diaria();
$c_caja->setId_tienda($_SESSION['id_empresa']);
$c_caja->setFecha(date('Y-m-d'));

$existe_caja = $c_caja->obtener_datos();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Chimbote Store - Registro de Ventas</title>

    <!-- Common plugins -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
    <link href="plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="plugins/pace/pace.css" rel="stylesheet">
    <link href="plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/nano-scroll/nanoscroller.css">
    <link rel="stylesheet" href="plugins/metisMenu/metisMenu.min.css">

    <link href="plugins/bootstrap-sweet-alerts/sweet-alert.css" rel="stylesheet">


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
                <h4>Registrar Venta</h4>
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
    <?php
    if ($existe_caja) {
        ?>

        <div class="row">
            <div id="resultado" class="col-md-12"></div>


            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>Agregar Productos</h5>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Buscar</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="Consultar Productos" class="form-control"
                                           id="input_buscar_productos">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Descripcion</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="Descripcion" id="input_descripcion_producto"
                                           name="input_descripcion_producto" class="form-control" readonly="true">
                                    <input type="hidden" name="hidden_codigo_producto" id="hidden_codigo_producto">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Cantidad</label>
                                <div class="col-lg-2">
                                    <input type="text" value="1" id="input_cantidad_producto"
                                           name="input_cantidad_producto" class="form-control text-center"
                                           readonly="true">
                                </div>
                                <label class="col-lg-1 control-label">Actual</label>
                                <div class="col-lg-2">
                                    <input type="text" value="1" id="input_cactual_producto"
                                           name="input_cactual_producto" class="form-control text-center"
                                           readonly="true">
                                </div>
                                <label class="col-lg-1 control-label">Precio</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control text-right" id="input_precio_producto"
                                           name="input_precio_producto" value="0.00" readonly="true">
                                </div>
                                <div class="col-lg-1">
                                    <input type="hidden" name="input_costo_producto" id="input_costo_producto"/>
                                    <button type="button" class="btn btn-success" disabled="true" id="btn_add_producto"
                                            onclick="addProducto()">Agregar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default collapsed ">
                    <div class="panel-heading">
                        <h5>Detalle Venta</h5>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>P. Unit.</th>
                                <th>Parcial</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div id="body_detalle_pedido">
                            </div>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="widget padding-0 white-bg">
                    <div class="padding-20 text-center">
                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Doc.</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="select_documento" id="select_documento" disabled>
                                        <option value="2">NOTA DE VENTA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Fecha</label>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="dd/mm/aaaa" name="input_fecha"
                                           class="form-control text-center" value="<?php echo date("Y-m-d"); ?>"
                                           disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Cliente</label>
                                <div class="col-lg-8">
                                    <!--<button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal_reg_cliente">Crear Cliente</button>-->
                                    <a href="reg_cliente.php" target="_blank" class="btn btn-success">Crear Cliente</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="text" placeholder="buscar cliente" class="form-control"
                                           id="input_cliente" name="input_cliente">
                                    <input type="hidden" id="input_id_cliente" name="input_id_cliente" value="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Deuda</label>
                                <div class="col-lg-6">
                                    <input type="text" value="0.00" class="form-control text-right"
                                           id="input_deuda_cliente" readonly="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="hidden" id="input_total_pedido" name="input_total_pedido">
                                    <button type="button" data-toggle="modal" data-target="#cobro_venta"
                                            class="btn btn-lg btn-primary" id="btn_finalizar_pedido" disabled>Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="bg-primary pv-15 text-center " style="height: 90px">
                        <h1 class="mv-0 font-400" id="lbl_suma_pedido">S/ 0.00</h1>
                        <div class="text-uppercase">Suma Pedido</div>
                    </div>
                </div><!--end widget-->
                <!--                    <div class=" pull-right">
                                        <a class="btn btn-lg btn-primary">Guardar</a>
                                    </div>-->
            </div>
        </div>

        <?php
    } else {
        require 'modals/m_sin_caja.php';
    } ?>

    <!--end page content-->


    <?php include 'includes/footer.php'; ?>

</section>
<!--end main content-->


<div class="modal fade" id="cobro_venta" tabindex="-1" role="dialog" aria-labelledby="cobro_venta">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"
                                                                                                   class="fa fa-times-circle"></span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Finalizar Venta</h3>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <form role="form" class="form-horizontal">
                        <div class="bg-primary pv-15 text-center " style="height: 90px">
                            <h1 class="mv-0 font-400" id="lbl_suma_pedido_pago">S/ 0.00</h1>
                            <div class="text-uppercase">Suma Pedido</div>
                        </div>
                        <br>
                        <!--                                <div class="form-group">
                                                            <label class="col-sm-3 control-label">Tipo de venta</label>
                                                            <div class="col-sm-9">
                                                                <div class="col-sm-9">
                                                                    <div class="i-checks">
                                                                        <label> <input type="radio" checked="" value="1" id="cbx_contado" name="cbx_tipo_pago"> <i></i>Contado</label>
                                                                    </div>
                                                                    <div class="i-checks">
                                                                        <label> <input type="radio" value="2" id="cbx_credito_inicial" name="cbx_tipo_pago"> <i></i>Credito</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Pago:</label>
                            <div class="col-lg-6">
                                <input type="text" value="0.00" class="form-control text-right" id="input_pago_cliente"
                                       onkeyup="dar_vuelto()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Vuelto:</label>
                            <div class="col-lg-6">
                                <input type="text" value="0.00" class="form-control text-right"
                                       id="input_vuelto_cliente" readonly="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Deuda:</label>
                            <div class="col-lg-6">
                                <input type="text" value="0.00" class="form-control text-right" id="input_falta_cliente"
                                       readonly="true">
                            </div>
                        </div>

                        <div class="clearfix">
                            <button type="button" class="btn btn-lg btn-primary" id="btn_guardar_pedido"
                                    onclick="enviar_datos()">Finalizar Venta
                            </button>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_reg_cliente" tabindex="-1" role="dialog" aria-labelledby="modal_reg_cliente">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"
                                                                                                   class="fa fa-times-circle"></span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Registrar Nuevo cliente</h3>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <form role="form" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Nombre Cliente" name="input_nombre" class="form-control"
                                       required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Direccion</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Direccion" name="input_direccion" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" placeholder="Email" name="input_email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Telefono</label>
                            <div class="col-lg-4">
                                <input type="text" placeholder="Telefono" name="input_telefono" class="form-control">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn_guardar_cliente"
                                onclick="enviar_cliente()">Guardar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!--Common plugins-->
<script src="plugins/jquery/dist/jquery-2.2.4.min.js" type="text/javascript"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.0.js"></script>-->
<script src="plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/pace/pace.min.js"></script>
<script src="plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
<script src="plugins/metisMenu/metisMenu.min.js"></script>
<script src="js/float-custom.js"></script>

<script src="plugins/bootstrap-sweet-alerts/sweet-alert.min.js"></script>


<script>
    $(function () {

        //autocomplete
        $("#input_cliente").autocomplete({
            source: "ajax_post/buscar_cliente.php",
            minLength: 2,
            select: function (event, ui) {
                event.preventDefault();
                var deuda = ui.item.total_venta - ui.item.total_pagado;
                if (deuda > 0) {
                    swal("ESTE CLIENTE TIENE UNA DEUDA!");
                }
                $('#input_cliente').val(ui.item.datos);
                $('#input_id_cliente').val(ui.item.id);
                $('#input_deuda_cliente').val(deuda);
                $('#input_buscar_productos').prop("readonly", false);
                $('#input_buscar_productos').focus();
            }
        });

        $("#input_buscar_productos").autocomplete({
            source: "ajax_post/buscar_producto.php",
            minLength: 2,
            select: function (event, ui) {
                event.preventDefault();
                $('#input_cactual_producto').val(ui.item.cantidad);
                $('#input_descripcion_producto').val(ui.item.codigo + " | " + ui.item.descripcion);
                $('#input_precio_producto').val(ui.item.precio_descontado);
                $('#input_costo_producto').val(ui.item.costo);
                $('#hidden_codigo_producto').val(ui.item.codigo);
                $('#input_cantidad_producto').prop("readonly", false);
                $('#input_precio_producto').prop("readonly", false);
                $('#btn_add_producto').prop("disabled", false);
                $('#input_cantidad_producto').focus();
                $('#input_buscar_productos').val("");
            }
        });

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

    function dar_vuelto() {
        var total = $('#input_total_pedido').val();
        var entregado = $('#input_pago_cliente').val();
        var vuelto = entregado - total;
        var faltante = total - entregado;

        if (vuelto > 0) {
            $('#input_vuelto_cliente').val(number_format(vuelto, 2));
        } else {
            $('#input_vuelto_cliente').val(0.00);
        }

        if (faltante > 0) {
            $('#input_falta_cliente').val(number_format(faltante, 2));
        } else {
            $('#input_falta_cliente').val(0.00);
        }
    }

    function validar_efectivo() {
        var total = $('#input_total_pedido').val();
        var entregado = $('#input_pago_cliente').val();
        var cliente = $('#input_id_cliente').val();
        var error = false;

        if (entregado < total) {
            if (cliente === '0') {
                error = true;
                swal("NO PODEMOS CONTINUAR, SELECCIONE UN CLIENTE PRIMERO!");
                //alert('NO PODEMOS CONTINUAR, SELECCIONE UN CLIENTE PRIMERO');
            }
        }

//                if (!error) {
//                    $('#btn_guardar_pedido').prop("disabled", false);
//                } else {
//                    $('#btn_guardar_pedido').prop("disabled", true);
//                }
        return error;
    }

    function addProducto() {
        //                var parcial_venta = $('#input_cantidad_producto').val() * $('#input_precio_producto').val();
        //                suma_pedido = suma_pedido + parcial_venta;
        //                $('#input_total_pedido').val(suma_pedido);
        //                $('#lbl_suma_pedido').text("S/ " + number_format(suma_pedido, 2));
        if (validar_detalle()) {
            enviar_detalle_pedido();
            clean();
        }
    }

    function validar_detalle() {
        var permitir = false;
        var cantidad = $('#input_cantidad_producto').val();
        if (cantidad === "") {
            swal("NO HA INGRESADO CANTIDAD DEL PRODUCTO A VENDER!");
            //alert("NO HA INGRESADO CANTIDAD DEL PRODUCTO A VENDER");
            $('#input_cantidad_producto').focus();
        } else {
            permitir = true;
        }
        return permitir;
    }

    function enviar_detalle_pedido() {
        $.ajax({
            data: {
                input_codigo_producto: $('#hidden_codigo_producto').val(),
                input_descripcion_producto: $('#input_descripcion_producto').val(),
                input_precio_producto: $('#input_precio_producto').val(),
                input_costo_producto: $('#input_costo_producto').val(),
                input_cantidad_producto: $('#input_cantidad_producto').val()
            },
            url: 'ajax_post/detalle_venta.php',
            type: 'GET',
            //dataType: 'json',
            beforeSend: function () {
                //$('#body_detalle_pedido').html("");
                $('table tbody').html("");
            },
            success: function (r) {
                //alert(r);
                $('table tbody').append(r);
                //$('#body_detalle_pedido').html(r);
            },
            error: function () {
                alert('Ocurrio un error en el servidor ..');
                $('table tbody').html("");
                //$('#body_detalle_pedido').html("");
            }
        });
    }

    function DelProducto(item) {

        $.ajax({
            data: {
                item: item
            },
            url: 'ajax_post/eliminar_detalle_venta.php',
            type: 'POST',
            //dataType: 'json',
            beforeSend: function () {
                //$('#body_detalle_pedido').html("");
                $('table tbody').html("");
            },
            success: function (r) {
                //alert(r);
                $('table tbody').append(r);
                //$('#body_detalle_pedido').html(r);
            },
            error: function () {
                alert('Ocurrio un error en el servidor ..');
                $('table tbody').html("");
                //$('#body_detalle_pedido').html("");
            }
        });
    }

    function clean() {
        $('#input_cactual_producto').val('');
        $('#input_descripcion_producto').val('');
        $('#input_precio_producto').val('0.00');
        $('#input_costo_producto').val('0.00');
        $('#input_cantidad_producto').val('1');
        $('#btn_add_producto').prop("disabled", true);
        $('#btn_finalizar_pedido').prop("disabled", false);
        $('#input_cantidad_producto').prop("readonly", true);
        $('#input_precio_producto').prop("readonly", true);
        $('#input_buscar_productos').focus();
    }

    function enviar_datos() {
        if (!validar_efectivo()) {
            var parametros = {
                id_cliente: $('#input_id_cliente').val(),
                total_pedido: $('#input_total_pedido').val(),
                total_pago: $('#input_pago_cliente').val(),
                tipo_venta: $('input:radio[name=cbx_tipo_pago]:checked').val()
            };
            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: 'procesos/reg_venta.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function () {

                    $("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resultado").html(response);
                    $('#cobro_venta').modal('toggle');
                    swal({
                        title: "Venta Registrada",
                        text: "El documento de venta se registro con exito!",
                        type: "success",
                        showCancelButton: false,
                        //cancelButtonClass: 'btn-secondary ',
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Nueva Venta",
                        //cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false,
                        //closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            window.location.href = "reg_venta.php";
                        }
                    });
                }
            });
        }
    }

</script>


</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>