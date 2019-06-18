<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakePedidosTrait;
use Tests\ApiTestTrait;

class PedidosApiTest extends TestCase
{
    use MakePedidosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pedidos()
    {
        $pedidos = $this->fakePedidosData();
        $this->response = $this->json('POST', '/api/pedidos', $pedidos);

        $this->assertApiResponse($pedidos);
    }

    /**
     * @test
     */
    public function test_read_pedidos()
    {
        $pedidos = $this->makePedidos();
        $this->response = $this->json('GET', '/api/pedidos/'.$pedidos->id);

        $this->assertApiResponse($pedidos->toArray());
    }

    /**
     * @test
     */
    public function test_update_pedidos()
    {
        $pedidos = $this->makePedidos();
        $editedPedidos = $this->fakePedidosData();

        $this->response = $this->json('PUT', '/api/pedidos/'.$pedidos->id, $editedPedidos);

        $this->assertApiResponse($editedPedidos);
    }

    /**
     * @test
     */
    public function test_delete_pedidos()
    {
        $pedidos = $this->makePedidos();
        $this->response = $this->json('DELETE', '/api/pedidos/'.$pedidos->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/pedidos/'.$pedidos->id);

        $this->response->assertStatus(404);
    }
}
