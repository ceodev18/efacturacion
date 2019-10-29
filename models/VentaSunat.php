<?php

require_once 'Conectar.php';

class VentaSunat
{
    private $id_venta;
    private $hash;
    private $nombre_xml;
    private $conectar;

    /**
     * VentaSunat constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
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
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return mixed
     */
    public function getNombreXml()
    {
        return $this->nombre_xml;
    }

    /**
     * @param mixed $nombre_xml
     */
    public function setNombreXml($nombre_xml)
    {
        $this->nombre_xml = $nombre_xml;
    }

    public function insertar()
    {
        $sql = "insert into ventas_sunat 
        values ('$this->id_venta', '$this->hash', '$this->nombre_xml')";
        return $this->conectar->ejecutar_idu($sql);
    }
}