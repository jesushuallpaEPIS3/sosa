<?php
use PHPUnit\Framework\TestCase;
use App\Model\Empleado;

class EmpleadoTest extends TestCase {
    private $db;
    private $empleado;

    protected function setUp(): void {
        // Crea un objeto simulado de la base de datos
        $this->db = $this->createMock(mysqli::class);
        $this->empleado = new Empleado($this->db);
    }

    public function testListarEmpleados() {
        // Simula el resultado de la consulta
        $resultado = [
            ['id' => 1, 'nombre' => 'Juan', 'apellido' => 'Pérez'],
            ['id' => 2, 'nombre' => 'Ana', 'apellido' => 'Gómez'],
        ];

        $consultaMock = $this->createMock(mysqli_result::class);

        // Cambia onConsecutiveCalls por willReturn
        $consultaMock->method('fetch_assoc')
            ->willReturnOnConsecutiveCalls($resultado[0], $resultado[1], null);

        $this->db->method('query')->willReturn($consultaMock);

        // Ejecuta el método a probar
        $empleados = $this->empleado->listarEmpleados();

        // Verifica que el resultado sea el esperado
        $this->assertCount(2, $empleados);
        $this->assertEquals('Juan', $empleados[0]['nombre']);
        $this->assertEquals('Ana', $empleados[1]['nombre']);
    }

    // Aquí puedes agregar más pruebas para otros métodos (agregar, editar, eliminar, buscar)
}
