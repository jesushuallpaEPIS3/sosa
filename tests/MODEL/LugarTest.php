<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use App\Model\Lugar;
use mysqli;
use mysqli_result;
use PHPUnit\Framework\MockObject\MockObject;

class LugarTest extends TestCase
{
    /** @var mysqli|MockObject */
    private $dbMock;

    /** @var Lugar */
    private $lugar;

    protected function setUp(): void
    {
        // Crear un mock de la conexión a la base de datos
        $this->dbMock = $this->createMock(mysqli::class);
        
        // Crear la instancia de Lugar usando el mock de la base de datos
        $this->lugar = new Lugar($this->dbMock);
    }



}
?>
