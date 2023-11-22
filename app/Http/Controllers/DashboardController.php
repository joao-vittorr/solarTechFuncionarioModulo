<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Support\Facades\View;
use App\Models\Categorias;
use Illuminate\Support\Facades\DB;
use App\Models\Estoque;



class DashboardController extends Controller
{
    public function index()
    {
        // Buscar dados do banco
        $vendasData = Venda::all();

        // Criar um array para armazenar a contagem de vendas por mês
        $vendasPorMes = [];

        foreach ($vendasData as $venda) {
            $mesAno = date('m/Y', strtotime($venda->created_at));

            if (isset($vendasPorMes[$mesAno])) {
                $vendasPorMes[$mesAno]++;
            } else {
                $vendasPorMes[$mesAno] = 1;
            }
        }

        // Lógica para obter as categorias mais vendidas
        $categoriasMaisVendidas = Venda::select('nomePacote as categoria', DB::raw('count(*) as total'))
        ->groupBy('nomePacote')
        ->orderByDesc('total')
        ->take(5) // Pegar as top 5 categorias mais vendidas
        ->get();

        // Buscar os últimos produtos cadastrados no estoque
        // Obter os produtos mais recentes do estoque
        $produtosRecentes = Estoque::orderBy('data_compra', 'desc')->take(5)->get();


        // Obter todos os meses disponíveis
        $mesesDisponiveis = array_keys($vendasPorMes);

        // Passe os dados para a view
        return view('dashboard.index', compact('vendasPorMes', 'mesesDisponiveis', 'produtosRecentes', 'categoriasMaisVendidas'));
    }
}
