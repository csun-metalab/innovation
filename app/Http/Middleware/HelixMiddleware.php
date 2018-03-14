<?php
/**
 * This is to check if user is a faculty member or admin. We included this because there
 * is functionality that we can faculty to have but staff not.
 * - Gabe
 */


namespace Helix\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HelixMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!(Auth::guard($guard)->user()->isFaculty() || Auth::guard($guard)->user()->isAdmin())) {
            return abort(403);
        }

        return $next($request);
    }
}
