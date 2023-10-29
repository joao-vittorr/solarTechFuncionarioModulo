<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\User;
use App\Models\Pacotes;

class VendaController extends Controller
{
    public function ReceberDados(Request $request)
    {
        $dados_recebidos = $request->all();

        // Valide os dados recebidos - aqui, estou assumindo que os campos esperados são nomePacote, quantidadePlaca, valorFinal e usuario_id
        $validatedData = $this->validate($request, [
            'nomePacote' => 'required|string',
            'quantidadePlaca' => 'required|integer',
            'valorFinal' => 'required|numeric',
            'users_id' => 'required|exists:users,id' // Verifica se o usuário com esse ID existe na tabela de usuários
        ]);

        // Crie um novo registro de venda com os dados validados
        $novaVenda = Venda::create($validatedData);

        // Responda com a venda criada ou outra resposta apropriada
        return response()->json(['message' => 'Compra realizada com sucesso', 'venda' => $novaVenda]);
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
}

