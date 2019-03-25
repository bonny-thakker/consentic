<?php

namespace App\Mail;

use App\ConsentRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConsentRequestPatientCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $consentRequest;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ConsentRequest $consentRequest)
    {
        $this->consentRequest = $consentRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Consent Request Patient Completed')
            ->view('emails.consent-request-patient-completed');
    }
}
