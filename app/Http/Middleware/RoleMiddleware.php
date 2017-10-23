<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next,$role)
    {
        /*if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } 
            else {
                return redirect()->guest('login');
            }
        }
*/  
        if (! ($request->user()->hasRole($role))){
             return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
