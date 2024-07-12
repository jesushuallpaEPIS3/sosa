<?php
use PHPUnit\Framework\TestCase;
use App\Model\Usuario;
use mysqli;
use mysqli_stmt;
use mysqli_result;

class UsuarioTest extends TestCase {
    private $usuario;
    private $dbMock;

    protected function setUp(): void {
        // Mock the database connection
        $this->dbMock = $this->createMock(mysqli::class);

        // Inject the mock into the Usuario class
        $this->usuario = $this->getMockBuilder(Usuario::class)
                              ->setConstructorArgs([])
                              ->onlyMethods(['__construct'])
                              ->getMock();
        $this->usuario->db = $this->dbMock;
    }

    public function testLoginSuccess() {
        // Arrange
        $username = 'jesus';
        $password = '123';

        $stmtMock = $this->createMock(mysqli_stmt::class);
        $resultMock = $this->createMock(mysqli_result::class);

        // Configure the result mock
        $resultMock->expects($this->once())
                   ->method('fetch_assoc')
                   ->willReturn(['id' => 1, 'usuario' => $username]);

        // Configure the statement mock
        $stmtMock->expects($this->once())
                 ->method('bind_param')
                 ->with('ss', $username, $password);
        $stmtMock->expects($this->once())
                 ->method('execute')
                 ->willReturn(true);
        $stmtMock->expects($this->once())
                 ->method('get_result')
                 ->willReturn($resultMock);

        // Configure the database mock
        $this->dbMock->expects($this->once())
                     ->method('prepare')
                     ->with('SELECT * FROM tbadmin WHERE usuario = ? AND password = ?')
                     ->willReturn($stmtMock);

        // Act
        $result = $this->usuario->login($username, $password);

        // Assert
        $this->assertEquals(['id' => 1, 'usuario' => $username], $result);
    }

    public function testLoginFailure() {
        // Arrange
        $username = 'wronguser';
        $password = 'wrongpass';

        $stmtMock = $this->createMock(mysqli_stmt::class);
        $resultMock = $this->createMock(mysqli_result::class);

        // Configure the result mock
        $resultMock->expects($this->once())
                   ->method('fetch_assoc')
                   ->willReturn(null);

        // Configure the statement mock
        $stmtMock->expects($this->once())
                 ->method('bind_param')
                 ->with('ss', $username, $password);
        $stmtMock->expects($this->once())
                 ->method('execute')
                 ->willReturn(true);
        $stmtMock->expects($this->once())
                 ->method('get_result')
                 ->willReturn($resultMock);

        // Configure the database mock
        $this->dbMock->expects($this->once())
                     ->method('prepare')
                     ->with('SELECT * FROM tbadmin WHERE usuario = ? AND password = ?')
                     ->willReturn($stmtMock);

        // Act
        $result = $this->usuario->login($username, $password);

        // Assert
        $this->assertNull($result);
    }
}
?>
