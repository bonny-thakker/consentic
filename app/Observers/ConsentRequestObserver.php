<?php

namespace App\Observers;

use App\ConsentRequest;

class ConsentRequestObserver
{

    /**
     * Handle the consentRequest "created" event.
     *
     * @param  \App\ConsentRequest  $consentRequest
     * @return void
     */
    public function created(ConsentRequest $consentRequest)
    {
        event(new \App\Events\ConsentRequestCreated($consentRequest));
    }


    /**
     * Handle the consentRequest "updated" event.
     *
     * @param  \App\ConsentRequest  $patien
     * @return void
     */
    public function updated(ConsentRequest $consentRequest)
    {
        event(new \App\Events\ConsentRequestUpdated($consentRequest));
    }

    /**
     * Handle the consentRequest "saved" event.
     *
     * @param  \App\ConsentRequest  $consentRequest
     * @return void
     */
    public function saved(ConsentRequest $consentRequest)
    {

    }

    /**
     * Handle the consentRequest "deleted" event.
     *
     * @param  \App\ConsentRequest  $consentRequest
     * @return void
     */
    public function deleted(ConsentRequest $consentRequest)
    {

    }

    /**
     * Handle the consentRequest "restored" event.
     *
     * @param  \App\ConsentRequest  $consentRequest
     * @return void
     */
    public function restored(ConsentRequest $consentRequest)
    {
        //
    }

    /**
     * Handle the consentRequest "force deleted" event.
     *
     * @param  \App\ConsentRequest  $consentRequest
     * @return void
     */
    public function forceDeleted(ConsentRequest $consentRequest)
    {
        //
    }

}
