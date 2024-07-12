<?php
namespace Tests\MODEL;

use PHPUnit\Framework\TestCase;
use App\Model\Usuario; // Asegúrate de que esta ruta sea correcta

class UsuarioTest extends TestCase {
    public function testConexion() {
        $conexion = Usuario::conexion();
        $this->assertInstanceOf(\mysqli::class, $conexion);
    }
}
?>
