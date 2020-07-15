<?php

namespace App\Http\Middleware;
use App\Http\Controllers\APIResponseTrait;
use Closure,Auth;

class CheckLogin
{
    use APIResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $guard = 'api')
    {
        if (Auth::guard($guard)->check() ) {
            return $next($request);
        } else {
            return $this->APIResponse(null, "token is expired", 401);
            // $message = ["message" => "Permission Denied"];
            // return response($message, 401);
        }
    }
}
