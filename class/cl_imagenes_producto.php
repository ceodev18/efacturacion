<?php

require 'cl_conectar.php';

class cl_imagenes_producto
{

    private $id_producto;
    private $id_empresa;
    private $imagen;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * @param mixed $id_producto
     */
    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresa()
    {
        return $this->id_empresa;
    }

    /**
     * @param mixed $id_empresa
     */
    public function setIdEmpresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function insertar() {
        $grabado = false;
        global $conn;
        $query = "insert into imagenes_productos values ('" . $this->id_producto . "', '" . $this->id_empresa . "', '" . $this->imagen . "')";
        $resultado = $conn->query($query);
        if (!$resultado) {
            die('Could not enter data in imagenes_productos: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        return $grabado;
    }

    function ver_imagenes() {
        global $conn;
        $query = "select imagen "
        . "from imagenes_productos "
        . "where id_empresa = '".$this->id_empresa."' and id_producto = '".$this->id_producto."' ";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

}