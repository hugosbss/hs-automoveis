<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class usuarioAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
        return redirect()->route('login');
        }
        if (!auth()->user()->is_admin) {
            return redirect()->route('home')->with('error', 'Acesso negado. Você não tem permissão para acessar esta página.');
        }
        return $next($request);
    }
}
