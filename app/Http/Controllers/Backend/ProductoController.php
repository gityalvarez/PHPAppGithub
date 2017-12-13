<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateProductoRequest;
use App\Http\Requests\Backend\UpdateProductoRequest;
use App\Repositories\Backend\ProductoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Storage;
use App\Models\Backend\Categoria;

class ProductoController extends AppBaseController
{
    /** @var  ProductoRepository */
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }

    /**
     * Display a listing of the Producto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productoRepository->pushCriteria(new RequestCriteria($request));
        $productos = $this->productoRepository->all();

        return view('backend.productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new Producto.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = Categoria::all()->lists('nombre', 'id');
        return view('backend.productos.create')
                ->with('categorias',$categorias);
    }

    /**
     * Store a newly created Producto in storage.
     *
     * @param CreateProductoRequest $request
     *
     * @return Response
     */
    public function store(CreateProductoRequest $request)
    {
        $file = $request->file('imagen_producto'); 
        $input = $request->except(['imagen_producto']);
        $newFilename =  'imagen-producto-'.str_random(15).'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->put($newFilename, file_get_contents($file));       
        $input['imagen'] = /*storage_path('app/public'). DIRECTORY_SEPARATOR .*/$newFilename;
        $producto = $this->productoRepository->create($input);
        Flash::success('Producto guardado exitosamente');
        return redirect(route('backend.productos.index'));
    }

    /**
     * Display the specified Producto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            Flash::error('Producto no encontrado');

            return redirect(route('backend.productos.index'));
        }

        return view('backend.productos.show')
                ->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified Producto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            Flash::error('Producto no encontrado');

            return redirect(route('backend.productos.index'));
        }
        $categorias = Categoria::where('id','<>',$producto->categoria_id)->lists('nombre', 'id');
        $categoria = Categoria::where('id',$producto->categoria_id)->lists('nombre', 'id');
        $categorias = $categoria->union($categorias);
        return view('backend.productos.edit')
                ->with('producto', $producto)
                ->with('categorias',$categorias);
    }

    /**
     * Update the specified Producto in storage.
     *
     * @param  int              $id
     * @param UpdateProductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductoRequest $request)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            Flash::error('Producto no encontrado');

            return redirect(route('backend.productos.index'));
        }
        
        $producto = $this->productoRepository->update($request->all(), $id);

        Flash::success('Producto actualizado exitosamente');

        return redirect(route('backend.productos.index'));
    }

    /**
     * Remove the specified Producto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            Flash::error('Producto no encontrado');

            return redirect(route('backend.productos.index'));
        }
        $articulos = $producto->articulos()->get();
        if (!empty($articulos->items)){
            Flash::error('No es posible eliminar el Producto dado que tiene Articulos asociados');

            return redirect(route('backend.categorias.index'));
        }
        $this->productoRepository->delete($id);

        Flash::success('Producto borrado exitosamente');

        return redirect(route('backend.productos.index'));
    }
}
