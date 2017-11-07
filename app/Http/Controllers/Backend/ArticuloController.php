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
        $articulos = collect([]);
        $productos = Producto::where('nombre','like','%'.$request->input('search').'%')->get();
        foreach ($productos as $producto){
            $articulosaux = $producto->articulos()->get();
            $articulos = $articulos->merge($articulosaux);   
        }        
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
        //$comercios = Comercio::all()->where('user_id','=', $id);
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

        Flash::success('Articulo saved successfully.');

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
            Flash::error('Articulo not found');

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

        if (empty($articulo)) {
            Flash::error('Articulo not found');

            return redirect(route('backend.articulos.index'));
        }

        return view('backend.articulos.edit')->with('articulo', $articulo);
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
            Flash::error('Articulo not found');

            return redirect(route('backend.articulos.index'));
        }

        $articulo = $this->articuloRepository->update($request->all(), $id);

        Flash::success('Articulo updated successfully.');

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
            Flash::error('Articulo not found');

            return redirect(route('backend.articulos.index'));
        }

        $this->articuloRepository->delete($id);

        Flash::success('Articulo deleted successfully.');

        return redirect(route('backend.articulos.index'));
    }
}
