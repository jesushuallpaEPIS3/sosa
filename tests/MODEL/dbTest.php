<?php
namespace Tests\MODEL;

use PHPUnit\Framework\TestCase;
use DB\Conectar;

class dbTest extends TestCase {
    public function testConexion() {
        $conexion = Conectar::conexion();
        $this->assertInstanceOf(\mysqli::class, $conexion);
    }
}
?>
