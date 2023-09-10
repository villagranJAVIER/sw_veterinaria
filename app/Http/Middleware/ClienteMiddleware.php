<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->tipo==2 || auth()->user()->tipo==1 ){
            return $next($request);
        }
        return redirect('/dashboard');

        // $reservacionId = $request->route('reservaciones');

        // // Verificar si el usuario está autenticado y si la reservación le pertenece
        // if (Auth::user()->reservations->contains('id', $reservacionId) || auth()->user()->tipo==1) {
        //     return $next($request);
        // }

        // return redirect('/dashboard');
    }
}
