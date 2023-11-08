<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Despesas;

class DespesasController extends Controller
{

    public function index()
    {
        //Despesas::factory(2)->create();
        $despesas = Despesas::all();
        return view('despesas.index', compact('despesas'));
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $data_despesa = date('Y-m-d', strtotime($request->input('data_despesa')));
        Despesas::create([
            'valor' => $request->input('valor'),
            'descricao' => $request->input('descricao'),
            'data_despesa' => $data_despesa,
            'categoria' => $request->input('categoria'),
            'user_id' => $user_id, // Associar a despesa ao usuário autenticado
        ]);

        return redirect()->route('despesas.index')->with('success', 'Despesa cadastrada com sucesso.');
    }

    public function create(){
        return view("despesas.form", ["despesa"=>new Despesas()] );
    }

     public function edit($id)
     {
        $despesa = Despesas::find($id);
        return view('despesas.form', compact('despesa'));
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

        if (!$despesa) {
            return response()->json(['message' => 'Despesa não encontrada'], 404);
        }
        dd($despesa);
        $despesa->valor = $request->input('valor');
        $despesa->descricao = $request->input('descricao');
        $despesa->data_despesa = $request->input('data_despesa');
        $despesa->categoria = $request->input('categoria');
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
