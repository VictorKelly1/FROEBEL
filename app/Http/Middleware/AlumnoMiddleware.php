<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AlumnoMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Ruta actual:', ['ruta' => $request->path()]);
        Log::info('Permiso actual:', ['permiso' => Session::get('Permiso')]);

        // Si no es director, redirigir a login
        if (Session::get('Permiso') !== 'Alumno') {
            // Evitar bucle de redirección
            if ($request->routeIs('log')) {
                return $next($request);
            }

            Session::flash('error', 'Tu sesion a expirado o nesesitas iniciar sesion');
            return redirect()->route('log');
        }
        //
        return $next($request);
    }
}
