<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePedidosAPIRequest;
use App\Http\Requests\API\UpdatePedidosAPIRequest;
use App\Models\Pedidos;
use App\Repositories\PedidosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PedidosController
 * @package App\Http\Controllers\API
 */

class PedidosAPIController extends AppBaseController
{
    /** @var  PedidosRepository */
    private $pedidosRepository;

    public function __construct(PedidosRepository $pedidosRepo)
    {
        $this->pedidosRepository = $pedidosRepo;
    }

    /**
     * Display a listing of the Pedidos.
     * GET|HEAD /pedidos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pedidos = $this->pedidosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pedidos->toArray(), 'Pedidos retrieved successfully');
    }

    /**
     * Store a newly created Pedidos in storage.
     * POST /pedidos
     *
     * @param CreatePedidosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePedidosAPIRequest $request)
    {
        $input = $request->all();

        $pedidos = $this->pedidosRepository->create($input);

        return $this->sendResponse($pedidos->toArray(), 'Pedidos saved successfully');
    }

    /**
     * Display the specified Pedidos.
     * GET|HEAD /pedidos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pedidos $pedidos */
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            return $this->sendError('Pedidos not found');
        }

        return $this->sendResponse($pedidos->toArray(), 'Pedidos retrieved successfully');
    }

    /**
     * Update the specified Pedidos in storage.
     * PUT/PATCH /pedidos/{id}
     *
     * @param int $id
     * @param UpdatePedidosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePedidosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pedidos $pedidos */
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            return $this->sendError('Pedidos not found');
        }

        $pedidos = $this->pedidosRepository->update($input, $id);

        return $this->sendResponse($pedidos->toArray(), 'Pedidos updated successfully');
    }

    /**
     * Remove the specified Pedidos from storage.
     * DELETE /pedidos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pedidos $pedidos */
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            return $this->sendError('Pedidos not found');
        }

        $pedidos->delete();

        return $this->sendResponse($id, 'Pedidos deleted successfully');
    }
}
