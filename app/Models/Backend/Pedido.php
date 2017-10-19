<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pedido
 * @package App\Models\Backend
 * @version October 18, 2017, 10:43 pm UTC
 *
 * @property decimal total
 * @property string estado
 * @property integer persona_id
 */
class Pedido extends Model
{
    use SoftDeletes;

    public $table = 'pedidos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'total',
        'estado',
        'persona_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'estado' => 'string',
        'persona_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'total' => 'numeric',
        'estado' => 'required',
        'persona_id' => 'required|numeric'
    ];

    public function cliente_pedido(){
        return $this->belongsTo('Persona');
    }
    
    public function despachante_pedidos(){
        return $this->belongsToMany('Persona');       
    }
    
    public function gerente_pedidos(){
        return $this->belongsToMany('Persona');       
    }
    
    public function articulos(){
        return $this->belongsToMany('Articulo');       
    }
}
