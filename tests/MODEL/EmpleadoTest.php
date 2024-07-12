<?php
namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use App\Model\Empleado;

class EmpleadoTest extends TestCase {
    private $db;
    private $empleado;

    protected function setUp(): void {
        // Crear un mock de la conexión de base de datos
        $this->db = $this->createMock(\mysqli::class);

        // Crear la instancia de Empleado con el mock de la base de datos
        $this->empleado = new Empleado($this->db);
    }



    // Puedes agregar más tests para otros métodos aquí
}
?>
