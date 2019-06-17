<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeProdutosTrait;
use Tests\ApiTestTrait;

class ProdutosApiTest extends TestCase
{
    use MakeProdutosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_produtos()
    {
        $produtos = $this->fakeProdutosData();
        $this->response = $this->json('POST', '/api/produtos', $produtos);

        $this->assertApiResponse($produtos);
    }

    /**
     * @test
     */
    public function test_read_produtos()
    {
        $produtos = $this->makeProdutos();
        $this->response = $this->json('GET', '/api/produtos/'.$produtos->id);

        $this->assertApiResponse($produtos->toArray());
    }

    /**
     * @test
     */
    public function test_update_produtos()
    {
        $produtos = $this->makeProdutos();
        $editedProdutos = $this->fakeProdutosData();

        $this->response = $this->json('PUT', '/api/produtos/'.$produtos->id, $editedProdutos);

        $this->assertApiResponse($editedProdutos);
    }

    /**
     * @test
     */
    public function test_delete_produtos()
    {
        $produtos = $this->makeProdutos();
        $this->response = $this->json('DELETE', '/api/produtos/'.$produtos->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/produtos/'.$produtos->id);

        $this->response->assertStatus(404);
    }
}
