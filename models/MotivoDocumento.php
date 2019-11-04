<?php


class MotivoDocumento
{
    private $id_motivo;
    private $descripcion;
    private $id_tido;

    /**
     * MotivoDocumento constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdMotivo()
    {
        return $this->id_motivo;
    }

    /**
     * @param mixed $id_motivo
     */
    public function setIdMotivo($id_motivo)
    {
        $this->id_motivo = $id_motivo;
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

    public function insertar()
    {
        $sql = "insert into motivo_documento 
        values ('$this->id_motivo', '$this->descripcion', '$this->id_tido')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update motivo_documento 
        set nombre = '$this->descripcion'
        where id_tido = '$this->id_tido' and id_motivo = '$this->id_motivo'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id_motivo) + 1, 1) as codigo 
            from motivo_documento";
        $this->id_motivo = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function obtenerDatos()
    {
        $sql = "select * 
        from motivo_documento 
        where id_motivo = '$this->id_motivo'";
        $fila = $this->conectar->get_Row($sql);
        $this->descripcion = $fila['nombre'];
        $this->id_tido = $fila['id_tido'];
    }

    public function verFilas()
    {
        $sql = "select id_motivo, nombre 
        from motivo_documento 
        where id_tido = '$this->id_tido' 
        order by nombre asc";
        return $this->conectar->get_Cursor($sql);
    }
}