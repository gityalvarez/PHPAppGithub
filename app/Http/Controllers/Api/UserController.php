<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Articulo;

class UserController extends Controller
{
    public function index()
    {
        $users=Articulo::all();
        return response()->json($users,200);
    }
}