<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationRequestManagmentCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $donationRequestData;
    
    public $subject = "Se ha solicitado una donacion";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($donationRequest)
    {
        $this->donationRequestData = $donationRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.managment.donation-request-managment');
    }
}
