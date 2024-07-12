<?php
namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use App\Model\Usuario;

class UsuarioTest extends TestCase {
    public function testLogin() {
        $usuario = new Usuario();
        $result = $usuario->login('jesus', '123');
        $this->assertNotNull($result);
        $this->assertArrayHasKey('usuario', $result);
    }
}
?>
