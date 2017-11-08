<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\Pedido;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Backend\PedidoRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Flash;


/**
 * Description of PedidoController
 *
 * @author Leonardo
 */
class PedidoController extends AppBaseController {     
    
    private $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepo)
    {
        $this->pedidoRepository = $pedidoRepo;
    }    
    
    
    public function index()
    {
        return view('frontend.pedidos.index');
    }
    
    
    public function search(Request $request)
    {
        if ($request->has('numero'))
        {
            //$this->pedidoRepository->pushCriteria(new RequestCriteria($request));
            //$pedido = $this->pedidoRepository->find($request->numero);
            $pedido = Pedido::find($request->numero); 
            if (!empty($pedido))
            {
                return view('frontend.pedidos.show')
                    ->with('pedido', $pedido);
            }
            else 
            {
                Flash::error('No existe el pedido con el número especificado.');             
                return view('frontend.pedidos.index');
            }
        }
    }
    
}
