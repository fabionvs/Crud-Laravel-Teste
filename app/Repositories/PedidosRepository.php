<?php

namespace App\Repositories;

use App\Models\Pedidos;
use App\Repositories\BaseRepository;

/**
 * Class PedidosRepository
 * @package App\Repositories
 * @version June 17, 2019, 3:41 pm UTC
*/

class PedidosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quantidade',
        'valor',
        'solicitante',
        'endereco',
        'situacao'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pedidos::class;
    }

}
