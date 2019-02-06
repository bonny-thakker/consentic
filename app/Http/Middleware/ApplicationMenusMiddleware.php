<?php

namespace App\Http\Middleware;

use Closure;
use Menu;

class ApplicationMenusMiddleware
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

        Menu::make('WebMainMenu', function ($menu) use ($request) {

            $menu->add('Home', '/');
            $menu->add('About', 'about');
            $menu->add('Features', 'features');
            $menu->add('Pricing', 'pricing');
            $menu->add('Contact Us', 'contact-cc');

        });

        return $next($request);

    }

}
