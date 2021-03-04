<?php
require '../models/Cliente.php';
$cliente = new Cliente();
$cliente->setIdCliente(filter_input(INPUT_GET, 'id'));

if (!$cliente->getIdCliente()) {
    header("Location: ver_clientes.php");
} else {
    $cliente->setIdEmpresa($_SESSION['id_empresa']);
    $cliente->obtenerDatos();
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
    <link href="../public/images/favicon.png" rel="icon" />
    <link href="../public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
    <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/plugins/pace/pace.css" rel="stylesheet">
    <link href="../public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/plugins/nano-scroll/nanoscroller.css">
    <link rel="stylesheet" href="../public/plugins/metisMenu/metisMenu.min.css">
    <link href="../public/plugins/toast/jquery.toast.min.css" rel="stylesheet">
    <!--template css-->
    <link href="../public/css/style.css" rel="stylesheet">
    <link href="../public/images" rel="stylesheet">
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
                        <form class="form-horizontal" method="post" action="../controller/reg_cliente.php">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Codigo</label>
                                <div class="col-lg-3  ">
                                    <input type="text" class="form-control" placeholder="Codigo" maxlength="11" required name="inputcodigo" value="<?php echo $cliente->getIdCliente()?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nro. de Documento</label>
                                <div class="col-lg-4  input-group" style="padding: 0 16px;">
                                    <input type="text" placeholder="Documentos" id="input_documento_cliente" name="input_documento_cliente" class="form-control" value="<?php echo $cliente->getDocumento()?>" maxlength="11" required>
                                    <span class="input-group-btn">
                                        <button id="btn_comprueba" class="btn btn-default" type="button" onclick="validarDocumento()">Comprobar</button>
                                    </span>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nombre Cliente</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Nombre cliente" name="input_datos_cliente" id="input_datos_cliente" class="form-control" required="true" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Direccion</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Direccion" name="input_direccion_cliente" id="input_direccion_cliente" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-sm btn-primary" id="btn_guardar">Guardar</button>
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
    <script src="../public/js/validar-documento-cliente.js" ></script>
    <script src="../public/plugins/toast/jquery.toast.min.js"></script>
</body>

<!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->

</html>