<?php
session_start();
require_once 'class/cl_tienda.php';

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
        <title>Chimbote Store - Registro de Proveedores</title>

        <!-- Common plugins -->
        <link href="../public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../public/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../public/plugins/pace/pace.css" rel="stylesheet">
        <link href="../public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/plugins/nano-scroll/nanoscroller.css">
        <link rel="stylesheet" href="../public/plugins/metisMenu/metisMenu.min.css">
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
                        <h4>Registrar Proveedor - Empresa</h4>
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
                        <div class="panel-heading">Datos del Proveedor</div>
                        <div class="panel-body">
                            <form class="form-horizontal" id="frm_detalle" method="post" action="../controller/reg_entidad.php">
                                <div class="col-md-12">
                                    <div class="panel panel-inverse">
                                        <div class="panel-body">
                                            <div id="error_ruc"></div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="input_ruc">RUC</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control text-center" id="input_ruc" name="input_ruc"/>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" onclick="enviar_ruc()"  class="btn btn-info">Validar RUC</button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="input_razon">Razon Social</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="input_razon_social" name="input_razon_social" readonly="true" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="input_comercial">Nombre Comercial</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="input_comercial" name="input_comercial" readonly="true" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="input_direcion" >Direccion fiscal</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="input_direccion" name="input_direccion" readonly="true" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="input_condicion">Condicion</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" id="input_condicion" name="input_condicion" readonly="true" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="input_estado">Estado</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" id="input_estado" name="input_estado" readonly="true" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="panel-footer text-right" >
                                            <button type="submit" class="btn btn-success">Guardar </button>
                                        </div>
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

        <script>
        function enviar_ruc() {
            var parametros = {
                "ruc": $("#input_ruc").val()
            };

            if ($("#input_ruc").val().length === 11) {
                $.ajax({
                    data: parametros,
                    url: 'ajax_post/validar_ruc.php',
                    type: 'post',
                    beforeSend: function () {
                        $("#error_ruc").html("<div class=\"alert alert-success\"><strong> Espere! </strong> Estamos procesando su peticion.</div>");
                    },
                    success: function (response) {
                        $("#error_ruc").html("");
                        var json = response;
                        console.log(json);
                        var json_ruc = JSON.parse(json);
                        var success = json_ruc.success;
                        if (success === false) {
                            $("#error_ruc").html("<div class=\"alert alert-danger\"><strong> Error! </strong> El numero de RUC es incorrecto.</div>");
                        }

                        if (success === "existe") {
                            $("#error_ruc").html("<div class=\"alert alert-warning\"><strong> Alerta! </strong> Esta empresa ya esta registrada.</div>");
                            $("#input_ruc").prop('readonly', true);
                            $("#btn_comprueba_ruc").prop('disabled', true);
                            $("#btn_comprueba_dni").prop('disabled', true);
                            $("#input_razon_social").val(json_ruc.entity.nombre_o_razon_social);
                            $("#input_estado").val(json_ruc.entity.estado_del_contribuyente);
                            $("#input_condicion").val(json_ruc.entity.condicion_de_domicilio);
                        }

                        if (success === true) {
                            var estado = json_ruc.entity.estado_del_contribuyente;
                            var condicion = json_ruc.entity.condicion_de_domicilio;

                            if (condicion === "NO HABIDO" || estado === "BAJA DE OFICIO" || estado === "BAJA PROV. POR OFICI") {
                                $("#error_ruc").html("<div class=\"alert alert-warning\"><strong> Alerta! </strong> NO PODEMOS REGISTRAR A ESTA EMPRESA.</div>");
                                $("#input_razon_social").val(json_ruc.entity.nombre_o_razon_social);
                                $("#input_estado").val(estado);
                                $("#input_condicion").val(condicion);
                                $("#input_ruc").prop('readonly', true);
                                $("#input_dni").prop('readonly', true);
                                $("#btn_comprueba_ruc").prop('disabled', true);
                                $("#btn_comprueba_dni").prop('disabled', true);
                            } else {
                                $("#input_ruc").prop('readonly', true);
                                $("#btn_comprueba_ruc").prop('disabled', true);
                                $("#input_comercial").prop('readonly', false);
                                $("#input_comercial").focus();
                                $("#input_razon_social").val(json_ruc.entity.nombre_o_razon_social);
                                $("#input_direccion").val(json_ruc.entity.direccion_completa);
                                $("#input_estado").val(estado);
                                $("#input_condicion").val(condicion);
                            }
                        }
                    },
                    error: function () {
                        $("#error_ruc").html("<div class=\"alert alert-warning\"><strong> Error! </strong> Ocurrio un error al procesar.</div>");
                        $("#input_ruc").prop('readonly', false);
                        $("#input_razon_social").val("");
                        $("#input_estado").val("");
                        $("#input_condicion").val("");
                        $("#input_ruc").focus();
                    }
                });
            } else {
                $("#error_ruc").html("<div class=\"alert alert-danger\"><strong> Error! </strong> Numero de RUC incompleto.</div>");
            }
        }
        </script>
    </body>

</html>