<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakePedidoTrait;
use Tests\ApiTestTrait;

class PedidoApiTest extends TestCase
{
    use MakePedidoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pedido()
    {
        $pedido = $this->fakePedidoData();
        $this->response = $this->json('POST', '/api/pedidos', $pedido);

        $this->assertApiResponse($pedido);
    }

    /**
     * @test
     */
    public function test_read_pedido()
    {
        $pedido = $this->makePedido();
        $this->response = $this->json('GET', '/api/pedidos/'.$pedido->id);

        $this->assertApiResponse($pedido->toArray());
    }

    /**
     * @test
     */
    public function test_update_pedido()
    {
        $pedido = $this->makePedido();
        $editedPedido = $this->fakePedidoData();

        $this->response = $this->json('PUT', '/api/pedidos/'.$pedido->id, $editedPedido);

        $this->assertApiResponse($editedPedido);
    }

    /**
     * @test
     */
    public function test_delete_pedido()
    {
        $pedido = $this->makePedido();
        $this->response = $this->json('DELETE', '/api/pedidos/'.$pedido->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/pedidos/'.$pedido->id);

        $this->response->assertStatus(404);
    }
}
