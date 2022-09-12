<?php

namespace App\Http\Middleware;

use Closure;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->isadmin == NULL){
            return $next($request);
        }

        return redirect(route('login'))->with('error',"Only Customer can access this page!");
        
    }
}
