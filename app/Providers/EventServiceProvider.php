<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // User Related Events...
        'Laravel\Spark\Events\Subscription\UserSubscribed' => [
            'Laravel\Spark\Listeners\Subscription\UpdateActiveSubscription',
            'Laravel\Spark\Listeners\Subscription\UpdateTrialEndingDate',
        ],

        'Laravel\Spark\Events\Profile\ContactInformationUpdated' => [
            'Laravel\Spark\Listeners\Profile\UpdateContactInformationOnStripe',
        ],

        'Laravel\Spark\Events\PaymentMethod\VatIdUpdated' => [
            'Laravel\Spark\Listeners\Subscription\UpdateTaxPercentageOnStripe',
        ],

        'Laravel\Spark\Events\PaymentMethod\BillingAddressUpdated' => [
            'Laravel\Spark\Listeners\Subscription\UpdateTaxPercentageOnStripe',
        ],

        'Laravel\Spark\Events\Subscription\SubscriptionUpdated' => [
            'Laravel\Spark\Listeners\Subscription\UpdateActiveSubscription',
        ],

        'Laravel\Spark\Events\Subscription\SubscriptionCancelled' => [
            'Laravel\Spark\Listeners\Subscription\UpdateActiveSubscription',
        ],

        // Team Related Events...
        'Laravel\Spark\Events\Teams\TeamCreated' => [
            'Laravel\Spark\Listeners\Teams\UpdateOwnerSubscriptionQuantity',
            'App\Listeners\ApplyNewTeamCoupon',
        ],

        'Laravel\Spark\Events\Teams\TeamDeleted' => [
            'Laravel\Spark\Listeners\Teams\UpdateOwnerSubscriptionQuantity',
        ],

        'Laravel\Spark\Events\Teams\TeamMemberAdded' => [
            'Laravel\Spark\Listeners\Teams\UpdateTeamSubscriptionQuantity',
        ],

        'Laravel\Spark\Events\Teams\TeamMemberRemoved' => [
            'Laravel\Spark\Listeners\Teams\UpdateTeamSubscriptionQuantity',
        ],

        'Laravel\Spark\Events\Teams\Subscription\TeamSubscribed' => [
            /*'Laravel\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',*/
            'Laravel\Spark\Listeners\Teams\Subscription\UpdateTrialEndingDate',
           'App\Listeners\NewTeamSubscriptionCredits',
        ],

        'Laravel\Spark\Events\Teams\Subscription\SubscriptionUpdated' => [
            /*'Laravel\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',*/
            'App\Listeners\UpdateActiveTeamSubscription'
        ],

        'Laravel\Spark\Events\Teams\Subscription\SubscriptionCancelled' => [
           /* 'Laravel\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',*/
            'App\Listeners\UpdateActiveTeamSubscription'
        ],

        'Laravel\Spark\Events\Teams\UserInvitedToTeam' => [
            'Laravel\Spark\Listeners\Teams\CreateInvitationNotification',
        ],

        'App\Events\UserLoggedIn' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\UserLoggedOut' => [
            'App\Listeners\GenerateAuditLog',
        ],


        'App\Events\ConsentRequestCreated' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\ConsentRequestUpdated' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\PasswordForgotten' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\ConsentPatientSigned' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\ConsentUserSigned' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\ConsentPatientCommented' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\ConsentUserCommented' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\ConsentPatientWatched' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\ConsentUserAnsweredQuestionsCorrectly' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'App\Events\ConsentPatientAnsweredQuestionsCorrectly' => [
            'App\Listeners\GenerateAuditLog',
        ],

        'Laravel\Spark\Events\Auth\UserRegistered' => [
            'App\Listeners\SendWelcomeEmail',
        ],

    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}