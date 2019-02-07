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

        Menu::make('webMainMenu', function ($menu) use ($request) {

            $menu->add('Home', '');
            $menu->add('About', 'about');
            $menu->add('Features', 'features');

            $menu->add('Pricing', 'pricing');

            if(in_array($request->route()->getName(),[
                'web.individual-pricing',
                'web.group-pricing',
            ])){
                $menu->get('pricing')->active();
            }

            $menu->add('Contact Us', 'contact-cc');

        });

        return $next($request);

    }

}
