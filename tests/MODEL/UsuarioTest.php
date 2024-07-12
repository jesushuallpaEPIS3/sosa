<?php
namespace Tests\MODEL;

use PHPUnit\Framework\TestCase;
use Model\Usuario;

class UsuarioTest extends TestCase {
    public function testConexion() {
        $conexion = Conectar::conexion();
        $this->assertInstanceOf(\mysqli::class, $conexion);
    }
}
?>