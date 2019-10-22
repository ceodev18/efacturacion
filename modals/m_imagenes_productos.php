<?php
session_start();
require_once '../class/cl_producto.php';
require_once '../class/cl_imagenes_producto.php';
require_once '../class/cl_varios.php';

$c_producto = new cl_producto();
$c_imagenes = new cl_imagenes_producto();
$c_varios = new cl_varios();

$c_producto->setId_tienda($_SESSION['id_empresa']);
$c_producto->setId(filter_input(INPUT_POST, 'id_producto'));
$c_producto->datos_producto();

$c_imagenes->setIdEmpresa($_SESSION['id_empresa']);
$c_imagenes->setIdProducto($c_producto->getId());
$a_imagenes = $c_imagenes->ver_imagenes();
?>
<h3><?php echo utf8_decode($c_producto->getDescripcion()) ?></h3>
<hr>
<div class="lightboxGallery">
    <a href="images/productos/<?php echo $c_producto->getId_tienda() . '/' . $c_producto->getImagen() ?>" title="<?php echo $c_producto->getDescripcion()?>" data-lightbox="gallery"><img src="images/productos/<?php echo $c_producto->getId_tienda() . '/' . $c_producto->getImagen() ?>" alt="" style="max-width: 240px; max-height: 160px"></a>
        <?php
        foreach ($a_imagenes as $value) {
            ?>
        <a href="images/productos/<?php echo $c_producto->getId_tienda() . '/' . $value['imagen'] ?>" title="<?php echo $c_producto->getDescripcion()?>" data-lightbox="gallery"><img src="images/productos/<?php echo $c_producto->getId_tienda() . '/' . $value['imagen'] ?>" alt="" style="max-width: 240px; max-height: 160px"></a>
        <?php
    }
    ?>
</div>

