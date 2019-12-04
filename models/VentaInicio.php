<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'Conectar.php';

class VentaInicio
{
    private $id_empresa;
    private $conectar;

    /**
     * VentaInicio constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
        $this->id_empresa = $_SESSION['id_empresa'];
    }

    public function CargarDatosesteMes()
    {
        $sql = "SELECT ifnull(sum(total), 0) as ventas, ifnull(count(distinct(id_cliente)), 0) as contar_clientes, ifnull(count(serie), 0) as contar_documentos,  ifnull(max(total),0) as maximo, ifnull(min(total),0) as minimo, ifnull(avg(total),0) as promedio   
        FROM solo_facturacion.ventas
        where id_empresa = '$this->id_empresa' and year(fecha) = year(current_date()) and month(fecha) = month(current_date()) and estado = 1 ";
        return $this->conectar->get_json_row($sql);
    }

    public function CargarTotalVentahoy()
    {
        $sql = "select ifnull(sum(total),0) as total_hoy 
        from ventas 
        where id_empresa = '$this->id_empresa' and fecha = current_date() and estado = 1 ";
        return $this->conectar->get_json_row($sql);
    }

    public function CargarVentasMensuales()
    {
        $sql = "select m.nombre as id, ifnull(sum(v.total), 0) as ventas
        from mes as m 
        left join ventas as v on month(v.fecha) = m.id and year(v.fecha) = year(current_date()) and v.id_empresa = '$this->id_empresa' and v.estado = 1 
        group by m.id";
        return $this->conectar->get_json_rows($sql);
    }

    public function VerResumenVentas()
    {
        $sql = "select ds.id_tido, ds.nombre, sum(v.total) as total
        from ventas as v
        inner join documentos_sunat as ds on ds.id_tido = v.id_tido
        where v.id_empresa = '$this->id_empresa' and year(fecha) = year(current_date()) and month(fecha) = month(current_date()) and v.estado = 1 
        group by v.id_tido";
        return $this->conectar->get_Cursor($sql);
    }

    public function VerComparativaDiaria()
    {
        $sql = "select day(v.fecha) as dia, sum(v.total) as total_dia, count(v.id_tido) as cantidad_dia 
        from ventas as v
        where v.id_empresa = '$this->id_empresa' and year(v.fecha) = year(current_date()) and month(v.fecha) = month(current_date()) and v.estado = 1 
        group by day(v.fecha)";
        return $this->conectar->get_json_rows($sql);
    }

}