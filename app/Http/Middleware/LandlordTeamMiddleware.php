<?php

namespace App\Http\Middleware;

use Closure;
use HipsterJazzbo\Landlord\Facades\Landlord;

class LandlordTeamMiddleware
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

        if (auth()->user() && auth()->user()->currentTeam) {
            \Illuminate\Database\Eloquent\Model::clearBootedModels();
            Landlord::addTenant('team_id', auth()->user()->currentTeam->id);
        }

        return $next($request);

    }
}
