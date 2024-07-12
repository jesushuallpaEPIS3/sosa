<?php
use PHPUnit\Framework\TestCase;
use App\Model\Usuario;

class CalculadoraTest extends TestCase {
    public function testSumar() {
        $calculadora = new Calculadora();
        $this->assertEquals(4, $calculadora->sumar(2, 2));
    }

    public function testRestar() {
        $calculadora = new Calculadora();
        $this->assertEquals(0, $calculadora->restar(2, 2));
    }

    public function testMultiplicar() {
        $calculadora = new Calculadora();
        $this->assertEquals(4, $calculadora->multiplicar(2, 2));
    }

    public function testDividir() {
        $calculadora = new Calculadora();
        $this->assertEquals(2, $calculadora->dividir(4, 2));
    }

    public function testDividirPorCero() {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("División por cero");

        $calculadora = new Calculadora();
        $calculadora->dividir(4, 0);
    }
}
?>
