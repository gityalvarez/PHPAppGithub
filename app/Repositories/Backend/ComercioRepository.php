<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Comercio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ComercioRepository
 * @package App\Repositories\Backend
 * @version October 18, 2017, 10:25 pm UTC
 *
 * @method Comercio findWithoutFail($id, $columns = ['*'])
 * @method Comercio find($id, $columns = ['*'])
 * @method Comercio first($columns = ['*'])
*/
class ComercioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'direccion',
        'latitud',
        'longitud',
        'logo',
        'persona_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comercio::class;
    }
}
