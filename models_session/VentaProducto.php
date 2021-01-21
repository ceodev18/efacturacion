<?php

class ventaProducto
{

    private $idproducto;
    private $descripcion;
    private $cantidad;
    private $precio;
    private $costo;
    private $codsunat;

    /**
     * ventaProducto constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdproducto()
    {
        return $this->idproducto;
    }

    /**
     * @param mixed $idproducto
     */
    public function setIdproducto($idproducto)
    {
        $this->idproducto = $idproducto;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * @return mixed
     */
    public function getCodsunat()
    {
        return $this->codsunat;
    }

    /**
     * @param mixed $codsunat
     */
    public function setCodsunat($codsunat)
    {
        $this->codsunat = $codsunat;
    }

    function agregar()
    {
        $fila = array();
        $fila['idproducto'] = $this->idproducto;
        $fila['descripcion'] = strtoupper($this->descripcion);
        $fila['cantidad'] = $this->cantidad;
        $fila['precio'] = $this->precio;
        $fila['costo'] = $this->costo;
        $fila['codsunat'] = $this->codsunat;
        $_SESSION['ventaproductos'][$this->idproducto] = $fila;
    }

    function eliminar()
    {
        unset($_SESSION['ventaproductos'][$this->idproducto]);
    }

}
