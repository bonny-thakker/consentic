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

        Menu::make('appMainMenu', function ($menu) use ($request) {

            $menu->add('Dashboard', 'app/dashboard');

            $menu->add('Consent Requests', 'app/consent-requests');

            if(in_array($request->route()->getName(),[
                'app.consent-requests.create',
                'app.consent-requests.show',
                'app.consent-requests.edit',
                'app.consent-requests.files.index',
                'app.consent-requests.doctor-questions.index',
                'app.consent-requests.doctor-questions.edit',
                'app.consent-requests.patient-questions.index',
                'app.consent-requests.comments.index',
                'app.consent-requests.signed.index',
                'app.consent-requests.signed.edit',
                'app.consent-requests.search',
            ])){
                $menu->get('consentRequests')->active();
            }

            $menu->add('Patients', 'app/patients');

            if(in_array($request->route()->getName(),[
                'app.patients.create',
                'app.patients.show',
                'app.patients.edit',
                'app.patients.search',
            ])){
                $menu->get('patients')->active();
            }

            $menu->add('Consents', 'app/consents');

            /*  $menu->add('Settings', 'app/settings');
              $menu->add('Subscription', 'app/subscription');*/

        });

        return $next($request);

    }

}
