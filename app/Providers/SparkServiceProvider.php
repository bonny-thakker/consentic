<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

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

        Spark::useStripe()->noCardUpFront()->teamTrialDays(30);

      /*  Spark::freeTeamPlan()
            ->features([
                'First', 'Second', 'Third'
            ]);*/

      /*  Spark::teamPlan('Individual Starter', 'individual-starter')
            ->price(10)
            ->maxTeamMembers(1)
            ->features([
                'Single Account User',
                '10 Consents',
            ]);

        Spark::teamPlan('Individual Standard', 'individual-standard')
            ->price(20)
            ->maxTeamMembers(1)
            ->features([
                'Single Account User',
                '20 Consents',
            ]);

        Spark::teamPlan('Clinic Standard', 'clinic-standard')
            ->price(100)
            ->features([
                'Unlimited Account Users',
            ]);*/

    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Spark::prefixTeamsAs('clinic');
        Spark::afterLoginRedirectTo('/app');
    }

}
