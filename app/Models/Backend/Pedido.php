<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pedido
 * @package App\Models\Backend
 * @version October 19, 2017, 8:53 pm UTC
 *
 * @property \App\Models\Backend\User user
 * @property \Illuminate\Database\Eloquent\Collection ArticuloPedido
 * @property \Illuminate\Database\Eloquent\Collection articulos
 * @property \Illuminate\Database\Eloquent\Collection DespachantePedido
 * @property \Illuminate\Database\Eloquent\Collection GerentePedido
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection productos
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property decimal total
 * @property string estado
 * @property integer user_id
 */
class Pedido extends Model
{
    use SoftDeletes;

    public $table = 'pedidos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'total',
        'estado',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado' => 'string',
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
    public function cliente()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function articulos()
    {
        return $this->belongsToMany(\App\Models\Backend\Articulo::class, 'articulo_pedido')->withPivot('cantidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function despachantes()
    {
        return $this->belongsToMany(\App\User::class, 'despachante_pedido');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTMany
     **/
    public function gerentes()
    {
        return $this->belongsToMany(\App\User::class, 'gerente_pedido');
    }     
}
