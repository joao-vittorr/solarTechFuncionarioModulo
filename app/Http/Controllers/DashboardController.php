<?php

namespace App\Http\Controllers;
use App\Models\Venda;
use Illuminate\Support\Facades\View;


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

        // Obter todos os meses disponíveis
        $mesesDisponiveis = array_keys($vendasPorMes);

        // Passe os dados para a view
        return View::make('dashboard.index', compact('vendasPorMes', 'mesesDisponiveis'));
    }
}





