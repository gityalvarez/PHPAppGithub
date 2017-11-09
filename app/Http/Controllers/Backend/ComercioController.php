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
        return view('backend.comercios.create');
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
        $file = $request->file('logo_comercio'); 
        $input = $request->except(['logo_comercio']);
        $newFilename =  'logo-comercio-'.str_random(15).'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->put($newFilename, file_get_contents($file));       
        $input['logo'] = /*storage_path('app/public'). DIRECTORY_SEPARATOR .*/$newFilename;
        $comercio = $this->comercioRepository->create($input);
        Flash::success('Comercio saved successfully.');
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
            Flash::error('Comercio not found');

            return redirect(route('backend.comercios.index'));
        }

        return view('backend.comercios.show')->with('comercio', $comercio);
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
            Flash::error('Comercio not found');

            return redirect(route('backend.comercios.index'));
        }

        return view('backend.comercios.edit')->with('comercio', $comercio);
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
            Flash::error('Comercio not found');

            return redirect(route('backend.comercios.index'));
        }

        $comercio = $this->comercioRepository->update($request->all(), $id);

        Flash::success('Comercio updated successfully.');

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
            Flash::error('Comercio not found');

            return redirect(route('backend.comercios.index'));
        }

        $this->comercioRepository->delete($id);

        Flash::success('Comercio deleted successfully.');

        return redirect(route('backend.comercios.index'));
    }
}
