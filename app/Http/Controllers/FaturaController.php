<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fatura;
use Illuminate\Support\Facades\Validator;


class FaturaController extends Controller
{
    public function index()
    {
        $faturas = Fatura::with('venda')->get();
        return response()->json(['faturas' => $faturas]);
    }

    public function indexview(Request $request)
    {

        $query = Fatura::with('venda.user')->orderBy('created_at', 'desc');

        if ($request->filled('search_id')) {
            $query->where('id', $request->input('search_id'));
        }
        if ($request->filled('search_cpf')) {
            $query->whereHas('venda.user', function ($query) use ($request) {
                $query->where('cpf', 'LIKE', "%{$request->input('search_cpf')}%");
            });
        }

        if ($request->has('filtro')) {
            switch ($request->input('filtro')) {
                case 'pagas':
                    $query->where('pago', true);
                    break;
                case 'nao_pagas':
                    $query->where('pago', false);
                    break;
            }
        }

        $dadosFaturas = $query->paginate(12);

        return view('fatura.index', ['dadosFaturas' => $dadosFaturas]);
    }

    public function show($id)
    {
        $fatura = Fatura::with('venda')->find($id);

        if (!$fatura) {
            return response()->json(['message' => 'Fatura não encontrada'], 404);
        }
        return response()->json(['fatura' => $fatura]);
    }

    public function update(Request $request, $id)
    {
        $fatura = Fatura::find($id);

        if (!$fatura) {
            return response()->json(['message' => 'Fatura não encontrada'], 404);
        }

        $fatura->update($request->all());
        return response()->json(['message' => 'Fatura atualizada com sucesso', 'fatura' => $fatura]);
    }

    public function atualizarPagamento(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pago' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $fatura = Fatura::find($id);

        if (!$fatura) {
            return response()->json(['message' => 'Fatura não encontrada'], 404);
        }
        $fatura->pago = $request->input('pago');
        $fatura->save();

        return redirect()->route('fatura.index')->with('success', 'Status de pagamento da fatura atualizado com sucesso.');
    }

    public function pesquisarFatura(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_cpf' => 'nullable|string',
        ]);


        $query = Fatura::with('venda.user')->orderBy('created_at', 'desc');


        if ($request->has('search_cpf')) {
            $query->whereHas('venda.user', function ($query) use ($request) {
                $query->where('cpf', 'LIKE', "%{$request->input('search_cpf')}%");
            });
        }

        $dadosFaturas = $query->paginate(12);

        return view('fatura.index', ['dadosFaturas' => $dadosFaturas]);
    }
}
