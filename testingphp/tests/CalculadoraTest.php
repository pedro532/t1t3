<?php

use App\Calculadora\Calculadora;
use App\Calculadora\Excepciones\DivisionPorCeroException;
use App\Calculadora\Excepciones\ArregloException;


class CalculadoraTest extends \PHPUnit_Framework_TestCase {

	/** @test **/
	public function comprobar_que_la_funcion_suma_es_capaz_de_sumar_dos_numeros() {
		$calculadora = new Calculadora;

		$suma = $calculadora->sumar(5, 11);

		$this->assertEquals(16, $suma);
	}

	/** @test **/
	public function comprobar_que_la_funcion_sumar_arreglo_es_capaz_de_sumar_un_arreglo() {
		$calculadora = new Calculadora;

		$suma = $calculadora->sumarArreglo([8, 2, 7, 3]);

		$this->assertEquals(20, $suma);
	}

	/** @test **/
	public function comprobar_que_la_funcion_dividir_es_capaz_de_dividir_dos_numeros() {
		$calculadora = new Calculadora;

		$division = $calculadora->dividir(10, 2);

		$this->assertEquals(5, $division);
	}

	/** @test **/
	public function la_funcion_dividir_lanza_una_excepcion_cuando_se_divide_por_cero() {

		$this->expectException(DivisionPorCeroException::class);

		$calculadora = new Calculadora;

		$division = $calculadora->dividir(10, 0);		
	}

	/** @test **/
	public function comprobar_que_la_funcion_sumar_arreglo_lanza_excepcion_cuando_el_parametro_no_es_un_arreglo() {
		$this->expectException(ArregloException::class);		

		$calculadora = new Calculadora;

		$suma = $calculadora->sumarArreglo(5);

	}
}