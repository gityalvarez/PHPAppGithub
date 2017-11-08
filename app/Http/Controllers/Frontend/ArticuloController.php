<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Backend\ArticuloRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Flash;

class ArticuloController extends AppBaseController
{   
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
        $this->articuloRepository->pushCriteria(new RequestCriteria($request));
        $articulos = $this->articuloRepository->all();
        return view('frontend.articulos.index')
            ->with('articulos', $articulos, 'comercios', null);
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
            return redirect(route('frontend.articulos.index'));
        }
        return view('frontend.articulos.show')->with('articulo', $articulo, 'comercios', null);
    }   
    
}
