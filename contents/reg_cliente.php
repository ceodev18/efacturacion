
<!DOCTYPE html>
<html lang="es">

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Chimbote Store - Registro de Clientes</title>

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
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Codigo</label>
                                    <div class="col-lg-2">
                                        <input type="text" placeholder="00x" class="form-control text-center" readonly="true">
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
                                    <label class="col-lg-2 control-label">Nombre Cliente</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="Nombre cliente"  name="input_nombre" class="form-control" required="true">
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
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Telefono" name="input_telefono" class="form-control">
                                    </div>
                                </div>
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
    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>