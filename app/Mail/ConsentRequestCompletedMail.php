<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ConsentRequest;

class ConsentRequestCompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $consentRequest;
    public $recipient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ConsentRequest $consentRequest, $recipient)
    {
        $this->consentRequest = $consentRequest;
        $this->recipient = $recipient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Consent Request Completed')
            ->view('emails.consent-request-completed');
    }
}
