<?php

namespace App\Http\Controllers;

use App\Repositories\ProdutosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /** @var  PedidoRepository */
    private $pedidoRepository;

    public function __construct(ProdutosRepository $produtosRepo)
    {
        $this->produtosRepository = $produtosRepo;
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
}
