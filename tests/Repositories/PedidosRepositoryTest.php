<?php namespace Tests\Repositories;

use App\Models\Pedidos;
use App\Repositories\PedidosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakePedidosTrait;
use Tests\ApiTestTrait;

class PedidosRepositoryTest extends TestCase
{
    use MakePedidosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PedidosRepository
     */
    protected $pedidosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pedidosRepo = \App::make(PedidosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pedidos()
    {
        $pedidos = $this->fakePedidosData();
        $createdPedidos = $this->pedidosRepo->create($pedidos);
        $createdPedidos = $createdPedidos->toArray();
        $this->assertArrayHasKey('id', $createdPedidos);
        $this->assertNotNull($createdPedidos['id'], 'Created Pedidos must have id specified');
        $this->assertNotNull(Pedidos::find($createdPedidos['id']), 'Pedidos with given id must be in DB');
        $this->assertModelData($pedidos, $createdPedidos);
    }

    /**
     * @test read
     */
    public function test_read_pedidos()
    {
        $pedidos = $this->makePedidos();
        $dbPedidos = $this->pedidosRepo->find($pedidos->id);
        $dbPedidos = $dbPedidos->toArray();
        $this->assertModelData($pedidos->toArray(), $dbPedidos);
    }

    /**
     * @test update
     */
    public function test_update_pedidos()
    {
        $pedidos = $this->makePedidos();
        $fakePedidos = $this->fakePedidosData();
        $updatedPedidos = $this->pedidosRepo->update($fakePedidos, $pedidos->id);
        $this->assertModelData($fakePedidos, $updatedPedidos->toArray());
        $dbPedidos = $this->pedidosRepo->find($pedidos->id);
        $this->assertModelData($fakePedidos, $dbPedidos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pedidos()
    {
        $pedidos = $this->makePedidos();
        $resp = $this->pedidosRepo->delete($pedidos->id);
        $this->assertTrue($resp);
        $this->assertNull(Pedidos::find($pedidos->id), 'Pedidos should not exist in DB');
    }
}
