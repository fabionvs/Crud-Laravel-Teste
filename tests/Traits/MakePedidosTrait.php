<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Pedidos;
use App\Repositories\PedidosRepository;

trait MakePedidosTrait
{
    /**
     * Create fake instance of Pedidos and save it in database
     *
     * @param array $pedidosFields
     * @return Pedidos
     */
    public function makePedidos($pedidosFields = [])
    {
        /** @var PedidosRepository $pedidosRepo */
        $pedidosRepo = \App::make(PedidosRepository::class);
        $theme = $this->fakePedidosData($pedidosFields);
        return $pedidosRepo->create($theme);
    }

    /**
     * Get fake instance of Pedidos
     *
     * @param array $pedidosFields
     * @return Pedidos
     */
    public function fakePedidos($pedidosFields = [])
    {
        return new Pedidos($this->fakePedidosData($pedidosFields));
    }

    /**
     * Get fake data of Pedidos
     *
     * @param array $pedidosFields
     * @return array
     */
    public function fakePedidosData($pedidosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'quantidade' => $fake->randomDigitNotNull,
            'valor' => $fake->randomDigitNotNull,
            'solicitante' => $fake->word,
            'endereco' => $fake->word,
            'situacao' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $pedidosFields);
    }
}
