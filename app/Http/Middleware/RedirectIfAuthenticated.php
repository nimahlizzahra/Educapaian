<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/home');
            } else {
                return redirect('home'); // Ganti sesuai kebutuhan
            }
        }
        return $next($request);
    }
}
