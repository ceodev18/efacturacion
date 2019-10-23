<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cl_varios
 *
 * @author gerenciatecnica
 */
class cl_varios {

    function fecha_mysql_web($source) {
        $date = new DateTime($source);
        return $date->format('d/m/Y');
    }

    function fecha_web_mysql($source) {
        $to_format = 'Y-m-d';
        $from_format = 'd/m/Y';
        $date_aux = date_create_from_format($from_format, $source);
        return date_format($date_aux, $to_format);
    }

    function zerofill($valor, $longitud) {
        $res = str_pad($valor, $longitud, '0', STR_PAD_LEFT);
        return $res;
    }

}
