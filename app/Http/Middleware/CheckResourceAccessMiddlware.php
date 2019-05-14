<?php

namespace App\Http\Middleware;

use Closure;

class CheckResourceAccessMiddlware
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

        // Entity model access, based off team ownership
        foreach ($request->route()->parameters() as $parameter) {
            if (is_object($parameter) && !in_array(get_class($parameter), [
                    \Laravel\Spark\Invitation::class
                ])) {
                if (isset($parameter->team_id) && isset(auth()->user()->id) && isset(auth()->user()->currentTeam) && auth()->user()->currentTeam->id != $parameter->team_id) {
                    abort('403');
                }
            }
        }

        return $next($request);
    }
}
