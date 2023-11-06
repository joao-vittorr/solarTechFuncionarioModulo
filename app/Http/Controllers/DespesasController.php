<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas;

class DespesasController extends Controller
{

    public function index()
    {
 
        $despesas = Despesas::all();
        return view('despesas.index', compact('despesas'));
    }

    public function store(Request $request)
    {
        Despesas::create([
            'valor' => $request->input('valor'),
            'descricao' => $request->input('descricao'),
            'data_despesa' => $request->input('data_despesa'),
            'categoria' => $request->input('categoria'),
            'user_id' => auth()->id(), // Associar a despesa ao usuário autenticado
        ]);

        return redirect()->route('despesas.index')->with('success', 'Despesa cadastrada com sucesso.');
    }

    public function edit($id)
    {
        $despesa = Despesas::find($id);
        return view('despesas.edit', compact('despesa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'valor' => 'required',
            'descricao' => 'required',
            'data_despesa' => 'required',
            'categoria' => 'required',
        ]);

        $despesa = Despesas::find($id);
        $despesa->valor = $request->input('valor');
        $despesa->descricao = $request->input('descricao');
        $despesa->data_despesa = $request->input('data_despesa');
        $despesa->data_despesa = $request->input('categoria');
        $despesa->save();

        return redirect()->route('despesas.index')->with('success', 'Despesa atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $despesa = Despesas::find($id);
        $despesa->delete();

        return redirect()->route('despesas.index')->with('success', 'Despesa excluída com sucesso.');
    }
}
