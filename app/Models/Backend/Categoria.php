<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categoria
 * @package App\Models\Backend
 * @version October 18, 2017, 10:16 pm UTC
 *
 * @property string nombre
 */
class Categoria extends Model
{
    use SoftDeletes;

    public $table = 'categorias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    
}
