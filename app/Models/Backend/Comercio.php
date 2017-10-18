<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comercio
 * @package App\Models\Backend
 * @version October 18, 2017, 10:25 pm UTC
 *
 * @property string nombre
 * @property string direccion
 * @property string latitud
 * @property string longitud
 * @property string logo
 * @property integer gerente_id
 */
class Comercio extends Model
{
    use SoftDeletes;

    public $table = 'comercios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'direccion',
        'latitud',
        'longitud',
        'logo',
        'gerente_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'direccion' => 'string',
        'latitud' => 'string',
        'longitud' => 'string',
        'logo' => 'string',
        'gerente_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'direccion' => 'required',
        'gerente_id' => 'numeric'
    ];

    
}
