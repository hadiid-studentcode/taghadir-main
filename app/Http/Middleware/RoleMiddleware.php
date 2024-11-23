<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah pengguna sudah login dan memiliki peran yang diperlukan
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jika tidak memiliki peran yang sesuai, redirect atau beri respon unauthorized
        // return redirect('/unauthorized'); // Atau bisa gunakan abort(403)
        return abort(403);
    }
}
