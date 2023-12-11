<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAccess
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if ($user && in_array($user->access_level, ['admin', 'funcionario'])) {
            return $next($request);
        } else {
            // Armazenar mensagem de erro na sessão
            Session::flash('error', 'Acesso negado. Você não tem permissão para acessar esta página.');
            // Redirecionar de volta para a página anterior
            return redirect()->back();
        }
    }
}
