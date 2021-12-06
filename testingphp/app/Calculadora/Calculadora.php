<?php

namespace App\Calculadora;

use App\Calculadora\Excepciones\DivisionPorCeroException;
use App\Calculadora\Excepciones\ArregloException;

class Calculadora {
	public function sumar($a, $b) {
		return $a + $b;
	}

	public function sumarArreglo($arreglo = []) {
		if (!is_array($arreglo)) {
			throw new ArregloException();			
		}
		return array_sum($arreglo);
	}

	public function dividir($a, $b) {
		if ($b === 0) {
			throw new DivisionPorCeroException();			
		}
		return $a / $b;
	}

}