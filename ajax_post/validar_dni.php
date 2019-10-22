
<?php

$dni = filter_input(INPUT_POST, 'dni');
$direcion = 'http://localhost/consultas_json/datos_peru_dni/consultas_dni.php?dni=' . $dni;

$json_dni = file_get_contents($direcion, FALSE);
// Check for errors
if ($json_dni === FALSE) {
    die('Error');
} else {
    echo $json_dni;
}


