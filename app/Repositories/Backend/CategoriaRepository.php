<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Categoria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategoriaRepository
 * @package App\Repositories\Backend
 * @version October 19, 2017, 8:46 pm UTC
 *
 * @method Categoria findWithoutFail($id, $columns = ['*'])
 * @method Categoria find($id, $columns = ['*'])
 * @method Categoria first($columns = ['*'])
*/
class CategoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'=>'LIKE'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Categoria::class;
    }
}
