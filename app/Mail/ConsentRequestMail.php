<?php

namespace App\Mail;

use App\ConsentRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConsentRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $consentRequest;
    public $signedLink;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ConsentRequest $consentRequest, $signedLink)
    {
        $this->consentRequest = $consentRequest;
        $this->signedLink = $signedLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Consent Request Waiting')
            ->view('emails.consent-request');
    }
}
