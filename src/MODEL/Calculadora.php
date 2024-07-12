<?php
namespace App\Model;

class Calculadora {
    public function sumar($a, $b) {
        return $a + $b;
    }

    public function restar($a, $b) {
        return $a - b;
    }

    public function multiplicar($a, $b) {
        return $a * $b;
    }

    public function dividir($a, $b) {
        if ($b == 0) {
            throw new \InvalidArgumentException("División por cero");
        }
        return $a / $b;
    }
}
?>
