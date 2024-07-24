<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $permission): Response
    {
        if (auth()->user() && auth()->user()->hasPermission($permission)) {
            return $next($request);
        }
        // Przekieruj użytkownika do strony 403 lub innej, jeśli nie ma uprawnienia
        abort(403);
    }
}
