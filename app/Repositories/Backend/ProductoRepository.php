<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Producto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductoRepository
 * @package App\Repositories\Backend
 * @version October 19, 2017, 8:51 pm UTC
 *
 * @method Producto findWithoutFail($id, $columns = ['*'])
 * @method Producto find($id, $columns = ['*'])
 * @method Producto first($columns = ['*'])
*/
class ProductoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'=>'like',
        'codigo',
        'imagen',
        'categoria_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Producto::class;
    }
}
