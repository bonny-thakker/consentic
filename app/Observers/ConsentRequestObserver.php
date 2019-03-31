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

        foreach(\App\UserQuestion::orderBy('order', 'ASC')->get() as $userQuestion){

            $consentRequestQuestion = \App\ConsentRequestQuestion::create([
                'consent_request_id' => $consentRequest->id,
                'consent_request_questionable_id' => $userQuestion->id,
                'consent_request_questionable_type' => 'App\UserQuestion'
            ]);

            \App\ConsentRequestQuestionAnswer::create([
                'consent_request_question_id' => $consentRequestQuestion->id
            ]);

        }

        foreach(\App\PatientQuestion::all() as $patientQuestion){

            // Remove blood transfusion from skin exclusion
            if($patientQuestion->id == 1 && in_array($consentRequest->consent->id, [20])){

                // Do nothing, needs work.

            }else{
                $consentRequestQuestion = \App\ConsentRequestQuestion::create([
                    'consent_request_id' => $consentRequest->id,
                    'consent_request_questionable_id' => $patientQuestion->id,
                    'consent_request_questionable_type' => 'App\PatientQuestion'
                ]);

                \App\ConsentRequestQuestionAnswer::create([
                    'consent_request_question_id' => $consentRequestQuestion->id
                ]);
            }

        }

        foreach($consentRequest->consent->questions as $question){

            $consentRequestQuestion = \App\ConsentRequestQuestion::create([
                'consent_request_id' => $consentRequest->id,
                'consent_request_questionable_id' => $question->id,
                'consent_request_questionable_type' => 'App\Question'
            ]);

            \App\ConsentRequestQuestionAnswer::create([
                    'consent_request_question_id' => $consentRequestQuestion->id
                ]);

            }


        if(!auth()->user()->currentTeam->onGenericTrial()){
            auth()->user()->currentTeam->credit = auth()->user()->currentTeam->credit - 1;
            auth()->user()->currentTeam->save();
        }

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
        if(!auth()->user()->currentTeam->onGenericTrial()) {
            auth()->user()->currentTeam->credit = auth()->user()->currentTeam->credit + 1;
            auth()->user()->currentTeam->save();
        }
    }

    /**
     * Handle the consentRequest "restored" event.
     *
     * @param  \App\ConsentRequest  $consentRequest
     * @return void
     */
    public function restored(ConsentRequest $consentRequest)
    {
        if(!auth()->user()->currentTeam->onGenericTrial()) {
            auth()->user()->currentTeam->credit = auth()->user()->currentTeam->credit - 1;
            auth()->user()->currentTeam->save();
        }
    }

    /**
     * Handle the consentRequest "force deleted" event.
     *
     * @param  \App\ConsentRequest  $consentRequest
     * @return void
     */
    public function forceDeleted(ConsentRequest $consentRequest)
    {
        if(!auth()->user()->currentTeam->onGenericTrial()) {
            auth()->user()->currentTeam->credit = auth()->user()->currentTeam->credit + 1;
            auth()->user()->currentTeam->save();
        }
    }

}
