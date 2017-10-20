<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categoria
 * @package App\Models\Backend
 * @version October 19, 2017, 8:46 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection articuloPedido
 * @property \Illuminate\Database\Eloquent\Collection articulos
 * @property \Illuminate\Database\Eloquent\Collection despachantePedido
 * @property \Illuminate\Database\Eloquent\Collection gerentePedido
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection Producto
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string nombre
 */
class Categoria extends Model
{
    use SoftDeletes;

    public $table = 'categorias';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


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
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productos()
    {
        return $this->hasMany(\App\Models\Backend\Producto::class);
    }
}
