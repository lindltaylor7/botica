<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('LoggedUser') && $request->path() != 'admin/login' && $request->path() != 'admin/register'){
            return redirect('admin/login')->with('info','Debes loguearte para ingresar');
        }
        if(session()->has('LoggedUser') && $request->path() == 'admin/login' && $request->path() == 'admin/register'){
            return back();
        }
        return $next($request);
    }
}
