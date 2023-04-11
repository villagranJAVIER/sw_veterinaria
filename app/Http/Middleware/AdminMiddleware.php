<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    //Middleware para evaluar si el usuario es admin
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->tipo==1){
            return $next($request);
        }
        return redirect('/dashboard');
    }
}
