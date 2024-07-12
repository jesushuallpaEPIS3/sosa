<?php
namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use App\Model\Cliente;

class ClienteTest extends TestCase {
    protected $cliente;

    protected function setUp(): void {
        parent::setUp();
        $this->cliente = new Cliente();
    }

    public function testListarClientes() {
        $clientes = $this->cliente->listarClientes();
        $this->assertIsArray($clientes);
        // Aquí puedes añadir más aserciones según lo que esperas en tus datos de prueba
    }







	public function testObtenerClienteExistentePorId() {
        // Asume que este ID de cliente existe en tus datos de prueba
        $idclienteExistente = 1;

        // Ejecutar el método y obtener el cliente
        $cliente = $this->cliente->obtenerClientePorId($idclienteExistente);

        // Verificar que se obtenga un array con datos
        $this->assertIsArray($cliente);
        $this->assertNotEmpty($cliente);

        // Verificar que el cliente obtenido tenga los campos esperados
        $this->assertArrayHasKey('idcliente', $cliente);
        $this->assertArrayHasKey('nombre', $cliente);
        $this->assertArrayHasKey('apellido', $cliente);
        $this->assertArrayHasKey('correo', $cliente);
        $this->assertArrayHasKey('iddocumento', $cliente);
        $this->assertArrayHasKey('documento', $cliente);
        $this->assertArrayHasKey('telefono', $cliente);

    }

    public function testBuscarCliente() {
        $termino = "1";

        $clientesEncontrados = $this->cliente->buscarCliente($termino);
        $this->assertIsArray($clientesEncontrados);
        // Aquí puedes añadir más aserciones según lo que esperas en tus datos de prueba
    }

    protected function tearDown(): void {
        parent::tearDown();
        // Aquí podrías agregar código para limpiar datos de prueba o cerrar recursos
    }
}
?>
