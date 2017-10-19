<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use App\Models\Backend\Pedido;

class UpdatePedidoRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Pedido::$rules;
    }
}
