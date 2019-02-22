<?php

namespace App\Observers;

use App\Patient;

class PatientObserver
{
    /**
     * Handle the patient "created" event.
     *
     * @param  \App\Patient  $patient
     * @return void
     */
    public function created(Patient $patient)
    {

    }


    /**
     * Handle the patient "updated" event.
     *
     * @param  \App\Patient  $patien
     * @return void
     */
    public function updated(Patient $patient)
    {

    }

    /**
     * Handle the patient "saved" event.
     *
     * @param  \App\Patient  $patient
     * @return void
     */
    public function saved(Patient $patient)
    {
       
    }

    /**
     * Handle the patient "deleted" event.
     *
     * @param  \App\Patient  $patient
     * @return void
     */
    public function deleted(Patient $patient)
    {

        $patient->consentRequests()->delete();

    }

    /**
     * Handle the patient "restored" event.
     *
     * @param  \App\Patient  $patient
     * @return void
     */
    public function restored(Patient $patient)
    {
        //
    }

    /**
     * Handle the patient "force deleted" event.
     *
     * @param  \App\Patient  $patient
     * @return void
     */
    public function forceDeleted(Patient $patient)
    {
        //
    }
}
