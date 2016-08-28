<?php

namespace SisConPat\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        if (!app('Illuminate\Contracts\Auth\Guard')->guest()) 
        {
            #dd($request->user()->can($permission));

            if ($request->user()->can($permission)) 
            {
                return $next($request);
            }
        }

        #return $request->ajax ? response('Unauthorized.', 401) : redirect('/login');
        return $request->ajax ? response('Unauthorized.', 401) : redirect('/users/access_denied');
    }
}
