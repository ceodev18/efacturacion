<?php

require 'cl_conectar.php';

class cl_documento_empresa {

    private $id_documento;
    private $serie;
    private $numero;
    private $id_tienda;

    function __construct() {
        
    }

    function getId_documento() {
        return $this->id_documento;
    }

    function getSerie() {
        return $this->serie;
    }

    function getNumero() {
        return $this->numero;
    }

    function setId_documento($id_documento) {
        $this->id_documento = $id_documento;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setNumero($numero) {
        $this->numero = $numero;
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

    function ver_documentos() {
        global $conn;
        $query = "select de.id_documento, td.nombre "
                . "from documento_empresa as de "
                . "inner join tipo_documento as td on td.id_tido = de.id_tido "
                . "where de.id_empresa = '".$this->id_tienda."' "
                . "order by td.nombre asc";
        $resultado = $conn->query($query);
        $fila = $resultado->fetch_all(MYSQLI_ASSOC);
        return $fila;
    }

    function obtener_nro() {
        $id = 1;
        global $conn;
        $c_codigo = "select numero+1 as codigo "
                . "from documento_empresa "
                . "where serie = '" . $this->serie . "' and id_tido = '" . $this->id_documento . "' and id_empresa = '".$this->id_tienda."'";
        $r_codigo = $conn->query($c_codigo);
        if ($r_codigo->num_rows > 0) {
            while ($fila = $r_codigo->fetch_assoc()) {
                $id = $fila ['codigo'];
            }
        }
        return $id;
    }

}
