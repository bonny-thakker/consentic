<?php

namespace App\Listeners;

use App\Events\Laravel\Spark\Events\Teams\TeamCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplyNewTeamCoupon
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
     * @param  TeamCreated  $event
     * @return void
     */
    public function handle($event)
    {

        if(session()->has('coupon')){

            switch(session()->get('coupon')){

                case "consent60":

                    $event->team->credit = 60;
                    $event->team->save();

                    break;

            }

        }

    }
}
