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
use App\Models\Backend\Comercio;

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
        /*$gerentes = User::whereHas('roles',function($query){
            $query->where('id',2);
        })->lists('name', 'id');*/
        $gerentestodos = User::whereHas('roles',function($query){
            $query->where('id',2);
        })->lists('name', 'id');
        $gerentesasignados = User::join('comercios', 'users.id', '=', 'comercios.user_id')->lists('name', 'user_id as id');
        $gerentesdisponibles = $gerentestodos->diff($gerentesasignados);        
        return view('backend.comercios.create')
                ->with('gerentes',$gerentesdisponibles);
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
        /*if(!$request->validate([
            'logo_comercio' =>'required|image|mimes:jpg,png|image_size:<=300'
        ])){
            abort(404);
        }*/
       
        $file = $request->file('logo_comercio');        
        $input = $request->except(['logo_comercio']);
        $newFilename =  'logo-comercio-'.substr($file->getClientOriginalName(), 0, -4).'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->put($newFilename, file_get_contents($file));       
        $input['logo'] =$newFilename;
        $domicilio=$input['nopuerta'].", ".$input['calle'].", montevideo, uruguay";
        $input['direccion']=$domicilio;
        $dirparaquery = urlencode( $domicilio );
        $baseUrl = 'http://nominatim.openstreetmap.org/search?format=json&limit=1';
        $respuestaApi = file_get_contents("{$baseUrl}&q={$dirparaquery}");
        $json =json_decode($respuestaApi);
        $latitud=$json[0]->lat;
        $longitud=$json[0]->lon;
        $input['latitud']=$latitud;
        $input['longitud']=$longitud;
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
        $domicilio=explode(",", $comercio->direccion);
        $comercio->nopuerta=$domicilio[0];
        $comercio->calle=$domicilio[1];
        //dd($comercio);
        $gerentestodos = User::where('id','<>',$comercio->user_id)
                    ->whereHas('roles',function($query){
                        $query->where('id',2);
                    })->lists('name', 'id'); 
        $gerentesasignados = User::join('comercios', 'users.id', '=', 'comercios.user_id')->lists('name', 'user_id as id');;
        $gerentesdisponibles = $gerentestodos->diff($gerentesasignados);        
        $gerenteactual = User::where('id',$comercio->user_id)->lists('name', 'id');
        $gerentesdisponibles = $gerenteactual->union($gerentesdisponibles);

        return view('backend.comercios.edit')
                ->with('comercio', $comercio)
                ->with('gerentes', $gerentesdisponibles);
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
        $devuelto=$request->except(['logo_comercio','calle','nopuerta']);
        $file = $request->file('logo_comercio');
        $newFilename =  'logo-comercio-'.substr($file->getClientOriginalName(), 0, -4).'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->put($newFilename, file_get_contents($file));       
        $devuelto['logo'] =$newFilename;
        $devuelto['direccion']=$request->nopuerta.", ".$request->calle.", montevideo, uruguay";
        $dirparaquery = urlencode( $devuelto['direccion'] );
        $baseUrl = 'http://nominatim.openstreetmap.org/search?format=json&limit=1';
        $respuestaApi = file_get_contents("{$baseUrl}&q={$dirparaquery}");
        $json =json_decode($respuestaApi);
        $latitud=$json[0]->lat;
        $longitud=$json[0]->lon;
        $devuelto['latitud']=$latitud;
        $devuelto['longitud']=$longitud;
        //dd($devuelto);
        $comercio = $this->comercioRepository->update($devuelto, $id);
       

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
        if (!empty($articulos->items)){
            Flash::error('No es posible eliminar el Comercio dado que tiene Articulos asociados');

            return redirect(route('backend.categorias.index'));
        }
        $this->comercioRepository->delete($id);

        Flash::success('Comercio borrado exitosamente.');

        return redirect(route('backend.comercios.index'));
    }
}
