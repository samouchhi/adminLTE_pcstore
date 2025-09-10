<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() && $request->is('admin/*', 'admin')) {
            return redirect('adminLogin');
        }


        if (Auth::user()) {
            if ($request->path() == 'adminLogin') {
                Auth::logout();
                return redirect('/admin');
            }
        }

        return $next($request);
    }
}
