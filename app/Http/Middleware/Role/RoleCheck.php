<?php

namespace App\Http\Middleware\Role;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
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
        if(Auth::user()->role === 1)
        {
            return redirect('/admin/home');
        }
        if(Auth::user()->role === 2)
        {
            return redirect('/seller/home');
        }
        if(Auth::user()->role === 3)
        {
            return redirect('/user/home');
        }
        return $next($request);
    }
}
