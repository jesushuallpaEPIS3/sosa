<?php
class clsEmpleado {
    public function listarEmpleadosAdmin() {
        require_once("MODEL/Empleado.php");
        $emp = new Empleado();
        $datos = $emp->listarEmpleados();
        require_once("VIEW/EMPLEADO/index.php");
    }

    // Otros métodos para agregar, editar, eliminar y buscar empleados
}
?>
