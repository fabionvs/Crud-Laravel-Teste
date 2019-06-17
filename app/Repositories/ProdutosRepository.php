<?php

namespace App\Repositories;

use App\Models\Produtos;
use App\Repositories\BaseRepository;

/**
 * Class ProdutosRepository
 * @package App\Repositories
 * @version June 17, 2019, 2:56 pm UTC
*/

class ProdutosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pedidos'
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
        return Produtos::class;
    }
}
