<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;
use Carbon\Carbon;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Consentic',
        'product' => 'Medical Consent Requests',
        'street' => '',
        'location' => '',
        'phone' => '',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'info@consentic.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
      /*  'cto@consentic.com'*/
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = false;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {

        Spark::useTwoFactorAuth();
        Spark::collectBillingAddress();

        if(env('TRIAL_ENABLED')){
            Spark::useStripe()->noCardUpFront()->teamTrialDays(14);
            // Spark::useStripe()->noCardUpFront()->trialDays(14);
        }else{
            Spark::useStripe()->noCardUpFront();
        }

       /* Spark::freeTeamPlan()
            ->features([
                'First', 'Second', 'Third'
            ]);*/

    /*    Spark::plan('Individual Clinicians - 10 Pack', 'individual-10')
            ->price(25)
            ->maxTeamMembers(1)
            ->features([
                'Single Account User',
                '10 Consent Requests',
                '24/7 Support',
                '$2.50 for each additional consent'
            ]);

        Spark::plan('Individual Clinicians - 30 Pack', 'individual-30')
            ->price(50)
            ->maxTeamMembers(1)
            ->features([
                'Single Account User',
                '30 Consent Requests',
                '24/7 Support',
                '$2.50 for each additional consent'
            ]);

        Spark::plan('Individual Clinicians - 50 Pack', 'individual-50')
            ->price(100)
            ->maxTeamMembers(1)
            ->features([
                'Single Account User',
                '50 Consent Requests',
                '24/7 Support',
                '$2.50 for each additional consent'
            ]);*/

        Spark::teamPlan('Practice - 10 Pack', 'practice-10')
            ->price(25)
            ->features([
                'Unlimited Account Users',
                '10 Consent Requests Per Month',
                '24/7 Support',
                '$2.50 for each additional consent'
            ]);

        Spark::teamPlan('Practice - 30 Pack', 'practice-30')
            ->price(50)
            ->features([
                'Unlimited Account Users',
                '30 Consent Requests Per Month',
                '24/7 Support',
                '$2.50 for each additional consent'
            ]);

        Spark::teamPlan('Practice - 50 Pack', 'practice-50')
            ->price(100)
            ->features([
                'Unlimited Account Users',
                '50 Consent Requests Per Month',
                '24/7 Support',
                '$2.50 for each additional consent'
            ]);

        Spark::validateUsersWith(function () {
            return [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'title' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
             /*   'vat_id' => 'max:50|vat_id',*/
                'terms' => 'required|accepted',
            ];
        });

        Spark::createUsersWith(function ($request) {
            $user = Spark::user();

            $data = $request->all();

            $user->forceFill([
                'name' => trim($data['first_name'].' '.$data['last_name']),
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'title' => $data['title'],
                'password' => bcrypt($data['password']),
                'last_read_announcements_at' => Carbon::now(),
                'trial_ends_at' => Carbon::now()->addDays(Spark::trialDays()),
            ])->save();

            return $user;
        });

    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Spark::prefixTeamsAs('practice');
        Spark::afterLoginRedirectTo('/app');
    }

}
