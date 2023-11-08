<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{

    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', compact('categorias'));

    }
    public function create()
    {
        return view('categorias.form', ['categoria'=> new Categorias()]);
    }


    public function store(Request $request)
    {
        $categoria = new Categorias();
        $categoria->nome = $request->input('nome');
        $categoria->save();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria criada com sucesso.');
    }


    public function edit($id)
    {
        $categoria = Categorias::find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('error', 'Categoria não encontrada');
        }

        return view('categorias.form', compact('categoria'));
    }
    public function update(Request $request, $id)
    {

        $categoria = Categorias::find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('error', 'Categoria não encontrada');
        }

        $categoria->nome = $request->input('nome');
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso');
    }
}
