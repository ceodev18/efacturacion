
<!DOCTYPE html>
<html lang="es">

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Drupee - Modificar Producto</title>

        <!-- Common plugins -->
        <link href="../public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../public/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../public/plugins/pace/pace.css" rel="stylesheet">
        <link href="../public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/plugins/nano-scroll/nanoscroller.css">
        <link rel="stylesheet" href="../public/plugins/metisMenu/metisMenu.min.css">
        <link href="../public/plugins/bootstrap-sweet-alerts/sweet-alert.css" rel="stylesheet">
s
        <link href="../public/images" rel="stylesheet">

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
                        <h4>Modificar Producto</h4>
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
                        <div class="panel-heading">Datos del Producto</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="procesos/mod_producto.php">
                                <div class="form-group">
                                    <div id ="resultado" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Codigo</label>
                                    <div class="col-lg-2">
                                        <input type="text" placeholder="Codigo" class="form-control text-center" id="input_codigo_producto" name="input_codigo_producto" value="<?php echo $c_producto->getCodigo() ?>" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Descripcion</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="Descripcion del Producto" class="form-control" id="input_descripcion_producto" name="input_descripcion_producto" value="<?php echo $c_producto->getDescripcion() ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Clasificacion</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" id="select_clasificacion" name="select_clasificacion">
                                                <option value="">OPCION</option>
                                        </select>
                                    </div>
                                    <label class="col-lg-4 control-label">Porcentaje</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control text-center" id="input_porcentaje_producto" readonly="true"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Precio Venta</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control text-right" id="input_precio_producto" name="input_precio_producto" onkeyup="calcular_precio_compra()" value="<?php echo $c_producto->getPrecio() ?>" />
                                    </div>
                                    <label class="col-lg-4 control-label">Precio Compra</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control text-right" id="input_costo_producto" name="input_costo_producto" value="<?php echo $c_producto->getCosto() ?>" readonly="true"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Caracteristicas</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="5" id="input_caracteristicas_producto" name="input_caracteristicas_producto"><?php echo $c_producto->getDescripcion() ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-sm btn-primary" id="btn_enviar_form">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END panel-->
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
        <script src="../public/plugins/bootstrap-sweet-alerts/sweet-alert.min.js"></script>
        <script>
                                            $(document).ready(function () {
                                                $("#select_clasificacion").trigger('change');
                                            });

                                            $("#select_clasificacion").change(function () {
                                                var codigo = $("#select_clasificacion").val();
                                                if (codigo !== '-')
                                                {
                                                    $.ajax({
                                                        //data: {id: cliente},
                                                        url: 'ajax_post/cargar_datos_clasificacion.php?codigo=' + codigo,
                                                        type: 'GET',
                                                        dataType: 'json',
                                                        beforeSend: function ()
                                                        {
                                                            $("#input_porcentaje_producto").val(0);
                                                        },
                                                        success: function (response)
                                                        {
                                                            var json = response;
                                                            //var json_producto = JSON.parse(json);
                                                            var porcentaje = json[0].porcentaje;
                                                            var precio = $("#input_precio_producto").val();
                                                            var costo = 0;
                                                            if (precio > 0) {
                                                                costo = (100 - porcentaje) * precio / 100;
                                                            } 
                                                            $("#input_porcentaje_producto").val(porcentaje);
                                                            $("#input_costo_producto").val(costo);
                                                            $("#input_precio_producto").focus();
                                                        },
                                                        error: function ()
                                                        {
                                                            alert('Ocurrio un error en el servidor ..');
                                                            $("#resultado").val('ERROR AL CARGAR DATOS');
                                                        }
                                                    });
                                                }
                                                else
                                                {
                                                    $("#input_porcentaje_producto").val(0);
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

            function enviar_codigo_producto() {
                var codigo = $("#input_codigo_producto").val();
                if (codigo !== "") {
                    var parametros = {
                        "codigo": codigo
                    };
                    $.ajax({
                        data: parametros,
                        url: 'ajax_post/cargar_datos_producto.php',
                        type: 'post',
                        beforeSend: function () {
                            $("#resultado").html("Validando Codigo, espere por favor...");
                        },
                        success: function (response) {
                            $("#resultado").html("");
                            var json = response;
                            var json_producto = JSON.parse(json);
                            if (json_producto[0].existe) {
                                swal("Alerta!",
                                        "El codigo " + json_producto[0].codigo + " ya esta registrado.",
                                        "warning");
                            } else {
                                $("#btn_validar_producto").prop("disabled", true);
                                $("#input_codigo_producto").prop("readonly", true);
                                $("#input_descripcion_producto").prop("readonly", false);
                                $("#select_clasificacion").prop("disabled", false);
                                $("#btn_enviar_form").prop("disabled", false);
                                $("#input_caracteristicas_producto").prop("readonly", false);
                                $("#input_precio_producto").prop("readonly", false);
                                $("#input_descripcion_producto").focus();
                            }
                        }
                    });
                } else {
                    alert("INGRESE CODIGO DE PRODUCTO");
                }
            }

            function calcular_precio_compra() {
                var porcentaje = $("#input_porcentaje_producto").val();
                var precio_venta = $("#input_precio_producto").val();
                var precio_compra = (100 - porcentaje) * precio_venta / 100;

                $("#input_costo_producto").val(number_format(precio_compra, 3));
                //  $("#hidden_costo").val(precio_compra);
            }
        </script>
    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>