<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->session()->get('user');

        if (is_null($request->route('id_docente')) || is_null($request->route('id_estudiante')) || is_null($request->route('id_user'))) {
            return $next($request);
        } else {
            if ($user->id_docente  != $request->route('id_docente') || $user->id_user  != $request->route('id_user')) {
                return badRequest('No tienes acceso al Docente.');
            } else if ($user->id_estudiante  != $request->route('id_estudiante') || $user->id_user  != $request->route('id_user')) {
                return badRequest('No tienes acceso al Docente.');
            }
        }
        return $next($request);
    }
}
