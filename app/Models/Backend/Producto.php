<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 * @package App\Models\Backend
 * @version October 19, 2017, 8:51 pm UTC
 *
 * @property \App\Models\Backend\Categoria categoria
 * @property \App\Models\Backend\User user
 * @property \Illuminate\Database\Eloquent\Collection articuloPedido
 * @property \Illuminate\Database\Eloquent\Collection Articulo
 * @property \Illuminate\Database\Eloquent\Collection despachantePedido
 * @property \Illuminate\Database\Eloquent\Collection gerentePedido
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string nombre
 * @property integer codigo
 * @property string imagen
 * @property integer categoria_id
 * @property integer user_id
 */
class Producto extends Model
{
    use SoftDeletes;

    public $table = 'productos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'codigo',
        'imagen',
        'categoria_id',
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
        'codigo' => 'integer',
        'imagen' => 'string',
        'categoria_id' => 'integer',
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
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Backend\Categoria::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function administrador()
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
