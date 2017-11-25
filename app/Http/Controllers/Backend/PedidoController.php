<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreatePedidoRequest;
use App\Http\Requests\Backend\UpdatePedidoRequest;
use App\Repositories\Backend\PedidoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
//use Illuminate\Pagination\Paginator;
use Flash;
use Response;
use Auth;
use App\Models\Backend\Comercio;
use App\Models\Backend\Pedido;
use App\Models\Backend\Articulo;
use App\User;
use Illuminate\Support\Facades\DB;

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
                    -> with('pedidos', $pedidos)
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
        $pedidos = $request->pedidos;
        $user = Auth::user();
        foreach ($pedidos as $id)
        {
          $pedido = Pedido::find($id);
          $pedido->update(['estado' => 'despachado']);
          $pedido->despachantes()->attach($user->id, ['created_at' => DB::raw('NOW()')]);
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
        $pedido->estado = "creado";
        $pedido->user_id = $request->cliente_id;
        $total = 0;
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
            $ultimopedido->articulos()->attach($request->articulos[$i], ['cantidad' => $request->cantidades[$proximo], 'created_at' => DB::raw('NOW()')]);            
        }
        $gerente_id = Auth::id();
        $ultimopedido->gerentes()->attach($gerente_id, ['created_at' => DB::raw('NOW()')]);
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
        $articulos = $pedido->articulos()->get();
        //dd($articulos);
        $clientes = User::where('id','<>',$pedido->user_id)
                    ->whereHas('roles',function($query){
                        $query->where('id',4);
                    })->lists('name', 'id'); 
        $cliente = User::where('id',$pedido->user_id)->lists('name', 'id');
        $clientes = $cliente->union($clientes);         
        return view('backend.pedidos.edit')
                ->with('articulos', $articulos)
                ->with('clientes', $clientes)
                ->with('pedido', $pedido);
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
        $pedido->user_id = $request->cliente_id;
        $total = 0;
        $articulos = $pedido->articulos()->get();
        $i=0;
        foreach ($articulos as $articulo){
        //for ($i=0; $i < count($request->articulos); $i++){
            //$articulo = Articulo::find($request->articulos[$i]);
            if ($request->cantidades[$i] > $articulo->pivot->cantidad){
                $articuloact = Articulo::find($articulo->id);
                $articuloact->stock = $articuloact->stock - ($request->cantidades[$i] - $articulo->pivot->cantidad);
                $articuloact->save();
            }
            if ($request->cantidades[$i] < $articulo->pivot->cantidad){
                $articuloact = Articulo::find($articulo->id);
                $articuloact->stock = $articuloact->stock + ($articulo->pivot->cantidad - $request->cantidades[$i]);
                $articuloact->save();
            }            
            $total = $total + ($request->precios[$i] * $request->cantidades[$i]); 
            $i++;
        //}
        }
        $pedido->total = $total;        
        $pedido->save();
        $ultimopedido = Pedido::all()->last();
        for ($i=0; $i < count($request->articulos); $i++){
            $ultimopedido->articulos()->updateExistingPivot($request->articulos[$i], ['cantidad' => $request->cantidades[$i], 'updated_at' => DB::raw('NOW()')]);            
        }
        //$pedido = $this->pedidoRepository->update($request->all(), $id);

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
        $articulos = $pedido->articulos()->get();
        foreach ($articulos as $articulo){
            DB::table('articulo_pedido')
                ->where('pedido_id', $id)
                ->where('articulo_id', $articulo->id)
                ->update(['deleted_at' => DB::raw('NOW()')]);
        }
        $gerentes = $pedido->gerentes()->get();
        foreach ($gerentes as $gerente){
            DB::table('gerente_pedido')
                ->where('pedido_id', $id)
                ->where('user_id', $gerente->id)
                ->update(['deleted_at' => DB::raw('NOW()')]);
        }
        $this->pedidoRepository->delete($id);        
        Flash::success('Pedido borrado exitosamente');
        return redirect(route('backend.pedidos.index'));
    }
}
