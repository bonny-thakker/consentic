<?php

namespace App\Listeners;

use Exception;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\ConsentRequestCreated;
use App\Events\ConsentRequestUpdated;
use App\Events\UserLoggedIn;
use App\Events\UserLoggedOut;
use App\Events\PasswordForgotten;
use App\Events\ConsentPatientCommented;
use App\Events\ConsentUserCommented;
use App\Events\ConsentPatientSigned;
use App\Events\ConsentUserSigned;
use App\Events\ConsentPatientWatched;
use App\Events\ConsentPatientAnsweredQuestionsCorrectly;
use App\Events\ConsentUserAnsweredQuestionsCorrectly;

use App\AuditLog;

class GenerateAuditLog
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
     * @param  ConsentRequestCreated  $event
     * @return void
     */
    public function handle($event)
    {
        switch (true) {
            case $event instanceof UserLoggedIn:
                $auditAction = 'Successfully logged in.';
                break;

            case $event instanceof PasswordForgotten:
                $auditAction = 'Password reset requested.';
                break;

            case $event instanceof UserLoggedOut:
                $auditAction = 'Successfully logged out.';
                break;

            case $event instanceof ConsentRequestCreated:
                $auditAction = 'Created the consent request (signed url) <a href="/app/consent-requests/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
                break;

            case $event instanceof ConsentRequestUpdated:
                $auditAction = 'Updated the consent request (signed url) <a href="/app/consent-requests/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
                break;

            case $event instanceof ConsentPatientSigned:
                $auditAction = 'Patient signed the consent request <a href="/app/consent-requests/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
                break;

            case $event instanceof ConsentUserSigned:
                $auditAction = 'Doctor signed the consent request <a href="/app/consent-requests/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
                break;

            //case $event instanceof ConsentRevoked:
             //   $auditAction = 'Revoked the consent request <a href="/consent-requests/show/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
             //   break;

            case $event instanceof ConsentPatientCommented:
                $auditAction = 'Patient added a comment to the consent request: <a href="/app/consent-requests/' . $event->comment->commentable->id . '">' . $event->comment->commentable->consent->name . '</a>.';
                break;

            case $event instanceof ConsentUserCommented:
                        $auditAction = 'Doctor added a comment to the consent request: <a href="/app/consent-requests/' . $event->comment->commentable->id . '">' . $event->comment->commentable->consent->name . '</a>.';
                break;

            case $event instanceof ConsentPatientWatched:
                $auditAction = 'Patient watched the consent request video: <a href="/app/consent-requests/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
                break;

            case $event instanceof ConsentPatientAnsweredQuestionsCorrectly:
                $auditAction = 'Patient answered the consent request questions correctly: <a href="/app/consent-requests/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
                break;

            case $event instanceof ConsentUserAnsweredQuestionsCorrectly:
                $auditAction = 'Doctor answered the consent request questions correctly: <a href="/app/consent-requests/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
                break;

        }                            

        try {
            $log = AuditLog::create([
                'user_id' => $event->user->id ?? null,
                'patient_id' => $event->patient->id ?? null,
                'action' => $auditAction,
                'ip' => \Request::ip()
            ]);
        } catch (Exception $e) {
            // exit('Error From Listener CreateAuditLogs: ' . $e->getMessage());
        }
    }
}
