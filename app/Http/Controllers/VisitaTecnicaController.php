<?php

// VisitaTecnicaController.php (app\Http\Controllers\VisitaTecnicaController.php)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitaTecnica;
use App\Models\User;

class VisitaTecnicaController extends Controller
{
    public function index()
    {
        $visitasTecnicas = VisitaTecnica::all();
        return view('gerenciar-visitas.index', compact('visitasTecnicas'));
    }

    public function create()
    {
        return view('gerenciar-visitas.visitas-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Garante que o user_id existe na tabela de usuários
            'detalhes' => 'required',
            'data_agendada' => 'required|date',
            'necessita_visita' => 'boolean',
        ]);
    
        $visitaTecnica = new VisitaTecnica();
        $visitaTecnica->user_id = $request->user_id;
        $visitaTecnica->detalhes = $request->detalhes;
        $visitaTecnica->data_agendada = $request->data_agendada;
        $visitaTecnica->necessita_visita = $request->has('necessita_visita');
    
        $visitaTecnica->save();
    
        return redirect()->route('index');
    }

    public function usuariosComVisitasTecnicas()
    {
        $usuariosComVisitas = VisitaTecnica::where('necessita_visita', true)->get();

        return view('gerenciar-visitas.index', compact('usuariosComVisitas'));
    }
    
}
