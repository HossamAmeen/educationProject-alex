<?php

namespace App\Http\Middleware;
use App\Http\Controllers\APIResponseTrait;
use Closure,Auth;

class AdminAuth
{
    use APIResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('api')->check() && Auth::guard('api')->user()->role >= 1) {
            return $next($request);
        } else {
            return $this->APIResponse(null, "Permission Denied", 401);
        }
    }
}
