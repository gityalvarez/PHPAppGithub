<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreatePedidoRequest;
use App\Http\Requests\Backend\UpdatePedidoRequest;
use App\Repositories\Backend\PedidoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PedidoController extends AppBaseController
{
    /** @var  PedidoRepository */
    private $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepo)
    {
        $this->pedidoRepository = $pedidoRepo;
    }

    /**
     * Display a listing of the Pedido.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pedidoRepository->pushCriteria(new RequestCriteria($request));
        $pedidos = $this->pedidoRepository->all();

        return view('backend.pedidos.index')
            ->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new Pedido.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.pedidos.create');
    }

    /**
     * Store a newly created Pedido in storage.
     *
     * @param CreatePedidoRequest $request
     *
     * @return Response
     */
    public function store(CreatePedidoRequest $request)
    {
        $input = $request->all();

        $pedido = $this->pedidoRepository->create($input);

        Flash::success('Pedido saved successfully.');

        return redirect(route('backend.pedidos.index'));
    }

    /**
     * Display the specified Pedido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('backend.pedidos.index'));
        }

        return view('backend.pedidos.show')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified Pedido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('backend.pedidos.index'));
        }

        return view('backend.pedidos.edit')->with('pedido', $pedido);
    }

    /**
     * Update the specified Pedido in storage.
     *
     * @param  int              $id
     * @param UpdatePedidoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePedidoRequest $request)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('backend.pedidos.index'));
        }

        $pedido = $this->pedidoRepository->update($request->all(), $id);

        Flash::success('Pedido updated successfully.');

        return redirect(route('backend.pedidos.index'));
    }

    /**
     * Remove the specified Pedido from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pedido = $this->pedidoRepository->findWithoutFail($id);

        if (empty($pedido)) {
            Flash::error('Pedido not found');

            return redirect(route('backend.pedidos.index'));
        }

        $this->pedidoRepository->delete($id);

        Flash::success('Pedido deleted successfully.');

        return redirect(route('backend.pedidos.index'));
    }
}
