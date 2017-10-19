<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Articulo
 * @package App\Models\Backend
 * @version October 18, 2017, 10:41 pm UTC
 *
 * @property integer stock
 * @property decimal precio
 * @property integer producto_id
 * @property integer comercio_id
 */
class Articulo extends Model
{
    use SoftDeletes;

    public $table = 'articulos';
    

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
        'stock' => 'required|numeric',
        'precio' => 'required|numeric',
        'producto_id' => 'required|numeric',
        'comercio_id' => 'required|numeric'
    ];

    public function comercio(){
        return $this->belongsTo('Comercio');
    }
    
    public function producto(){
        return $this->belongsTo('Producto');
    }
    
    public function pedidos(){
        return $this->belongsToMany('Pedido');       
    }
}
