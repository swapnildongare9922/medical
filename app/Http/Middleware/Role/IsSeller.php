<?php

namespace App\Http\Middleware\Role;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsSeller
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
        if(Auth::user()->role === 2)
        {
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
