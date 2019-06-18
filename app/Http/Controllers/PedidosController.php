<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePedidosRequest;
use App\Http\Requests\UpdatePedidosRequest;
use App\Repositories\PedidosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PedidosController extends AppBaseController
{
    /** @var  PedidosRepository */
    private $pedidosRepository;

    public function __construct(PedidosRepository $pedidosRepo)
    {
        $this->pedidosRepository = $pedidosRepo;
    }

    /**
     * Display a listing of the Pedidos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pedidos = $this->pedidosRepository->all();

        return view('pedidos.index')
            ->with('pedidos', $pedidos);
    }


    /**
     * Display the specified Pedidos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            Flash::error('Pedidos not found');

            return redirect(route('pedidos.index'));
        }

        return view('pedidos.show')->with('pedidos', $pedidos);
    }

    /**
     * Show the form for editing the specified Pedidos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            Flash::error('Pedidos not found');

            return redirect(route('pedidos.index'));
        }

        return view('pedidos.edit')->with('pedidos', $pedidos);
    }

    /**
     * Update the specified Pedidos in storage.
     *
     * @param int $id
     * @param UpdatePedidosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePedidosRequest $request)
    {
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            Flash::error('Pedidos not found');

            return redirect(route('pedidos.index'));
        }
        $req = $request->all();
        $req['endereco'] = json_encode($req['endereco']);
        $pedidos = $this->pedidosRepository->update($req, $id);

        Flash::success('Pedidos updated successfully.');

        return redirect(route('pedidos.index'));
    }

    /**
     * Remove the specified Pedidos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pedidos = $this->pedidosRepository->find($id);

        if (empty($pedidos)) {
            Flash::error('Pedidos not found');

            return redirect(route('pedidos.index'));
        }

        $this->pedidosRepository->delete($id);

        Flash::success('Pedidos deleted successfully.');

        return redirect(route('pedidos.index'));
    }
}
