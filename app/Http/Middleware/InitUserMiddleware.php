<?php

namespace App\Http\Middleware;

use Closure;

class InitUserMiddleware
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
        \Dobby::initUser();

        if(!\Dobby::isLoggedIn())
        {
            \Debugbar::addMessage('middleware 1');
            return \Redirect::to('/admin/login');
        }

        return $next($request);
    }
}
