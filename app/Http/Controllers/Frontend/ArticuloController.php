<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\Articulo;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;

class ArticuloController extends AppBaseController
{
    
    public function __construct()
    {        
    }

    /**
     * Display a listing of the Articulo.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $articulos = Articulo::all();

        return view('frontend.articulos.index')
            ->with('articulos', $articulos);
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
        $articulo = Articulo::find($id);

        if (empty($articulo)) {
            Flash::error('Articulo not found');

            return redirect(route('frontend.articulos.index'));
        }

        return view('frontend.articulos.show')->with('articulo', $articulo);
    }
}
