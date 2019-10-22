<?php

session_start();

require '../class/cl_producto.php';
require '../class/cl_tienda.php';
require '../class/cl_imagenes_producto.php';

$c_tienda = new cl_tienda();
$c_producto = new cl_producto();
$c_imagenes = new cl_imagenes_producto();

$c_tienda->setId($_SESSION['id_empresa']);
$c_tienda->validar_tienda();

$c_imagenes->setIdEmpresa($c_tienda->getId());

function estampar_imagen($logo_estampa, $imagen) {
    $png_array = array("png", "PNG");
    $jpg_array = array("jpeg", "jpg", "JPG", "JPEG");
    $im = "";

    $estampa = imagecreatefrompng('../images/tiendas/logo/' . $logo_estampa);

    $temporary = explode(".", $imagen);
    $file_extension = end($temporary);


    if (in_array($file_extension, $jpg_array)) {
        $im = imagecreatefromjpeg($imagen);
    }
    if (in_array($file_extension, $png_array)) {
        $im = imagecreatefrompng($imagen);
    }
    $proporcion1 = imagesx($estampa);
    $proporcion2 = imagesx($im);// / imagesx($imagen) ;
    echo "proporcion = " . $proporcion1 . " proporcion 2 = " . $proporcion2;

// Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
    $margen_dcho = 10;
    $margen_inf = 10;

    $ancho = imagesx($estampa);
    $alto = imagesy($estampa);

// Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el
// ancho de la foto para calcular la posición de la estampa. 
    imagecopy($im, $estampa, imagesx($im) - $ancho - $margen_dcho, imagesy($im) - $alto - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));

    //imagepng($im, $imagen);
    if (in_array($file_extension, $jpg_array)) {
        imagejpeg($im, $imagen, 9);
    }
    if (in_array($file_extension, $png_array)) {
        imagepng($im, $imagen, 9);
    }
    imagedestroy($im);
}

if (filter_input(INPUT_POST, 'input_descripcion_producto') !== null) {
    $c_producto->setId_tienda($_SESSION['id_empresa']);
    $c_producto->setId($c_producto->obtener_nro());
    $c_producto->setDescripcion(strtoupper(utf8_encode(filter_input(INPUT_POST, 'input_descripcion_producto'))));
    $c_producto->setId_clasificacion(filter_input(INPUT_POST, 'select_clasificacion'));
    $c_producto->setId_familia(filter_input(INPUT_POST, 'select_familia'));
    $c_producto->setPrecio(filter_input(INPUT_POST, 'input_precio_producto'));
    $c_producto->setCosto(filter_input(INPUT_POST, 'input_costo_producto'));
    $c_producto->setDescuento(filter_input(INPUT_POST, 'input_descuento_producto'));
    $c_producto->setCaracteristicas(strtoupper(filter_input(INPUT_POST, 'input_caracteristicas_producto')));
    $c_producto->setCantidad(0);
    $c_producto->setUltimo_ingreso('0000-00-00');
    $c_producto->setUltima_salida('0000-00-00');
} else {
    echo "no se han recibido datos";
}

if (isset($_FILES["fimagenes"])) {
    $file_count = count($_FILES['fimagenes']);
    echo "imagenes encontradas : " . $file_count . "<br>";

    for ($i = 0; $i < $file_count; $i++) {
        if ($_FILES["fimagenes"]['name'][$i] != "") {
            $afile = $_FILES["fimagenes"];
            $file = $afile['name'][$i];
            echo "imagen nro: " . $i . " nombre archivo = " . $file . "<br>";
            $file_temporal = $afile['tmp_name'][$i];
            $validextensions = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
            $temporary = explode(".", $afile["name"][$i]);
            $file_extension = end($temporary);
            $codigo = $c_producto->getId();

            if (($afile["size"][$i] < 5000000)) {
                if ((($afile["type"][$i] == "image/png") || ($afile["type"][$i] == "image/jpg") || ($afile["type"][$i] == "image/jpeg")) && ($afile["size"][$i] < 5000000) && in_array($file_extension, $validextensions)) {
                    if ($afile["error"][$i] > 0) {
                        echo "Return Code: " . $afile["error"][$i] . "<br/><br/>";
                    } else {
                        $directorio = "../images/productos/" . $_SESSION['id_empresa'] . "/";
                        if (!file_exists($directorio)) {
                            if (!mkdir($directorio, 0777, true)) {
                                die('Fallo al crear las carpetas...');
                            }
                        }

                        $new_name = $codigo . '_' . ($i + 1) . '.' . $file_extension;

                        if (move_uploaded_file($file_temporal, $directorio . $new_name)) {
                            //vamos a estampar la imagen con el logo de su empresa.
                            estampar_imagen($c_tienda->getLogo(), $directorio . $new_name);

                            //insertar registro en base de datos

                            if ($i == 0) {
                                $c_producto->setImagen($new_name);
                                $registrado = $c_producto->i_producto();

                                if ($registrado) {
                                    //header("Location: ../ver_productos.php");
                                }
                            } else {
                                $c_imagenes->setIdProducto($codigo);
                                $c_imagenes->setImagen($new_name);
                                $registrar_imagen = $c_imagenes->insertar();
                                if ($registrar_imagen) {
                                    //echo "imagen guardada";
                                }
                            }
                        } else {
                            echo "error no se pudo copiar la imagen a la carpeta";
                            //header("Location: ../reg_productos.php?error=3");
                        }
                    }
                } else {
                    echo "error el archivo no cumple con las validaciones <br>" ;
                    //header("Location: ../reg_productos.php?error=2");
                }
            } else {
                echo "error el archivo es mas grande 5 MG";
                //header("Location: ../reg_productos.php?error=1");
            }
        }
    }
    //header("Location: ../ver_productos.php");
} else {
    //error no hay archivo
    echo "no se ha seleccionado ninguna imagen";
}
