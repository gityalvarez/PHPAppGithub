<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateArticuloRequest;
use App\Http\Requests\Backend\UpdateArticuloRequest;
use App\Repositories\Backend\ArticuloRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Backend\Producto;
use App\Models\Backend\Comercio;
use App\Models\Backend\Articulo;
use Auth;

class ArticuloController extends AppBaseController
{
    /** @var  ArticuloRepository */
    private $articuloRepository;

    public function __construct(ArticuloRepository $articuloRepo)
    {
        $this->articuloRepository = $articuloRepo;
    }

    /**
     * Display a listing of the Articulo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {  
        $user = Auth::user();
        if ($user -> hasRole('gerente'))
        {
            if (empty($request->input('search')))
            {
                $comercio = Comercio::where('user_id', $user->id)->get()->first();
                $articulos = Articulo::where('comercio_id', $comercio->id)->get();
                if ($articulos->count() > 0)
                {
                    return view('backend.articulos.index')
                        -> with('articulos', $articulos); 
                }
                else 
                {
                    Flash::error('No existen Articulos asociados');             
                    return view('backend.articulos.index')
                        -> with('articulos', $articulos);
                }   
            }
            else
            {
                $producto = '%'.$request->input('search').'%';
                $comercio = Comercio::where('user_id', $user->id)->get()->first();
                $articulos = Articulo::where('comercio_id', $comercio->id)
                    ->whereHas('producto',function($query) use($producto){
                        $query->where('nombre', 'like', $producto);
                    })->get();
                return view('backend.articulos.index')
                    ->with('articulos', $articulos);             
            }           
        }        
        $palabra = '%'.$request->input('search').'%';
        $articulos = Articulo::whereHas('producto',function($query) use($palabra){
                $query->where('nombre', 'like', $palabra);
            })->get();
        return view('backend.articulos.index')
            ->with('articulos', $articulos); 
    }

    /**
     * Show the form for creating a new Articulo.
     *
     * @return Response
     */
    public function create()
    {
        $productos = Producto::all()->lists('nombre', 'id');
        $id = Auth::id();
        $comercio = Comercio::where('user_id', $id)->get()->first();//get()->lists('nombre','id');
        return view('backend.articulos.create')
                ->with('productos',$productos)
                ->with('comercio',$comercio);
    }

    /**
     * Store a newly created Articulo in storage.
     *
     * @param CreateArticuloRequest $request
     *
     * @return Response
     */
    public function store(CreateArticuloRequest $request)
    {
        $input = $request->all();

        $articulo = $this->articuloRepository->create($input);

        Flash::success('Articulo guardado exitosamente');

        return redirect(route('backend.articulos.index'));
    }

    /**
     * Display the specified Articulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('backend.articulos.index'));
        }

        return view('backend.articulos.show')
                ->with('articulo', $articulo);
    }

    /**
     * Show the form for editing the specified Articulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);        
        $id = Auth::id();
        $comercio = Comercio::where('user_id', $id)->get()->first();//->lists('nombre', 'id');
        $productos = Producto::where('id','<>',$articulo->producto->id)->lists('nombre', 'id');
        $producto = Producto::where('id',$articulo->producto->id)->lists('nombre', 'id');
        $productos = $producto->union($productos);
        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('backend.articulos.index'));
        }

        return view('backend.articulos.edit')
                ->with('articulo', $articulo)
                ->with('comercio',$comercio)
                ->with('productos',$productos);
    }

    /**
     * Update the specified Articulo in storage.
     *
     * @param  int              $id
     * @param UpdateArticuloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticuloRequest $request)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('backend.articulos.index'));
        }

        $articulo = $this->articuloRepository->update($request->all(), $id);

        Flash::success('Articulo actualizado exitosamente');

        return redirect(route('backend.articulos.index'));
    }

    /**
     * Remove the specified Articulo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);
        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');
            return redirect(route('backend.articulos.index'));
        }
        $pedidos = $articulo->pedidos()->first();
        /*$encontrado = false;
        foreach ($pedidos as $pedido){
            if ($pedido->estado == "creado"){
                $encontrado = true;
            }
        }*/
        if (empty($pedidos) /*|| !$encontrado*/){
            $this->articuloRepository->delete($id);
            Flash::success('Articulo borrado exitosamente');
            return redirect(route('backend.articulos.index'));
        }
        else {
            Flash::error('No es posible eliminar el Articulo dado que pertenece a un Pedido');
            return redirect(route('backend.articulos.index'));
        }
    }
}
