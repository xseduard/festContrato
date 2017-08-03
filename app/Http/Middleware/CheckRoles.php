<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Laracasts\Flash\Flash;

class CheckRoles
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
        //corta las dos primeros parametros recibidos ($request, $next) cap18aprend
        $roles = array_slice( func_get_args(), 2 ); 

        if ( auth()->user()->hasRoles($roles)) {
            return $next($request);
        }

        Session::flash('error', 'No estas autorizado para realizar esta acción');
        return back()->withInput();
    }
}
