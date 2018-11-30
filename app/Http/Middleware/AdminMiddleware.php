<?php

namespace ComunidadAEI\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        if(Auth::check() &&auth()->user()->privilegios_administrador=="1"){


        return $next($request);
        }
        return redirect('/');
    }
}
