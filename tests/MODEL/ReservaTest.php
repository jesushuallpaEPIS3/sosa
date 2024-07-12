<?php
namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use App\Model\Reserva;

class ReservaTest extends TestCase {
    protected $reserva;

    protected function setUp(): void {
        parent::setUp();
        $this->reserva = new Reserva();
    }

    // Test para verificar el listado de reservas
    public function testListarReserva() {
        $reservas = $this->reserva->listarReserva();
        $this->assertIsArray($reservas);
        // Aquí puedes añadir más aserciones según lo que esperas en tus datos de prueba
    }

    // Test para agregar una reserva nueva

    

    // Test para editar una reserva existente
    public function testEditarReserva() {
        $idReservaExistente = 8;
        $resultado = $this->reserva->editarReserva($idReservaExistente, 34, 639, 3, 1, '2024-06-30 00:00:00', '2024-07-01 00:00:00', '2024-07-02 00:00:00', 1);
        $this->assertTrue($resultado);
    }

    // Test para eliminar una reserva existente


    // Test para buscar reservas por término
    public function testBuscarReserva() {
        $termino = 567;
        $reservasEncontradas = $this->reserva->buscarReserva($termino);
        $this->assertIsArray($reservasEncontradas);
        // Aquí puedes añadir más aserciones según lo que esperas en tus datos de prueba
    }

    // Test para obtener reserva por I
}
?>
