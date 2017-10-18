<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Persona
 * @package App\Models\Backend
 * @version October 18, 2017, 10:20 pm UTC
 *
 * @property string nombre
 * @property string apellido
 * @property string email
 * @property string latitud
 * @property string longitud
 */
class Persona extends Model
{
    use SoftDeletes;

    public $table = 'personas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellido',
        'email',
        'latitud',
        'longitud'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'apellido' => 'string',
        'email' => 'string',
        'latitud' => 'string',
        'longitud' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required|email'
    ];

    
}
