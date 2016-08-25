<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class RedirectifNotManage
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
        if (! $request->user()->isATeamManager()){
            return redirect('articles');
        }

        return $next($request);
    }
}
