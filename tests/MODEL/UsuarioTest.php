<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use App\Model\Usuario;

class UsuarioTest extends TestCase {

    public function testLogin() {
        $usuario = new Usuario();
        $result = $usuario->login('jesus', '123'); // Replace with your valid data
        
        var_dump($result); // Verify what the login method returns
        
        $this->assertNotNull($result); // Ensure the result is not null
        $this->assertArrayHasKey('usuario', $result); // Ensure the result has the key 'usuario'
    }
}
