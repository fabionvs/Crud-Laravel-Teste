<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->withoutMiddleware();
        $response = $this->get('/');
        $response->assertStatus(200);

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListaProdutosTest()
    {
        $this->withoutMiddleware();
        $response = $this->get('/produtos');
        $response->assertStatus(200);

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListaPedidosTest()
    {
        $this->withoutMiddleware();
        $response = $this->get('/pedidos');
        $response->assertStatus(200);

    }
}
