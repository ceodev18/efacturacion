<?php

session_start();

require '../class/cl_conectar.php';
$searchTerm = mysqli_real_escape_string($conn, (filter_input(INPUT_GET, 'term')));
global $conn;
$query = "select * "
        . "from productos "
        . "where (nombre_corto like '%" . $searchTerm . "%' or id_producto like '%" . $searchTerm . "%' or descripcion like '%" . $searchTerm . "%') "
        . "and id_empresa = '" . $_SESSION['id_empresa'] . "' "
        . "order by nombre_corto asc";
$resultado = $conn->query($query);
$a_productos = $resultado->fetch_all(MYSQLI_ASSOC);
$array = array();
$fila = array();
foreach ($a_productos as $value) {
    $precio_descontado = $value['precio'] * (1 - ($value['descuento'] / 100));
    $fila['value'] = $value['nombre_corto'] . " | Cod: " . $value['id_producto'] . " | Cant.: " . $value['cantidad'] . " | P.Venta S/ : " . $value['precio'] . " | Descuento: " . $value['descuento'] . "% | P.Compra S/ : " . $value['costo'];
    $fila['codigo'] = $value['id_producto'];
    $fila['descripcion'] = $value['nombre_corto'];
    $fila['precio'] = $value['precio'];
    $fila['precio_descontado']= $precio_descontado;
    $fila['costo'] = $value['costo'];
    $fila['cantidad'] = $value['cantidad'];
    array_push($array, $fila);
}
echo json_encode($array);
