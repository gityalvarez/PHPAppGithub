<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Backend\Articulo;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ArticuloController extends Controller
{
    public function index()
    { 
    	
    	
    	$articulos=Articulo::all();
        return response()->json($articulos,200);
        
    }
}