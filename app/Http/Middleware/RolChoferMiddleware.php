<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RolChoferMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)    {
        $usuario_actual = Auth::user();
        $response = $next($request);
        if (Auth::guest()){
             abort(403);
            return $response;  
        }
        if($usuario_actual->tipo_usuario == 5 ){
                abort(403);
            return $response;  

            }
        if($usuario_actual->tipo_usuario == 1 ){
            return $next($request);
            }
        if($usuario_actual->tipo_usuario == 2){
            return $next($request);
            }            

        if($usuario_actual->tipo_usuario == 3 ){
            return $next($request);
            }

        if($usuario_actual->tipo_usuario == 4 ){
            return $next($request);
            }

    }
}
