<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(auth()->user()->isadmin == 'true'){
            return $next($request);
        }

        return redirect(route('login'))->with('error',"Only Admin can access this page!");
    }
}
