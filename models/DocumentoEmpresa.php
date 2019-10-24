<?php


class DocumentoEmpresa
{
    private $id_empresa;
    private $id_tido;
    private $serie;
    private $numero;

    /**
     * DocumentoEmpresa constructor.
     */
    public function __construct()
    {
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


    public function insertar()
    {
        $sql = "insert into documentos_empresas 
        values ('$this->id_empresa', '$this->id_tido', '$this->serie', '$this->numero')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update documentos_empresas 
        set serie = '$this->serie', numero = '$this->numero'
        where id_empresa = '$this->id_empresa' and id_tido = '$this->id_tido'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * 
        from documentos_empresas 
        where id_empresa = '$this->id_empresa' and id_tido = '$this->id_tido'";
        $fila = $this->conectar->get_Row($sql);
        $this->serie = $fila['serie'];
        $this->numero = $fila['numero'];
    }

    public function verFilas()
    {
        $sql = "select * from documentos_empresas as de 
        inner join documentos_sunat ds on de.id_tido = ds.id_tido 
        where id_empresa = '$this->id_empresa'";
        return $this->conectar->get_Cursor($sql);
    }


}