<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index()
    {
        $estoques = Estoque::all();
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

        Estoque::create($data);

        return redirect()->route('estoque.index')->with('success', 'Estoque criado com sucesso!');
    }

    public function edit($id)
    {
        $estoque = Estoque::find($id);
        return view('estoque.edit', compact('estoque'));
    }

    public function update(Request $request, Estoque $estoque)
    {
        $data = $request->validate([
            'valor' => 'required|numeric',
            'descricao' => 'required',
            'data_compra' => 'required|date',
            'quantidade' => 'required|integer',
        ]);

        $estoque->update($data);

        return redirect()->route('estoque.index')->with('success', 'Estoque atualizado com sucesso!');
    }

    public function destroy(Estoque $estoque)
    {
        $estoque->delete();

        return redirect()->route('estoque.index')->with('success', 'Estoque excluído com sucesso!');
    }
}
