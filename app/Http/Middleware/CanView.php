<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CanView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next ,string $permission)
    {

        if(canView($permission)){
            return $next($request);

        }
        abort(403,'Usted no tiene permisos para ver esta pagina');
    }
}
