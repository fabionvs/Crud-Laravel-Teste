<?php

namespace Tests\Unit;

use App\Models\Produtos;
use Tests\MigrateFreshSeedOnce;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProdutosTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListaProdutoTest()
    {
        $response = $this->get('/pedidos');
        $response->assertStatus(200);

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostProdutoTest()
    {
        $this->artisan('migrate:fresh', [
            '--seed' => true,
        ]);
        $credentials = array(
            "nome" => "teste",
            "valor" => 200.1,
            "quantidade" => 50,
            "status" => 1,
            '_token' => 'covfefe',
        );
        $response = $this->withSession(['_token' => 'covfefe'])->post('/produtos', $credentials);
        $response->assertStatus(302);

    }

    /**
     * Teste de patch
     *
     * @return void
     */
    public function testUpdateProdutoTest()
    {
        $this->artisan('migrate:fresh', [
            '--seed' => true,
        ]);
        $credentials = array(
            "nome" => "teste",
            "valor" => 200.1,
            "quantidade" => 50,
            "status" => 1,
            '_token' => 'covfefe',
        );
        $response = $this->withSession(['_token' => 'covfefe'])->patch('/produtos/1', $credentials);
        $response->assertStatus(302);

    }

    /**
     * Teste de delete
     *
     * @return void
     */
    public function testDeleteProdutoTest()
    {
        $this->artisan('migrate:fresh', [
            '--seed' => true,
        ]);
        $response = $this->withSession(['_token' => 'covfefe'])->delete('/produtos/1');
        $response->assertStatus(302);

    }
}
