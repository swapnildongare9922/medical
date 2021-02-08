<?php

namespace App\Http\Middleware\Role;

use Illuminate\Support\Facades\Auth;

use Closure;

class IsBuyer
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
        if(Auth::user()->role === 3)
        {
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
