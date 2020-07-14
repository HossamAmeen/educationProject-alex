<?php

namespace App\Http\Middleware;
use App\Http\Controllers\APIResponseTrait;
use Closure,Auth;

class SuperAdminAuth
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
        if (Auth::guard('api')->check() && $request->user()->role >= 1) {
            return $next($request);
        } else {
            return $this->APIResponse(null, "Permission Denied", 401);
            // $message = ["message" => "Permission Denied"];
            // return response($message, 401);
        }
      
    }
}
