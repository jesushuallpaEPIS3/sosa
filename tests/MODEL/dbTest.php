<?php
namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use Model\Conectar;

class dbTest extends TestCase {
    public function testConexion() {
        $conexion = Conectar::conexion();
        $this->assertInstanceOf(\mysqli::class, $conexion);
    }
}
?>
