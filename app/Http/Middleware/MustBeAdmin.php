<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdmin
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
        $user = $request->user();

        if($user && $user->isAdmin($user->id)){
            return $next($request);
        }

        // flash('You must be an admin to access this page','danger');
        return abort(404,'Page not found');
        
    }
}
