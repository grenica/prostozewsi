<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     // if (Auth::user()->isAdmin()) {
        //     //     return redirect('/admin');
        //     // }
        //    return redirect(RouteServiceProvider::HOME);
        // }
        if (Auth::guard($guard)->check() && auth()->user()->isAdmin()){
            return redirect('/admin');
        }
        if (Auth::guard($guard)->check() && auth()->user()->isFarmer()){
            return redirect('/panel');
        }

        return $next($request);
    }
}
