<?php

namespace App\Listeners;

use App\Events\Laravel\Spark\Events\Teams\Subscription\SubscriptionCancelled;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewTeamSubscriptionCredits
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

       $currentPlan = $event instanceof SubscriptionCancelled
            ? null : $event->team->subscription()->provider_plan;

        $event->team->forceFill([
            'current_billing_plan' => $currentPlan,
        ])->save();

    }

}
