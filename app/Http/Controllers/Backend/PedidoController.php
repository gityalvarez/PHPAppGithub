<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreatePedidoRequest;
use App\Http\Requests\Backend\UpdatePedidoRequest;
use App\Repositories\Backend\PedidoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
//use Illuminate\Pagination\Paginator;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Backend\Comercio;
use App\Models\Backend\Pedido;
use App\Models\Backend\Articulo;
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
                if ($pedidos->count() >= 10)
                {
                    Flash::warning('Hay al menos 10 Pedidos pendientes de despacho');
                }    
                return view('backend.pedidos.index')
                    -> with('pedidos', $pedidos)
                    -> with('user', $user); 
            }
            else 
            {
                Flash::error('No existen Pedidos a despachar');             
                return view('backend.pedidos.index')
                    -> with('pedidos', $pedidos/*->paginate()*/)
                    -> with('user', $user);
            }              
        }
        if ($user -> hasRole('gerente'))
        {
            if (empty($request->input('search')))
            {
                $pedidos = $user->gerentePedidos()->get();
            }
            else
            {
                $estado = '%'.$request->input('search').'%';
                $pedidos = $user->gerentePedidos()->where('estado', 'like', $estado)->get();             
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
        $clientes = User::whereHas('roles',function($query){
            $query->where('id',4);
        })->lists('name', 'id')->all();
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
        $pedido = new Pedido();
        $pedido->estado = 'creado';
        $pedido->user_id = $request->cliente_id;
        $total = 0;
        //dd($request->articulos,$request->cantidades,$request->precios);
        for ($i=0; $i < count($request->articulos); $i++){
            if ($i == 0){
                $proximo = 0;
            }            
            else {
                $proximo ++;
            }            
            $encontrado = false;
            while ($proximo < count($request->cantidades) && !$encontrado){
                if ($request->cantidades[$proximo] != ""){
                    $encontrado = true;
                }
                else {
                    $proximo ++;
                }
            }
            $articulo = Articulo::find($request->articulos[$i]);
            $articulo->stock = $articulo->stock - $request->cantidades[$proximo];
            $articulo->save();
            $total = $total + ($request->precios[$proximo] * $request->cantidades[$proximo]);            
        }
        $pedido->total=$total;        
        $pedido->save();
        $ultimopedido = Pedido::all()->last();
        for ($i=0; $i < count($request->articulos); $i++){
            $proximo = $i;
            $encontrado = false;
            while ($proximo < count($request->cantidades) && !$encontrado){
                if ($request->cantidades[$proximo] != ""){
                    $encontrado = true;
                }
                else {
                    $proximo ++;
                }
            }
            $ultimopedido->articulos()->attach($request->articulos[$i], ['cantidad' => $request->cantidades[$proximo]]);            
        }
        $gerente_id = Auth::id();
        $ultimopedido->gerentes()->attach($gerente_id);
        Flash::success('Pedido guardado exitosamente.');
        return redirect(route('backend.pedidos.index'));
    }
    
    
    /*public function store(CreatePedidoRequest $request)
    {
        $input = $request->all();

        $pedido = $this->pedidoRepository->create($input);

        Flash::success('Pedido guardado exitosamente.');

        return redirect(route('backend.pedidos.index'));
    }*/
    
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
            Flash::error('Pedido no encontrado');

            return redirect(route('backend.pedidos.index'));
        }
        $user = User::find($pedido->user_id);
        $articulos = $pedido->articulos()->get();
        return view('backend.pedidos.show')
                ->with('pedido', $pedido)
                ->with('articulos', $articulos)
                ->with('user', $user);
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
            Flash::error('Pedido no encontado');

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
            Flash::error('Pedido no encontrado');

            return redirect(route('backend.pedidos.index'));
        }

        $pedido = $this->pedidoRepository->update($request->all(), $id);

        Flash::success('Pedido actualizado exitosamente');

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
            Flash::error('Pedido no encontrado');

            return redirect(route('backend.pedidos.index'));
        }

        $this->pedidoRepository->delete($id);

        Flash::success('Pedido borrado exitosamente');

        return redirect(route('backend.pedidos.index'));
    }
}
