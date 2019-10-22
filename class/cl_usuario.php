<?php

include 'cl_conectar.php';

class cl_usuario {

    private $id;
    private $id_empresa;
    private $nick;
    private $password;
    private $dni;
    private $nombres;
    private $ape_pat;
    private $ape_mat;
    private $celular;
    private $email;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getNick() {
        return $this->nick;
    }

    function getPassword() {
        return $this->password;
    }

    function getDni() {
        return $this->dni;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApe_pat() {
        return $this->ape_pat;
    }

    function getApe_mat() {
        return $this->ape_mat;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setNick($nick) {
        $this->nick = $nick;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApe_pat($ape_pat) {
        $this->ape_pat = $ape_pat;
    }

    function setApe_mat($ape_mat) {
        $this->ape_mat = $ape_mat;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function validar_nick_tienda() {
        global $conn;
        $existe = false;
        $query = "select contrasena, id_usuarios "
                . "from usuarios "
                . "where id_empresa = '" . $this->id_empresa . "' and nick = '" . $this->nick . "'";
        $resultado = $conn->query($query);
        if ($resultado->num_rows > 0) {
            $existe = true;
            while ($fila = $resultado->fetch_assoc()) {
                $this->password = $fila ['contrasena'];
                $this->id = $fila ['id_usuarios'];
            }
        }
        return $existe;
    }

    function validar_usuario() {
        global $conn;
        $existe = false;
        $query = "select * "
                . "from usuarios "
                . "where id_empresa = '" . $this->id_empresa . "' and id_usuarios = '" . $this->id . "'";
        $resultado = $conn->query($query);
        if ($resultado->num_rows > 0) {
            $existe = true;
            while ($fila = $resultado->fetch_assoc()) {
                $this->nombres = $fila ['nombre'];
                $this->ape_pat = $fila ['ape_pat'];
                $this->ape_mat = $fila ['ape_mat'];
                $this->dni = $fila ['documento'];
                $this->email = $fila ['email'];
                $this->celular = $fila ['telefono'];
                $this->nick = $fila ['nick'];
            }
        }
        return $existe;
    }

    function insertar() {
        $grabado = false;
        global $conn;
        $i_cliente = "insert into empresas values ('" . $this->id . "', '" . $this->ruc . "', '" . $this->razon_social . "', '" . $this->nombre_comercial . "', '" . $this->direccion . "', '" . $this->mapa . "', "
                . "'" . $this->logo . "', '" . $this->foto_tienda . "', '" . $this->telefono . "', '" . $this->email . "', '" . $this->fecha_pago . "', '" . $this->estado . "'";
        //echo $i_cliente;
        $resultado = $conn->query($i_cliente);
        if (!$resultado) {
            die('Could not enter data in empresas: ' . mysqli_error($conn));
        } else {
            //echo "Entered data successfully";
            $grabado = true;
        }
        $conn->close();
        return $grabado;
    }

}
