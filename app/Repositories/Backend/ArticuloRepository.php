<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Articulo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ArticuloRepository
 * @package App\Repositories\Backend
 * @version October 18, 2017, 10:41 pm UTC
 *
 * @method Articulo findWithoutFail($id, $columns = ['*'])
 * @method Articulo find($id, $columns = ['*'])
 * @method Articulo first($columns = ['*'])
*/
class ArticuloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stock',
        'precio',
        'producto_id',
        'comercio_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Articulo::class;
    }
}
