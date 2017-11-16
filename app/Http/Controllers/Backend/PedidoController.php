<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreatePedidoRequest;
use App\Http\Requests\Backend\UpdatePedidoRequest;
use App\Repositories\Backend\PedidoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Backend\Comercio;
use App\Models\Backend\Pedido;
use App\User;

class PedidoController extends AppBaseController
{
    /** @var  PedidoRepository */
    private $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepo)
    {
        $this->pedidoRepository = $pedidoRepo;
    }

    /**
     * Display a listing of the Pedido.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user -> hasRole('despachador'))
        {
            $pedidos = Pedido::where('estado', 'creado')->get();
            if ($pedidos->count() > 0)
            {
                return view('backend.pedidos.index')
                    -> with('pedidos', $pedidos)
                    -> with('user', $user); 
            }
            else 
            {
                Flash::error('No existen Pedidos a despachar.');             
                return view('backend.pedidos.index')
                    -> with('pedidos', $pedidos)
                    -> with('user', $user);
            }              
        }
        if ($user -> hasRole('gerente'))
        {
            
            //$pedidos = Pedido::all();
            if (empty($request->input('search')))
            {
                $pedidos = $user->gerentePedidos()->get();
            }
            else
            {
            $estado = '%'.$request->input('search').'%';
            $pedidos = Pedido::where('estado', 'like', $estado)->get();
            }
            return view('backend.pedidos.index')
                -> with('pedidos', $pedidos)
                -> with('user', $user);
        }
        /*$this->pedidoRepository->pushCriteria(new RequestCriteria($request));
        $pedidos = $this->pedidoRepository->all();
        return view('backend.pedidos.index')
            -> with('pedidos', $pedidos)
            -> with('user', $user);*/
    }
        
    public function despatch(Request $request)
    {
        $pedidos = Pedido::where('estado', 'creado')->get();
        return view('backend.pedidos.dispatch')
            ->with('pedidos', $pedidos);
    }
    
    public function send(Request $request)
    {
        $pedidos = $request -> pedidos;
        $user = Auth::user();
        foreach ($pedidos as $id)
        {
          $pedido = Pedido::find($id);
          $pedido->update(['estado' => 'despachado']);
          $pedido->despachantes()->attach($user->id);
        }
        $pedidos = Pedido::where('estado', 'creado')->get();
        return view('backend.pedidos.index')
            -> with('user', $user)
            -> with('pedidos', $pedidos);
    }


    /**
     * Show the form for creating a new Pedido.
     *
     * @return Response
     */
    public function create()
    {
        $id = Auth::id();
        $comercio = Comercio::where('user_id', $id)->first();
        $articulos = $comercio->articulos()->get();
        //dd($articulos);

       // $clientes = User::all()->hasRole('4');

        $clientes = User::whereHas('roles',function($query){
            $query->where('id',4);
        });


        return view('backend.pedidos.create')
            ->with('articulos',$articulos)
            ->with('clientes',$clientes);


    }

    /**
     * Store a newly created Pedido in storage.
     *
     * @param CreatePedidoRequest $request
     *
     * @return Response
     */
    public function store(CreatePedidoRequest $request)
    {
        $input = $request->all();

        $pedido = $this->pedidoRepository->create($input);

        Flash::success('Pedido saved successfully.');

        return redirect(route('backend.pedidos.index'));
    }

    /**
     * Display the specified Pedido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('backend.pedidos.index'));
        }

        return view('backend.pedidos.show')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified Pedido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('backend.pedidos.index'));
        }

        return view('backend.pedidos.edit')->with('pedido', $pedido);
    }

    /**
     * Update the specified Pedido in storage.
     *
     * @param  int              $id
     * @param UpdatePedidoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePedidoRequest $request)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('backend.pedidos.index'));
        }

        $pedido = $this->pedidoRepository->update($request->all(), $id);

        Flash::success('Pedido updated successfully.');

        return redirect(route('backend.pedidos.index'));
    }

    /**
     * Remove the specified Pedido from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('backend.pedidos.index'));
        }

        $this->pedidoRepository->delete($id);

        Flash::success('Pedido deleted successfully.');

        return redirect(route('backend.pedidos.index'));
    }
}
