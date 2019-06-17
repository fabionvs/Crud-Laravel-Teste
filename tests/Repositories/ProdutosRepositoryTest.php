<?php namespace Tests\Repositories;

use App\Models\Produtos;
use App\Repositories\ProdutosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeProdutosTrait;
use Tests\ApiTestTrait;

class ProdutosRepositoryTest extends TestCase
{
    use MakeProdutosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProdutosRepository
     */
    protected $produtosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->produtosRepo = \App::make(ProdutosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_produtos()
    {
        $produtos = $this->fakeProdutosData();
        $createdProdutos = $this->produtosRepo->create($produtos);
        $createdProdutos = $createdProdutos->toArray();
        $this->assertArrayHasKey('id', $createdProdutos);
        $this->assertNotNull($createdProdutos['id'], 'Created Produtos must have id specified');
        $this->assertNotNull(Produtos::find($createdProdutos['id']), 'Produtos with given id must be in DB');
        $this->assertModelData($produtos, $createdProdutos);
    }

    /**
     * @test read
     */
    public function test_read_produtos()
    {
        $produtos = $this->makeProdutos();
        $dbProdutos = $this->produtosRepo->find($produtos->id);
        $dbProdutos = $dbProdutos->toArray();
        $this->assertModelData($produtos->toArray(), $dbProdutos);
    }

    /**
     * @test update
     */
    public function test_update_produtos()
    {
        $produtos = $this->makeProdutos();
        $fakeProdutos = $this->fakeProdutosData();
        $updatedProdutos = $this->produtosRepo->update($fakeProdutos, $produtos->id);
        $this->assertModelData($fakeProdutos, $updatedProdutos->toArray());
        $dbProdutos = $this->produtosRepo->find($produtos->id);
        $this->assertModelData($fakeProdutos, $dbProdutos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_produtos()
    {
        $produtos = $this->makeProdutos();
        $resp = $this->produtosRepo->delete($produtos->id);
        $this->assertTrue($resp);
        $this->assertNull(Produtos::find($produtos->id), 'Produtos should not exist in DB');
    }
}
