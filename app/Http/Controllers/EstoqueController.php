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
        //Estoque::factory(20)->create();
    
        $estoques = Estoque::orderBy('data_compra', 'desc')->paginate(10);
    
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

        // Criar registro no estoque
        $estoque = Estoque::create($data);

        // Atualizar a quantidade de placas solares disponíveis
        $placasSolares = PlacaSolar::first();

        if ($placasSolares) {
            $placasSolares->quantidade += $request->input('quantidade');
            $placasSolares->save();
        } else {
            // Se não houver registro de PlacaSolar, você pode criar um novo
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
        $estoque = Estoque::find($id);
        $estoque->delete();

        return redirect()->route('estoque.index')->with('success', 'Estoque excluído com sucesso!');
    }
}
