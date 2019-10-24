<?php

require '../models/Empresa.php';

$c_empresa= new Empresa();

$action = filter_input(INPUT_POST, 'action');


