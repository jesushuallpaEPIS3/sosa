<?php
namespace Tests\DB;

use PHPUnit\Framework\TestCase;
use DB\Usuario;

class UsuarioTest extends TestCase {
    public function testConexion() {
        $conexion = Conectar::conexion();
        $this->assertInstanceOf(\mysqli::class, $conexion);
    }
}
?>
