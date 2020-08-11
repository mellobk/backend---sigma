<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   $token = $request->header('Authorization');
        if($token != '69C524F31C96FE65893AAA35B62C3'){
         return response()->json(['message' => 'app key not found'], 401);
        }
        return $next($request);
    }
}
