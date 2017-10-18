<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Persona;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PersonaRepository
 * @package App\Repositories\Backend
 * @version October 18, 2017, 10:20 pm UTC
 *
 * @method Persona findWithoutFail($id, $columns = ['*'])
 * @method Persona find($id, $columns = ['*'])
 * @method Persona first($columns = ['*'])
*/
class PersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'email',
        'latitud',
        'longitud'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Persona::class;
    }
}
