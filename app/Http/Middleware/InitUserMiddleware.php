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
        \Dobby::checkUserState();
        if(!\Dobby::isLoggedIn())
        {

                return \Redirect::to('/admin/login');
        }
        else
        {
            if(!\Dobby::checkRights('AdminPanel')) {
                return \Redirect::to('/');
            }
        }

        return $next($request);
    }
}
