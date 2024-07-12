<?php
class Empleado {
    private $db;

    public function __construct() {
        $this->db = Conectar::conexion();
    }

    public function listarEmpleados() {
        $empleados = array();
        $consulta = $this->db->query("SELECT * FROM tbempleado");
        while ($fila = $consulta->fetch_assoc()) {
            $empleados[] = $fila;
        }
        return $empleados;
    }

    // Otros métodos para agregar, editar, eliminar y buscar empleados
}
?>
