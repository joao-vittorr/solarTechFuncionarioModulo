<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\User;
use App\Models\Pacotes;


class VendaController extends Controller
{
    public function ReceberDados (Request $request)
    {  
        $dados_recebidos = $request->all();
        
        $venda = new Venda();
        $venda -> nomePacote = $dados_recebidos['pacote']['nomePacote'];
        $venda -> quantidadePlacas = $dados_recebidos['pacote']['quantidadePlacas'];
        $venda -> valorFinal = $dados_recebidos['pacote']['valorFinal'];
        $venda -> users_id = $dados_recebidos['usuario']['id'];
        
        $venda -> save();

        return response()->json(['message' => 'True']);
    }


    public function vendas() //retorna na view as vendas
    {
        // Buscar todas as vendas com os dados dos usuários associados
        $dadosVendas = Venda::with('user')->get();

        return view('vendas', ['dadosVendas' => $dadosVendas]);
    }

    public function editarVenda(Request $request, $id)
    {
        $venda = Venda::find($id);

        if (!$venda) {
            return response()->json(['message' => 'Venda não encontrada'], 404);
        }

        $venda->nomePacote = $request->input('nomePacote');
        $venda->quantidadePlaca = $request->input('quantidadePlaca');
        $venda->valorFinal = $request->input('valorFinal');
        
        $venda->save();

        return response()->json(['message' => 'Venda atualizada com sucesso', 'venda' => $venda]);
    }

    public function deletarVenda($id)
    {
        $venda = Venda::find($id);

        if (!$venda) {
            return response()->json(['message' => 'Venda não encontrada'], 404);
        }

        $venda->delete();

        return redirect()->route('venda.mostrar')->with('success', 'Venda deletada com sucesso');
    }

    public function obterTotal() {
        $totalVendas = Venda::sum('valorFinal');        
        return response()->json(["totalVendas" => $totalVendas]);
    }

}

