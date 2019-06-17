<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produtos
 * @package App\Models
 * @version June 17, 2019, 2:56 pm UTC
 *
 * @property \App\Models\ Pedidos pedidos
 * @property integer pedidos
 */
class Produtos extends Model
{
    use SoftDeletes;

    public $table = 'produtos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'pedidos'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pedidos' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pedidos()
    {
        return $this->belongsTo(\App\Models\ Pedidos::class);
    }
}
