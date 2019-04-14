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
    public $pdfFile;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ConsentRequest $consentRequest, $recipient, $pdfFile)
    {
        $this->consentRequest = $consentRequest;
        $this->recipient = $recipient;
        $this->pdfFile = $pdfFile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        switch($this->recipient){

            case "doctor":
                $view = 'emails.consent-request-completed-to-doctor';
                break;

            case "patient":
                $view = 'emails.consent-request-completed-to-patient';
                break;


        }


        return $this->subject('Consent Request Completed')
            ->view($view)
            ->attach($this->pdfFile, [
                'as' => basename($this->pdfFile),
                'mime' => 'application/pdf',
            ]);
    }
}
