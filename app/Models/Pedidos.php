<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pedidos
 * @package App\Models
 * @version June 17, 2019, 3:41 pm UTC
 *
 * @property integer quantidade
 * @property integer valor
 * @property string solicitante
 * @property string despachante
 * @property json endereco
 * @property integer situacao
 */
class Pedidos extends Model
{
    use SoftDeletes;

    public $table = 'pedidos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'quantidade',
        'valor',
        'solicitante',
        'despachante',
        'endereco',
        'situacao',
        'produto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'quantidade' => 'integer',
        'valor' => 'integer',
        'solicitante' => 'string',
        'despachante' => 'string',
        'situacao' => 'integer',
        'produto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'quantidade' => 'required',
        'valor' => 'required',
        'solicitante' => 'required',
        'despachante' => 'required',
        'endereco' => 'required',
        'situacao' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produto()
    {
        return $this->belongsTo(Produtos::class, 'produto_id');
    }

}
