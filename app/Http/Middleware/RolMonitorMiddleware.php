<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RolMonitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $usuario_actual = Auth::user();
        $response = $next($request);
        if (Auth::guest()){
             abort(403);
            return $response;  
        }
        if($usuario_actual->tipo_usuario ==4){
            return $next($request);
        }
        else{
             abort(403);
            return $response;
        }
            
    }
}
