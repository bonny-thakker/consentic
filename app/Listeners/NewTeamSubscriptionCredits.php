<?php

namespace App\Listeners;

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
