<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function Budget(Request $request){
        $valorPlaca = 1000;
        $RequestJson = $request->json()->all();
        $valorPacote = $RequestJson['valorPacote'] ?? null;
        $placasAdicionais = $RequestJson['placasAdicionais'] ?? null;

        if ($valorPacote !== null && $placasAdicionais !== null && is_numeric($valorPacote) && is_numeric($placasAdicionais)) {
            $valorBudget = $valorPacote + ($placasAdicionais * $valorPlaca);
            return response()->json($valorBudget);
        } else {
            $response = [
                'error' => 'Parâmetros inválidos. Certifique-se de que valorPacote e placasAdicionais sejam números válidos e não nulos.'
            ];
            return response()->json($response, 400);
        }
    }
    
    public function Economy(Request $request){
        $precoKwh = 0.75;
        $geracaoPlaca = 90;
        $RequestJson = $request->json()->all();

        if (isset($RequestJson['quantidadePlacas'], $RequestJson['quantidadePlacasAdicionais'], $RequestJson['usoCliente'])) {

            $quantidadePlacas = $RequestJson['quantidadePlacas'];
            $quantidadePlacasAdicionais = $RequestJson['quantidadePlacasAdicionais'];

            if (is_numeric($quantidadePlacas) && is_numeric($quantidadePlacasAdicionais) && is_numeric($RequestJson['usoCliente'])) {
                $totalPlacas = $quantidadePlacas + $quantidadePlacasAdicionais;

                $geracaoTotal = $totalPlacas * $geracaoPlaca;

                $usoTotalCliente = $RequestJson['usoCliente'] * $precoKwh;
                $economiaTotal = $geracaoTotal - $usoTotalCliente;

                return response()->json(["economiaTotal" => $economiaTotal, "custoUsoCliente" => $usoTotalCliente, "QuantoPlacaGera" => $geracaoTotal]);
            } else {
                $response = [
                    'error' => 'Parâmetros inválidos. Certifique-se de que quantidadePlacas, quantidadePlacasAdicionais e usoCliente sejam números válidos.'
                ];
                return response()->json($response, 400); 
            }
        } else {
            $response = [
                'error' => 'Parâmetros ausentes. Certifique-se de enviar quantidadePlacas, quantidadePlacasAdicionais e usoCliente na requisição.'
            ];
            return response()->json($response, 400);
        }
    }

    public function Investment(Request $request){
        $consumoDiario = $request->input('consumo_diario');
        $numeroPlacas = $request->input('numero_placas');

        $kwhGeradosPorMes = $numeroPlacas * 120;

        $custoPlacas = $numeroPlacas * 1000;

        $custoMensal = $consumoDiario * 30 * 0.75;

        $tempoRecuperacaoMeses = round($custoPlacas / ($kwhGeradosPorMes - $consumoDiario * 30));

        return response()->json([
            'custo_placas' => $custoPlacas,
            'custo_mensal' => $custoMensal,
            'tempo_recuperacao_meses' => $tempoRecuperacaoMeses,
        ]);

    }
}