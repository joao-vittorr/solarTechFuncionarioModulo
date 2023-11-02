<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Obtém todos os usuários

        return view('funcionario', ['users' => $users]);
    }

    public function updateLevel(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->access_level = $request->input('access_level');
        $user->save();

        return redirect()->route('gerenciar.funcionario')->with('success', 'Nível de acesso atualizado com sucesso');
    }
    public function searchByCPF(Request $request)
    {
        $cpf = $request->input('cpf');
        $users = User::where('cpf', $cpf)->get();

        return view('funcionario', ['users' => $users]);
    }
}
