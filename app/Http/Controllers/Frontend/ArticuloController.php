<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Backend\ArticuloRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Flash;
use App\Models\Backend\Categoria;
use App\Models\Backend\Articulo;


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
        $categorias = Categoria::lists('nombre', 'id')->all();
        if ($request->input('rangoprecios') <> 0)
        {
            $rangoprecios = $request->input('rangoprecios');
            if ($rangoprecios == 1)
            {
                $preciomin = 1;
                $preciomax = 300;
            }    
            if ($rangoprecios == 2)
            {
                $preciomin = 301;
                $preciomax = 600;
            }
            if ($rangoprecios == 3)
            {
                $preciomin = 601;
                $preciomax = 900;
            }
            if ($rangoprecios == 4)
            {
                $preciomin = 901;
                $preciomax = 1200;
            }
            if ($rangoprecios == 5)
            {
                $preciomin = 1201;
                $preciomax = 1500;
            }
            if ($rangoprecios == 6)
            {
                $preciomin = 1501;
                $preciomax = 1800;
            }
            if ($rangoprecios == 7)
            {
                $preciomin = 1801;
                $preciomax = 2100;
            }
            if ($rangoprecios == 8)
            {
                $preciomin = 2101;
                $preciomax = 999999;
            }
        }        
        if ($request->has('nombre') && ($request->input('categoriaident') <> 0) && ($request->input('rangoprecios') <> 0))
        {
            $catident = $request->input('categoriaident');
            $producto = '%'.$request->input('nombre').'%';
            $articulos = Articulo::join('productos', 'productos.id', '=', 'articulos.producto_id')
                ->where('precio', '>=', $preciomin)
                ->where('precio', '<=', $preciomax)
                ->where('nombre', 'like', $producto)
                ->where('categoria_id', $catident)            
                ->get();        
            return view('frontend.articulos.index', compact('categorias'))
                ->with('articulos', $articulos);  
        }
        if ($request->has('nombre') && ($request->input('categoriaident') <> 0) && ($request->input('rangoprecios') == 0))
        {
            $catident = $request->input('categoriaident');
            $producto = '%'.$request->input('nombre').'%';
            $articulos = Articulo::join('productos', 'productos.id', '=', 'articulos.producto_id')
                ->where('nombre', 'like', $producto)
                ->where('categoria_id', $catident)            
                ->get();        
            return view('frontend.articulos.index', compact('categorias'))
                ->with('articulos', $articulos);  
        }
        if ($request->has('nombre') && ($request->input('categoriaident') == 0) && ($request->input('rangoprecios') <> 0))
        {
            $producto = '%'.$request->input('nombre').'%';            
            $articulos = Articulo::join('productos', 'productos.id', '=', 'articulos.producto_id')
                ->where('precio', '>=', $preciomin)
                ->where('precio', '<=', $preciomax)
                ->where('nombre', 'like', $producto)            
                ->get();        
            return view('frontend.articulos.index', compact('categorias'))
                ->with('articulos', $articulos);    
        }
        if ($request->has('nombre') && ($request->input('categoriaident') == 0) && ($request->input('rangoprecios') == 0))
        {
            $producto = '%'.$request->input('nombre').'%';
            $articulos = Articulo::join('productos', 'productos.id', '=', 'articulos.producto_id')
                ->where('nombre', 'like', $producto)            
                ->get();        
            return view('frontend.articulos.index', compact('categorias'))
                ->with('articulos', $articulos);  
        }
        if (!$request->has('nombre') && ($request->input('categoriaident') <> 0) && ($request->input('rangoprecios') <> 0))
        {
            $catident = $request->input('categoriaident');            
            $articulos = Articulo::join('productos', 'productos.id', '=', 'articulos.producto_id')
                ->where('precio', '>=', $preciomin)
                ->where('precio', '<=', $preciomax)                
                ->where('categoria_id', $catident)            
                ->get();        
            return view('frontend.articulos.index', compact('categorias'))
                ->with('articulos', $articulos);  
        }
        if (!$request->has('nombre') && ($request->input('categoriaident') <> 0) && ($request->input('rangoprecios') == 0))
        {
            $catident = $request->input('categoriaident');
            $articulos = Articulo::join('productos', 'productos.id', '=', 'articulos.producto_id')
                ->where('categoria_id', $catident)           
                ->get();        
            return view('frontend.articulos.index', compact('categorias'))
                ->with('articulos', $articulos);  
        }
        if (!$request->has('nombre') && ($request->input('categoriaident') == 0) && ($request->input('rangoprecios') <> 0))
        {
            $articulos = Articulo::where('precio', '>=', $preciomin)
                ->where('precio', '<=', $preciomax)       
                ->get();        
            return view('frontend.articulos.index', compact('categorias'))
                ->with('articulos', $articulos);  
        }        
        $this->articuloRepository->pushCriteria(new RequestCriteria($request));
        $articulos = $this->articuloRepository->all();
        return view('frontend.articulos.index', compact('categorias'))
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
        $articulo = $this->articuloRepository->findWithoutFail($id);
        if (empty($articulo)) {
            Flash::error('Articulo no encontrado');
            return redirect(route('frontend.articulos.index'));
        }
        return view('frontend.articulos.show')->with('articulo', $articulo);
    }    
}
