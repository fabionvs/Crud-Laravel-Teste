<?php

namespace Tests\Feature;

use App\Models\Pedidos;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $stock = new Pedidos(['quantidade'=> 1, 'valor' => 200.3, 'solicitante' => 'Teste Usuario', 'despachante' => 'Teste Usuario 2', 'endereco' => json_encode([]), 'situacao' => 0, 'produto_id' => 1]);
        $this->assertEquals('Teste Usuario 2', $stock->despachante);
    }
}
