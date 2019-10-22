<?php
include 'cl_conectar.php';

class cl_tienda {

    private $id;
    private $ruc;
    private $razon_social;
    private $nombre_comercial;
    private $direccion;
    private $mapa;
    private $logo;
    private $foto_tienda;
    private $telefono;
    private $email;
    private $fecha_pago;
    private $estado;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getRuc() {
        return $this->ruc;
    }

    function getRazon_social() {
        return $this->razon_social;
    }

    function getNombre_comercial() {
        return $this->nombre_comercial;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getMapa() {
        return $this->mapa;
    }

    function getLogo() {
        return $this->logo;
    }

    function getFoto_tienda() {
        return $this->foto_tienda;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getFecha_pago() {
        return $this->fecha_pago;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }

    function setNombre_comercial($nombre_comercial) {
        $this->nombre_comercial = $nombre_comercial;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setMapa($mapa) {
        $this->mapa = $mapa;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setFoto_tienda($foto_tienda) {
        $this->foto_tienda = $foto_tienda;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFecha_pago($fecha_pago) {
        $this->fecha_pago = $fecha_pago;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function validar_ruc() {
        $existe = false;
        global $conn;
        $consulta = "select id_empresa "
                . "from empresas "
                . "where ruc = '" . $this->ruc . "'";
        $respuesta = $conn->query($consulta);
        if ($respuesta->num_rows > 0) {
            while ($fila = $respuesta->fetch_assoc()) {
                $this->id = $fila ['id_empresa'];
                $existe = true;
            }
        }
        return $existe;
    }

    function validar_tienda() {
        global $conn;
        $existe = false;
        $query = "select * "
                . "from empresas "
                . "where id_empresa = '" . $this->id . "'";
        $resultado = $conn->query($query);
        if ($resultado->num_rows > 0) {
            $existe = true;
            while ($fila = $resultado->fetch_assoc()) {
                $this->nombre_comercial = $fila ['nombre_comercial'];
                $this->ruc = $fila ['ruc'];
                $this->razon_social = $fila ['razon_social'];
                $this->direccion = $fila ['direccion'];
                $this->mapa = $fila ['mapa'];
                $this->logo = $fila ['logo'];
                $this->foto_tienda = $fila ['foto_tienda'];
                $this->telefono = $fila ['telefono'];
                $this->email = $fila ['email'];
                $this->fecha_pago = $fila ['fecha_pago'];
                $this->estado = $fila ['estado'];
            }
        }
        return $existe;
    }
    
     function obtener_id() {
        $id = 1;
        global $conn;
        $query = "select ifnull(max(id_empresa) + 1, 1) as codigo from empresas";
        $resultado = $conn->query($query);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $this->id = $fila ['codigo'];
            }
        }
        return $id;
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
