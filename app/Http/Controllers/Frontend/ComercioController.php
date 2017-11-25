<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Backend\ComercioRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Request;
use Flash;
use Response;

class ComercioController extends AppBaseController
{
    /** @var  ComercioRepository */
    private $comercioRepository;

    public function __construct(ComercioRepository $comercioRepo)
    {
        $this->comercioRepository = $comercioRepo;
    }

    /**
     * Display a listing of the Comercio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->comercioRepository->pushCriteria(new RequestCriteria($request));
        $comercios = $this->comercioRepository->all();
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
        $comercio = $this->comercioRepository->findWithoutFail($id);
        if (empty($comercio)) {
            Flash::error('Comercio no encontrado');
            return redirect(route('frontend.comercios.index'));
        }
        return view('frontend.comercios.show')
            ->with('comercio', $comercio);
    }
    
    
    public function mapeo(Request $request)
    {
        $this->comercioRepository->pushCriteria(new RequestCriteria($request));
        $comercios = $this->comercioRepository->all();
        return view('frontend.comercios.mapeo')
            ->with('comercios', $comercios);
    }
}


