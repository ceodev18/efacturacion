<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login | Chimbote Store</title>

    <!-- Common plugins -->
    <link href="public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
    <link href="public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/plugins/pace/pace.css" rel="stylesheet">
    <link href="public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/plugins/nano-scroll/nanoscroller.css">
    <link rel="stylesheet" href="public/plugins/metisMenu/metisMenu.min.css">
    <!--for checkbox-->
    <link href="public/plugins/iCheck/blue.css" rel="stylesheet">
    <!--template css-->
    <link href="public/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        html, body {
            height: 100%;
        }
    </style>
</head>
<body>

<div class="misc-wrapper">
    <div class="misc-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="misc-header text-center">
                        <img src="public/images/store_logo_all.png" alt="Chimbote Store" height="45px">
                    </div>
                    <div class="misc-box">
                        <p class="text-center text-uppercase pad-v">ingrese para continuar.</p>
                        <form role="form" action="controller/login.php" method="POST">
                            <div id="error">
                                <?php
                                if (isset($_GET['error'])) {
                                    $text_error = filter_input(INPUT_GET, 'error');
                                    ?>
                                    <div class="alert alert-danger"><strong> Error! </strong> <?php echo $text_error; ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="exampleuser1">Empresa</label>
                                <div class="group-icon">
                                    <input id="ruc_empresa" name="ruc_empresa" type="text" placeholder="RUC "
                                           class="form-control" required="">
                                    <span class="icon-home text-muted icon-input"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="exampleuser1">Usuario</label>
                                <div class="group-icon">
                                    <input id="usuario" name="usuario" type="text" placeholder="Usuario"
                                           class="form-control" required="">
                                    <span class="icon-user text-muted icon-input"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="exampleInputPassword1">Contraseña</label>
                                <div class="group-icon">
                                    <input id="password" name="password" type="password" placeholder="Contraseña"
                                           class="form-control">
                                    <span class="icon-lock text-muted icon-input"></span>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
                                </div>
                            </div>
                            <hr>
                            <p class=" text-center">deseas registrarte?</p>
                            <a href="contents/registrar.php" class="btn btn-block btn-default">Registrar ahora</a>
                        </form>
                    </div>
                    <div class="text-center misc-footer">
                        <span>&copy; Copyright <?php echo date('Y') ?>. Chimbote Store <br>development by Luna Systems Peru</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Common plugins-->
<script src="public/plugins/jquery/dist/jquery.min.js"></script>
<script src="public/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="public/plugins/pace/pace.min.js"></script>
<script src="public/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="public/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="public/plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
<script src="public/plugins/metisMenu/metisMenu.min.js"></script>
<script src="public/js/float-custom.js"></script>
</body>
</html>
