
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Registrar Tienda | Chimbote Store</title>

        <!-- Common plugins -->
        <link href="../public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../public/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../public/plugins/pace/pace.css" rel="stylesheet">
        <link href="../public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/plugins/nano-scroll/nanoscroller.css">
        <link rel="stylesheet" href="../public/plugins/metisMenu/metisMenu.min.css">
        <!--for checkbox-->
        <link href="../public/plugins/iCheck/blue.css" rel="stylesheet">
        <!--template css-->
        <link href="../public/css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            html,body{
                height: 100%;
            }
        </style>
    </head>
    <body>

        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                            <div class="misc-header text-center">
                                <img src="../public/images/store_logo_all.png" alt="Chimbote Store" height="45px">
                            </div>
                            <div class="misc-box">   
                                <form role="form" method="POST" action="procesos/reg_empresa.php">
                                    <div id="error_ruc"></div>
                                    <!-- INPUT GROUPS -->
                                    <div class="widget">
                                        <div class="widget-header">
                                            <h4><i class="fa fa-edit"></i> Datos de la Empresa</h4>
                                        </div>
                                        <div class="widget-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Numero de RUC" id="input_ruc" name="input_ruc" maxlength="11" required>
                                                        <span class="input-group-btn"><button id="btn_comprueba_ruc" class="btn btn-default" type="button" onclick="comprobarRUC()">Comprobar RUC!</button></span>
                                                    </div>
                                                    <br/>
                                                    <input type="text" class="form-control" placeholder="Razon Social" id="input_razon_social" name="input_razon_social" readonly>
                                                    <input type="hidden" name="hidden_direccion" id="hidden_direccion" />
                                                </div>
                                                <!--div class="col-md-6">
                                                    <br/>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Condicion" id="input_condicion" name="input_condicion" readonly>
                                                    </div>
                                                </div-->
                                                <div class="col-md-6">
                                                    <br/>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Estado" id="input_estado" name="input_estado" readonly>
                                                    </div>
                                                </div>
                                                <!--div class="col-md-12">
                                                    <br/>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Tienda <i class="fa fa-home"></i></span>
                                                        <input type="text" class="form-control" placeholder="Nombre tienda " id="input_nombre_comercial" name="input_nombre_comercial" required>
                                                    </div>
                                                </div-->
                                                <div class="col-md-12">
                                                    <br/>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Logo <i class="fa fa-image"></i></span>
                                                        <input type="file" class="form-control" placeholder="Cargar Logo" id="input_email" name="input_email" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="error_dni"></div>
                                    <div class="widget">
                                        <div class="widget-header">
                                            <h4><i class="fa fa-edit"></i> Datos del Usuario</h4>
                                        </div>
                                        <div class="widget-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Numero de DNI" id="input_dni" name="input_dni" maxlength="8" required>
                                                        <span class="input-group-btn"><button class="btn btn-default" id="btn_comprueba_dni" type="button" onclick="enviar_dni()">Obtener Nombres!</button></span>
                                                    </div>
                                                    <br/>
                                                    <input type="text" class="form-control" placeholder="Nombres" id="input_nombres" name="input_nombres"  readonly>
                                                    <br/>
                                                    <input type="text" class="form-control" placeholder="Apellido Paterno" id="input_apellido_paterno" name="input_apellido_paterno" required>
                                                    <br/>
                                                    <input type="text" class="form-control" placeholder="Apellido Materno" id="input_apellido_materno" name="input_apellido_materno" required>
                                                    <br/>
                                                    <input type="hidden" id="hidden_apellidos" name="hidden_apellidos">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input type="text" class="form-control" placeholder="Email" id="input_email" name="input_email" onchange="validar_email()" required>
                                                    </div>
                                                    <br/>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                        <input type="tel" class="form-control" placeholder="Celular" id="input_celular" name="input_celular" pattern="[0-9]{9}" required>
                                                        <span class="input-group-btn"><button class="btn btn-default" id="btn_validar_datos" type="button" onclick="validar_datos()" disabled>Validar Datos!</button></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="text-center misc-footer">
                                <span>&copy; Copyright <?php// echo date('Y') ?>. Chimbote Store <br>development by Luna Systems Peru</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Common plugins-->
        <script src="../public/plugins/jquery/dist/jquery.min.js"></script>
        <script src="../public/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../public/plugins/pace/pace.min.js"></script>
        <script src="../public/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="../public/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../public/plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="../public/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="../public/js/float-custom.js"></script>
        <script src="../public/js/validar_usuario.js" ></script>
    </body>
</html>
