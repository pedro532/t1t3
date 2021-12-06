<?php

class APITest extends \PHPUnit_Framework_TestCase {

	/** @test **/
	public function podemos_obtener_el_recurso_mediante_el_endpoint_get () {
		$cliente = new GuzzleHttp\Client();

		$res = $cliente->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');

		$data = json_decode($res->getBody(), true);

		$this->assertArrayHasKey('userId', $data);
		$this->assertArrayHasKey('title', $data);
	}

	/** @test **/
	public function podemos_crear_el_recurso_mediante_el_endpoint_post () {
		$cliente = new GuzzleHttp\Client();

		$res = $cliente->request('POST', 'https://jsonplaceholder.typicode.com/posts', [
			"userId" => 1,
			"title" => "my titulo",
			"body"=> "mi contenido"
		]);

		$data = json_decode($res->getBody(), true);		

		$this->assertEquals(201, $res->getStatusCode());
		$this->assertEquals(101, $data['id']);
	}


	/** @test **/
	public function podemos_eliminar_el_recurso_mediante_el_endpoint_delete () {
		$cliente = new GuzzleHttp\Client();

		$res = $cliente->request('DELETE', 'https://jsonplaceholder.typicode.com/posts/1');

		$this->assertEquals(200, $res->getStatusCode());
	}

	/** @test **/
	public function podemos_modificar_el_recurso_mediante_el_endpoint_put () {
		$cliente = new GuzzleHttp\Client();

		$res = $cliente->request('PATCH', 'https://jsonplaceholder.typicode.com/posts/1', [			
			"title" => "my titulo"			
		]);

		$data = json_decode($res->getBody(), true);			

		$this->assertEquals(200, $res->getStatusCode());
		$this->assertEquals(1, $data['id']);
	}
}