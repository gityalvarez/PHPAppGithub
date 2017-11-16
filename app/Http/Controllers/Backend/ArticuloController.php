<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateArticuloRequest;
use App\Http\Requests\Backend\UpdateArticuloRequest;
use App\Repositories\Backend\ArticuloRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Backend\Producto;
use App\Models\Backend\Comercio;
use App\Models\Backend\Articulo;
use Auth;
use Illuminate\Database\Eloquent\Collection;



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
        $productos = Producto::all();
        $id = Auth::id();
        $comercios = Comercio::where('user_id', $id);
        return view('backend.articulos.create')->with('productos',$productos)->with('comercios',$comercios);
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

        return view('backend.articulos.show')->with('articulo', $articulo);
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
        $comercios = $articulo->comercio();
        $productos = $articulo->producto();
        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');

            return redirect(route('backend.articulos.index'));
        }

        return view('backend.articulos.edit')->with('articulo', $articulo)->with('comercios',$comercios)->with('productos',$productos);
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

        $this->articuloRepository->delete($id);

        Flash::success('Articulo borrado exitosamente');

        return redirect(route('backend.articulos.index'));
    }
}
