<?php

namespace App\Http\Controllers\WebMobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class IndexController extends Controller
{
    public function index()
    {
        return view('webmobile.index');
    }
}