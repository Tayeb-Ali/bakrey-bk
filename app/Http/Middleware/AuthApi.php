<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        $auth = User::where('api_token', $token)->first();
        if ($auth) {
            return $next($request);
        }
    }
}
