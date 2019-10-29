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
    <link href="../public/images/favicon.png" rel="icon" />
    <link href="../public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
    <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/plugins/pace/pace.css" rel="stylesheet">
    <link href="../public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/plugins/nano-scroll/nanoscroller.css">
    <link rel="stylesheet" href="../public/plugins/metisMenu/metisMenu.min.css">
    <!--template css-->
    <link href="../public/css/style.css" rel="stylesheet">
    <link href="../public/images" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <script>
        function enviar_dni() {
            var parametros = {
                "dni": $("#input_ruc").val()
            };
            console.log("parametros", parametros);
       
        if ($("#input_ruc").val().length === 8) {
            $.ajax({
                data: parametros,
                url: '../controller/json/validar_ruc.php',
                type: 'post',
                beforeSend: function() {
                    $("#error_dni").html("<div class=\"alert alert-success\"><strong> Espere! </strong> Estamos procesando su peticion.</div>");
                },
                success: function(response) {
                    $("#error_dni").html("");
                    var json = response;
                    console.log(json);
                    var json_dni = JSON.parse(json);
                    var success = json_dni.success;
                    if (success === false) {
                        $("#error_dni").html("<div class=\"alert alert-danger\"><strong> Error! </strong> El numero de DNI es incorrecto.</div>");
                    }

                    if (success === true) {
                        $("#input_dni").prop('readonly', true);
                        $("#btn_comprueba_dni").prop('disabled', true);
                        $("#btn_validar_datos").prop('disabled', false);
                        $("#input_apellido_paterno").focus();
                        $("#input_nombres").val(json_dni.result.Nombres);
                        $("#hidden_apellidos").val(json_dni.result.apellidos);
                    }
                },
                error: function() {
                    $("#error_dni").html("<div class=\"alert alert-warning\"><strong> Error! </strong> Ocurrio un error al procesar.</div>");
                    $("#input_dni").prop('readonly', false);
                    $("#input_nombres").val("");
                    $("#hidden_apellidos").val("");
                    $("#input_dni").focus();
                }
            });
        } else {
            $("#error_dni").html("<div class=\"alert alert-danger\"><strong> Error! </strong> Numero de DNI incompleto.</div>");
        }
    }    
    </script>

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
                    <h4>Registrar Cliente</h4>
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
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Codigo</label>
                                <div class="col-lg-3  ">
                                    <!--input type="text" placeholder="ingrese codigo" class="form-control text-center" readonly="true"-->

                                    <!--div class="input-group"-->
                                    <input disabled type="text" class="form-control" placeholder="Codigo" maxlength="11" required>

                                    <!--/div-->
                                </div>
                            </div>
                            <!--                                <div class="form-group">
                                    <label class="col-lg-2 control-label">DNI / RUC</label>
                                    <div class="col-lg-2">
                                        <input type="text" placeholder="Ingrese digitos" name="input_documento" class="form-control text-center">
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-primary"> Validar Documento</button>
                                    </div>
                                </div>-->
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nro. de Documento</label>
                                <div class="col-lg-4  input-group" style="padding: 0 16px;">
                                    <input type="text" placeholder="Documentos" id="input_ruc" name="input_ruc" class="form-control">
                                    <span class="input-group-btn"><button id="btn_comprueba_ruc" class="btn btn-default" type="button" onclick="enviar_dni()">Comprobar</button></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nombre Cliente</label>
                                <div class="col-lg-9">
                                    <input disabled type="text" placeholder="Nombre cliente" name="input_nombres" id="input_nombres" class="form-control" required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Direccion</label>
                                <div class="col-lg-9">
                                    <input disabled type="text" placeholder="Direccion" name="input_direccion" class="form-control">
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                    <label class="col-lg-2 control-label">Ruc de empresa</label>
                                    <div class="col-lg-10">
                                        <?php
                                        /*buscar el id de la empresa para mostrarlo*/
                                        // session_start();
                                        ?>
                                        <input disabled type="text" placeholder="Ruc de Empresa" name="input_ruc_empresa" class="form-control" value="<?php echo $_SESSION['id_empresa']; ?>">
                                    </div>
                                </div> -->


                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END panel-->
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
    <!-- <script src="../public/js/validar_usuarios.js" ></script> -->
</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->

</html>