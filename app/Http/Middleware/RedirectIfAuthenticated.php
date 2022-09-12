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
        if (Auth::guard($guard)->check()) {
            
            //check for admin middleware

            if(Auth::user()->isadmin == 'true'){
                return redirect()->route('adminhome');
            }

            //check if its user

            elseif(Auth::user()->isadmin == NULL){
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
