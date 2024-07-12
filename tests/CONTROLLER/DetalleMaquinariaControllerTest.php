<?php
namespace Tests\Controller;

use PHPUnit\Framework\TestCase;
use App\Controller\DetalleMaquinariaController;
use App\Model\DetalleMaquinariaModel;

class DetalleMaquinariaControllerTest extends TestCase {
    protected $controller;
    protected $detalleMaquinariaModel;
    protected $mockDb;

    protected function setUp(): void {
        parent::setUp();

        // Crear un mock de DetalleMaquinariaModel
        $this->detalleMaquinariaModel = $this->createMock(DetalleMaquinariaModel::class);

        // Crear un mock de PDO o mysqli
        $this->mockDb = $this->createMock(\PDO::class); // Puedes usar \mysqli si prefieres

        // Pasa el mock de DetalleMaquinariaModel y el mock de base de datos al constructor de DetalleMaquinariaController
        $this->controller = new DetalleMaquinariaController($this->detalleMaquinariaModel, $this->mockDb);
    }
    



}
?>
