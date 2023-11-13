<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\PlacaSolar;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Fatura;
use App\Models\Pacotes;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;


class VendaController extends Controller
{
    public function ReceberDados(Request $request)
    {
        $dados_recebidos = $request->all();

        // Obter a quantidade de placas solares disponíveis
        $placasDisponiveis = PlacaSolar::first();

        // Verificar se há placas solares suficientes para a venda
        if ($placasDisponiveis && $placasDisponiveis->quantidade >= $dados_recebidos['pacote']['quantidadePlacas']) {
            // Atualizar a quantidade de placas solares disponíveis após a venda
            $placasDisponiveis->quantidade -= $dados_recebidos['pacote']['quantidadePlacas'];
            $placasDisponiveis->save();

            // Registrar a venda
            $venda = new Venda();
            $venda->nomePacote = $dados_recebidos['pacote']['nomePacote'];
            $venda->quantidadePlacas = $dados_recebidos['pacote']['quantidadePlacas'];
            $venda->valorFinal = $dados_recebidos['pacote']['valorFinal'];
            $venda->users_id = $dados_recebidos['usuario']['id'];
            $venda->save();

            // Cria a fatura da venda
            $fatura = new Fatura();
            $fatura->valor = $dados_recebidos['pacote']['valorFinal'];
            $venda->fatura()->save($fatura);

            return response()->json(['message' => 'True']);
        } else {
            return response()->json(['message' => 'False']);
        }
    }

    public function vendas(Request $request)
    {
        $tipoPacote = $request->input('tipoPacote');
        $cpfUsuario = $request->input('cpfUsuario');

        $query = Venda::with('user')->orderBy('created_at', 'desc');

        if ($tipoPacote) {
            $query->where('nomePacote', 'like', '%' . $tipoPacote . '%');
        }

        if ($cpfUsuario) {
            $query->whereHas('user', function ($query) use ($cpfUsuario) {
                $query->where('cpf', 'like', '%' . $cpfUsuario . '%');
            });
        }

        $dadosVendas = $query->paginate(10);

        return view('vendas', [
            'dadosVendas' => $dadosVendas,
            'tipoPacote' => $tipoPacote,
            'cpfUsuario' => $cpfUsuario
        ]);
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
    
        // Begin a database transaction
        DB::beginTransaction();
    
        try {
            // Retrieve the associated invoice
            $fatura = $venda->fatura;
    
            // Retrieve the quantity of solar panels in the sale
            $quantidadePlacas = $venda->quantidadePlacas;
    
            // Delete the sale
            $venda->delete();
    
            // Delete the associated invoice
            if ($fatura) {
                $fatura->delete();
            }
    
            // Increment the quantity of solar panels in the solar panel table
            $placasDisponiveis = PlacaSolar::first();
            if ($placasDisponiveis) {
                $placasDisponiveis->quantidade += $quantidadePlacas;
                $placasDisponiveis->save();
            }
    
            // Commit the transaction if everything is successful
            DB::commit();
    
            return redirect()->route('venda.mostrar')->with('success', 'Venda deletada com sucesso');
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();
    
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function obterTotal()
    {
        $totalVendas = Venda::sum('valorFinal');
        return response()->json(["totalVendas" => $totalVendas]);
    }

    public function comprasCliente(Request $request,$id): JsonResponse
    {
        $dadosVendas = Venda::where('users_id',$id)->get();
        return response()->json([$dadosVendas]);
    }
    
    public function faturaPorId($venda_id)
    {
        
        $venda = Venda::with('fatura')->find($venda_id);
    
        if (!$venda) {

            return response()->json(['error' => 'Venda não encontrada.'], 404);
        }
    

        return response()->json(['venda' => $venda]);
    }
    
    
}
