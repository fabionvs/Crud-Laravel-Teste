<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Produtos;
use App\Repositories\ProdutosRepository;

trait MakeProdutosTrait
{
    /**
     * Create fake instance of Produtos and save it in database
     *
     * @param array $produtosFields
     * @return Produtos
     */
    public function makeProdutos($produtosFields = [])
    {
        /** @var ProdutosRepository $produtosRepo */
        $produtosRepo = \App::make(ProdutosRepository::class);
        $theme = $this->fakeProdutosData($produtosFields);
        return $produtosRepo->create($theme);
    }

    /**
     * Get fake instance of Produtos
     *
     * @param array $produtosFields
     * @return Produtos
     */
    public function fakeProdutos($produtosFields = [])
    {
        return new Produtos($this->fakeProdutosData($produtosFields));
    }

    /**
     * Get fake data of Produtos
     *
     * @param array $produtosFields
     * @return array
     */
    public function fakeProdutosData($produtosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'valor' => $fake->word,
            'quantidade' => $fake->randomDigitNotNull,
            'status' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $produtosFields);
    }
}
