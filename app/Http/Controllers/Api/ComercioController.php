<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ComercioController extends Controller
{
    public function index()
    {
        return Comercio::all();
    }
}