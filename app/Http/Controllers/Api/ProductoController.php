<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Backend\Producto;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos,200);
    }
}