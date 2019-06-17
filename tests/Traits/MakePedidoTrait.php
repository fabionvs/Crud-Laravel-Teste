<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Pedido;
use App\Repositories\PedidoRepository;

trait MakePedidoTrait
{
    /**
     * Create fake instance of Pedido and save it in database
     *
     * @param array $pedidoFields
     * @return Pedido
     */
    public function makePedido($pedidoFields = [])
    {
        /** @var PedidoRepository $pedidoRepo */
        $pedidoRepo = \App::make(PedidoRepository::class);
        $theme = $this->fakePedidoData($pedidoFields);
        return $pedidoRepo->create($theme);
    }

    /**
     * Get fake instance of Pedido
     *
     * @param array $pedidoFields
     * @return Pedido
     */
    public function fakePedido($pedidoFields = [])
    {
        return new Pedido($this->fakePedidoData($pedidoFields));
    }

    /**
     * Get fake data of Pedido
     *
     * @param array $pedidoFields
     * @return array
     */
    public function fakePedidoData($pedidoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'produto_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $pedidoFields);
    }
}
