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

        // Atualizar o status de pagamento da fatura
        $fatura->pago = $request->input('pago');
        $fatura->save();

        return response()->json(['message' => 'Status de pagamento da fatura atualizado com sucesso', 'fatura' => $fatura]);
    }
}
