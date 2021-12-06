<?php

class PruebaTest extends \PHPUnit_Framework_TestCase {

	/** @test **/
	public function probar_que_dos_mas_dos_es_cuatro() {
		$res = 2 + 2;
		$this->assertEquals(4, $res);
	}
}