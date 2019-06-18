<?php

namespace Tests\Unit;

use App\Models\Produtos;
use Tests\MigrateFreshSeedOnce;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PedidosTest extends TestCase
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
        $response = $this->get('/');
        $response->assertStatus(200);

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListaPedidosTest()
    {
        $response = $this->get('/pedidos');
        $response->assertStatus(200);

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostPedidoTest()
    {
        $this->artisan('migrate:fresh', [
            '--seed' => true,
        ]);
        $credentials = array(
            'product' => [1 => 1],
            'quant' => [1 => 2],
            "solicitante" => "123",
            "despachante" => "123",
            "valor" => 200.1,
            "situacao" => 0,
            "endereco" => [
                "cep" => "12312-313",
                "uf" => "df",
                "municipio" => "123",
                "bairro" => "123",
                "rua" => "123",
                "numero" => "123"
            ],
            '_token' => 'covfefe',
        );
        $response = $this->withSession(['_token' => 'covfefe'])->post('fazer-pedido', $credentials);
        $response->assertStatus(302);

    }

    /**
     * Teste de patch
     *
     * @return void
     */
    public function testUpdatePedidoTest()
    {
        $this->artisan('migrate:fresh', [
            '--seed' => true,
        ]);
        $credentials = array(
            'product' => [1 => 1],
            'quant' => [1 => 2],
            "solicitante" => "123",
            "despachante" => "123",
            "valor" => 200.1,
            "situacao" => 0,
            "endereco" => [
                "cep" => "12312-313",
                "uf" => "df",
                "municipio" => "123",
                "bairro" => "123",
                "rua" => "123",
                "numero" => "123"
            ],
            '_token' => 'covfefe',
        );
        $response = $this->withSession(['_token' => 'covfefe'])->patch('/pedidos/1', $credentials);
        $response->assertStatus(302);

    }

    /**
     * Teste de delete
     *
     * @return void
     */
    public function testDeletePedidoTest()
    {
        $this->artisan('migrate:fresh', [
            '--seed' => true,
        ]);
        $response = $this->withSession(['_token' => 'covfefe'])->delete('/pedidos/1');
        $response->assertStatus(302);

    }
}
