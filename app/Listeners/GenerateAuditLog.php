<?php

namespace App\Listeners;

use App\Events\ConsentRequestCreated;
use Exception;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
                $auditAction = 'Created the consent request (signed url) <a href="/p/consent-requests/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
                break;

            case $event instanceof ConsentRequestUpdated:
                $auditAction = 'Updated the consent request (signed url) <a href="/p/consent-requests/' . $event->consentRequest->id . '">' . $event->consentRequest->consent->name . '</a>.';
                break;

            case $event instanceof ConsentSigned:
            case $event instanceof ConsentDoctorSigned:
                $auditAction = 'Signed the consent request <a href="/consent-requests/show/' . $event->consentRequest->id . '">' . $event->consentRequest->procedure->consentName . '</a>.';
                break;

            case $event instanceof ConsentRevoked:
                $auditAction = 'Revoked the consent request <a href="/consent-requests/show/' . $event->consentRequest->id . '">' . $event->consentRequest->procedure->consentName . '</a>.';
                break;

            case $event instanceof ConsentCommented:
                $auditAction = 'Added a comment to the consent request: <a href="/consent-requests/show/' . $event->comment->consentRequest->id . '">' . $event->comment->consentRequest->procedure->consentName . '</a>.';
                break;
        }

        try {
            $log = AuditLog::create([
                'user_id' => $event->user->id,
                'action' => $auditAction,
                'ip' => \Request::ip()
            ]);
        } catch (Exception $e) {
            // exit('Error From Listener CreateAuditLogs: ' . $e->getMessage());
        }
    }
}
