<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 * @package App\Models\Backend
 * @version October 18, 2017, 10:35 pm UTC
 *
 * @property string nombre
 * @property integer codigo
 * @property string imagen
 * @property integer categoria_id
 * @property integer persona_id
 */
class Producto extends Model
{
    use SoftDeletes;

    public $table = 'productos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'codigo',
        'imagen',
        'categoria_id',
        'persona_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'codigo' => 'integer',
        'imagen' => 'string',
        'categoria_id' => 'integer',
        'persona_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'codigo' => 'required',
        'categoria_id' => 'required|numeric',
        'persona_id' => 'required|numeric'
    ];

    public function articulos(){
        //return $this->belongsToMany('Articulo');
        return $this->hasMany('Articulo');
    }
    
    public function categoria(){
        return $this->belongsTo('Categoria');
    }
    
    public function persona(){
        return $this->belongsTo('Persona');
    }
}
