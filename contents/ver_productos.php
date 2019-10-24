<!DOCTYPE html>
<html lang="es">

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Chimbote Store - Ver Productos</title>

        <!-- Common plugins -->
        <link href="../public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../public/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../public/plugins/pace/pace.css" rel="stylesheet">
        <link href="../public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/plugins/nano-scroll/nanoscroller.css">
        <link rel="stylesheet" href="../public/plugins/metisMenu/metisMenu.min.css">
        <!-- dataTables -->
        <link href="../public/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="../public/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        
        <link href="../public/plugins/lightbox2/dist/css/lightbox.css" rel="stylesheet">

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
                        <h4>Productos</h4>
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
                <div class="col-md-12">
                    <div class="panel panel-default collapsed">
                        <div class="panel-heading">
                            <a href="reg_productos.php" class="btn btn-success" > Agregar Producto</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tabla_clasificacion" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Descripcion</th>
                                            <th>Clasificacion</th>
                                            <th>P. Venta</th>
                                            <th>% Dscto</th>
                                            <th>Cantidad</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for($i=0;$i<20;$i++)
                                        {
                                            if($i/2==0)
                                            {
                                                $text_estado = '<span class="btn btn-xs btn-success">en Stock</span>';
                                            }
                                            else{
                                                $text_estado = '<span class="btn btn-xs btn-github">Inactivo</span>';
                                            }
                                        ?>
                                            <tr>
                                                <td class="text-center">id_producto</td>
                                                <td>nombre_producto</td>
                                                <td>clasificacion</td>
                                                <td class="text-right">precio</td>
                                                <td class="text-right">descuento</td>
                                                <td class="text-center">cantidad</td>
                                                <td class="text-center"></td>
                                                <td class="text-center">
                                                    <a href="mod_producto.php?codigo=" class="btn btn-xs btn-facebook" title="Editar Producto" alt="Editar Producto"> <i class="fa fa-edit"></i></a>
                                                    <button type="button" onclick="" data-toggle="modal" data-target="#modal_ver_imagenes" class="btn btn-xs btn-warning" alt="Ver Imagenes" title="Ver Imagenes"> <i class="fa fa-image"></i></button>
                                                    <a href="ver_kardex.php?codigo=" class="btn btn-xs btn-success" title="Ver Kardex" alt="Ver Kardex"> <i class="fa fa-arrows-h"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end page content-->


            <?php include '../fixed/footer.php'; ?>

        </section>
        <!--end main content-->

        <div class="modal fade" id="modal_ver_imagenes" tabindex="-1" role="dialog" aria-labelledby="modal_ver_imagenes">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true" class="fa fa-times-circle"></span></button>
                        <h3 class="modal-title" id="myModalLabel">Imagenes del Producto</h3>
                    </div>
                    <div class="modal-body" id="modal_imagenes">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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

        <!-- Datatables-->
        <script src="../public/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../public/plugins/datatables/dataTables.responsive.min.js"></script>
        
        <script src="../public/plugins/lightbox2/dist/js/lightbox.min.js"></script>

        <script>
            $(document).ready(function () {
                //$('#tabla_clasificacion').dataTable();
                var table = $('#tabla_clasificacion').DataTable();

                table.order([1, 'asc']).draw();
            });
        </script>

        <script>
            function obtener_imagenes(id_producto) {
                var parametros = {
                    id_producto: id_producto
                };
                $.ajax({
                    data: parametros, //datos que se envian a traves de ajax
                    url: 'modals/m_imagenes_productos.php', //archivo que recibe la peticion
                    type: 'post', //método de envio
                    beforeSend: function () {

                        $("#modal_imagenes").html("Procesando, espere por favor...");
                    },
                    success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#modal_imagenes").html(response);
                    }
                });
            }
        </script>

    </body>

    <!-- Mirrored from bootstraplovers.com/templates/float-admin-v1.1/light-version/page-empty.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2017 07:43:09 GMT -->
</html>