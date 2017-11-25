<?php 

namespace App;

use Esensi\Model\Contracts\ValidatingModelInterface;
use Esensi\Model\Traits\ValidatingModelTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Acoustep\EntrustGui\Contracts\HashMethodInterface;
use Hash;
use Zizaco\Entrust\HasRole;//importamos la clase HasRole

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, ValidatingModelInterface, HashMethodInterface
{
  use Authenticatable, CanResetPassword, ValidatingModelTrait, EntrustUserTrait;
  //use HasRole;
  
    protected $throwValidationExceptions = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'direccion', 'latitud', 'longitud'];
    
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'direccion' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $hashable = ['password'];

    protected $rulesets = [

        'creating' => [
            'email'      => 'required|email|unique:users',
            'password'   => 'required',
        ],

        'updating' => [
            'email'      => 'required|email|unique:users',
            'password'   => '',
        ],
    ];

    public function entrustPasswordHash() 
    {
        $this->password = Hash::make($this->password);
        $this->save();
    }
    
    public function clientePedidos(){
        //return $this->belongsToMany('Pedido');
        return $this->hasMany(\App\Models\Backend\Pedido::class);
    }
    
    public function comercio(){
        return $this->belongsTo(\App\Models\Backend\Comercio::class);
    }
    
    public function productos(){
        //return $this->belongsToMany('Producto');
        return $this->hasMany(\App\Models\Backend\Producto::class);
    }
    
    public function despachantePedidos(){
        return $this->belongsToMany(\App\Models\Backend\Pedido::class);       
    }
    
    public function gerentePedidos(){
        return $this->belongsToMany(\App\Models\Backend\Pedido::class);       
    }

}
