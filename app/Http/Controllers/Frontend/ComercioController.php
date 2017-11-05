<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\Comercio;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;

class ComercioController extends AppBaseController
{
    
    public function __construct()
    {       
       // contructor vacío 
    }

    /**
     * Display a listing of the Comercio.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $comercios = Comercio::all();

        return view('frontend.comercios.index')
            ->with('comercios', $comercios);
    }

    /**
     * Display the specified Comercio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comercio = Comercio::find($id);

        if (empty($comercio)) {
            Flash::error('Comercio not found');

            return redirect(route('frontend.comercios.index'));
        }

        return view('frontend.comercios.show')->with('comercio', $comercio);
    }
}


