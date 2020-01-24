<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        // codigo copiado do  Vinny, trocando o return que existia, configurando o request:
        // rota passa pelo middleware e depois continua para controller e model.
        // abaixo: informa que tem acesso de qualquer origem (*), que pode acessar por quelaquer dos metodos especificados, e que pode usar qualquer header especificado:
        return $next($request)
        ->header(‘Access-Control-Allow-Origin’, ‘*’)
        ->header(‘Access-Control-Allow-Methods’, ‘GET, POST, PUT, DELETE, OPTIONS’)
        ->header(‘Access-Control-Allow-Headers’, ‘X-Requested-With, Content-Type, X-Token-Auth, Authorization’);
    }
}
