<?php
namespace Tests\DB;

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/DB/Usuario.php';

class UsuarioTest extends TestCase {
    public function testConexion() {
        $conexion = Usuario::conexion();
        $this->assertInstanceOf(\mysqli::class, $conexion);
    }
}
?>
