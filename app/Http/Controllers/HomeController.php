<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePedidosRequest;
use App\Models\Pedidos;
use App\Models\Produtos;
use App\Repositories\PedidosRepository;
use App\Repositories\ProdutosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class HomeController extends AppBaseController
{
    /** @var  PedidoRepository */
    private $pedidoRepository;

    public function __construct(ProdutosRepository $produtosRepo, PedidosRepository $pedidosRepository)
    {
        $this->produtosRepository = $produtosRepo;
        $this->pedidosRepository = $pedidosRepository;
    }

    /**
     * Display a listing of the Pedido.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $produtos = $this->produtosRepository->getActiveProducts();

        return view('home.index')
            ->with('produtos', $produtos);
    }

    /**
     * Store a newly created Pedidos in storage.
     *
     * @param CreatePedidosRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        foreach($input['product'] as $key => $item){
            $product = Produtos::find($key);
            $pedido = new Pedidos();
            $pedido->quantidade = $input['quant'][$key];
            $pedido->solicitante = $input['solicitante'];
            $pedido->despachante = $input['despachante'];
            $pedido->endereco = json_encode($input['endereco']);
            $pedido->situacao = 0;
            $pedido->valor = $product->valor;
            $pedido->produto_id = $product->id;
            $pedido->save();
            $product->quantidade = $product->quantidade - (int) $input['quant'][$key];
            $product->save();
        }

        Flash::success('Pedidos saved successfully.');
        return redirect(route('home.index'));
    }
}
