<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produtos
 * @package App\Models
 * @version June 17, 2019, 6:13 pm UTC
 *
 * @property string nome
 * @property float valor
 * @property integer quantidade
 * @property boolean status
 */
class Produtos extends Model
{
    use SoftDeletes;

    public $table = 'produtos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'valor',
        'quantidade',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'valor' => 'double',
        'quantidade' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'valor' => 'required',
        'quantidade' => 'required',
        'status' => 'required'
    ];


}
