<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comercio
 * @package App\Models\Backend
 * @version October 19, 2017, 8:49 pm UTC
 *
 * @property \App\Models\Backend\User user
 * @property \Illuminate\Database\Eloquent\Collection articuloPedido
 * @property \Illuminate\Database\Eloquent\Collection Articulo
 * @property \Illuminate\Database\Eloquent\Collection despachantePedido
 * @property \Illuminate\Database\Eloquent\Collection gerentePedido
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection productos
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string nombre
 * @property string direccion
 * @property string latitud
 * @property string longitud
 * @property string logo
 * @property integer user_id
 */
class Comercio extends Model
{
    //use SoftDeletes;

    public $table = 'comercios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'direccion',
        'latitud',
        'longitud',
        'logo',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'direccion' => 'string',
        'latitud' => 'string',
        'longitud' => 'string',
        'logo' => 'string',
        'user_id' => 'integer'
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
    public function gerente()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articulos()
    {
        return $this->hasMany(\App\Models\Backend\Articulo::class);
    }
}
