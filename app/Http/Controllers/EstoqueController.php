<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\PlacaSolar;

class EstoqueController extends Controller
{
    public function index()
    {
        $estoques = Estoque::orderBy('data_compra', 'desc')->paginate(12);
        return view('estoque.index', compact('estoques'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'valor' => 'required|numeric',
            'descricao' => 'required',
            'data_compra' => 'required|date',
            'quantidade' => 'required|integer',
        ]);

        $data['user_id'] = auth()->user()->id;
        $estoque = Estoque::create($data);

        $placasSolares = PlacaSolar::first();

        if ($placasSolares) {
            $placasSolares->quantidade += $request->input('quantidade');
            $placasSolares->save();
        } else {
            PlacaSolar::create(['quantidade' => $request->input('quantidade')]);
        }

        return redirect()->route('estoque.index')->with('success', 'Estoque criado com sucesso!');
    }



    public function edit($id)
    {
        $produto = Estoque::find($id);
        return view('estoque.form', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $estoque = Estoque::find($id);

        if (!$estoque) {
            return response()->json(['message' => 'Estoque não encontrada'], 404);
        }

        $estoque->valor = $request->input('valor');
        $estoque->descricao = $request->input('descricao');
        $estoque->data_compra = $request->input('data_compra');
        $estoque->quantidade = $request->input('quantidade');
        $estoque->save();

        return redirect()->route('estoque.index')->with('success', 'Estoque atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Encontrar o estoque pelo ID
        $estoque = Estoque::find($id);
    
        // Verificar se o estoque foi encontrado
        if (!$estoque) {
            return redirect()->route('estoque.index')->with('error', 'Estoque não encontrado!');
        }
    
        // Obter a quantidade do estoque que será removida
        $quantidadeRemovida = $estoque->quantidade;
    
        // Excluir o estoque do banco de dados
        $estoque->delete();
    
        // Atualizar a quantidade de placas solares
        $placasSolares = PlacaSolar::first();
    
        if ($placasSolares) {
            // Garantir que a quantidade não se torne negativa
            $placasSolares->quantidade = max(0, $placasSolares->quantidade - $quantidadeRemovida);
            $placasSolares->save();
        }
    
        return redirect()->route('estoque.index')->with('success', 'Estoque excluído com sucesso!');
    }
}
