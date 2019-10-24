<?php

require_once 'Conectar.php';

class Empresa
{
    private $id_empresa;
    private $ruc;
    private $razon_social;
    private $direccion;
    private $email;
    private $telefono;
    private $estado;
    private $password;
    private $user_sol;
    private $clave_sol;
    private $conectar;

    /**
     * Empresa constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
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
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * @param mixed $ruc
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * @param mixed $razon_social
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = $razon_social;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUserSol()
    {
        return $this->user_sol;
    }

    /**
     * @param mixed $user_sol
     */
    public function setUserSol($user_sol)
    {
        $this->user_sol = $user_sol;
    }

    /**
     * @return mixed
     */
    public function getClaveSol()
    {
        return $this->clave_sol;
    }

    /**
     * @param mixed $clave_sol
     */
    public function setClaveSol($clave_sol)
    {
        $this->clave_sol = $clave_sol;
    }

    public function insertar()
    {
        $sql = "insert into empresas 
        values ('$this->id_empresa', '$this->ruc', '$this->razon_social', '$this->direccion', '$this->email', '$this->telefono', '$this->estado', '$this->password', '$this->user_sol', '$this->clave_sol')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update empresas 
        set ruc = '$this->ruc', direccion = '$this->direccion', email = '$this->email', telefono = '$this->telefono', user_sol= '$this->user_sol', clave_sol= '$this->clave_sol'
        where id_empresa = '$this->id_empresa'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id_empresa) + 1, 1) as codigo 
            from empresas";
        $this->id_empresa = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function obtenerDatos()
    {
        $sql = "select * 
        from empresas 
        where id_empresa = '$this->id_empresa'";
        $fila = $this->conectar->get_Row($sql);
        $this->ruc = $fila['ruc'];
        $this->razon_social = $fila['razon_social'];
        $this->direccion = $fila['direccion'];
        $this->email = $fila['email'];
        $this->telefono = $fila['telefono'];
        $this->estado = $fila['estado'];
        $this->password = $fila['password'];
        $this->user_sol = $fila['user_sol'];
        $this->clave_sol = $fila['clave_sol'];
    }

    public function validarLogin()
    {
        $sql = "select id_empresa
        from empresas 
        where ruc = '$this->ruc'";
        $this->id_empresa = $this->conectar->get_valor_query($sql, 'id_empresa');
        return true;
        if ($this->id_empresa == NULL || $this->id_empresa == "") {
            return false;
        }
    }

    public function verFilas()
    {
        $sql = "select * from empresas";
        return $this->conectar->get_Cursor($sql);
    }


}