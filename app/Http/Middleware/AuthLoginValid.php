<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthLoginValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $user = Auth::user();
            if ($user->role == 2) {
                return $next($request);
            } else {
                return redirect()->route('superadmin.index');
            }
        }

        return redirect()->route('login')->with('mustLogin', 'Anda harus login terlebih dahulu');
    }
}
