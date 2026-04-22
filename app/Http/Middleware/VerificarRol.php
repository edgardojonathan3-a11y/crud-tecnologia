<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarRol
{
    public function handle(Request $request, Closure $next, $rol)
    {
        if(auth()->user()->rol !== $rol) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
        return $next($request);
    }
}