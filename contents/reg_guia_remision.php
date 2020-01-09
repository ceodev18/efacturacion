<?php
session_start();

if (!isset($_SESSION['id_empresa'])) {
    header("Location: ../login.php");
}

$_SESSION['ventaproductos'] = null;

require '../models/DocumentoEmpresa.php';

$c_tido = new DocumentoEmpresa();

$c_tido->setIdEmpresa($_SESSION['id_empresa']);

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
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
    <link href="../public/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="../public/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
    <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/plugins/pace/pace.css" rel="stylesheet">
    <link href="../public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="../public/plugins/toast/jquery.toast.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/plugins/nano-scroll/nanoscroller.css">
    <link rel="stylesheet" href="../public/plugins/metisMenu/metisMenu.min.css">

    <link href="../public/plugins/bootstrap-sweet-alerts/sweet-alert.css" rel="stylesheet">


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
                <h4>Registrar Guia de Remision</h4>
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
    //if ($existe_caja) {
    ?>

    <div class="row">
        <div id="resultado" class="col-md-12"></div>

        <div class="col-md-4">
            <div class="widget padding-0 white-bg">
                <div class="padding-20 ">
                    <form role="form" class="form-horizontal">
                        <h5>Datos de la Fac - Bol</h5>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Doc.</label>
                            <div class="col-md-8">
                                <select class="form-control" name="select_documento" id="select_documento" onchange="obtenerDatos()">
                                    <?php
                                    $a_tido = $c_tido->verFilas("1,2,6");
                                    foreach ($a_tido as $fila) {
                                        ?>
                                        <option value="<?php echo $fila['id_tido'] ?>"><?php echo $fila['nombre'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Ser | Num</label>
                            <div class="col-lg-4">
                                <input type="text" name="input_serie" id="input_serie" class="form-control text-center" readonly>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="input_numero" id="input_numero" class="form-control text-center" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-center">
                            <button class="btn btn-info"><i class="fa fa-search"></i> Comprobar Documento Venta</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Total</label>
                            <div class="col-lg-6">
                                <input type="text" value="100.00"
                                       disabled>
                            </div>
                        </div>
                        <hr>
                        <h5>Datos de la Guia</h5>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Doc.</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="GUIA DE REMISION" readonly name="input_doc_envio">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Ser | Num</label>
                            <div class="col-lg-4">
                                <input type="text" name="input_serie" id="input_serie" class="form-control text-center" readonly>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="input_numero" id="input_numero" class="form-control text-center" readonly>
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
                            <label class="col-md-4 control-label">Motivo.</label>
                            <div class="col-md-8">
                                <select class="form-control" name="select_motivo" id="select_motivo">
                                    <option value="1">VENTA UX</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Peso total</label>
                            <div class="col-lg-6">
                                <input type="text" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Nro Bultos</label>
                            <div class="col-lg-6">
                                <input type="text" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Datos del Destino</h5>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Destinatario</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       id="input_buscar_productos" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Dir. Llegada</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       id="input_buscar_productos">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Dir. Llegada</label>
                            <div class="col-lg-3">
                                <select class="form-control">
                                    <option>LIMA</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control">
                                    <option>LIMA</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control">
                                    <option>LIMA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Transportista</label>
                            <div class="col-lg-3">
                                <select class="form-control">
                                    <option>Propio</option>
                                    <option>Externo</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <input type="text" id="input_cantidad_producto"
                                       name="input_cantidad_producto" class="form-control text-center"
                                       readonly="true">
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-info"> Comprobar DOC</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Razon Social Trans.</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Descripcion" id="input_descripcion_producto"
                                       name="input_descripcion_producto" class="form-control" readonly="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Vehiculo</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control"
                                       id="input_buscar_productos">
                            </div>
                                                   </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Chofer</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control"
                                       id="input_buscar_productos">
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control"
                                       id="input_buscar_productos">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Dir. Llegada</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       id="input_buscar_productos">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-success"><i class="fa fa-save"></i> Generar Guia</button>
                </div>
            </div>

        </div>

        <div class="col-md-12">
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
    </div>

    <!--end page content-->


    <?php include '../fixed/footer.php'; ?>

</section>
<!--end main content-->

<!--Common plugins-->
<script src="../public/plugins/jquery/dist/jquery-2.2.4.min.js" type="text/javascript"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.0.js"></script>-->
<script src="../public/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../public/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/plugins/pace/pace.min.js"></script>
<script src="../public/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="../public/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../public/plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
<script src="../public/plugins/metisMenu/metisMenu.min.js"></script>
<script src="../public/js/float-custom.js"></script>
<script src="../public/js/validar-documento-cliente.js"></script>
<script src="../public/js/funciones_basicas.js"></script>
<script src="../public/js/ventas.functions.js"></script>
<script src="../public/js/documento_empresa.js"></script>
<script src="../public/plugins/toast/jquery.toast.min.js"></script>

<script src="../public/plugins/bootstrap-sweet-alerts/sweet-alert.min.js"></script>


<script>
    $(document).ready(function () {
        $("#select_documento").trigger('change');
    });

    $(function () {

        $("#input_buscar_productos").autocomplete({
            source: "../controller/json/cargar_productos.php",
            minLength: 2,
            select: function (event, ui) {
                event.preventDefault();
                $('#input_descripcion_producto').val(ui.item.codigo + " | " + ui.item.descripcion);
                $('#input_precio_producto').val(ui.item.precio);
                $('#hidden_codigo_producto').val(ui.item.codigo);
                $('#input_costo_producto').val(ui.item.costo);
                $('#input_cantidad_producto').prop("readonly", false);
                $('#input_precio_producto').prop("readonly", false);
                $('#btn_add_producto').prop("disabled", false);
                $('#input_cantidad_producto').focus();
                $('#input_buscar_productos').val("");
            }
        });

        $("#input_datos_cliente").autocomplete({
            source: "../controller/json/cargar_clientes.php",
            minLength: 2,
            select: function (event, ui) {
                event.preventDefault();
                $('#input_datos_cliente').val(ui.item.datos);
                $('#input_documento_cliente').val(ui.item.documento);
                $('#input_datos_cliente').focus();
            }
        });

    });

    function soloNumeros(e) {

        var key = window.Event ? e.which : e.keyCode

        return (key >= 48 && key <= 57)

    }
</script>

</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>