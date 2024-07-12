<?php
namespace Tests\UsuarioTest;

use PHPUnit\Framework\TestCase;
use DB\Conectar;

class UsuarioTest extends TestCase {
    public function testConexion() {
        $conexion = Conectar::conexion();
        $this->assertInstanceOf(\mysqli::class, $conexion);
    }
}
?>
