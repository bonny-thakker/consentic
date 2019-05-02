<?php

namespace App\Listeners;

use App\Events\Laravel\Spark\Events\Teams\Subscription\SubscriptionCancelled;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateActiveTeamSubscription
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {

        \App\TeamBillingCycle::create([
            'team_id' => $event->team->id,
            'plan' => $event->team->subscription()->provider_plan ?? null,
            'credit' => $event->team->credit,
        ]);

        $currentPlan = $event instanceof SubscriptionCancelled
            ? null : $event->team->subscription()->provider_plan;

        $event->team->forceFill([
            'current_billing_plan' => $currentPlan,
        ])->save();

        switch($event->team->current_billing_plan){

            case "consent-10":

                $event->team->forceFill([
                    'credit' => 10
                ]);

                break;

            case "consent-30":

                $event->team->forceFill([
                    'credit' => 30
                ]);

                break;

            case "consent-50":

                $event->team->forceFill([
                    'credit' => 50
                ]);

                break;

        }

    }

}
