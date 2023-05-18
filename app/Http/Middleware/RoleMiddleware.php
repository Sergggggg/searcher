<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {

        $userTokenRole = $request->user()->currentAccessToken()->abilities;
        
            if(!in_array($role, $userTokenRole)) {

                abort( response()->json(['Your role has not permittions'], 410));
            }

        return $next($request);
    }
}
