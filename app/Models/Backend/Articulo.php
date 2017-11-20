<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Articulo
 * @package App\Models\Backend
 * @version October 19, 2017, 8:52 pm UTC
 *
 * @property \App\Models\Backend\Comercio comercio
 * @property \App\Models\Backend\Producto producto
 * @property \Illuminate\Database\Eloquent\Collection ArticuloPedido
 * @property \Illuminate\Database\Eloquent\Collection despachantePedido
 * @property \Illuminate\Database\Eloquent\Collection gerentePedido
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection productos
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer stock
 * @property decimal precio
 * @property integer producto_id
 * @property integer comercio_id
 */
class Articulo extends Model
{
    use SoftDeletes;

    public $table = 'articulos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'stock',
        'precio',
        'producto_id',
        'comercio_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stock' => 'integer',
        'producto_id' => 'integer',
        'comercio_id' => 'integer'
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
    public function comercio()
    {
        return $this->belongsTo(\App\Models\Backend\Comercio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function producto()
    {
        return $this->belongsTo(\App\Models\Backend\Producto::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function pedidos()
    {
        return $this->belongsToMany(\App\Models\Backend\Pedido::class, 'articulo_pedido')->withPivot('cantidad');
    }
}
