<?php

namespace UserManagementApp\Http\Middleware;

use Closure;
use UserManagementApp\User;

class RedirectIfNotAManager
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
        if( ! $request->user()->isATeamManager())
        {
            return redirect('articles');
        }
        return $next($request);
    }
}
