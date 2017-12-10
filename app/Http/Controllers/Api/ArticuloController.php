<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Backend\Articulo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Producto;


class ArticuloController extends Controller
{
    public function index()
    { 
    	
    	//$articulos=Articulo::all()->toArray();
    	$articulos = Producto::join('articulos', 'productos.id', '=', 'articulos.producto_id')->get()->toArray();
        return response()->json($articulos,200);
        
    }
}