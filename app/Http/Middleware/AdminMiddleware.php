<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah sudah login dan rolenya admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Kalau bukan admin, tendang ke dashboard biasa dengan pesan error
        return redirect()->route('dashboard')->with('error', 'Akses ditolak! Halaman ini khusus Administrator.');
    }
}