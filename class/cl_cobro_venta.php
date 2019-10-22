<?php

include 'cl_conectar.php';

class cl_cobro_venta
{
    private $id_tienda;
    private $id_venta;
    private $periodo;
    private $id_pago;
    private $fecha;
    private $monto;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getIdTienda()
    {
        return $this->id_tienda;
    }

    /**
     * @param mixed $id_tienda
     */
    public function setIdTienda($id_tienda)
    {
        $this->id_tienda = $id_tienda;
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->id_venta;
    }

    /**
     * @param mixed $id_venta
     */
    public function setIdVenta($id_venta)
    {
        $this->id_venta = $id_venta;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    }

    /**
     * @return mixed
     */
    public function getIdPago()
    {
        return $this->id_pago;
    }

    /**
     * @param mixed $id_pago
     */
    public function setIdPago($id_pago)
    {
        $this->id_pago = $id_pago;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    function obtener_nro() {
        $id = 1;
        global $conn;
        $c_codigo = "select ifnull(id_cobro_ventas +1, 1) as codigo "
            . "from cobro_ventas "
            . "where id_venta = '" . $this->id_venta . "' and id_empresa = '" . $this->id_tienda . "' and periodo = '".$this->periodo."'";
        $r_codigo = $conn->query($c_codigo);
        if ($r_codigo->num_rows > 0) {
            while ($fila = $r_codigo->fetch_assoc()) {
                $id = $fila ['codigo'];
            }
        }
        return $id;
    }


    function insertar() {
        $grabado = false;
        global $conn;
        $query = "insert into cobro_ventas values ('" . $this->id_pago . "', '" . $this->id_tienda . "', '" . $this->periodo . "', '" . $this->id_venta . "', '" . $this->fecha . "', '" . $this->monto . "')";
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in cobro_ventas: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }
    
    function eliminar() {
        $grabado = false;
        global $conn;
        $query = "delete from cobro_ventas where id_cobro_ventas = '" . $this->id_pago . "' and id_empresa = '" . $this->id_tienda . "' and periodo = '" . $this->periodo . "' and id_venta = '" . $this->id_venta . "'";
//        echo $query;
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not delete data in cobro_ventas: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }
    
    function eliminar_pagos() {
        $grabado = false;
        global $conn;
        $query = "delete from cobro_ventas where id_empresa = '" . $this->id_tienda . "' and periodo = '" . $this->periodo . "' and id_venta = '" . $this->id_venta . "'";
//        echo $query;
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not delete data in cobro_ventas: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        // $conn->close();
        return $grabado;
    }
    
    
    function ver_pagos() {
        global $conn;
        $query = "select id_cobro_ventas, fecha, monto "
                . "from cobro_ventas "
                . "where id_empresa = '" . $this->id_tienda . "' and periodo = '" . $this->periodo . "' and id_venta = '" . $this->id_venta . "' "
                . "order by fecha asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }



}