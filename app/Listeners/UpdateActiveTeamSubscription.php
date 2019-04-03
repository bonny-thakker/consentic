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
        $currentPlan = $event instanceof SubscriptionCancelled
            ? null : $event->team->subscription()->provider_plan;

        $event->team->forceFill([
            'current_billing_plan' => $currentPlan,
        ])->save();

        switch($event->team->current_billing_plan){

            case "consent-10":

                $event->team->update([
                    'credit' => 10
                ]);

                break;

            case "consent-30":

                $event->team->update([
                    'credit' => 30
                ]);

                break;

            case "consent-50":

                $event->team->update([
                    'credit' => 50
                ]);

                break;

        }

    }

}
