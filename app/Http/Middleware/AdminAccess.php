<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if ($user && in_array($user->access_level, ['admin', 'funcionario'])) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Acesso negado. Você não tem permissão para acessar esta página.');
    }
}
