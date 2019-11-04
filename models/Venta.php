<?php

require_once 'Conectar.php';

class Venta
{
    private $id_venta;
    private $fecha;
    private $id_tido;
    private $serie;
    private $numero;
    private $id_cliente;
    private $total;
    private $estado;
    private $enviado_sunat;
    private $id_empresa;
    private $conectar;

    /**
     * Venta constructor.
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
    public function getIdTido()
    {
        return $this->id_tido;
    }

    /**
     * @param mixed $id_tido
     */
    public function setIdTido($id_tido)
    {
        $this->id_tido = $id_tido;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getEnviadoSunat()
    {
        return $this->enviado_sunat;
    }

    /**
     * @param mixed $enviado_sunat
     */
    public function setEnviadoSunat($enviado_sunat)
    {
        $this->enviado_sunat = $enviado_sunat;
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

    public function insertar()
    {
        $sql = "insert into ventas 
        values ('$this->id_venta', '$this->fecha', '$this->id_tido', '$this->serie', '$this->numero', '$this->id_cliente', '$this->total', '1', '0', '$this->id_empresa')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function anular()
    {
        $sql = "update ventas 
        set estado = '2'   
        where id_venta = '$this->id_venta'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id_venta) + 1, 1) as codigo 
            from ventas";
        $this->id_venta = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function obtenerDatos()
    {
        $sql = "select * 
        from ventas 
        where id_venta = '$this->id_venta'";
        $fila = $this->conectar->get_Row($sql);
        $this->fecha = $fila['fecha'];
        $this->id_tido = $fila['id_tido'];
        $this->serie = $fila['serie'];
        $this->numero = $fila['numero'];
        $this->id_cliente = $fila['id_cliente'];
        $this->total = $fila['total'];
        $this->estado = $fila['estado'];
        $this->enviado_sunat = $fila['enviado_sunat'];
        $this->id_empresa = $fila['id_empresa'];
    }

    public function validarVenta()
    {
        $sql = "select id_venta as codigo  
            from ventas
            where id_tido = '$this->id_tido' and serie = '$this->serie' and numero = '$this->numero'";
        $this->id_venta = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function verFilas($periodo)
    {
        $sql = "select v.id_venta, v.fecha, ds.abreviatura, v.serie, v.numero, c.documento, c.datos, v.total, v.estado, v.enviado_sunat, vs.nombre_xml 
        from ventas as v 
            inner join documentos_sunat ds on v.id_tido = ds.id_tido
            inner join clientes c on v.id_cliente = c.id_cliente 
            inner join ventas_sunat vs on v.id_venta = vs.id_venta
        where v.id_empresa = '$this->id_empresa' and concat(year(fecha), LPAD(month(fecha), 2, 0)) = '$periodo'";
        return $this->conectar->get_Cursor($sql);
    }

    public function verDocumentosFecha()
    {
        $sql = "select v.id_venta, v.fecha, ds.abreviatura, v.serie, v.numero, c.documento, c.datos, v.total, v.estado, v.enviado_sunat, v.estado
        from ventas as v 
            inner join documentos_sunat ds on v.id_tido = ds.id_tido
            inner join clientes c on v.id_cliente = c.id_cliente 
        where v.id_empresa = '$this->id_empresa' and v.fecha = '$this->fecha' and v.id_tido = '$this->id_tido'";
        return $this->conectar->get_Cursor($sql);
    }

    public function verPeriodos () {
        $sql = "select DISTINCT(concat(year(fecha), LPAD(month(fecha), 2, 0))) as periodo 
        from ventas 
        where id_empresa = '$this->id_empresa'
        order by concat(year(fecha), LPAD(month(fecha), 2, 0)) desc";
        return $this->conectar->get_Cursor($sql);
    }
}