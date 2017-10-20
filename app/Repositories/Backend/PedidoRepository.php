<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Pedido;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PedidoRepository
 * @package App\Repositories\Backend
 * @version October 19, 2017, 8:53 pm UTC
 *
 * @method Pedido findWithoutFail($id, $columns = ['*'])
 * @method Pedido find($id, $columns = ['*'])
 * @method Pedido first($columns = ['*'])
*/
class PedidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'total',
        'estado',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pedido::class;
    }
}
