<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateComercioRequest;
use App\Http\Requests\Backend\UpdateComercioRequest;
use App\Repositories\Backend\ComercioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Storage;
use App\User;

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

        return view('backend.comercios.index')
            ->with('comercios', $comercios);
    }

    /**
     * Show the form for creating a new Comercio.
     *
     * @return Response
     */
    public function create()
    {
        $gerentes = User::whereHas('roles',function($query){
            $query->where('id',2);
        })->lists('name', 'id');
        return view('backend.comercios.create')
                ->with('gerentes',$gerentes);
    }

    /**
     * Store a newly created Comercio in storage.
     *
     * @param CreateComercioRequest $request
     *
     * @return Response
     */
    public function store(CreateComercioRequest $request)
    {   
        if(!$request->validate([
            'logo_comercio' =>'required|image|mimes:jpg,png|image_size:<=300'
        ])){
            abort(404);
        }
        $file = $request->file('logo_comercio');
        
        $input = $request->except(['logo_comercio']);
        $newFilename =  'logo-comercio-'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->put($newFilename, file_get_contents($file));       
        $input['logo'] =$newFilename;
        $comercio = $this->comercioRepository->create($input);
        Flash::success('Comercio guardado exitosamente');
        return redirect(route('backend.comercios.index'));
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

            return redirect(route('backend.comercios.index'));
        }

        return view('backend.comercios.show')
                ->with('comercio', $comercio);
    }

    /**
     * Show the form for editing the specified Comercio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comercio = $this->comercioRepository->findWithoutFail($id);
        if (empty($comercio)) {
            Flash::error('Comercio no encontrado');

            return redirect(route('backend.comercios.index'));
        }
        $gerentes = User::where('id','<>',$comercio->user_id)
                    ->whereHas('roles',function($query){
                        $query->where('id',2);
                    })->lists('name', 'id'); 
        $gerente = User::where('id',$comercio->user_id)->lists('name', 'id');
        $gerentes = $gerente->union($gerentes);
        return view('backend.comercios.edit')
                ->with('comercio', $comercio)
                ->with('gerentes', $gerentes);
    }

    /**
     * Update the specified Comercio in storage.
     *
     * @param  int              $id
     * @param UpdateComercioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComercioRequest $request)
    {
        $comercio = $this->comercioRepository->findWithoutFail($id);

        if (empty($comercio)) {
            Flash::error('Comercio no encontrado');

            return redirect(route('backend.comercios.index'));
        }

        $comercio = $this->comercioRepository->update($request->all(), $id);

        Flash::success('Comercio actualizado exitosamente');

        return redirect(route('backend.comercios.index'));
    }

    /**
     * Remove the specified Comercio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comercio = $this->comercioRepository->findWithoutFail($id);

        if (empty($comercio)) {
            Flash::error('Comercio no encontrado');

            return redirect(route('backend.comercios.index'));
        }
        $articulos = $comercio->articulos()->get();
        if (!empty($articulos)){
            Flash::error('No es posible eliminar el Comercio dado que tiene Articulos asociados');

            return redirect(route('backend.categorias.index'));
        }
        $this->comercioRepository->delete($id);

        Flash::success('Comercio borrado exitosamente.');

        return redirect(route('backend.comercios.index'));
    }
}
